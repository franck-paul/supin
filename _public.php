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

namespace themes\supin;

if (!defined('DC_RC_PATH')) {
    return;
}

\dcCore::app()->addBehavior('templateBeforeBlockV2', [__NAMESPACE__ . '\behaviorSupinTheme', 'templateBeforeBlock']);

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

class contextNav
{
    public static function getNextPosts($post_id, $ts, $dir, $nb, $nav, $navParam)
    {
        $params = [];

        if ($dir > 0) {
            $sign  = '>';
            $order = 'ASC';
        } else {
            $sign  = '<';
            $order = 'DESC';
        }

        $dt = date('YmdHis', (int) $ts);

        // Récupération catégorie du billet courant (ctx)
        $params['cat_url'] = \dcCore::app()->ctx->posts->cat_url;

        $params['limit'] = $nb;
        $params['order'] = 'post_dt ' . $order;
        $params['sql']   = 'AND ' .
        \dcCore::app()->blog->con->concat(\dcCore::app()->blog->con->dateFormat('post_dt', '%Y%m%d%H%M%S'), "'.'", 'P.post_id') .
            " $sign '$dt.$post_id'";

        $rs = \dcCore::app()->blog->getPosts($params);

        if ($rs->isEmpty()) {
            $rs = null;
        }

        return $rs;
    }
}
