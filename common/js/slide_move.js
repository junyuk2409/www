    $(document).ready(function () {
            var th= $('#headerArea').height() + $('.main').height();
              $('.topMove').hide();
        
                //console.log(th);    
                //console.log($('header').height());    
                //console.log($('.main').height());    
            
             $(window).on('scroll',function(){//스크롤의 거리가 발생되면
                  var scroll = $(window).scrollTop();
                 //스크롤이 움직이면 그 해당 스코롤탑의 값이 저장된다
                 
                  console.log(scroll);
                  if(scroll>th){
                      $('.topMove').fadeIn('slow');
                  }else{
                      $('.topMove').fadeOut('fast');
                  }
                 
                 $('.slideMenu a').removeClass('on');
                 
                 if(scroll>=938 && scroll<2208){
                     $('.slideMenu li:eq(0)').find('a').addClass('on');
                 }else if(scroll>=2208 && scroll<3317){
                     $('.slideMenu li:eq(1)').find('a').addClass('on');
                 }else if(scroll>=3317){
                     $('.slideMenu li:eq(2)').find('a').addClass('on');
                 }
                 
                 
                 
             });
           
              $('.topMove').click(function(){
                  //상단으로 스르륵 이동합니다.
                 $("html,body").stop().animate({"scrollTop":0},1000); 
              });
   
              $('.slideMenu a').click(function(){//각각의 메뉴를 클릭하면
                  var value=0;
                  
                  
                 // $('.slideMenu a').removeClass('on');
                 // $(this).addClass('on');
                  //* $(this).is('.link1') / $(this).is('#link1')
                  // is 는 뒤에 뭐가 오든 다 잡음 => #아이디, .클래스 등
                  // hasClass는 클래스만 잡음 . 제외해도 됨
                  
                  if($(this).hasClass('link1')){
                      // value=335;
                    value= $('#content section:eq(0)').offset().top-150; 
                  }else if($(this).hasClass('link2')){
                      //value=1347;
                    value= $('#content section:eq(1)').offset().top-150; 
                  }else if($(this).hasClass('link3')){
                      //value=2356;
                    value= $('#content section:eq(2)').offset().top-150; 
                  }
                  
                $("html,body").stop().animate({"scrollTop":value},1000);
              });
              
              
       });