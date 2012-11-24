<?php namespace Meido\HTML;

use Illuminate\Support\ServiceProvider;

class HTMLServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 *
	 * @param  Illuminate\Foundation\Application  $app
	 * @return void
	 */
	public function register($app)
	{
		$app['html'] = $app->share(function($app)
		{
			return new HTML($app);
		});
	}

}