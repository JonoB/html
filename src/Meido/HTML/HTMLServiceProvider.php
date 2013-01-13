<?php namespace Meido\HTML;

use Illuminate\Support\ServiceProvider;
use Meido\HTML\HTML;

class HTMLServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['html'] = $this->app->share(function($app)
		{
			return new HTML($app['url']);
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('html');
	}

}