<?
           session_start();
?>
    <meta charset="UTF-8">
    <?
   @extract($_GET); 
  @extract($_POST); 
  @extract($_SESSION); 
  
// $id    (post�������)
// $pass  (post�������)
  

   if(!$id) {   
     echo("
           <script>
             window.alert('���̵� �Է��ϼ���');
             history.go(-1);
           </script>
         ");
         exit;
   }

   if(!$pass) {
     echo("
           <script>
             window.alert('�н����带 �Է��ϼ���');
             history.go(-1);
           </script>
         ");
         exit;
   }

 

   include "../lib/dbconn.php";

   $sql = "select * from member where id='$id'";  // aaa
   $result = mysql_query($sql, $connect);  //������ 1 ������ null

   $num_match = mysql_num_rows($result);  //1 null

   if(!$num_match)  // �˻� ���ڵ尡 ������
   {
     echo("
           <script>
             window.alert('��ϵ��� ���� ���̵��Դϴ�');
             history.go(-1);
           </script>
         ");
    }
    else    // �˻� ���ڵ尡 ������
    {
		 $row = mysql_fetch_array($result); 
          //$row[id] ,.... $row[level]
         $sql ="select * from member where id='$id' and pass=password('$pass')";
         $result = mysql_query($sql, $connect);
         $num_match = mysql_num_rows($result); 
     
  

        if(!$num_match)  
        {
           echo("
              <script>
                window.alert('�н����尡 ��ġ���� �ʽ��ϴ�.');
                history.go(-1);
              </script>
           ");

           exit;
        }
        else    //���̵�� �е���尡 ��� ��ġ�Ѵٸ� 
        {
           $userid = $row[id];
		   $username = $row[name];
		   $usernick = $row[nick];
		   $userlevel = $row[level];
  
            
           // �ʿ��� ���� ������ �����Ѵ� (���� �߿�)
           $_SESSION['userid'] = $userid;//$_SESSION['userid'] = $row[id];
           $_SESSION['username'] = $username;//$_SESSION['username'] = $row[name];
           $_SESSION['usernick'] = $usernick;//$_SESSION['usernick'] = $row[nick];
           $_SESSION['userlevel'] = $userlevel;//$_SESSION['userlevel'] = $row[level];

           echo("
              <script>
			    alert('�α����� �Ǿ����ϴ�');
                location.href = '../index.html';
              </script>
           ");
        }
   }          
?>