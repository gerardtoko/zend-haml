<?php

// configuration Zend Haml Extension
//instance
$view = new App_View_Haml();

// Add in the ViewRenderer
$view_renderer = Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer');
$view_renderer->setView($view);