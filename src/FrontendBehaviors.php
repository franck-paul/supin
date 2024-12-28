<?php

/**
 * @brief supin, a plugin for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Plugins
 *
 * @author Franck Paul and contributors
 *
 * @copyright Franck Paul carnet.franck.paul@gmail.com
 * @copyright GPL-2.0 https://www.gnu.org/licenses/gpl-2.0.html
 */
declare(strict_types=1);

namespace Dotclear\Theme\supin;

class FrontendBehaviors
{
    public static function templateBeforeBlock(string $b, array $attr): string
    {
        if ($b === 'Entries' && isset($attr['exclude_current']) && $attr['exclude_current'] == 1) {
            return
                "<?php\n" .
                '$params["sql"] .= "AND P.post_url != \'".App::frontend()->context()->posts->post_url."\' ";' . "\n" .
                "?>\n";
        }

        return '';
    }
}
