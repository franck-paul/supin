<?php
# -- BEGIN LICENSE BLOCK ----------------------------------
# This file is part of Supin, a theme for Dotclear 2.
#
# Copyright (c) Franck Paul and contributors
# carnet.franck.paul@gmail.com
#
# Licensed under the GPL version 2.0 license.
# A copy of this license is available in LICENSE file or at
# http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
# -- END LICENSE BLOCK ------------------------------------

if (!defined('DC_RC_PATH')) { return; }

$core->addBehavior('publicPrepend',array('behaviorSupinTheme','publicPrepend'));
$core->addBehavior('templateBeforeBlock',array('behaviorSupinTheme','templateBeforeBlock'));

$core->tpl->addValue('Else',array('templateSupinTheme','templateElse'));

class behaviorSupinTheme
{
	public static function publicPrepend($core)
	{
		$core->themes->loadModuleL10N($GLOBALS['__theme'],$GLOBALS['_lang'],'main');
	}

	public static function templateBeforeBlock($core,$b,$attr)
	{
	       if ($b == 'Entries' && isset($attr['exclude_current']) && $attr['exclude_current'] == 1)
	       {
		       return
		       "<?php\n".
		       '$params["sql"] .= "AND P.post_url != \'".$_ctx->posts->post_url."\' ";'."\n".
		       "?>\n";
	       }
	}
}

class templateSupinTheme
{
	static public function templateElse($attr)
	{
		return '<?php else: ?>';
	}
}

class contextNav
{
	public static function getNextPosts($post_id,$ts,$dir,$nb,$nav,$navParam)
	{
		global $_ctx;

		if ($dir > 0) {
			$sign = '>';
			$order = 'ASC';
		}
		else {
			$sign = '<';
			$order = 'DESC';
		}

		$dt = date('YmdHis', (integer) $ts);

		// Récupération catégorie du billet courant (ctx)
		$params['cat_url'] = $_ctx->posts->cat_url;

		$params['limit'] = $nb;
		$params['order'] = 'post_dt ' . $order;
		$params['sql'] = 'AND ' .
			$GLOBALS['core']->blog->con->concat($GLOBALS['core']->blog->con->dateFormat('post_dt', '%Y%m%d%H%M%S'), "'.'", 'P.post_id') .
			" $sign '$dt.$post_id'";

		$rs = $GLOBALS['core']->blog->getPosts($params);

		if ($rs->isEmpty()) {
			$rs = null;
		}

		return $rs;
	}
}
