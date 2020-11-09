// Bottom banner movement JavaScript Document



$(document).ready(function() {
   var position=0;  
   var movesize=2; 
   var timeonoff;  
   
   $('.partnerBox ul').after($('.partnerBox ul').clone());
   
   function partnerMove(){
        position-=movesize;  
    	$('.partnerBox').css('left',position);
		
		 if(position < -3130){
			   $('.partnerBox').css('left',0);
			   position=0;         
		 } 
		
   };

     timeonoff= setInterval(partnerMove, 100);
    
   	$('.partnerBox').hover(function(){
		clearInterval(timeonoff);
	},function(){
		timeonoff= setInterval(partnerMove, 100);	
	});
	
    
 });