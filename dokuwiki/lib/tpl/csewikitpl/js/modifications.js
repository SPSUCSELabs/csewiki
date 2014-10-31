$.fn.waitUntilExists = function (handler, shouldRunHandlerOnce, isChild) 
{
	var found       = 'found';
	var $this       = $(this.selector);
	var $elements   = $this.not(function () { return $(this).data(found); }).each(handler).data(found, true);
	
	if (!isChild)
	{
		(window.waitUntilExists_Intervals = window.waitUntilExists_Intervals || {})[this.selector] =
		window.setInterval(function () { $this.waitUntilExists(handler, shouldRunHandlerOnce, true); }, 500)
		;
	}
	else if (shouldRunHandlerOnce && $elements.length)
	{
		window.clearInterval(window.waitUntilExists_Intervals[this.selector]);
	}
	
	return $this;
}

$.extend({
    replaceTag: function (currentElem, newTagObj, keepProps) {
        var $currentElem = $(currentElem);
        var i, $newTag = $(newTagObj).clone();
        if (keepProps) {//{{{
            newTag = $newTag[0];
            newTag.className = currentElem.className;
            $.extend(newTag.classList, currentElem.classList);
            $.extend(newTag.attributes, currentElem.attributes);
        }//}}}
        $currentElem.wrapAll($newTag);
        $currentElem.contents().unwrap();
        // return node; (Error spotted by Frank van Luijn)
    }
});

$.fn.extend(
{
	replaceTag: function (newTagObj, keepProps) 
	{
	  this.each(function() 
		{
	    $.replaceTag(this, newTagObj, keepProps);
		});
	}
});

/*
 * make collapseables close when switching to mobile mode
 */
function autoCollapse()
{
	$(window).bind('resize load',function()
	{
		if( $(this).width() < 992)
		{
			$('#sidebar .collapse').removeClass('in');
			$('#sidebar .collapse').addClass('out');
		}
		else
		{
			$('#sidebar .collapse').removeClass('out');
			//$('#sidebar .collapse').addClass('in');
		}   
	});
}

function makeDiscussionVisible()
{
  //RC2013-10-28 "Binky" places discussion link in <bdi>.
  //The default Bootstrap CSS therefore won't color the "Discussion" and other links,
  //since it isn't a direct child of an <li>. So we simply remove all <bdi> tags.
	$('bdi').contents().unwrap();
}

function cleanConfigPage()
{
	// Make the configuration page more readable
	// by removing the label class from all table cells
	$('#config__manager tr > td.label').removeClass('label');
}

function showButtonsBoostrap()
{
	// make edit and other submit buttons to show in bootstrap style
	$('input[type=\"submit\"], input[type=\"reset\"]').removeClass('button').addClass('btn btn-default btn-sm');
	$('input[value=\"Edit\"][type=\"submit\"]').addClass('pull-right');

	//make select image buttons show as bootstrap buttons
}

function cleanEditorPage()
{
	var summary = ".summary > label > span";
	var toolbarbuttons = "#tool__bar button";
	
	var waitlist = summary+","+toolbarbuttons;

	//wait for the needed elements to appear
	$(waitlist).waitUntilExists(function()
	{
		//make toolbar buttons for edit boostrap style
		$(toolbarbuttons).addClass("btn btn-default btn-sm");
	
		//make the edit summary more boostrappy
		$(summary).addClass("label label-success");
	});
}

function underlineMajorHeadings()
{
	$("#pagecontent h2").after("<hr/>");
}

function fixEditButtons()
{
	//remove section highlight functionality
	$("form.btn_secedit").removeClass("btn_secedit");

	//add a clearer class below since they are pulled right
	$('input[value=\"Edit\"][type=\"submit\"]').after("<div class='clearer'>");
}

function swapCSENavElems()
{
	$("#sidebar_content li.level1 div.li").each(function()
	{
		$(this).wrap($(this).children("#sidebar_content a").detach());	
	});
	$("#sidebar_content li.level1 a").each(function()
	{
		$(this).html($(this).children("#sidebar_content div.li").html($(this).text()));
	});
}

function removeCurId()
{
	$("span.curid a").unwrap();
}

function addTableClass()
{
	$("div.table").removeClass("table");
	$("table").not(".table").addClass("table");
	$("table.inline").not(".table").addClass("table");
}

function changeEditTableButton()
{
	$("input[title='Table']").attr("value","Edit Table");
}


$(function()
{
	makeDiscussionVisible();
	addTableClass();
	showButtonsBoostrap();
	cleanConfigPage();
	cleanEditorPage();
	autoCollapse();
	changeEditTableButton();
	underlineMajorHeadings();
	fixEditButtons();
	removeCurId();
	swapCSENavElems();
});

