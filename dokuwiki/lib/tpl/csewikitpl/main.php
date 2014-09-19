<?php
	global $conf;
	if (!defined('DOKU_INC')) die(); /* must be run from within DokuWiki */
	@require_once(dirname(__FILE__).'/tpl_functions.php'); /* include hook for template functions */
	
	$showTools = !tpl_getConf('hideTools') || ( tpl_getConf('hideTools') && $_SERVER['REMOTE_USER'] );
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /><![endif]-->
	<title><?php tpl_pagetitle() ?>SPSU <?php echo strip_tags($conf['title']) ?></title>
	<?php echo tpl_favicon(array('favicon', 'mobile')) ?>
	<?php tpl_includeFile('meta.html') ?>
	<link href="<?php echo tpl_getMediaFile(array("css/bootstrap.min.css")); ?>" rel="stylesheet">
	<link href="<?php echo tpl_getMediaFile(array("css/modifications.css")); ?>" rel="stylesheet">
	<script src="<?php echo tpl_getMediaFile(array("js/jquery-1.11.0.min.js")); ?>"></script>

	<?php tpl_metaheaders(); ?>
</head>
<body>
<div id='dokuwiki__site'>
<!-- do not remove below tag -->
<div id="dokuwiki__top" class="dokuwiki site mode_<?php echo $ACT ?>"></div>
<header>
	<nav class="navbar navbar-inverse" role="navigation">
		<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarcontent">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php wl(); ?>"><img id="brand-img" src="<?php echo ml('logo.png');?>" alt="<?php $conf['title'];?>" /><?php echo $conf['title']; ?></a>
		</div>
		<div class="collapse navbar-collapse" id="navbarcontent">
			<?php _tpl_output_search_bar(); ?>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<?php _tpl_output_page_tools(true, 'li'); ?>
				</li>
				<?php /** a dropdown menu is created in this function, otherwise a login
				button is displayed */?>
				<?php _tpl_userinfo(); ?>
			</ul>
		</div>
		<!-- /navbarcontent -->
		</div>
	</nav>
	<!-- /navbar -->
</header>
<content>
	<div class="container">
	<div class="row">
		<div id="sidebar" class="col-md-3 col-xs-12">
			<!-- ******************** TOC ******************** -->
			<div class="row">
			<div id='toc' class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title" id="toc_title"><a data-toggle="collapse" href="#toc_collapse">Contents</a></h3>
				</div>
				<div id='toc_collapse'class="panel-collapse collapse in">
					<div class="panel-body">
						<?php _tpl_toc_to_twitter_bootstrap(); ?> 
					</div>
				</div>
			</div>
			</div>
			<!-- /TOC -->
			<div class="row">
			<div id="news" class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title"><a data-toggle="collapse" href="#news_collapse">News</a></h3>
			  </div>
				<div id='news_collapse' class="panel-collapse collapse in">
				  <div id="news_content" class="panel-body">
				    Panel content
				  </div>
				</div>
			</div>
			</div>
			<!-- /news -->
		</div>
		<!-- /sidebar -->
		<!-- ******************** Page Content ******************** -->
		<div id="pagecontainer" class="col-md-9 col-xs-12">
		<div id="pagecontent">
			<?php tpl_flush(); ?>
			<?php tpl_content(false); ?>
			<div class="clearer"></div>
		</div>
		</div>
		<!-- /Page Content -->
	</div>
	</div>
</content>		

<footer>
	<div>
		<br>
		<br>
	</div>
</footer>
</div>
<!-- /dokuwiki__site -->
<script src="<?php echo tpl_getMediaFile(array("js/bootstrap.min.js")); ?>"></script>
<script src="<?php echo tpl_getMediaFile(array("js/modifications.js")); ?>"></script>
</body>
</html>
