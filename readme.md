# Meido HTML

This library was written by Meido, but is now maintained by JonoB

A port of Laravel 3's HTML class. Made to work with Laravel 4.

- [Usage](https://github.com/JonoB/html#usage)
- [Changelog](https://github.com/JonoB/html#changelog)

## Usage

### Composer Side

add `"jonob/html": "1.1.*"` to the `require` section of your `composer.json` so that it should look something the code below (you can, of course, include your own dependencies)

```composer
...
...
...
"require": {
	...
	...
	...
	"jonob/html": "1.1.*"
},
...
...
...
```

### Laravel Side

add the following code to the `providers` section of the `app/config/app.php` file

```php
'Jonob\HTML\HTMLServiceProvider',
```

so that it'll look something like the following

```php
'providers' => array(

	...
	...
	...
	'Jonob\HTML\HTMLServiceProvider',

),
```

and add the following code to the `aliases` section of the `app/config/app.php` file

```php
'HTML' => 'Jonob\HTML\HTMLFacade',
```

so that it'll look something like the following

```php
'aliases' => array(

	...
	...
	...
	'HTML'       => 'Jonob\HTML\HTMLFacade',

),
```

after that, run `composer install` and start hacking on that beast.

## Changelog

### 1.1.*
- Reverted e() shortcut helper as it's already in the `Illuminate/Support` (1.1.2)
- Added e() shortcut method helper to HTML::entities() (1.1.1)
- below are the changes made in 1.1.0
	- `Facade` and `ServiceProvider` are moved a folder up following Laravel 4's convention of developing packages.
	- dependencies version are changed to `4.0.x`
	- macro are now available thanks to [Maxime Fabre](https://github.com/Anahkiasen)

### 1.0.*
- tagged for stable. (1.0.0)
- updated `composer.json` to stable channel. (1.0.1)
- updated `composer.json`'s `require` section to stable version. (1.0.2)
- some API changes are made to follow simple function naming convention in laravel. (1.0.3)
	- `HTML::link` are now `HTML::to`
	- `HTML::linkSecure` are now `HTML::secure`
	- `HTML::linkRoute` are now `HTML::route`
	- `HTML::linkAction` are now `HTML::action`
	- `HTML::asset` and `HTML::secureAsset` are added back
- added changelog section. (1.0.4)
- updated Facade namespace. (1.0.5)
- some tweaks are made. (1.0.6)
	- since `HTML` only requires `UrlGenerator`, parameters passed are updated.
	- hence, `HTML` would not be depending on `illuminate/foundation` in which none of it is actually used and will be using `illuminate/routing` instead where `UrlGenerator` resides.
- version bump. (1.0.7)
