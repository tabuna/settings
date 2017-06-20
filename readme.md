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
	Orchid\Setting\Providers\SettingsServiceProvider::class
	```

    class aliases :

	```php
	'Setting' => Orchid\Setting\Facades\SettingFacades::class
	```

1. create settings table

	```php
	php artisan vendor:publish
	php artisan migrate
	```

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
## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
