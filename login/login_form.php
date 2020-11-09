<?
	session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);  
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>로그인</title>
        <link href="css/member.css" rel="stylesheet">
        <link href="../common/css/common.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/0365f1fbdc.js" crossorigin="anonymous"></script>
        </head>

    <body>
        <? include "../common/sub_head.html" ?>
        <div id="wrap">
            <div id="col2">
    <form  name="member_form" method="post" action="login.php"> 
	<div id="title">
        <h3>로그인</h3>
	</div>
   
	<div id="login_form">
	     <p>아이디와 비밀번호를 입력해주세요</p>

		 <div id="login">
			<div id="id_input_button">
				<div id="id_pw_input">
					<ul>
					    <li>
					        <input type="text" name="id" class="login_input" placeholder="ID">
				        </li>
					    <li>
					        <input type="password" id="pass" name="pass" class="login_input" placeholder="Password">
					        <a href="#none" title="비밀번호 표시" id="eye">
					            <i class="fas fa-eye"></i>
					        </a>
				        </li>
					</ul>						
				</div>
				<div id="login_button"><input type="submit" value="로그인"></div>
			</div>
            <p>아직 회원이 아니신가요?</p>
			<div id="join_button"><a href="../member/join.html">회원가입</a></div>
		 </div>			 
	</div> <!-- end of form_login -->

    </form>
</div> <!-- end of col2 -->
            </div>
            <!-- end of content -->
            <? include "../common/sub_foot.html" ?>

<script>

$(document).ready(function(){
$('#eye').toggle(function(){
$(this).find('.fa-eye').attr('class', 'fas fa-eye-slash');
$('#pass').attr('type','text');
$('#eye').attr('title','비밀번호 숨기기');
}, function(){
$(this).find('.fa-eye-slash').attr('class', 'fas fa-eye');
$('#pass').attr('type','password');
$('#eye').attr('title','비밀번호 표시');
});
})

</script>
   
    </body>

    </html>