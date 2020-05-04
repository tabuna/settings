<?php

declare(strict_types=1);

namespace Orchid\Settings\Tests;

use Orchid\Settings\Setting;
use Orchid\Settings\SettingServiceProvider;

/**
 * Class TestCase
 *
 * @package Orchid\Settings\Tests
 */
abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        /* Install application */
        $this->loadLaravelMigrations();
        $this->loadMigrationsFrom(realpath('./database/migrations'));
        $this->withFactories('./database/factories');

        /*
        $this->artisan('db:seed', [
            '--class' => SettingsTableSeeder::class,
        ]);
        */
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $config = config();

        $config->set('app.debug', true);

        // set up database configuration
        $config->set('database.connections.orchid', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);

        $config->set('scout.driver', 'array');
        $config->set('database.default', 'orchid');
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            SettingServiceProvider::class,
        ];
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'Setting' => Setting::class,
        ];
    }
}
