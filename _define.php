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
if (!defined('DC_RC_PATH')) {
    return;
}

$this->registerModule(
    'Supin',
    'Supin based on Aorakit 1B by Kozlika',
    'Franck Paul',
    '2.0',
    [
        'requires' => [['core', '2.24']],
        'type'     => 'theme',

        'details'    => 'https://open-time.net/?q=supin',
        'support'    => 'https://github.com/franck-paul/supin',
        'repository' => 'https://raw.githubusercontent.com/franck-paul/supin/master/dcstore.xml',
    ]
);
