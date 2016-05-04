<?php

/**
 * Use an autoloader
 */

function __autoload($class){
    require "libs/$class.php";
}

require 'config.php';

$app = new Bootstrap();