<?php namespace GeneaLabs\LaravelCaffeine\Tests\Unit\Console\Commands;

use GeneaLabs\LaravelCaffeine\Tests\UnitTestCase;

class PublishTest extends UnitTestCase
{
    public function testConfigFileGetsPublished()
    {
        $this->artisan('caffeine:publish', ['--config' => true]);

        $this->assertFileExists(base_path('config/genealabs-laravel-caffeine.php'));
    }

    public function testConfigFileContainsCorrectSettings()
    {
        $settings = file_get_contents(base_path('config/genealabs-laravel-caffeine.php'));

        $this->assertStringContainsStringIgnoringCase("'drip-interval' => 300000,", $settings);
        $this->assertStringContainsStringIgnoringCase("'domain' => null,", $settings);
        $this->assertStringContainsStringIgnoringCase("'route' => 'genealabs/laravel-caffeine/drip',", $settings);
        $this->assertStringContainsStringIgnoringCase("'outdated-drip-check-interval' => 2000,", $settings);
    }
}
