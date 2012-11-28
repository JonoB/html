# Meido HTML

[![Build Status](https://secure.travis-ci.org/meido/html.png?branch=master)](https://travis-ci.org/meido/html)

A port of Laravel 3's HTML class. Made to work with Laravel 4.

## Usage

### Composer Side

add `"meido/html": ">=1.0.0"` to the `require` section of your `composer.json` so that it should look something the code below (you can, of course, include your own dependencies)

```composer
...
...
...
"require": {
	...
	...
	...
	"meido/html": ">=1.0.0"
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

## Thing to note

- Custom HTML macro are not supported yet at this time.