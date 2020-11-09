// JavaScript Document

 

 $(document).ready(function () {
	var article = $('.faq .article');//모든 리스트들 부를때 길어서 걍 아티클변수에 담는다

	article.find('.a').slideUp(200); //모든 답변 닫아라..display:none을 했으니까 주석처리함

	
     $('.faq .article .trigger').click(function(){//각각의 질문을 클릭하면
         var myArticle = $(this).parents('.article'); //클릭한 트리거의 조상아티클(할아버지)를 찾아

	//이것도 매번 찾기 힘들어서 마이아티클에 담음. 클릭한 질문의 리스트

        

	if(myArticle.hasClass('hide')){   

        //클릭한 리스트의 답변이 닫혀있어?
	    article.find('.a').slideUp(200);// 모든 답변을 다 닫아
		article.removeClass('show').addClass('hide'); //hide
        article.find('span').text('+');
        
	    myArticle.removeClass('hide').addClass('show');  
	    myArticle.find('.a').slideDown(200);  
        myArticle.find('span').text('-');

	 } else {  //클릭한 리스트의 답변이 열려있어?

	   myArticle.removeClass('show').addClass('hide');  
	   myArticle.find('.a').slideUp(200);  
       myArticle.find('span').text('+');

	}  

  });    

	

	$('.all').toggle(function(){ 

	    article.find('.a').slideDown(200);
	    article.removeClass('hide').addClass('show');
        article.find('span').text('-');
        $(this).text('모두닫기▲');

        

	},function(){ 

	    article.find('.a').slideUp(200);
	    article.removeClass('show').addClass('hide');
        article.find('span').text('+');
        $(this).text('모두열기▼');

	});

	

});  