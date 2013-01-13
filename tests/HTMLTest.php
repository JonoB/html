<?php

use Mockery as m;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Routing\UrlGenerator;
use Meido\HTML\HTML;

class HTMLTest extends PHPUnit_Framework_TestCase {

	/**
	 * The router instance
	 *
	 * @var Illuminate\Routing\Router
	 */
	protected $router;

	/**
	 * The url generator instance
	 *
	 * @var Illuminate\Routing\UrlGenerator
	 */
	protected $url;

	/**
	 * The HTML class instance
	 *
	 * @var Meido\HTML\HTML
	 */
	protected $html;

	/**
	 * Setup test environtment
	 */
	public function setUp()
	{
		$this->router = new Router;
		$this->url = new UrlGenerator($this->router->getRoutes(), Request::create('/', 'GET'));
		$this->html = new HTML($this->url);
	}

	/**
	 * Destroy test environtment
	 */
	public function tearDown()
	{
		m::close();
	}

	/**
	 * Test generating a link to JavaScript files
	 */
	public function testGeneratingScript()
	{
		$html1 = $this->html->script('foo.js');
		$html2 = $this->html->script('http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js');
		$html3 = $this->html->script('foo.js', array('type' => 'text/javascript'));

		$this->assertEquals('<script src="http://localhost/foo.js"></script>'."\n", $html1);
		$this->assertEquals('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>'."\n", $html2);
		$this->assertEquals('<script src="http://localhost/foo.js" type="text/javascript"></script>'."\n", $html3);
	}

	/**
	 * Test generating a link to CSS files
	 */
	public function testGeneratingStyle()
	{
		$html1 = $this->html->style('foo.css');
		$html2 = $this->html->style('http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/js/bootstrap.min.js');
		$html3 = $this->html->style('foo.css', array('media' => 'print'));

		$this->assertEquals('<link href="http://localhost/foo.css" media="all" type="text/css" rel="stylesheet">'."\n", $html1);
		$this->assertEquals('<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/js/bootstrap.min.js" media="all" type="text/css" rel="stylesheet">'."\n", $html2);
		$this->assertEquals('<link href="http://localhost/foo.css" media="print" type="text/css" rel="stylesheet">'."\n", $html3);
	}

	/**
	 * Test generating proper span
	 */
	public function testGeneratingSpan()
	{
		$html1 = $this->html->span('foo');

		$this->assertEquals('<span>foo</span>', $html1);
	}

	/**
	 * Test generating proper link
	 *
	 * @group laravel
	 */
	public function testGeneratingLink()
	{
		$html1 = $this->html->to('foo');
		$html2 = $this->html->to('foo', 'Foobar');
		$html3 = $this->html->to('foo', 'Foobar', array('class' => 'btn'));
		$html4 = $this->html->to('http://google.com', 'Google');

		$this->assertEquals('<a href="http://localhost/foo">http://localhost/foo</a>', $html1);
		$this->assertEquals('<a href="http://localhost/foo">Foobar</a>', $html2);
		$this->assertEquals('<a href="http://localhost/foo" class="btn">Foobar</a>', $html3);
		$this->assertEquals('<a href="http://google.com">Google</a>', $html4);
	}

	/**
	 * Test generating proper link to secure
	 *
	 * @group laravel
	 */
	public function testGeneratingLinkToSecure()
	{
		$html1 = $this->html->secure('foo');
		$html2 = $this->html->secure('foo', 'Foobar');
		$html3 = $this->html->secure('foo', 'Foobar', array(), array('class' => 'btn'));
		$html4 = $this->html->secure('http://google.com', 'Google');

		$this->assertEquals('<a href="https://localhost/foo">https://localhost/foo</a>', $html1);
		$this->assertEquals('<a href="https://localhost/foo">Foobar</a>', $html2);
		$this->assertEquals('<a href="https://localhost/foo" class="btn">Foobar</a>', $html3);
		$this->assertEquals('<a href="http://google.com">Google</a>', $html4);
	}

	/**
	 * Test generating proper link to asset
	 *
	 * @group laravel
	 */
	public function testGeneratingAssetLink()
	{
		$html1 = $this->html->asset('foo.css');
		$html2 = $this->html->asset('foo.css', 'Foobar');
		$html3 = $this->html->asset('foo.css', 'Foobar', array('class' => 'btn'));
		$html4 = $this->html->asset('http://google.com/images.jpg', 'Google');

		$this->assertEquals('<a href="http://localhost/foo.css">http://localhost/foo.css</a>', $html1);
		$this->assertEquals('<a href="http://localhost/foo.css">Foobar</a>', $html2);
		$this->assertEquals('<a href="http://localhost/foo.css" class="btn">Foobar</a>', $html3);
		$this->assertEquals('<a href="http://google.com/images.jpg">Google</a>', $html4);
	}

	/**
	 * Test generating proper link to secure asset
	 *
	 * @group laravel
	 */
	public function testGeneratingAssetLinkToSecure()
	{
		$html1 = $this->html->secureAsset('foo.css');
		$html2 = $this->html->secureAsset('foo.css', 'Foobar');
		$html3 = $this->html->secureAsset('foo.css', 'Foobar', array('class' => 'btn'));
		$html4 = $this->html->secureAsset('http://google.com/images.jpg', 'Google');

		$this->assertEquals('<a href="https://localhost/foo.css">https://localhost/foo.css</a>', $html1);
		$this->assertEquals('<a href="https://localhost/foo.css">Foobar</a>', $html2);
		$this->assertEquals('<a href="https://localhost/foo.css" class="btn">Foobar</a>', $html3);
		$this->assertEquals('<a href="http://google.com/images.jpg">Google</a>', $html4);
	}

	/**
	 * Test generating proper link to route
	 *
	 * @group laravel
	 */
	public function testGeneratingLinkToRoute()
	{
		$this->router->get('dashboard', array('as' => 'foo'));

		$html1 = $this->html->route('foo');
		$html2 = $this->html->route('foo', 'Foobar');
		$html3 = $this->html->route('foo', 'Foobar', array(), array('class' => 'btn'));

		$this->assertEquals('<a href="http://localhost/dashboard">http://localhost/dashboard</a>', $html1);
		$this->assertEquals('<a href="http://localhost/dashboard">Foobar</a>', $html2);
		$this->assertEquals('<a href="http://localhost/dashboard" class="btn">Foobar</a>', $html3);
	}

	/**
	 * Test generating proper link to action
	 *
	 * @group laravel
	 */
	public function testGeneratingLinkToAction()
	{
		$this->router->get('foo/bar', 'foo@bar');

		$html1 = $this->html->action('foo@bar');
		$html2 = $this->html->action('foo@bar', 'Foobar');
		$html3 = $this->html->action('foo@bar', 'Foobar', array(), array('class' => 'btn'));

		$this->assertEquals('<a href="http://localhost/foo/bar">http://localhost/foo/bar</a>', $html1);
		$this->assertEquals('<a href="http://localhost/foo/bar">Foobar</a>', $html2);
		$this->assertEquals('<a href="http://localhost/foo/bar" class="btn">Foobar</a>', $html3);
	}

	/**
	 * Test generating proper listing
	 *
	 * @group laravel
	 */
	public function testGeneratingListing()
	{
		$list = array(
			'foo',
			'foobar' => array(
				'hello',
				'hello world',
			),
		);

		$html1 = $this->html->ul($list);
		$html2 = $this->html->ul($list, array('class' => 'nav'));
		$html3 = $this->html->ol($list);
		$html4 = $this->html->ol($list, array('class' => 'nav'));

		$this->assertEquals('<ul><li>foo</li><li>foobar<ul><li>hello</li><li>hello world</li></ul></li></ul>', $html1);
		$this->assertEquals('<ul class="nav"><li>foo</li><li>foobar<ul><li>hello</li><li>hello world</li></ul></li></ul>', $html2);
		$this->assertEquals('<ol><li>foo</li><li>foobar<ol><li>hello</li><li>hello world</li></ol></li></ol>', $html3);
		$this->assertEquals('<ol class="nav"><li>foo</li><li>foobar<ol><li>hello</li><li>hello world</li></ol></li></ol>', $html4);
	}

	/**
	 * Test generating proper listing
	 *
	 * @group laravel
	 */
	public function testGeneratingDefinition()
	{
		$definition = array(
			'foo' => 'foobar',
			'hello' => 'hello world',
		);

		$html1 = $this->html->dl($definition);
		$html2 = $this->html->dl($definition, array('class' => 'nav'));

		$this->assertEquals('<dl><dt>foo</dt><dd>foobar</dd><dt>hello</dt><dd>hello world</dd></dl>', $html1);
		$this->assertEquals('<dl class="nav"><dt>foo</dt><dd>foobar</dd><dt>hello</dt><dd>hello world</dd></dl>', $html2);
	}

	/**
	 * Test generating proper image link
	 *
	 * @group laravel
	 */
	public function testGeneratingAssetLinkImage()
	{
		$html1 = $this->html->image('foo.jpg');
		$html2 = $this->html->image('foo.jpg', 'Foobar');
		$html3 = $this->html->image('foo.jpg', 'Foobar', array('class' => 'btn'));
		$html4 = $this->html->image('http://google.com/images.jpg', 'Google');

		$this->assertEquals('<img src="http://localhost/foo.jpg" alt="foo.jpg">', $html1);
		$this->assertEquals('<img src="http://localhost/foo.jpg" alt="Foobar">', $html2);
		$this->assertEquals('<img src="http://localhost/foo.jpg" class="btn" alt="Foobar">', $html3);
		$this->assertEquals('<img src="http://google.com/images.jpg" alt="Google">', $html4);
	}

	/**
	 * Test registration of macros and function that is registered
	 *
	 * @group laravel
	 */
	public function testRegisteringCustomMacros()
	{
		$this->html->macro('unfooer', function($string) {
			return str_replace('foo', 'bar', $string);
		});

		$this->assertEquals('barbar', $this->html->unfooer('foofoo'));
	}

}