//메뉴
    $(document).ready(function() {
   $(".menuOpen").toggle(function() {
	 $("#gnb").slideDown('slow');
   }, function() {
	 $("#gnb").slideUp('fast');
   });
   
   
    var current=0;
   $(window).resize(function(){ 
      var screenSize = $(window).width(); 
      if( screenSize > 640){
        $("#gnb").show();
		 current=1;
      }
      if(current==1 && screenSize < 640){
        $("#gnb").hide();
         current=0;
      }
    }); 
    
  });