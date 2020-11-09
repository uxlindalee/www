
/*
  $(document).ready(function() {
      
   $(".menu_btn").click(function() {
    $("#gnb").animate({left:0,opacity:1}, 'fast');
   }, function() {
    $("#gnb").animate({left:'-100%',opacity:0}, 'fast');
   });
      
  });*/


 $(document).ready(function() {
   
 	
   $(".menu_btn").click(function() { 
       
       var documentHeight =  $(document).height();
      
       $(".box").css('height',documentHeight);
       $("#gnb").css('height',documentHeight);
       
       //$("body").css('position', 'fixed');
       $("#gnb").animate({left:0,opacity:1}, 'fast');
       $(".box").show();
   });
   
   $(".box,.mclose").click(function() {
     $("#gnb").animate({left:'-100%',opacity:0}, 'fast');
     //$("body").css('position', '');
     $(".box").hide();
   
     $('#gnb .gnb_body .depth1 ul').slideUp('fast'); 
     $('#gnb .gnb_body .depth1 h3>a i').removeClass('fa-chevron-down').addClass('fa-chevron-right');
     $('#gnb .gnb_body .depth1 h3 a').removeClass('on');
    
   });
     
     var mcnt=0;
     //2depth
    $('#gnb .gnb_body .depth1 h3 a').click(function(){
         
         var ind= $(this).parents('.depth1').index();
         if(ind==3){
             mcnt++;
             if(mcnt%2==1){
                 $(this).parent('h3').css('border-bottom','none');
             }else{
                 $(this).parent('h3').css('border-bottom','1px solid #ccc');
             }
         }
        
         $(this).parent().next('ul').slideToggle('fast'); 
         if ($(this).find('i').hasClass('fa-chevron-right')) {
             $(this).find('i').removeClass('fa-chevron-right').addClass('fa-chevron-down');
             $(this).addClass('on');
         } else if ($(this).find('i').hasClass('fa-chevron-down')) {
             $(this).find('i').removeClass('fa-chevron-down').addClass('fa-chevron-right');
             $(this).removeClass('on');

        };    
   
  });
     
 });