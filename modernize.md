# Modernization TODO

This file captures notes and a simple TODO list for modernizing the project.

## Goals

- Implement static analysis with PHPStan ("stan"). Start at level 7 and incrementally raise to level 9.
- Add a PHP code formatter to ensure consistent, pretty code (evaluate Pint — Laravel-specific — or php-cs-fixer / prettier-php).
- Implement Rector to apply automated refactors and prepare/upgrade code for PHP 8.5.
- Improve test coverage by adding unit/integration tests and raising coverage thresholds.

## Tasks

- [ ] Add PHPStan configuration and CI steps
  - Start at level 7 and progressively fix issues up to level 9
  - Consider using a baseline to make the initial upgrade manageable

- [ ] Add code formatter
  - Evaluate Pint (Laravel), php-cs-fixer, or other formatter
  - Add formatting check and auto-format step in CI

- [ ] Add Rector
  - Configure Rector rulesets for upgrades and deprecations
  - Run Rector in dry-run mode and review suggested changes before applying

- [ ] Increase test coverage
  - Identify low-coverage areas and add tests
  - Add coverage check step to CI and gradually raise thresholds

## Notes

- Keep changes incremental to avoid large, risky refactors.
- Prefer automation (CI) for checks: PHPStan, formatter, Rector dry-run, and coverage reports.
- Revisit and refine rules/configs as codebase and dependencies evolve.
