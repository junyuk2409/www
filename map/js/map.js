// JavaScript Document

 function initialize() {
  var myLatlng = new google.maps.LatLng(37.371142, 126.936899);
  var myOptions = {
   zoom: 15,
   center: myLatlng

  }
  var map = new google.maps.Map(document.getElementById("map_home"), myOptions);
 
  var marker = new google.maps.Marker({
   position: myLatlng, 
   map: map, 
   title:"집"
  });   
  
 
  var infowindow = new google.maps.InfoWindow({
   content: "집주소"
  });
 
  infowindow.open(map,marker);
 }
 
 
 window.onload=function(){
  initialize();
 }

