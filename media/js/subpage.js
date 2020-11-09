$(document).ready(function(){
$('#headerArea').css('position','fixed').css('top',0);
    var screenHeight = $(window).height();
    var screenSize = $(window).width();

    $(window).on('scroll',function(){
       var scroll = $(window).scrollTop();

        
//        $('.text').text(scroll);
        
        if(scroll>screenHeight-90){
            $('.videoBox').css('width','100%').css('height','100%').css('margin',0).css('border-bottom-right-radius',0).css('border-bottom-left-radius',0);
        }else{
            
            $('.videoBox').css('width','96%').css('height','98%').css('margin','2% 2% 0').css('border-bottom-right-radius',300).css('border-bottom-left-radius',300); 
        };
        
    });
    
    //Hamburger Menu
    $(".menuOpen").toggle(function() {
	 $("#gnb").slideDown('slow');
   }, function() {
	 $("#gnb").slideUp('fast');
   });
   
   
    var current=0; //모바일 해상도
   $(window).resize(function(){ 
      var screenSize = $(window).width(); 
      if( screenSize > 1024){
        $("#gnb").show();
		 current=1; //모바일이상의 해상도
      }
      if(current==1 && screenSize <= 1024){
        $("#gnb").hide();
         current=0;
      }
    }); 
    
        
    // Top button javascript 

           
      $('.toTop').click(function(){
      $("html,body").stop().animate({"scrollTop":0},600);    
        
    });
});