<?php

/**
 * Vanda PHP (https://github.com/ianchanning/vandaphp/)
 * Copyright 2011-2014, Ian Channing
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2011-2014, Ian Channing (http://ianchanning.com)
 * @link          https://github.com/ianchanning/vandaphp/ Vanda PHP
 * @package       vanda
 * @since         VandaPHP v 0.1.1
 * @modifiedby    $LastChangedBy: ianchanning $
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
date_default_timezone_set('UTC');
set_include_path(get_include_path() . PATH_SEPARATOR . 'app/');
spl_autoload_register();

require_once 'autoload.php';
require_once 'functions.php';

/**
 * This is built up as a combination of 
 * @http://php.net/manual/en/function.spl-autoload.php#92767
 * 
 */
session_start();

$v = filter_input(INPUT_GET, 'v', FILTER_UNSAFE_RAW);
$a = filter_input(INPUT_GET, 'a', FILTER_UNSAFE_RAW);
$view = (!is_null($v)) ? strtolower($v) : 'pages';
$action = (!is_null($a)) ? strtolower($a) : 'index';
$modelName = view_to_model($view);
$controller = '\\Controllers\\' . $modelName . 'Controller';

$controllerObj = new $controller($modelName);
$controllerObj->{$action}();
$controllerObj->renderView($view, $action);
