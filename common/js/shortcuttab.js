// Shortcut page JavaScript Document


$(document).ready(function () {
   
        var timeonoff;  
		 var cnt=true;  
		 
	     $('.right').click(function () {
         $('.shortcut ul li').first().appendTo('.shortcut ul');
         });
    
		 $('.left').click(function () {		
         $('.shortcut ul li').last().prependTo('.shortcut ul');
		
         });

});

