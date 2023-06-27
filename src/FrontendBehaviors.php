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

namespace Dotclear\Plugin\supin;

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
