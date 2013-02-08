$(document).ready(function()
{
	$('#email-form').ajaxForm({
		target: '#error',
		success: function()
		{
			$('#error').fadeIn('slow');
			
			if( $('#error').text().indexOf( "Thank you" ) !== -1 )
			{
				setTimeout(function()
				{
					fadeFormOut();
				}, 1000);

			}
		}
	});
	
	$('#form').hide();
	
    $('.form-link, .form-close').click(function()
    {
    
    	if($('.form-link').hasClass('closed'))
    	{
			fadeFormIn();
			return false;
    	}
    	
    	if($('.form-link').hasClass('open'))
    	{
			fadeFormOut();
			return false;
    	}
	});

});

function fadeFormIn()
{
	$('.form-link').addClass('open').removeClass('closed');
	$('#overlay').animate({opacity: 0.3}, 300).css('z-index', 100);
	$('#form').fadeIn(100);
	$('#content').css('z-index', 50);
}

function fadeFormOut()
{
	$('#form').fadeOut(100);
	$('.form-link').addClass('closed').removeClass('open');
	$('#overlay').animate({opacity: 0}, 100).css('z-index', 50);
	$('#content').css('z-index', 100);
	$('#form input.textbox').val("");
	$('#error').text("");
}