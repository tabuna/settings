## Settings
Simple key-value storage package from Laravel 5

[![Build Status](https://travis-ci.org/TheOrchid/Settings.svg?branch=master)](https://travis-ci.org/TheOrchid/Settings)
[![Latest Stable Version](https://poser.pugx.org/orchid/settings/v/stable)](https://packagist.org/packages/orchid/settings)
[![Total Downloads](https://poser.pugx.org/orchid/settings/downloads)](https://packagist.org/packages/orchid/settings)
[![License](https://poser.pugx.org/orchid/settings/license)](https://packagist.org/packages/orchid/settings)



## Installation

1. install package

	```php
    composer require orchid/settings
	```

1. edit config/app.php

	service provider :

	```php
	Orchid\Setting\Providers\SettingServiceProvider::class
	```

    class aliases :

	```php
	'Setting' => Orchid\Setting\Facades\Setting::class
	```

1. create settings table

	```php
	php artisan vendor:publish
	php artisan migrate
	```

## Usage

```php
use Setting;

//Add settings for key => value
Setting::set($key,$value);

// Get settings,
Setting::get($key, $default);

// Remove 
Setting::forget($key);
```
## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
