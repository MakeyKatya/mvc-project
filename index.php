<?php

/**
 * Use an autoloader
 */

function __autoload($class){
    require "libs/$class.php";
}

require 'config.php';

$bootstrap = new Bootstrap();

/** Optional Path Settings
* $bootstrap->setControllerPath();
* $bootstrap->setModelPath();
* $bootstrap->setDefaultFile();
* $bootstrap->setErrorFile();
 */

$bootstrap->init();