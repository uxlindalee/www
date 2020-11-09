$(document).ready(function(){
    
    
//Sticky Header
    
    var screenSize = $(window).width(); 
    var winHeight = $(window).height();
    var headHeight = $('#headerArea').height();

    if(screenSize > 1024){
        $(window).on("scroll", function(){
            var headerH = $(this).scrollTop();
            if(headerH > winHeight - headHeight){
                $('#headerArea').css({ top: 0 });
            }else{
                $('#headerArea').css({ top: -150 });
            }
        });
    }else{
        $('#headerArea').css({ top: 0 });
    }

    
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
    
    
    // header resize
    var current = 0;
    $(window).resize(function(){ 
        screenSize = $(window).width();

        if(screenSize > 1024){
            $('#headerArea').css({ top: -150 });
            $("#gnb").show();
             current = 1;

            $(window).on("scroll", function(){
                var headerH = $(this).scrollTop();
                if(headerH > winHeight - headHeight){
                    $('#headerArea').css({ top: 0 });
                }else{
                    $('#headerArea').css({ top: -160 });
                }
            });
        }
        if(current == 1 && screenSize < 1024){
            $('#headerArea').css({ top: 0 });
            $("#gnb").hide();
            current = 0;
            $(window).off("scroll");
        }
    }); 
 
    // hover
    function init() {
		var speed = 330,
			easing = mina.backout;

            [].slice.call ( document.querySelectorAll( '#grid a' ) ).forEach( function( el ) {
                var s = Snap( el.querySelector( 'svg' ) ), path = s.select( 'path' ),
                    pathConfig = {
                        from : path.attr( 'd' ),
                        to : el.getAttribute( 'data-path-hover' )
                    };

                el.addEventListener( 'mouseenter', function() {
                    path.animate( { 'path' : pathConfig.to }, speed, easing );
                } );

                el.addEventListener( 'mouseleave', function() {
                    path.animate( { 'path' : pathConfig.from }, speed, easing );
                } );
            } );
        }
	init();
    
   
//Tab Script
    

		
	// character
	$('.ost .tab a').click(function(){
		var ind = $(this).parent('li').index();
		
		if(ind==0){
              $('.change img').attr('src','images/ostshakira.png');   
              
         }else if(ind==1){
              $('.change img').attr('src','images/ostshakirakr.png'); 

         }else if(ind==2){
              $('.change img').attr('src','images/ostshakira2.png'); 


	     };
 });
    
// Top button javascript 

           
              $('.toTop').click(function(){
              $("html,body").stop().animate({"scrollTop":0},600);

              
      
    
    
        });
    });