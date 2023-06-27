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

namespace Dotclear\Theme\Supin;

use dcCore;

dcCore::app()->addBehavior('templateBeforeBlockV2', [__NAMESPACE__ . '\behaviorSupinTheme', 'templateBeforeBlock']);

class behaviorSupinTheme
{
    public static function templateBeforeBlock($b, $attr)
    {
        if ($b == 'Entries' && isset($attr['exclude_current']) && $attr['exclude_current'] == 1) {
            return
                "<?php\n" .
                '$params["sql"] .= "AND P.post_url != \'".dcCore::app()->ctx->posts->post_url."\' ";' . "\n" .
                "?>\n";
        }
    }
}
