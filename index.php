<?php

/**
 * PHP version 5
 *
 * Vanda PHP (https://github.com/ianchanning/vandaphp/)
 * Copyright 2011-2012, Ian Channing
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2011-2012, Ian Channing (http://ianchanning.com)
 * @link          https://github.com/ianchanning/vandaphp/ Vanda PHP
 * @package       vanda
 * @since         VandaPHP v 0.1.1
 * @version       $Revision: 8 $
 * @modifiedby    $LastChangedBy: icc97 $
 * @lastmodified  $Date: 2012-03-02 16:40:01 +0100 (Fri, 02 Mar 2012) $
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
require_once 'functions.php';
date_default_timezone_set('UTC');
session_start();

$v = filter_input(INPUT_GET, 'v', FILTER_UNSAFE_RAW);
$a = filter_input(INPUT_GET, 'a', FILTER_UNSAFE_RAW);
$view = (!is_null($v)) ? strtolower($v) : 'pages';
$action = (!is_null($a)) ? strtolower($a) : 'index';
$modelName = view_to_model($view);
$model = '\\VandaPHP\\Models\\' . $modelName;
$controller = '\\VandaPHP\\Controllers\\' . $modelName . 'Controller';

require_once 'Model.php';
require_once 'View.php';
require_once 'Controller.php';
require_once 'Controllers' . DIRECTORY_SEPARATOR . ucfirst($view) . 'Controller.php';

$controller_obj = new $controller($modelName);
$controller_obj->{$action}();
$controller_obj->renderView($view, $action);
