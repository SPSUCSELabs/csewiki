/*
 * make collapseables close when switching to mobile mode
 */
$(window).bind('resize load',function()
{
	if( $(this).width() < 992)
	{
		$('.collapse').removeClass('in');
		$('.collapse').addClass('out');
	}
	else
	{
		$('.collapse').removeClass('out');
		$('.collapse').addClass('in');
	}   
});
