$(document).ready(function () {

    var h1= $('#content .shortcut').offset().top-500;
    var h2= $('#content .notice').offset().top-500;

   
    $(window).on('scroll',function(){
        var scroll = $(window).scrollTop();
        
    
        //shortcut link section
        if(scroll>=h1 && scroll<h2){
            $('.shortcut').addClass('shortcut_on');
        }else if(scroll>=h2){
            $('.notice').addClass('notice_on');

        }
      

    });
});

