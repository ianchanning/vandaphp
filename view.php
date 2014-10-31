<?php

namespace VandaPHP;

/**
 * Central class to generate the view output
 */
class View
{

    /**
     * Create the output by combining content with the layout
     * 
     * @param string $contentForLayout content to be echoed in the $layout
     * @param string $layout Layout template
     */
    public function render($contentForLayout, $layout)
    {
        require_once 'views' . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . $layout . '.php';
    }
}
