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
			$('#sidebar .collapse').addClass('in');
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
	$('input[type=\"submit\"], input[type=\"reset\"]').removeClass('button');
	$('input[type=\"submit\"], input[type=\"reset\"]').addClass('btn btn-default btn-sm');
	$('input[value=\"Edit\"][type=\"submit\"]').addClass('pull-right');
}


$(function()
{
	cleanConfigPage();
	makeDiscussionVisible();
	showButtonsBoostrap();
	autoCollapse();
});


