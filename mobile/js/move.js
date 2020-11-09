// JavaScript Document

$(document).ready(function() {
  var timeonoff; //자동기능 구현
  var imageCount=3;  //이미지 개수 *** 
  var cnt=1;  //이미지 순서 1 2 3 4 5 4 3 2 1 2 3 4 5 ...
  var direct=1;  //1씩 증가(+1)/감소(-1)
  var position=0; //겔러리 무비의 left값 0 -4000 -2000 -3000 -4000
  var onoff=true; // true=>타이머 동작중 , false=>동작하지 않을때
    
     $('.btn1').css('background','#3385b1'); //첫번째 불켜
    $('.btn1').css('width','30');
    
    $('.gallery_text li:eq(0)').fadeIn('slow');

 function moveg(){
      cnt+=direct;  //카운트가 1 2 3 4 5 4 3 2 1 2 3 4 5 ......
	     //각각의 카운트에 대한 left 좌표값을 처리
		if(cnt==1){
		   position=0;  
		}else if(cnt==2){
	       position=-640;
		}else if(cnt==3){
		   position=-1280;
		}
     
        $('.gallery_text li').hide();
        $('.gallery_text li:eq('+ (cnt-1) +')').fadeIn('slow');
                                                
	   for(var i=1;i<=imageCount;i++){
          $('.btn'+i).css('background','#fff'); //버튼불다꺼!!
         $('.btn'+i).css('width','16'); 
      }
      $('.btn'+cnt).css('background','#3385b1');//자신만 불켜
      $('.btn'+cnt).css('width','30');   
                           
		$('.gallery').animate({left:position}, 'slow'); //겔러리 무비의 left값을 움직여라~
		if(cnt==imageCount)direct=-1;
        if(cnt==1)direct=1;
 }

  timeonoff= setInterval( moveg , 1000); //4초마다 자동기능 

  $('.mbutton').click(function(event){  //각각의 버튼을 클릭한다면...

	var $target=$(event.target); //$target == this =>실제 클릭한 버튼
	clearInterval(timeonoff);   //타이머를 중지!!

	for(var i=1;i<=imageCount;i++){
			  $('.btn'+i).css('background','#fff'); //버튼 모두불꺼
              $('.btn'+i).css('width','16');
    }

	if($target.is('.btn1')){  //첫번째 버튼을 클릭했다면...
    	   $('.gallery').animate({left:0}, 'slow');
                cnt=1;
                direct=1;
	}else if($target.is('.btn2')){ //두번째 버튼을 클릭했다면...
    	   $('.gallery').animate({left:-640}, 'slow');
                cnt=2;
	}else if($target.is('.btn3')){ //세번째 버튼을 클릭했다면...
    	   $('.gallery').animate({left:-1280}, 'slow');
                cnt=3;
                direct=-1;
    }
      
    $('.gallery_text li').hide();
    $('.gallery_text li:eq('+ (cnt-1) +')').fadeIn('slow');  
      
      
    $('.btn'+cnt).css('background','#3385b1');//자신 버튼만 불켜 
    $('.btn'+cnt).css('width','30');
      
    timeonoff= setInterval( moveg , 1000);  //타이머의 재 동작
      
    if(onoff==false){
		   onoff=true;
		   $('.ps').css('background','url(images/stop.png) no-repeat');
     }  
  });
 
     //stop/play 버튼 클릭시 타이머 동작/중지
  $('.ps').click(function(){ 
       if(onoff==true){
	       clearInterval(timeonoff);   // stop버튼 클릭시
		   $(this).css('background','url(images/play.png) no-repeat');
           onoff=false;   
	   }else{
		  timeonoff= setInterval( moveg , 1000); //play버튼 클릭시
		   $(this).css('background','url(images/stop.png) no-repeat');
		   onoff=true; 
	   }
  });	
  
});


 $(document).ready(function () {
        
        $(window).on('scroll',function(){
            var scroll = $(window).scrollTop();
            //스크롤top의 좌표를 담는다

            $('.text').text(scroll);
            //스크롤 좌표의 값을 찍는다.
            
            if(scroll>=300){ 
                $('.item1').addClass('item1On');
                //스크롤의 거리가 350px 이상이면 서브메뉴 고정
            };
            
            
            
            if(scroll>=800){ 
                $('.item2').addClass('item2On');
                //스크롤의 거리가 350px 이상이면 서브메뉴 고정
            };
            
            if(scroll>=2000){ 
                $('.slogan').addClass('sloganOn');
                //스크롤의 거리가 350px 이상이면 서브메뉴 고정
            };
            
            
        });


    });




