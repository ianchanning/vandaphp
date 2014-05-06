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
 * @since         Vanda v 0.1.1
 * @version       $Revision: 8 $
 * @modifiedby    $LastChangedBy: icc97 $
 * @lastmodified  $Date: 2012-03-02 16:40:01 +0100 (Fri, 02 Mar 2012) $
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
require_once('functions.php');
session_start();

$view 		= (isset($_GET['v'])) ? strtolower($_GET['v']) : 'pages';
$action 	= (isset($_GET['a'])) ? strtolower($_GET['a']) : 'index';
$model 		= view_to_model($view);
$controller	= $model.'Controller';

require_once('controller.php');
require_once('controllers'.DIRECTORY_SEPARATOR.$view.'_controller.php');

$controller_obj = new $controller($model);
$controller_obj->{$action}();
extract($controller_obj->viewVars);
	
ob_start();
require_once('views'.DIRECTORY_SEPARATOR.$view.DIRECTORY_SEPARATOR.$action.'.php');		
$content_for_layout = ob_get_clean();
require_once('views'.DIRECTORY_SEPARATOR.'layouts'.DIRECTORY_SEPARATOR.'default.php');
?>