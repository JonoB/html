# Meido HTML [![Build Status](https://secure.travis-ci.org/meido/html.png?branch=master)](https://travis-ci.org/meido/html)

A port of Laravel 3's HTML class. Made to work with Laravel 4.

[Usage](https://github.com/meido/html#usage)

[Changelog](https://github.com/meido/html#changelog)

[Things To Note](https://github.com/meido/html#things-to-note)

## Usage

### Composer Side

add `"meido/html": "1.0.*"` to the `require` section of your `composer.json` so that it should look something the code below (you can, of course, include your own dependencies)

```composer
...
...
...
"require": {
	...
	...
	...
	"meido/html": "1.0.*"
},
...
...
...
```

### Laravel Side

add the following code to the `providers` section of the `app/config/app.php` file

```php
'Meido\HTML\Providers\HTMLServiceProvider',
```

so that it'll look something like the following

```php
'providers' => array(

	...
	...
	...
	'Meido\HTML\Providers\HTMLServiceProvider',

),
```

and add the following code to the `aliases` section of the `app/config/app.php` file

```php
'HTML' => 'Meido\HTML\Facades\HTML',
```

so that it'll look something like the following

```php
'aliases' => array(

	...
	...
	...
	'HTML'       => 'Meido\HTML\Facades\HTML',
	
),
```

after that, run `composer install` and start hacking on that beast.

## Changelog

### 1.0.5
- added changelog section.
- I forgot to update readme.

### 1.0.4
- some API changes are made to follow simple function naming convention in laravel.
-- `HTML::link` are now `HTML::to`
-- `HTML::linkSecure` are now `HTML::secure`
-- `HTML::linkRoute` are now `HTML::route`
-- `HTML::linkAction` are now `HTML::action`
-- `HTML::asset` and `HTML::secureAsset` are added back

### 1.0.3
- updated `composer.json`'s `require` section to stable version. Again my bad.

### 1.0.2
- updated readme. I know this shouldn't be tagged but I'm still learning git. My bad here.

### 1.0.1
- updated `composer.json` to stable channel.

### 1.0.0
- tagged for stable.

## Things to note

- Custom HTML macro are not supported yet at this time.
