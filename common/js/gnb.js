   $(document).ready(function() {
   

    $('ul.dropdownmenu').hover(
        function() { 
            $('ul.dropdownmenu li.menu ul').fadeIn('normal',function(){$(this).stop();});
	         $('#headerArea').animate({height:280},'fast').clearQueue();  //서브메뉴가 열렸을때의 헤더의 높이
                 },
        function() {
	    
	      $('ul.dropdownmenu li.menu ul').fadeOut('fast');
          $('#headerArea').animate({height:120},'fast').clearQueue(); 
    });

/*
            $('ul.dropdownmenu li.menu').hover(
            function() { 
	         $('a.depth1', this).animate({top:-22},'fast').clearQueue();
                 },
            function() {
	        $('a.depth1', this).animate({top:0},'fast').clearQueue();
        });
*/
       
       //tab키처
         $('ul.dropdownmenu li.menu .depth1').on('focus', function () {        
                    $('ul.dropdownmenu li.menu ul').slideDown('fast');
                   $('#headerArea').animate({height:280},'fast').clearQueue();
          });

         $('ul.dropdownmenu li.m5 li:last').find('a').on('blur', function () {        
                  $('ul.dropdownmenu li.menu ul').slideUp('fast');
                 $('#headerArea').animate({height:120},'fast').clearQueue();
         });
       
});
