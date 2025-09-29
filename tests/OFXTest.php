<?php

use PHPUnit\Framework\TestCase;
use Endeken\OFX\OFX;

class OFXTest extends TestCase
{
    private string $ofxTestFilesDir = __DIR__ . '/fixtures';

    /**
     * @throws Exception
     */
    public function testMultipleAccountsXML()
    {
        $filePath = $this->ofxTestFilesDir . '/ofx-multiple-accounts-xml.ofx';
        $ofxContent = file_get_contents($filePath);

        $parsedData = OFX::parse($ofxContent);

        //var_dump($parsedData);

        $this->assertNotEmpty($parsedData);
    }

    /**
     * @throws Exception
     */
    public function testOfxData()
    {
        $filePath = $this->ofxTestFilesDir . '/ofxdata.ofx';
        $ofxContent = file_get_contents($filePath);

        $parsedData = OFX::parse($ofxContent);

        //var_dump($parsedData);

        $this->assertNotEmpty($parsedData);
    }

    /**
     * @throws Exception
     */
    public function testOfxDataBankingXml200()
    {
        $filePath = $this->ofxTestFilesDir . '/ofxdata-banking-xml200.ofx';
        $ofxContent = file_get_contents($filePath);

        $parsedData = OFX::parse($ofxContent);

        //var_dump($parsedData);

        $this->assertNotEmpty($parsedData);
    }

    /**
     * @throws Exception
     */
    public function testOfxDataBB()
    {
        $filePath = $this->ofxTestFilesDir . '/ofxdata-bb.ofx';
        $ofxContent = file_get_contents($filePath);

        $parsedData = OFX::parse($ofxContent);

        //var_dump($parsedData);

        $this->assertNotEmpty($parsedData);
    }

    /**
     * @throws Exception
     */
    public function testOfxDataBBTwoStmtrs()
    {
        $filePath = $this->ofxTestFilesDir . '/ofxdata-bb-two-stmtrs.ofx';
        $ofxContent = file_get_contents($filePath);

        $parsedData = OFX::parse($ofxContent);

        //var_dump($parsedData);

        $this->assertNotEmpty($parsedData);
    }

    /**
     * @throws Exception
     */
    public function testOfxDataBpbfc()
    {
        $filePath = $this->ofxTestFilesDir . '/ofxdata-bpbfc.ofx';
        $ofxContent = file_get_contents($filePath);

        $parsedData = OFX::parse($ofxContent);

        //var_dump($parsedData);

        $this->assertNotEmpty($parsedData);
    }

    /**
     * @throws Exception
     */
    public function testOfxDataCmfr()
    {
        $filePath = $this->ofxTestFilesDir . '/ofxdata-cmfr.ofx';
        $ofxContent = file_get_contents($filePath);

        $parsedData = OFX::parse($ofxContent);

        //var_dump($parsedData);

        $this->assertNotEmpty($parsedData);
    }

    /**
     * @throws Exception
     */
    public function testOfxDataCreditCard()
    {
        $filePath = $this->ofxTestFilesDir . '/ofxdata-credit-card.ofx';
        $ofxContent = file_get_contents($filePath);

        $parsedData = OFX::parse($ofxContent);

        //var_dump($parsedData);

        $this->assertNotEmpty($parsedData);
    }

    /**
     * @throws Exception
     */
    public function testOfxDataEmptyDateTime()
    {
        $filePath = $this->ofxTestFilesDir . '/ofxdata-emptyDateTime.ofx';
        $ofxContent = file_get_contents($filePath);

        $parsedData = OFX::parse($ofxContent);

        //var_dump($parsedData);

        $this->assertNotEmpty($parsedData);
    }

    /**
     * @throws Exception
     */
    public function testOfxDataFullExample()
    {
        $filePath = $this->ofxTestFilesDir . '/ofxdata-full-example.ofx';
        $ofxContent = file_get_contents($filePath);

        $parsedData = OFX::parse($ofxContent);

        //var_dump($parsedData);

        $this->assertNotEmpty($parsedData);
    }

    /**
     * @throws Exception
     */
    public function testOfxDataGoogle()
    {
        $filePath = $this->ofxTestFilesDir . '/ofxdata-google.ofx';
        $ofxContent = file_get_contents($filePath);

        $parsedData = OFX::parse($ofxContent);

        //var_dump($parsedData);

        $this->assertNotEmpty($parsedData);
    }

    /**
     * @throws Exception
     */
    public function testOfxDataInvestmentsMultipleAccountsXml()
    {
        $filePath = $this->ofxTestFilesDir . '/ofxdata-investments-multiple-accounts-xml.ofx';
        $ofxContent = file_get_contents($filePath);

        $parsedData = OFX::parse($ofxContent);

        //var_dump($parsedData);

        $this->assertNotEmpty($parsedData);
    }

    /**
     * @throws Exception
     */
    public function testOfxDataInvestmentsOnelineXml()
    {
        $filePath = $this->ofxTestFilesDir . '/ofxdata-investments-oneline-xml.ofx';
        $ofxContent = file_get_contents($filePath);

        $parsedData = OFX::parse($ofxContent);

        //var_dump($parsedData);

        $this->assertNotEmpty($parsedData);
    }

    /**
     * @throws Exception
     */
    public function testOfxDataInvestmentsXml()
    {
        $filePath = $this->ofxTestFilesDir . '/ofxdata-investments-xml.ofx';
        $ofxContent = file_get_contents($filePath);

        $parsedData = OFX::parse($ofxContent);

        //var_dump($parsedData);

        $this->assertNotEmpty($parsedData);
    }

    /**
     * @throws Exception
     */
    public function testOfxDataMemoWithAmpersand()
    {
        $filePath = $this->ofxTestFilesDir . '/ofxdata-memoWithAmpersand.ofx';
        $ofxContent = file_get_contents($filePath);

        $parsedData = OFX::parse($ofxContent);

        //var_dump($parsedData);

        $this->assertNotEmpty($parsedData);
    }

    /**
     * @throws Exception
     */
    public function testOfxDataMemoWithQuotes()
    {
        $filePath = $this->ofxTestFilesDir . '/ofxdata-memoWithQuotes.ofx';
        $ofxContent = file_get_contents($filePath);

        $parsedData = OFX::parse($ofxContent);

        //var_dump($parsedData);

        $this->assertNotEmpty($parsedData);
    }

    /**
     * @throws Exception
     */
    public function testOfxDataOneline()
    {
        $filePath = $this->ofxTestFilesDir . '/ofxdata-oneline.ofx';
        $ofxContent = file_get_contents($filePath);

        $parsedData = OFX::parse($ofxContent);

        //var_dump($parsedData);

        $this->assertNotEmpty($parsedData);
    }

    /**
     * @throws Exception
     */
    public function testOfxDataRbcCreditCard()
    {
        $filePath = $this->ofxTestFilesDir . '/ofxdata-rbc-credit-card.ofx';
        $ofxContent = file_get_contents($filePath);

        $parsedData = OFX::parse($ofxContent);

        //var_dump($parsedData);

        $this->assertNotEmpty($parsedData);
    }

    /**
     * @throws Exception
     */
    public function testOfxDataSelfClose()
    {
        $filePath = $this->ofxTestFilesDir . '/ofxdata-selfclose.ofx';
        $ofxContent = file_get_contents($filePath);

        $parsedData = OFX::parse($ofxContent);

        //var_dump($parsedData);

        $this->assertNotEmpty($parsedData);
    }

    /**
     * @throws Exception
     */
    public function testOfxDataXml()
    {
        $filePath = $this->ofxTestFilesDir . '/ofxdata-xml.ofx';
        $ofxContent = file_get_contents($filePath);

        $parsedData = OFX::parse($ofxContent);

        //var_dump($parsedData);

        $this->assertNotEmpty($parsedData);
    }

}
