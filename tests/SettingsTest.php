<?php

declare(strict_types=1);

namespace Orchid\Settings\Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Illuminate\Support\Str;
use Orchid\Settings\Tuning;

class SettingsTest extends TestCase
{
    /**
     * Setting Model.
     *
     * @var Tuning
     */
    public $setting;

    public function testForOneValue(): void
    {
        //Запишем значение
        $key = 'test-' . Str::random(40);
        $value = 'value-' . Str::random(40);

        $this->setting->set($key, $value);

        $result = $this->setting->get($key);

        $this->assertEquals($value, $result);

        //Удаляем значение
        $this->setting->forget($key);

        //Проверяем это значение
        $result = $this->setting->get($key);

        $this->assertEquals(null, $result);
    }

    public function testForManyValue(): void
    {
        $valueArray = [
            'test-1' => 'value-' . Str::random(40),
            'test-2' => 'value-' . Str::random(40),
            'test-3' => 'value-' . Str::random(40),
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

        $this->assertCount(3, $result);

        //Удалим все значениея
        $result = $this->setting->forget([
            'test-1',
            'test-2',
            'test-3',
        ]);

        $this->assertEquals(3, $result);
    }

    public function testForRewriteCache(): void
    {
        $this->setting->set('cache-key', 'old');
        $this->setting->get('cache-key');

        $this->setting->set('cache-key', 'new');
        $this->assertStringContainsString('new', $this->setting->get('cache-key'));
    }

    /**
     *
     * @param $defaultValue
     */
    #[DataProvider('notExistValues')]
    public function testDefaultValue($defaultValue): void
    {
        $value = $this->setting->get('nonexistent value', $defaultValue);

        $this->assertEquals(gettype($defaultValue), gettype($value));
        $this->assertEquals($defaultValue, $value);
    }

    /**
     * @return array
     */
    public static function notExistValues(): array
    {
        return [
            ['string'],
            [123],
            [new \stdClass()],
            [['test', 123]],
        ];
    }

    public function testUseHelper(): void
    {
        $this->setting->set('helper', 'run');

        $this->assertEquals('run', setting('helper'));

        $this->assertEquals('default', setting('not-found', 'default'));
    }

    protected function setUp(): void
    {
        parent::setUp();
        $setting = new Tuning();
        $setting->cache = false;
        $this->setting = $setting;
    }
}
