<?php

/**
 * PHP version 5
 *
 * Vanda PHP (http://sourceforge.net/p/vandaphp/)
 * Copyright 2011-2012, Ian Channing
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2011-2012, Ian Channing (http://ianchanning.com)
 * @link          http://sourceforge.net/p/vandaphp/ Vanda PHP
 * @package       vanda
 * @since         VandaPHP v 0.1.1
 * @version       $Revision: 8 $
 * @modifiedby    $LastChangedBy: icc97 $
 * @lastmodified  $Date: 2012-03-02 16:40:01 +0100 (Fri, 02 Mar 2012) $
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
require_once 'functions.php';
session_start();

$v = filter_input(INPUT_GET, 'v', FILTER_UNSAFE_RAW);
$a = filter_input(INPUT_GET, 'a', FILTER_UNSAFE_RAW);
$view = (!is_null($v)) ? strtolower($v) : 'pages';
$action = (!is_null($a)) ? strtolower($a) : 'index';
$modelName = view_to_model($view);
$model = '\\VandaPHP\\Models\\' . $modelName;
$controller = '\\VandaPHP\\Controllers\\' . $modelName . 'Controller';

require_once 'model.php';
require_once 'view.php';
require_once 'controller.php';
require_once 'controllers' . DIRECTORY_SEPARATOR . $view . '_controller.php';

$controller_obj = new $controller($modelName);
$controller_obj->{$action}();
$controller_obj->renderView($view, $action);
