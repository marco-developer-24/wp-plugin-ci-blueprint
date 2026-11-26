# Adopting the blueprint

This repository is a starting point, not a drop-in test suite for every plugin. Review each setting and adjust it to the plugin's supported PHP and WordPress versions.

## 1. Copy the configuration

Copy the following files and directories into the root of your plugin repository:

- `.github/workflows/`
- `.editorconfig`
- `.gitattributes`
- `.gitignore`
- `.distignore`
- `composer.json`
- `phpcs.xml.dist`
- `phpunit.xml.dist`
- `tests/`

Update the Composer package name and project metadata.

## 2. Install dependencies

Requirements: PHP 8.1 or newer and Composer 2.

```bash
composer install
```

Commit the generated `composer.lock` in the plugin repository so CI uses a reproducible dependency set.

## 3. Run checks locally

```bash
composer lint
composer test
composer check
```

The initial PHPUnit test is only a runtime smoke test. Add tests for the plugin's actual behavior and bootstrap WordPress (or use a dedicated integration-test environment) before relying on this suite for plugin correctness.

## 4. Adapt compatibility targets

Review all of the following before enabling the workflow on a production plugin:

- The PHP version in `composer.json`.
- The PHP matrix in `.github/workflows/quality.yml`.
- The `testVersion` property in `phpcs.xml.dist`.
- The minimum WordPress version configured in PHPCS.
- The PHPUnit version and test bootstrap.

The PHPCompatibility rule currently targets PHP 8.1 and newer. Set this to the oldest PHP version your plugin officially supports.

## 5. Create a release

Push a version tag such as `v1.0.0`. The release workflow creates a ZIP from the tagged Git tree. Files marked `export-ignore` in `.gitattributes` are excluded from the archive.

Review the generated ZIP before distributing it. If your plugin needs build assets, Composer production dependencies, or generated files, extend the release workflow accordingly.
