<?php
/**
 * DokuWiki Media Manager Popup
 *
 * @author   Andreas Gohr <andi@splitbrain.org>
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */
// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();
@require_once(dirname(__FILE__).'/tpl_functions.php'); /* include hook for template functions */

?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang']?>"
	lang="<?php echo $conf['lang']?>" dir="<?php echo $lang['direction'] ?>" class="popup no-js">
<head>
  <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /><![endif]-->
	<title>SPSU <?php echo strip_tags($conf['title']) ?>:<?php tpl_pagetitle() ?></title>
	<?php echo tpl_favicon(array('favicon', 'mobile')) ?>
	<?php tpl_includeFile('meta.html') ?>
	<link href="<?php echo tpl_getMediaFile(array("css/bootstrap.min.css")); ?>" rel="stylesheet">
	<link href="<?php echo tpl_getMediaFile(array("css/modifications.css")); ?>" rel="stylesheet">
	<script src="<?php echo tpl_getMediaFile(array("js/jquery-1.11.0.min.js")); ?>"></script>

	<?php tpl_metaheaders(); ?>
</head>

<body>
	<div id="mediaPgContainer" class="container">
	<div class="row">
		<div id="sidebar" class="col-md-3 col-xs-12">
			<div class="row">
			<div id="mediatree" class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title"><a data-toggle="collapse" href="#media_collapse">Media Tree</a></h3>
			  </div>
				<div id='media_collapse' class="panel-collapse collapse in">
				  <div id="media_content" class="panel-body">
						<?php /* keep the id! additional elements are inserted via JS here */?>
            <div id="media__opts"></div>
            <?php tpl_mediaTree() ?>
				  </div>
				</div>
			</div>
			</div>
			<!-- /mediatree -->
		</div>
		<!-- /sidebar -->
		<!-- ******************** Page Content ******************** -->
		<div id="pagecontainer" class="col-md-9 col-xs-12">
		<div id="pagecontent">
			<h1><?php echo hsc($lang['mediaselect'])?></h1>
			<?php tpl_mediaContent() ?>
			<div class="clearer"></div>
		</div>
		</div>
		<!-- /Page Content -->
	</div>
	</div>

    <!--[if IE 6 ]><div id="IE6"><![endif]--><!--[if IE 7 ]><div id="IE7"><![endif]--><!--[if IE 8 ]><div id="IE8"><![endif]-->
<!--    <div id="media__manager" class="dokuwiki container">
        <?php html_msgarea() ?>
        <div id="sidebar"><div class="pad">
            <h1><?php echo hsc($lang['mediaselect'])?></h1>

            <?php /* keep the id! additional elements are inserted via JS here */?>
            <div id="media__opts"></div>

            <?php tpl_mediaTree() ?>
        </div></div>

        <div id="mediamgr__content"><div class="pad">
            <?php tpl_mediaContent() ?>
        </div></div>
    </div> -->
    <!--[if ( IE 6 | IE 7 | IE 8 ) ]></div><![endif]-->
<script src="<?php echo tpl_getMediaFile(array("js/bootstrap.min.js")); ?>"></script>
<script src="<?php echo tpl_getMediaFile(array("js/modifications.js")); ?>"></script>
</body>
</html>
