// Auto Guide Javascript Document



    $(document).ready(function () {
        
        
          var value=0;                
   
            $('.dabs li:eq(0)').find('a').addClass('spy');
            $(window).on('scroll',function(){
                var scroll = $(window).scrollTop();

                if(scroll>680){
                    $('.dabs').addClass('navOn');
                    $('header').hide();
                }else{
                    $('.dabs').removeClass('navOn');
                    $('header').show();
                }

                $('.dabs li').find('a').removeClass('spy');
                if(scroll>=680 && scroll<1856){
                    $('.dabs li:eq(0)').find('a').addClass('spy');
                }else if(scroll>=1856 && scroll<2844){
                    $('.dabs li:eq(1)').find('a').addClass('spy');
                }else if(scroll>=2844 && scroll<3524){
                    $('.dabs li:eq(2)').find('a').addClass('spy');
                }else if(scroll>=3524 && scroll<4301){
                    $('.dabs li:eq(3)').find('a').addClass('spy');
                }else if(scroll>=4301 && scroll<4950){
                    $('.dabs li:eq(4)').find('a').addClass('spy');
                }
            });
        
        
              var th= $('.visual').height() + $('.subNav').height() + $('.title_area').height();
              
              
              console.log(th);

              $('.dabs a').click(function(){ 
                  var value=0;
                  
                  if($(this).hasClass('link1')){
                     value= $('.history section:eq(0)').offset().top;  
                      
                  }else if($(this).hasClass('link2')){
                     value= $('.history section:eq(1)').offset().top; 
                      
                  }else if($(this).hasClass('link3')){
                     value= $('.history section:eq(2)').offset().top; 
                      
                  }else if($(this).hasClass('link4')){
                     value= $('.history section:eq(3)').offset().top; 
                      
                  }else if($(this).hasClass('link5')){
                     value= $('.history section:eq(4)').offset().top;       
                  }
                  
                $("html,body").stop().animate({"scrollTop":value},1000);
              });
       });

