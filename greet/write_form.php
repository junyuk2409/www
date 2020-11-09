<? 
	session_start(); 
     @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="utf-8">
<link href="../common/css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="css/write_form.css" rel="stylesheet" type="text/css" media="all">
</head>

<body>
<? include "../common/sub_head.html" ?>
<div id="wrap">
  <div id="header">
    <? include "../lib/top_login2.php"; ?>
  </div>  <!-- end of header -->

  <div id="menu">
	<? include "../lib/top_menu2.php"; ?>
  </div>  <!-- end of menu --> 

  <div id="content">
	<div id="col1">
		<div id="left_menu">
<?
			include "../lib/left_menu.php";
?>
		</div>
	</div> <!-- end of col1 -->

	<div id="col2">        
		<div id="title">
		    <h4>글쓰기</h4>
		</div>
		<div class="clear"></div>

		<form  name="board_form" method="post" action="insert.php"> 
		<div id="write_form">
			<div id="write_row1">
				<div class="col1"> 닉네임 </div>
				<div class="col2"><?=$usernick?></div>
			</div>
            <div class="col3"><input type="checkbox" name="html_ok" value="y">HTML</div>
			<div class="write_line"></div>
			<div id="write_row2"><div class="col1">Title</div>
			                     <div class="col2"><input type="text" name="subject" placeholder="제목을 입력하세요"></div>
			</div>
			<div class="write_line"></div>
			<div id="write_row3"><div class="col1">Body</div>
			                     <div class="col2"><textarea rows="15" cols="79" name="content" placeholder="내용을 입력하세요"></textarea></div>
			</div>
			<div class="write_line"></div>
		</div>

		<div id="write_button">
            <button>제출</button>
            <a href="list.php?page=<?=$page?>">목록</a>
		</div>
		</form>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->
<? include "../common/sub_foot.html" ?>
</body>
</html>