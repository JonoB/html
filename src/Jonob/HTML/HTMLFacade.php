<?php namespace Jonob\HTML;

use Illuminate\Support\Facades\Facade;

class HTMLFacade extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'html'; }

}