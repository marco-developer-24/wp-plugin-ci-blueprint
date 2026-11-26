<?php
/**
 * Runtime environment tests.
 *
 * @package WordPressPluginCIBlueprint
 */

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * Verifies the minimum PHP runtime declared by this blueprint.
 */
final class EnvironmentTest extends TestCase {

    public function test_runtime_meets_the_declared_minimum_php_version(): void {
        $this->assertGreaterThanOrEqual( 80100, PHP_VERSION_ID );
    }
}
