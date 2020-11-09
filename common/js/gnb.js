// Top Navigation bar Javascript Document 



$(document).ready(function() {
   

    $('.dropdownmenu').hover(
        function() { 
           $('.dropdownmenu .menu ul').fadeIn('normal',function(){$(this).stop();});
	       $('#headerArea').animate({height:400},'fast').clearQueue();
     },function() {
	      $('.dropdownmenu .menu ul').fadeOut('fast');
          $('#headerArea').animate({height:114},'fast').clearQueue();
    });
    

    $('.dropdownmenu .menu').hover(
        function() { 
	      $('.depth1', this).animate({top:0},'fast').clearQueue();
                 },
        function() {
	      $('.depth1', this).animate({top:0},'fast').clearQueue();
        });
    

    $('.dropdownmenu .menu .depth1').on('focus', function () {        
            $('.dropdownmenu .menu ul').slideDown('fast');
            $('#headerArea').animate({height:400},'fast').clearQueue();  
      });
    $('.dropdownmenu .m6 li:last').find('a').on('blur', function () {     
            $('.dropdownmenu .menu ul').slideUp('fast');
            $('#headerArea').animate({height:114},'fast').clearQueue();
     });
       
});
