# Meido HTML

A port of Laravel 3's HTML class. Made to work with Laravel 4.

## Usage

### Composer Side

add `"meido/html": ">=1.0.0"` to the `require` section of your composer.json so that it should look something the code below (you can, of course, include your own dependencies)

```composer
// composer.json
"require": {
	...
	...
	...
	"meido/html": ">=1.0.0"
},
```

### Laravel Side

add the following code to the `providers` section of the `app/config/app.php` file

```php
'Meido\HTML\HTMLServiceProvider',
```

so that it'll look something like the following

```php
// app/config/app.php
'providers' => array(

	...
	...
	...
	'Illuminate\Translation\TranslationServiceProvider',
	'Illuminate\Validation\ValidationServiceProvider',
	'Illuminate\Foundation\Providers\AliasServiceProvider',
	'Meido\HTML\HTMLServiceProvider',

),
```

after that, run `composer install` and start hacking on that beast.