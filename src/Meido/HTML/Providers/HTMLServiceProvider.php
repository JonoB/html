<?php namespace Meido\HTML\Providers;

use Illuminate\Support\ServiceProvider;
use Meido\HTML\HTML;

class HTMLServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['html'] = $this->app->share(function($app)
		{
			return new HTML($app);
		});
	}

}