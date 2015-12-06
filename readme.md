## Settings
Settings package from Laravel 5

[![Latest Stable Version](https://poser.pugx.org/orchid/settings/v/stable)](https://packagist.org/packages/orchid/settings)
[![Total Downloads](https://poser.pugx.org/orchid/settings/downloads)](https://packagist.org/packages/orchid/settings)
[![License](https://poser.pugx.org/orchid/settings/license)](https://packagist.org/packages/orchid/settings)

## Install

`composer require orchid/settings`

Include `Orchid\Settings\Providers\SettingsServiceProvider::class,` in your `config/app.php`
And add Facade 'Settings => Orchid\Settings\Facades\SettingsFacades::class'

## Usage

```php
use Settings;

//Add settings for key => value
Settings::set($key,$value);

// Get settings,
Settings::get($key, $default);

// Remove 
Settings::forget($key);
```
