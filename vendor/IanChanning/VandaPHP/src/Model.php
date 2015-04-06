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

namespace IanChanning\VandaPHP;

class Model
{
    /**
     * @var string Model name  
     */
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Get the model data
     */
    public function get()
    {
        
    }
}
