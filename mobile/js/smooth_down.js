$(document).ready(function () {

    $(window).on('scroll',function(){
        var scroll = $(window).scrollTop();
        $('.text').text(scroll);
        
        
        
        if(scroll>300){
            $('.tourism').addClass('On');
        }
        
        if(scroll>1000){
            $('.shortcut').addClass('On');
        }
        
        if(scroll>1700){
            $('.news').addClass('On');
        }
        
        if(scroll>2400){
            $('.video_box').addClass('On');
        }
        
        if(scroll>2900){
            $('.instagram').addClass('On');
        }
        
    });
});