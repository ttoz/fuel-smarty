<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.0
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2012 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * NOTICE:
 *
 * If you need to make modifications to the default configuration, copy
 * this file to your app/config folder, and make them in there.
 *
 * This will allow you to upgrade fuel without losing your custom config.
 */

return array(

	// ------------------------------------------------------------------------
	// Register extensions to their parsers, either classname or array config
	// ------------------------------------------------------------------------
	'extensions' => array(
		'php'       => 'View',
		'smarty'    => 'View_Smarty',
	),


	// ------------------------------------------------------------------------
	// Individual class config by classname
	// ------------------------------------------------------------------------


	// SMARTY ( http://www.smarty.net/documentation )
	// ------------------------------------------------------------------------
	'View_Smarty'   => array(
		'include'       => APPPATH.'vendor'.DS.'Smarty-3.1.11'.DS.'libs'.DS.'Smarty.class.php',
		'auto_encode' => false,
		'delimiters'    => array('left' => '{', 'right' => '}'),
		'environment'   => array(
			'compile_dir'       => APPPATH.'tmp'.DS.'Smarty'.DS.'templates_c'.DS,
			'config_dir'        => APPPATH.'tmp'.DS.'Smarty'.DS.'configs'.DS,
			'cache_dir'         => APPPATH.'cache'.DS.'Smarty'.DS,
			'caching'           => false,
			'cache_lifetime'    => 0,
			'force_compile'     => false,
			'compile_check'     => true,
			'debugging'         => false,
			'autoload_filters'  => array(),
			'default_modifiers' => array(),
		),
	),

);

// end of file parser.php
