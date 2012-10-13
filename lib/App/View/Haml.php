<?php

/*
 * This file is part of the Factory package.
 *
 * (c) Gerard Toko <gerardtoko@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
require_once 'phpHaml/includes/haml/HamlParser.class.php';

class App_View_Haml extends Zend_View {

    private $_pHAML;
  
    /**
     * Constructor
     *
     * Register Zend_View_Stream stream wrapper if short tags are disabled.
     *
     * @param  array $config
     * @return void
     */
    public function __construct($config = array()) {
	$this->_pHAML = new HamlParser(null, 'var/haml');
	$view = App_View_Haml_Container::getInstance();
	$view->view = $this;
	$this->_pHAML->assign("view", (object) $view);
    }


    /**
     * Directly assigns a variable to the view script.
     *
     * Checks first to ensure that the caller is not attempting to set a
     * protected or private member (by checking for a prefixed underscore); if
     * not, the public member is set; otherwise, an exception is raised.
     *
     * @param string $key The variable name.
     * @param mixed $val The variable value.
     * @return void
     * @throws Zend_View_Exception if an attempt to set a private or protected
     * member is detected
     */
    public function __set($key, $val) {

	$container = App_View_Haml_Container::getInstance();

	if ('_' != substr($key, 0, 1)) {
	    $this->$key = $val;
	    $container->$key = $val;
	    return;
	}

	require_once 'Zend/View/Exception.php';
	$e = new Zend_View_Exception('Setting private or protected class members is not allowed');
	$e->setView($this);
	throw $e;
    }


    /**
     * Includes the view script in a scope with only public $this variables.
     *
     * @param string The view script to execute.
     */
    protected function _run() {

	if (preg_match("/(.phtml)$/", func_get_arg(0))) {
	    $template = substr(func_get_arg(0), 0, -6) . ".haml";
	} else {
	    $template = func_get_arg(0);
	}

	$content = $this->_pHAML->setFile($template);
	print $content;
    }

}