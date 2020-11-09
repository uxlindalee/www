// Top button javascript   


    $(document).ready(function () {
              var th= $('#headerArea').height() + $('.visual').height();
              $('.topMove').hide();

             $(window).on('scroll',function(){  
                  var scroll = $(window).scrollTop();
                 
                  if(scroll>th){
                      $('.topMove').fadeIn('fast');
                  }else{
                      $('.topMove').fadeOut('fast');
                  }
             });
           
              $('.topMove').click(function(){
              $("html,body").stop().animate({"scrollTop":0},600);
              });
              
       });