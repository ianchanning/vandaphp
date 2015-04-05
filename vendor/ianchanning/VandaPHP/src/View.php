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

/**
 * Central class to generate the view output
 */
class View
{
    /**
     * @var string The layout title 
     */
    public $title;
    
    /**
     * Create the output by combining content with the layout
     * 
     * @param string $contentForLayout content to be echoed in the $layout
     * @param string $layout Layout template
     */
    public function render($contentForLayout, $layout)
    {
        require_once 'Views' . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . $layout . '.php';
    }
}
