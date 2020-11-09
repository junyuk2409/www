<?
    session_start();

    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>회원정보수정</title>
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="css/member_form_modify.css">
	
    <script src="../common/js/jquery-1.12.4.min.js"></script>
    <script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
    <script src="../common/js/prefixfree.min.js"></script>

	

	<script>
   function check_id()
   {
     window.open("check_id.php?id=" + document.member_form.id.value,
         "IDcheck",
          "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }

   function check_nick()
   {
     window.open("../member/check_nick.php?nick=" + document.member_form.nick.value,
         "NICKcheck",
          "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }

   function check_input()
   {
      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하세요");    
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");    
          document.member_form.nick.focus();
          return;
      }


      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit(); 
		   // insert.php 로 변수 전송
   }

   function reset_form()
   {
      document.member_form.id.value = "";
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.nick.value = "";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "";
      document.member_form.hp3.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
	  
      document.member_form.id.focus();

      return;
   }
</script>
</head>
<?
    //$userid='aaa';
    
    include "../lib/dbconn.php";

    $sql = "select * from member where id='$userid'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);
    //$row[id]....$row[level]

    $hp = explode("-", $row[hp]);  //000-1111-2222
    $hp1 = $hp[0]; //000
    $hp2 = $hp[1]; //1111
    $hp3 = $hp[2]; //2222

    $email = explode("@", $row[email]); //aaa@naver.com
    $email1 = $email[0]; //aaa
    $email2 = $email[1]; ///naver.com

    mysql_close();
?>
<body>
	 <? include "../common/sub_head.html" ?>
	 
	<article id="content">  
	  
	  <form  name="member_form" method="post" action="modify.php"> 
	  <h2>회원정보수정</h2>
		
     <table>
      <caption class="hidden">회원가입</caption>
     	<tr>
     		<th scope="col"><label for="id">아이디</label></th>
     		<td>
     			<li><?= $row[id] ?></li>
     		</td>
     	</tr>
     	<tr>
     		<th scope="col"><label for="pass">비밀번호</label></th>
     		<td>
     			<input type="password" name="pass" value="">
     		</td>
     	</tr>
     	<tr>
     		<th scope="col"><label for="pass_confirm">비밀번호확인</label></th>
     		<td>
     			<input type="password" name="pass_confirm" value="">
     		</td>
     	</tr>
     	<tr>
     		<th scope="col"><label for="name">이름</label></th>
     		<td>
     			<input type="text" name="name" value="<?= $row[name] ?>">
     		</td>
     	</tr>
     	<tr>
     		<th scope="col"><label for="nick">닉네임</label></th>
     		<td>
     			<div id="nick1">
     			    <input type="text" name="nick" value="<?= $row[nick] ?>">
     			</div>
     		</td>
     		<td>
     			<div id="nick2">
     			    <a href="#"><span onclick="check_nick()">중복확인</span></a>
     			</div>     		    
     		</td>
     	</tr>
     	<tr>
     		<th scope="col">휴대폰</th>
     		<td>
     			<label class="hidden" for="hp1">전화번호앞3자리</label>
     			<select class="hp" name="hp1" id="hp1"> 
              <option value='010'>010</option>
              <option value='011'>011</option>
              <option value='016'>016</option>
              <option value='017'>017</option>
              <option value='018'>018</option>
              <option value='019'>019</option>
          </select>  - 
          <label class="hidden" for="hp2">전화번호중간4자리</label><input type="text" class="hp" name="hp2" id="hp2"  required> - <label class="hidden" for="hp3">전화번호끝4자리</label><input type="text" class="hp" name="hp3" id="hp3"  required>
     			
     		</td>
     	</tr>
     	<!-- <tr>
     	    <th scope="col">이메일</th>
     	    <td>
     	      <label class="hidden" for="email1">이메일아이디</label>
     	        <input type="text" id="email1" name="email1" value="<?= $email1 ?>"> @ 
     	        <label class="hidden" for="email2">이메일주소</label>
     	        <input type="text" name="email2" value="<?= $email2 ?>">
     	    </td>
     	</tr> -->
     	<tr>
     		<th scope="col">이메일</th>
     		<td>
     		  <label class="hidden" for="email1">이메일아이디</label>
                <input type="text" name="email1" id="email1" value="<?= $email1 ?>"> @
                <label class="hidden" for="email2">이메일주소</label>
                <input id="email2" type="text" name="email2" value="<?= $email2 ?>">
                <select name="selectEmail" id="selectEmail">
                    <option value="1" selected>직접입력</option>
                    <option value="naver.com">naver.com</option>
                    <option value="hanmail.net">hanmail.net</option>
                    <option value="gmail.com">gmail.com</option>
                </select>
     		</td>
     	</tr>
     	<tr>
     		<td class="button" colspan="2">
     			<a class="btn1" onclick="check_input()" href="#">수정하기</a>&nbsp;&nbsp;
				 <a class="btn2" onclick="reset_form()" href="#">초기화</a>
     		</td>
     	</tr>
     </table>

	 </form>
	  
	</article>
	 <? include "../common/sub_foot.html" ?>
	 
<script src="../mainjs/slide_down.js"></script>

<!-- <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script> -->
<script type="text/javascript">
    $('#selectEmail').change(function(){$("#selectEmail option:selected").each(function () {
        if($(this).val()== '1'){
        $("#email2").val('');
        $("#email2").attr("disabled",false);
    }else{
        $("#email2").val($(this).text());
        $("#email2").attr("disabled",false);
    }}); });
    </script>

</body>
</html>


