<?php 
function printTree($data)
{
	if(count($data) == 0)
		return '';

	$curlevel = 0;
	$out = '<ul id="ns_top">';

	foreach($data as $tocitem)
	{
		//make the id and the label the same

		if ($tocitem['level'] > $curlevel)
			$out .= '<ul>';
		elseif($tocitem['level'] < $curlevel)
		{
			//reset the heading 
			$out .= '</ul>';
		}
		$curlevel = $tocitem['level'];
		
		//TODO: build link in var $href
		$href="doku.php?id=start&do=media&ns=".$tocitem['id'];

		$out .= "<li>";

		/** printout the text of the heading */
		if($tocitem['id'] == "")
			$tocitem['id'] = $tocitem['label'];

		$out .= "<a href='".$href."'>".$tocitem['id']."</a>";
		$out .= "</li>";
	}
	for($i = 1; $i < $curlevel; $i++)
	{
		$out .= '</ul>';
	}
	$out .= '</ul>';

	echo $out;
}

function csewiki_nstree($ns)
{
	global $conf;
	global $lang;

	// currently selected namespace
	$ns	= cleanID($ns);
	if(empty($ns)){
			global $ID;
			$ns = (string)getNS($ID);
	}

	$ns_dir	= utf8_encodeFN(str_replace(':','/',$ns));

	$data = array();
	search($data,$conf['mediadir'],'search_index',array('ns' => $ns_dir, 'nofiles' => true));

	// wrap a list with the root level around the other namespaces
	array_unshift($data, array('level' => 0, 'id' => '', 'open' =>'true',
														 'label' => $lang['mediaroot']));

	// insert the current ns into the hierarchy if it isn't already part of it
	$ns_parts = explode(':', $ns);
	$tmp_ns = '';
	$pos = 0;
	foreach ($ns_parts as $level => $part) 
	{
			if ($tmp_ns) $tmp_ns .= ':'.$part;
			else $tmp_ns = $part;

			// find the namespace parts or insert them
			while ($data[$pos]['id'] != $tmp_ns) 
			{
				if ($pos >= count($data) || ($data[$pos]['level'] <= $level+1 && strnatcmp(utf8_encodeFN($data[$pos]['id']), utf8_encodeFN($tmp_ns)) > 0)) 
				{
					array_splice($data, $pos, 0, array(array('level' => $level+1, 'id' => $tmp_ns, 'open' => 'true')));
					break;
				}
			 ++$pos;
			}
	}

	printTree($data);
}

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
    echo '<div class="panelContent" id="">'.NL;
    csewiki_nstree($NS);
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

	//remove link classes
	//$("#mediamanager__page #namespaces div.li a.idx_dir").removeClass("idx_dir selected");

	//add clearer class so floats don't look weird
	$("#mediamanager__page").append("<div class='clearer'></div>");

	//fit the caption area for the image editor
	$("#mediamanager__page #file #meta__40").attr("cols","30");
	$("#mediamanager__page #file #meta__40").resizable();
</script>
