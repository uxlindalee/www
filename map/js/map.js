// JavaScript Document

 function initialize() {
  var myLatlng = new google.maps.LatLng(37.324700, 127.990233);
  var myOptions = {
   zoom: 15,
   center: myLatlng

  }
  var map = new google.maps.Map(document.getElementById("map_home"), myOptions);
 
  var marker = new google.maps.Marker({
   position: myLatlng, 
   map: map, 
   title:"한국관광공사"
  });   
  
 
  var infowindow = new google.maps.InfoWindow({
   content: "한국관광공사 강원도 원주시 세계로 10 (우) 26464"
  });
 
  infowindow.open(map,marker);
 }
 
 
 window.onload=function(){
  initialize();
 }

