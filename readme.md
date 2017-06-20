## Settings
Simple key-value storage package from Laravel 5

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
	Orchid\Settings\Providers\SettingsServiceProvider::class
	```

    class aliases :

	```php
	'Settings' => Orchid\Settings\Facades\SettingsFacades::class
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
