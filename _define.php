<?php

/**
 * @brief supin, a theme for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Themes
 *
 * @copyright Franck Paul (contact@open-time.net)
 * @copyright GPL-2.0
 */
declare(strict_types=1);

if (isset($this) && is_object($this) && method_exists($this, 'registerModule') && isset($this->id) && is_string($this->id)) {
    $this->registerModule(
        'Supin',
        'Supin based on Aorakit 1B by Kozlika',
        'Franck Paul',
        '7.1',
        [
            'date'     => '2026-04-05T11:53:08+0200',
            'requires' => [['core', '2.36']],
            'type'     => 'theme',
            'overload' => true,

            'details'    => 'https://open-time.net/?q=supin',
            'support'    => 'https://github.com/franck-paul/supin',
            'repository' => 'https://raw.githubusercontent.com/franck-paul/supin/main/dcstore.xml',
            'license'    => 'gpl2',
        ]
    );
}
