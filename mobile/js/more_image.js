//More Image showing Javascript Document

$(document).ready(function(){
    var article = $('#gallery .shadow .mini');
    article.find('li').slideUp(100);
    
    $('#gallery .shadow p a').toggle(function(){
        article.find('li').slideDown('slow');
    },function(){
        article.find('li').slideUp('fast');
    });
});