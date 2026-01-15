# Changelog

All notable changes to this project will be documented in this file.

## [2.0.0] - 2026-01-15
### Changed
- Modernized test suite to **Pest v4** and converted tests to `test()`/`it()` format.
- Added **PHPStan** static analysis (configured at level 7) and fixed reported issues.
- Applied safe automated refactorings via **Rector** (constructor property promotion, strict types, type hints).
- Added test coverage tooling and **composer scripts** for HTML, text, and Clover reports.
- Improved test coverage and fixed parsing bugs exposed by stricter typing.

### Note
- This is a **major**, breaking release due to stricter typing and modernization; consumers should verify compatibility with their code.
