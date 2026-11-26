# Customizing the workflows

## Quality workflow

`.github/workflows/quality.yml` runs on pushes to `main`, pull requests, and manual dispatch.

The current matrix checks PHP 8.1 through 8.4. Keep this matrix aligned with the plugin's declared support policy. Add WordPress integration tests separately; this workflow currently runs PHPCS and the PHPUnit suite only.

## Coding standards

`phpcs.xml.dist` combines WordPress Coding Standards with PHPCompatibilityWP. Adjust the ruleset to match the plugin's conventions, but avoid disabling rules globally to make CI pass.

## Release workflow

The release workflow runs when a tag matching `v*` is pushed. It uses `git archive` and `.gitattributes` export rules to create a clean ZIP.

For plugins that require a build step or production dependencies:

1. Add the required build tools and commands.
2. Generate production assets or install production dependencies.
3. Stage only distributable files.
4. Package the staged directory.
5. Inspect the ZIP contents as part of CI.

Do not assume `.distignore` is applied by `git archive`; this blueprint uses Git's `export-ignore` attributes for archive exclusions.
