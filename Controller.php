<?php

/**
 * PHP version 5
 *
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
 * @version       $Revision: 8 $
 * @modifiedby    $LastChangedBy: icc97 $
 * @lastmodified  $Date: 2012-03-02 16:40:01 +0100 (Fri, 02 Mar 2012) $
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace VandaPHP;

class Controller
{
    public $modelName = '';
    public $viewVars = array();
    public $layout = '';

    /**
     * An array containing the class names of the models this controller uses.
     *
     * @var array Array of model objects.
     * @access public
     */
    public $modelNames = array();

    /**
     * The controller view class
     * @var object
     * @access public
     */
    public $view = null;

    public function __construct($modelName = null)
    {
        $this->modelName = $modelName;
        $this->loadModel($modelName);
        $this->layout = 'default';
        $this->view = new View();
    }

    /**
     * add variables to the array that is accessed by the view 
     *
     * @param $vars array var_name => var
     * @access public
     */
    public function set($vars)
    {
        $this->viewVars = array_merge($this->viewVars, $vars);
    }

    /**
     * Loads and instantiates models required by this controller.
     *
     * @param string $modelName Name of model class to load
     * @return mixed true when single model found and instance created error returned if models not found.
     * @access public
     */
    public function loadModel($modelName = null)
    {
        require_once 'Models' . DIRECTORY_SEPARATOR . model_to_view($modelName) . '.php';

        $this->modelNames[] = $modelName;
        $namespaceModelName = '\\VandaPHP\\Models\\' . $modelName;
        $this->{$modelName} = new $namespaceModelName($modelName);
    }

    /**
     * extract the view variables and apply them to the view
     * 
     * @access public
     */
    public function renderView($view, $action)
    {
        extract($this->viewVars);

        ob_start();
        require_once 'Views' . DIRECTORY_SEPARATOR . $view . DIRECTORY_SEPARATOR . $action . '.php';
        $contentForLayout = ob_get_clean();
        $this->view->title = ucfirst($view) . ' : ' . ucfirst($action);
        $this->view->render($contentForLayout, $this->layout);
    }
}
