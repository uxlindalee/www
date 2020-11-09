// Main Visual movement JavaScript Document



$(document).ready(function() {

    var timeonoff;  
    var imageCount=6;   
    var cnt=1;  
    var onoff=true; 
    
    $('.btn1').css('background','#f00'); 
    $('.btn1').css('width','30');
    
    $('.gallery .link1').fadeIn('slow'); 
 
    function moveg(){
      if(cnt==imageCount+1)cnt=1;
	  if(cnt==imageCount)cnt=0;  
        
      cnt++; 
     for(var i=1;i<=imageCount;i++){
        $('.gallery .link'+i).hide(); 
     }
     $('.gallery .link'+cnt).fadeIn('slow'); 
	 		                    
     for(var i=1;i<=imageCount;i++){
         $('.btn'+i).css('background','#fff'); 
         $('.btn'+i).css('width','16'); 
      }
      $('.btn'+cnt).css('background','#f00');
      $('.btn'+cnt).css('width','30');                
       if(cnt==imageCount)cnt=0;
     }
    timeonoff= setInterval( moveg , 4000);
 
    
   $('.mbutton').click(function(event){  
	     var $target=$(event.target); 
         clearInterval(timeonoff);  
	 
	     for(var i=1;i<=imageCount;i++){
	         $('.gallery .link'+i).hide();
         } 
	 
		  if($target.is('.btn1')){
				 cnt=1;
		  }else if($target.is('.btn2')){
				 cnt=2; 
		  }else if($target.is('.btn3')){ 
				 cnt=3; 
		  }else if($target.is('.btn4')){
				 cnt=4; 
		  }else if($target.is('.btn5')){
				 cnt=5; 
          }else if($target.is('.btn6')){
				 cnt=6; 
		  } 
		  $('.gallery .link'+cnt).fadeIn('slow'); 
		  
		  for(var i=1;i<=imageCount;i++){
			  $('.btn'+i).css('background','#fff'); 
              $('.btn'+i).css('width','16');
		  }
          $('.btn'+cnt).css('background','#f00'); 
          $('.btn'+cnt).css('width','30');
       
          if(cnt==imageCount)cnt=0;  
          timeonoff= setInterval( moveg , 4000); 
       
          if(onoff==false){
		   onoff=true;
		   $('.ps').css('background','url(images/pause.png)');
	     }
        
    });



  $('.ps').click(function(){ 
       if(onoff==true){
	       clearInterval(timeonoff);  
		   $(this).css('background','url(images/play.png)');
           onoff=false;   
	   }else{  // false
		  timeonoff= setInterval( moveg , 4000); 
		   $(this).css('background','url(images/pause.png)');
		   onoff=true; 
	   }
  });	

 
  //Movement for Left & Right   
    
  $('.main .btnRight').click(function(){
	  clearInterval(timeonoff); 
	  if(cnt==imageCount)cnt=0;
		cnt++;

	 for(var i=1;i<=imageCount;i++){
          $('.gallery .link'+i).hide(); 
     }
     $('.gallery .link'+cnt).fadeIn('slow'); 
	 		                    
      for(var i=1;i<=imageCount;i++){
			  $('.btn'+i).css('background','#fff'); 
              $('.btn'+i).css('width','16');
		  }
          $('.btn'+cnt).css('background','#f00');
          $('.btn'+cnt).css('width','30'); 
	  
      if(cnt==imageCount)cnt=0;
	 	  
	  timeonoff= setInterval( moveg , 4000);
	  
	   if(onoff==false){
		   onoff=true;
		   $('.ps').css('background','url(images/pause.png)');
	     }
	  	    
  }); 	
	
  $('.main .btnLeft').click(function(){
	  clearInterval(timeonoff); 
	  if(cnt==1)cnt=imageCount+1;
	  if(cnt==0)cnt=imageCount;
	
		cnt--;
	
	 for(var i=1;i<=imageCount;i++){
          $('.gallery .link'+i).hide(); 
     }
     $('.gallery .link'+cnt).fadeIn('slow');
	 		                    
     for(var i=1;i<=imageCount;i++){
			  $('.btn'+i).css('background','#fff'); 
              $('.btn'+i).css('width','16');
		  }
          $('.btn'+cnt).css('background','#f00');
          $('.btn'+cnt).css('width','30'); 
	  
      if(cnt==1)cnt=imageCount+1;
	 	  
	  timeonoff= setInterval( moveg , 4000);
	  
	   if(onoff==false){
		   onoff=true;
		   $('.ps').css('background','url(images/pause.png)');
	     }
	  	    
  }); 	
	    
    
    
    

});




