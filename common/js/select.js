// Family site accordion Javascript document



$(document).ready(function() {
	$('#footerArea .select .arrow').click(function(){
		$('.select .aList').slideDown();			  
	});
	$('#footerArea .select .aList').mouseleave(function(){
		$(this).hide();			  
	});

    $('#footerArea .select .arrow').bind('focus', function () {        
        $('#footerArea .select .aList').slideDown();	
    });
    $('#footerArea .select .aList li:last').find('a').bind('blur', function () {        
        $('#footerArea .select .aList').hide();
    });  
});

