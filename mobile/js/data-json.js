

var xhr = new XMLHttpRequest();              // Produce XMLHttpRequest 

xhr.onload = function() {                    // When readystate changes
 

    responseObject = JSON.parse(xhr.responseText);  

    
    var newContent = '';
    for (var i = 0; i < responseObject.hanbando.length; i++) { 
      newContent += '<ul>';
      newContent += '<li>';
      newContent += '<img src="' + responseObject.hanbando[i].img + '" ';
      newContent += 'alt="' + responseObject.hanbando[i].img + '" />';
      newContent += '<p><strong>' + responseObject.hanbando[i].place + '</strong><br>';
      newContent += '<span>주소</span>' + responseObject.hanbando[i].address + '<br>';
      newContent += '<span>대표전화</span>' + responseObject.hanbando[i].tel + '</p>';
      newContent += '</li>';
      newContent += '</ul>';
    }

 
    document.getElementById('contacts').innerHTML = newContent;

  //}
};

xhr.open('GET', '../data/sub6_3data.json', true);  // Ready for request
xhr.send(null);                                 // Send request

