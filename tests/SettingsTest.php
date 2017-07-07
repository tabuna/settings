<?php

use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Orchid\Setting\Models\Setting;
use PHPUnit\Framework\TestCase;

class SettingsTest extends TestCase
{
    /**
     * Database connect.
     *
     * @var
     */
    public $capsule;

    /**
     * Setting Model.
     *
     * @var
     */
    public $setting;

    /**
     *  Init.
     */
    public function setUp()
    {
        $capsule = new Capsule();
        $capsule->addConnection([
            'driver'   => 'mysql',
            'host'     => 'localhost',
            'database' => 'settings',
            'username' => 'root',
            'password' => '',
            'prefix'   => '',
        ]);
        $capsule->setEventDispatcher(new Dispatcher(new Container()));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        Capsule::schema()->dropIfExists('settings');
        Capsule::schema()->create('settings', function ($table) {
            $table->string('key')->primary();
            $table->json('value');
        });
        $this->capsule = $capsule->getDatabaseManager();

        $setting = new Setting();
        $setting->cache = false;
        $this->setting = $setting;
    }

    /** @test */
    public function testOneValue()
    {

        //Запишем значение
        $key = 'test-'.str_random(40);
        $value = 'value-'.str_random(40);

        $this->setting->set($key, $value);

        $result = $this->setting->get($key, null);

        $this->assertEquals($value, $result);

        //Удаляем значение
        $this->setting->forget($key);

        //Проверяем это значение
        $result = $this->setting->get($key);
        $this->assertEquals(null, $result);
    }

    /** @test */
    public function testManyValue()
    {
        $valueArray = [
            'test-1' => 'value-'.str_random(40),
            'test-2' => 'value-'.str_random(40),
            'test-3' => 'value-'.str_random(40),
        ];

        //Добавим несколько значений
        foreach ($valueArray as $key => $value) {
            $this->setting->set($key, $value);
        }
        //Возьмём все эти значения
        $result = $this->setting->get([
            'test-1',
            'test-2',
            'test-3',
        ]);

        $this->assertEquals(3, count($result));

        //Удалим все значениея
        $result = $this->setting->forget([
            'test-1',
            'test-2',
            'test-3',
        ]);
        $this->assertTrue($result);
    }
}
