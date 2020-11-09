// Tab JavaScript Document




$(document).ready(function(){
  var cnt= $('.tabs h3 .tab img') .length;   //No. of tab
             
  $('.tabs .contlist:eq(0)').show(); 
  $('.tabs .tab1').addClass('on');
  
  $('.tabs .tab').each(function (index) {  
    $(this).click(function(){  
	  $('.tabs .contlist').hide(); 
	  $('.tabs .contlist:eq('+index+')').show();
	  for(var i=1;i<=cnt;i++){
           $('.tab'+i).removeClass('on');
      } 
      $(this).addClass('on'); 
   });
  });
});

