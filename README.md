# WordPress Plugin CI Blueprint

A reusable starting point for automated quality checks, unit testing, and release packaging for WordPress plugins.

This repository provides a baseline you can copy into a plugin project and adapt to its actual PHP and WordPress support policy.

## Included

- **GitHub Actions** — quality checks on pushes, pull requests, and manual runs.
- **PHP matrix** — checks PHP 8.1, 8.2, 8.3, and 8.4.
- **PHPCS + WordPress Coding Standards** — consistent code-style checks.
- **PHPCompatibilityWP** — detects use of PHP features outside the configured compatibility target.
- **PHPUnit 10** — a minimal test setup and runtime smoke test.
- **Release packaging** — creates a ZIP when a `v*` tag is pushed.
- **Distribution exclusions** — Git archive rules keep development files out of the release ZIP.

## Requirements

- PHP 8.1 or newer
- Composer 2
- Git

## Quick start

1. Copy the configuration files and directories into the root of your WordPress plugin repository. See [Adopting the blueprint](docs/installation.md).
2. Update the Composer package name and project metadata.
3. Review the PHP and WordPress compatibility targets.
4. Install dependencies:

   ```bash
   composer install
   ```

5. Run the checks:

   ```bash
   composer check
   ```

6. Commit the generated `composer.lock` in the plugin repository.

## Available commands

| Command | Purpose |
| --- | --- |
| `composer lint` | Run PHPCS and PHP compatibility checks |
| `composer lint:fix` | Apply automatic PHPCBF fixes where possible |
| `composer test` | Run PHPUnit tests |
| `composer check` | Run lint and tests |

## Important scope boundaries

This is a **CI and quality baseline**, not a complete WordPress integration-testing environment.

The included PHPUnit test only verifies the minimum PHP runtime. It does not boot WordPress, activate a plugin, create a database, or test WooCommerce behavior. Add plugin-specific unit and integration tests before treating a green workflow as proof of functional correctness.

The release workflow packages the tracked Git tree using `git archive`. It does not install production Composer dependencies or compile frontend assets. Extend it if your plugin requires either.

The `.distignore` file is provided as a reference for distribution tooling; the current ZIP workflow uses `.gitattributes` `export-ignore` rules.

## Compatibility defaults

The initial configuration targets PHP 8.1+ and WordPress 6.4+. These are defaults for this blueprint, not a recommendation that every plugin should drop older versions. Align the configuration with the versions your plugin actually supports.

## Documentation

- [Adopting the blueprint](docs/installation.md)
- [Customizing the workflows](docs/customization.md)

## License

MIT. See [LICENSE](LICENSE).
