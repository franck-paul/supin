<?php
/**
 * @brief supin, a theme for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Themes
 *
 * @copyright Franck Paul (carnet.franck.paul@gmail.com)
 * @copyright GPL-2.0
 */

if (!defined('DC_RC_PATH')) {return;}

$this->registerModule(
    "Supin",                                // Name
    "Supin based on Aorakit 1B by Kozlika", // Description
    "Franck Paul",                          // Author
    '1.3',                                  // Version
    [
        'requires' => [['core', '2.13']], // Dependencies
        'type'     => 'theme'            // Type
    ]
);
