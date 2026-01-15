<?php

declare(strict_types=1);

namespace Endeken\OFX;

use DateTime;
use DateTimeZone;
use Exception;
use SimpleXMLElement;

/**
 * Class OFX
 *
 * This class provides functions to parse OFX data and convert it into an associative array or appropriate objects.
 */
class OFX
{
    /**
     * Parse OFX data and return an associative array with the parsed information.
     *
     * @param string $ofxData The OFX data as a string.
     * @return OFXData|null An associative array with the parsed information or false on failure.
     * @throws Exception
     */
    public static function parse(string $ofxData): null|OFXData
    {

        // Check if SimpleXML object was created successfully

        $xml = OFXUtils::normalizeOfx($ofxData);
        if ($xml === false) {
            return null;
        }

        $signOn = self::parseSignOn($xml->SIGNONMSGSRSV1->SONRS ?? null);
        $accountInfo = self::parseAccountInfo($xml->SIGNUPMSGSRSV1->ACCTINFOTRNRS ?? null);
        $bankAccounts = [];

        if (property_exists($xml, 'BANKMSGSRSV1') && $xml->BANKMSGSRSV1 !== null) {
            foreach ($xml->BANKMSGSRSV1->STMTTRNRS as $accountStatement) {
                foreach ($accountStatement->STMTRS as $statementResponse) {
                    $bankAccounts[] = self::parseBankAccount((string) $accountStatement->TRNUID, $statementResponse);
                }
            }
        } elseif (property_exists($xml, 'CREDITCARDMSGSRSV1') && $xml->CREDITCARDMSGSRSV1 !== null) {
            $bankAccounts[] = self::parseCreditAccount((string) $xml->TRNUID, $xml->CREDITCARDMSGSRSV1->CCSTMTTRNRS);
        }

        return new OFXData($signOn, $accountInfo, $bankAccounts);
    }

    /**
     * @param SimpleXMLElement $xml
     * @return SignOn
     * @throws Exception
     */
    protected static function parseSignOn(?SimpleXMLElement $xml): ?SignOn
    {
        if (!$xml instanceof SimpleXMLElement) {
            return null;
        }

        $status = self::parseStatus($xml->STATUS);
        $dateTime = self::parseDate((string) $xml->DTSERVER);
        $language = (string) $xml->LANGUAGE;
        $institute = self::parseInstitute($xml->FI);
        return new SignOn($status, $dateTime, $language, $institute);
    }

    protected static function parseInstitute(SimpleXMLElement $xml): Institute
    {
        $name = (string) $xml->ORG;
        $id = (string) $xml->FID;
        return new Institute($id, $name);
    }

    protected static function parseStatus(SimpleXMLElement $xml): Status
    {
        $code = (string) $xml->STATUS->CODE;
        $severity = (string) $xml->STATUS->SEVERITY;
        $message = (string) $xml->STATUS->MESSAGE;
        return new Status($code, $severity, $message);
    }

    /**
     * Parse a date string and return a formatted date.
     *
     * @param string $dateString The date string to parse.
     * @return DateTime The formatted date.
     * @throws Exception
     */
    protected static function parseDate(string $dateString): DateTime
    {
        $dateString = explode('.', $dateString)[0];
        // Extract the numeric part of the offset (e.g., -5 from [-5:EST])
        // Also deal with some OFX data where the date string contains the offset, but not the
        // timezone abbreviation, ie. 20240501094851[-8]
        preg_match('/([-+]\d+)(:)?(\w+)?/', $dateString, $matches);

        if (count($matches) >= 2) {
            $offset = $matches[1];
            $timezoneAbbreviation = $matches[3] ?? null;

            // Remove the offset with brackets and timezone abbreviation from the date string
            $dateStringWithoutOffset = preg_replace('/[-+]\d+:\w+/', '', $dateString);
            if ($dateStringWithoutOffset === null) {
                $dateStringWithoutOffset = $dateString;
            }

            // Remove brackets and timezone abbreviation
            $dateStringWithoutOffset = str_replace(['[', ']', ':' . ($timezoneAbbreviation ?? '')], '', $dateStringWithoutOffset);

            // Create a DateTime object with the appropriate timezone offset
            $dateTime = new DateTime($dateStringWithoutOffset, new DateTimeZone('GMT' . $offset));
            (null === $timezoneAbbreviation) ?: $dateTime->setTimezone(new DateTimeZone($timezoneAbbreviation));

        } else {
            // Handle cases where the date format doesn't match expectations
            // You might want to log an error or throw an exception depending on your needs
            $dateTime = new DateTime($dateString);
        }

        return $dateTime;
    }

    /**
     * @throws Exception
     */
    private static function parseBankAccount(string $uuid, SimpleXMLElement $xml): BankAccount
    {
        $accountNumber = (string) ($xml->BANKACCTFROM->ACCTID ?? 'N/A');
        $accountType = (string) ($xml->BANKACCTFROM->ACCTTYPE ?? 'N/A');
        $agencyNumber = (string) ($xml->BANKACCTFROM->BRANCHID ?? 'N/A');
        $routingNumber = (string) ($xml->BANKACCTFROM->BANKID ?? 'N/A');
        $balance = (string) ($xml->LEDGERBAL->BALAMT ?? 'N/A');
        $balanceDate =  (null !== $xml->LEDGERBAL->DTASOF) ? self::parseDate((string) $xml->LEDGERBAL->DTASOF) : new DateTime();
        $statement = self::parseStatement($xml);
        return new BankAccount(
            $accountNumber,
            $accountType,
            $agencyNumber,
            $routingNumber,
            $balance,
            $balanceDate,
            $uuid,
            $statement,
        );
    }

    /**
     * @throws Exception
     */
    private static function parseCreditAccount(string $uuid, SimpleXMLElement $xml): BankAccount
    {
        $nodeName = 'CCACCTFROM';
        if (!isset($xml->CCSTMTRS->$nodeName)) {
            $nodeName = 'BANKACCTFROM';
        }

        $accountNumber = (string) $xml->CCSTMTRS->$nodeName->ACCTID;
        $accountType = (string) $xml->CCSTMTRS->$nodeName->ACCTTYPE;
        $agencyNumber = (string) $xml->CCSTMTRS->$nodeName->BRANCHID;
        $routingNumber = (string) $xml->CCSTMTRS->$nodeName->BANKID;
        $balance = (string) $xml->CCSTMTRS->LEDGERBAL->BALAMT;
        $balanceDate = self::parseDate((string) $xml->CCSTMTRS->LEDGERBAL->DTASOF);
        $statement = self::parseStatement($xml->CCSTMTRS);
        return new BankAccount(
            $accountNumber,
            $accountType,
            $agencyNumber,
            $routingNumber,
            $balance,
            $balanceDate,
            $uuid,
            $statement,
        );
    }

    /**
     * @throws Exception
     */
    private static function parseStatement(SimpleXMLElement $xml): Statement
    {
        $currency = (string) $xml->CURDEF;
        $startDate = self::parseDate((string) $xml->BANKTRANLIST->DTSTART);
        $endDate = self::parseDate((string) $xml->BANKTRANLIST->DTEND);
        $transactions = [];
        foreach ($xml->BANKTRANLIST->STMTTRN as $transactionXml) {
            $type = (string) $transactionXml->TRNTYPE;
            $date = self::parseDate((string) $transactionXml->DTPOSTED);
            $userInitiatedDate = null;
            if ((string) $transactionXml->DTUSER !== '' && (string) $transactionXml->DTUSER !== '0') {
                $userInitiatedDate = self::parseDate((string) $transactionXml->DTUSER);
            }

            $amount = (float) $transactionXml->TRNAMT;
            $uniqueId = (string) $transactionXml->FITID;
            $name = (string) $transactionXml->NAME;
            $memo = (string) $transactionXml->MEMO;
            $sic = (string) $transactionXml->SIC;
            $checkNumber = (string) $transactionXml->CHECKNUM;
            $transactions[] = new Transaction(
                $type,
                $amount,
                $date,
                $userInitiatedDate,
                $uniqueId,
                $name,
                $memo,
                $sic,
                $checkNumber,
            );
        }

        return new Statement($currency, $transactions, $startDate, $endDate);
    }

    /**
     * @return array<int, AccountInfo>|null
     */
    private static function parseAccountInfo(?SimpleXMLElement $xml): array|null
    {
        if (!$xml instanceof SimpleXMLElement || (!property_exists($xml, 'ACCTINFO') || $xml->ACCTINFO === null)) {
            return null;
        }

        $accounts = [];
        foreach ($xml->ACCTINFO as $account) {
            $accounts[] = new AccountInfo(
                (string)$account->DESC,
                (string)$account->ACCTID
            );
        }

        return $accounts;
    }
}
