<?php 
function csewiki_media()
{
    global $NS, $IMG, $JUMPTO, $REV, $lang, $fullscreen, $INPUT;
    $fullscreen = true;
    require_once DOKU_INC.'lib/exe/mediamanager.php';

    $rev   = '';
    $image = cleanID($INPUT->str('image'));
    if(isset($IMG)) $image = $IMG;
    if(isset($JUMPTO)) $image = $JUMPTO;
    if(isset($REV) && !$JUMPTO) $rev = $REV;

    echo '<div id="mediamanager__page" class="row">'.NL;
    echo '<div id="namespaces" class="col-xs-3">'.NL;
    echo '<h2>'.$lang['namespaces'].'</h2>'.NL;
    echo '<div class="panelHeader">';
    echo $lang['media_namespaces'];
    echo '</div>'.NL;
    echo '<div class="panelContent" id="media__tree">'.NL;
    media_nstree($NS);
    echo '</div>'.NL;
    echo '</div>'.NL;

    echo '<div id="filelist" class="col-xs-5" >'.NL;
    tpl_mediaFileList();
    echo '</div>'.NL;

    echo '<div id="file" class="col-xs-4" >'.NL;
    tpl_mediaFileDetails($image, $rev);
    echo '</div>'.NL;

    echo '</div>'.NL;
}
?>
<!-- Modal -->
<div class="modal fade" id="_mediamodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h1 class="modal-title" id="myModalLabel">Media Manager</h1>
			</div>
			<div id="mediaModal" class="modal-body">
				<?php csewiki_media(); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- show/setup mediaModal -->
<script type="text/javascript">
	//show the modal
	$("#_mediamodal").modal('show');

	//make filelist use navs 
	$("#mediamanager__page #file ul.tabs").addClass("nav nav-tabs");
	$("#mediamanager__page #file ul.tabs li strong").parent().addClass("active");
	$("#mediamanager__page #file ul.tabs li.active").wrapInner("<a href='#'></a>");

	//make #file use navs
	$("#mediamanager__page #filelist ul.tabs").addClass("nav nav-tabs");
	$("#mediamanager__page #filelist ul.tabs li strong").parent().addClass("active");
	$("#mediamanager__page #filelist ul.tabs li.active").wrapInner("<a href='#'></a>");

	//alternate bg colors for filelist
	$("#mediamanager__page #filelist div.panelContent ul.thumbs li:nth-child(odd)").addClass("bgodd");

	//fit the caption area for the image editor
	$("#mediamanager__page #file #meta__40").attr("cols","30");
	$("#mediamanager__page #file #meta__40").resizable();

	//add clearer class so floats don't look weird
	$("#mediamanager__page").append("<div class='clearer'></div>");
</script>
