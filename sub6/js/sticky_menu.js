// Auto Guide Javascript Document


    $(document).ready(function () {
              var th= $('.visual').height() + $('.subNav').height() + $('.title_area').height();
              
              
              console.log(th);
        

              $('.area a').click(function(){ 
                  var value=0;
                  
                  if($(this).hasClass('link1')){
                     value= $('.country_list li:eq(0)').offset().top-120;  
                      
                  }else if($(this).hasClass('link2')){
                     value= $('.country_list li:eq(1)').offset().top-120; 
                      
                  }else if($(this).hasClass('link3')){
                     value= $('.country_list li:eq(2)').offset().top-120; 
                      
                  }else if($(this).hasClass('link4')){
                     value= $('.country_list li:eq(3)').offset().top-120; 
                      
                  }else if($(this).hasClass('link5')){
                     value= $('.country_list li:eq(4)').offset().top-120;       
                  }
                  
                $("html,body").stop().animate({"scrollTop":value},2000);
              });
       });