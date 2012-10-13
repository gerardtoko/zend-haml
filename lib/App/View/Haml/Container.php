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

class App_View_Haml_Container {

    public $container = array();
    private static $_instance;
    public $view;

    
    private function __construct() {
	
    }


    /**
     * Accesses a helper object from within a script.
     *
     * If the helper class has a 'view' property, sets it with the current view
     * object.
     *
     * @param string $name The helper name.
     * @param array $args The parameters for the helper.
     * @return string The result of the helper output.
     */
    public function __call($name, $args) {

	// is the helper already loaded?
	$helper = self::getInstance()->view->getHelper($name);
	// call the helper method
	return call_user_func_array(
			array($helper, $name), $args
	);
    }
    
    /**
     * 
     * @return App_View_Haml_Container
     */
    public function getInstance(){
	if(is_null(self::$_instance)) {
	    self::$_instance = new App_View_Haml_Container();  
	}
	
	return self::$_instance;
    }
    
    
    /**
     * Accesses a helper object from within a script.
     *
     * If the helper class has a 'view' property, sets it with the current view
     * object.
     *
     * @param string $name The helper name.
     * @param array $args The parameters for the helper.
     * @return string The result of the helper output.
     */
    public function __set($name, $value) {
	$instance = self::getInstance();
	$instance->container[$name] = $value;
	return $instance;
    }

    
       /**
     * Accesses a helper object from within a script.
     *
     * If the helper class has a 'view' property, sets it with the current view
     * object.
     *
     * @param string $name The helper name.
     * @param array $args The parameters for the helper.
     * @return string The result of the helper output.
     */
    public function __get($name) {
	$instance = self::getInstance();
	if(!empty($instance->container[$name])){
	    return $instance->container[$name];
	}
    }
}