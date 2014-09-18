<!DOCTYPE html>
<html>
<head>
	<title>Test page for CSEWiki Design Template</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"> 
		<link rel="stylesheet" href="css/modifications.css" type="text/css"> 
	<meta charset="utf-8" />
</head>
<body>
<header>
	<nav class="navbar navbar-inverse" role="navigation">
		<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarcontent">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"><?php echo $conf['title']; ?></a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="navbarcontent">
			<div class="navbar-form form-group" role="search">
				<?php _tpl_output_search_bar(); ?>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<?php _tpl_output_page_tools($showTools, 'li'); ?>
				</li>
				<li class="dropdown">
					<?php _tpl_userinfo(); ?>
				</li>
			</ul>
		</div>
		<!-- /navbarcontent -->
		</div>
		<!-- /navbar -->
	</nav>
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
						<ul id="toc_top">
							<li><a href="#s1">1. First Section</a></li>
							<li><a href="#s2">2. Second Section</a></li>
							<ul>
								<li><a href="#s21">2.1 subsection</a></li>
								<li><a href="#s22">2.2 subsection</a></li>
							</ul>
							<li><a href="#s3">3. Third Section</a></li>
							<ul>
								<li><a href="#">3.1 subs</a></li>
								<ul>
									<li><a href="#">3.1.1 subsection</a></li>
									<li><a href="#">3.1.2 subsection</a></li>
									<li><a href="#">3.1.3 subsection</a></li>
									<li><a href="#">3.1.4 subsection</a></li>
								</ul>
							</ul>
						</ul>
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
			<h1 id="welcome">Welcome to the CSE Wiki</h1>	
			<hr/>
			<h2 id="section_1"><a name="s1"></a>Section 1</h2>
				Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
				tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
				vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
				no sea takimata sanctus est Lorem ipsum dolor sit amet.
			<h2 id="seciton_2"><a name="s2"></a>Seciton 2</h2>
				<h3 id="subsection"><a name="s21"></a>subsection</h3>
					<img src="imghere.png" id="tstimg">
					Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
					tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
					vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
					no sea takimata sanctus est Lorem ipsum dolor sit amet.
					Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
					tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
					vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
					no sea takimata sanctus est Lorem ipsum dolor sit amet.
				<h3 id="subsection"><a name="s22"></a>subsection</h3>
					Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
					tempor invidunt ut labore et dolore magna aliquyam era.			
			<h2 id="section_3"><a name="s3"></a>Section 3</h2>
					Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
					tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
					vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
					no sea takimata sanctus est Lorem ipsum dolor sit amet.
					Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
					tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
					vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
					no sea takimata sanctus est Lorem ipsum dolor sit amet.
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
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.0.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/modifications.js"></script>
</body>
</html>
