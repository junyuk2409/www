<?
   function latest_article($table, $loop, $char_limit) 
   {
		include "dbconn.php";

		$sql = "select * from $table order by num desc limit $loop";
		$result = mysql_query($sql, $connect);

		while ($row = mysql_fetch_array($result))
		{
			$num = $row[num];
			 $len_subject = mb_strlen($row[subject], 'utf-8');
			$subject = $row[subject];

			if ($len_subject > $char_limit)
			{
				 $subject = str_replace( "&#039;", "'", $subject);               
                                                       $subject = mb_substr($subject, 0, $char_limit, 'utf-8');
				$subject = $subject."...";
			}

			$regist_day = substr($row[regist_day], 0, 10);

			echo "      
				<div class='talk'>
                    <ul>
                        <li>
                            <a href='./$table/view.php?table=$table&num=$num'>$subject</a>
                            <div class='col2'>$regist_day
                            </div>
                        </li>
                    </ul>
                </div>
				<div class='clear'>
                </div>
			";
		}
		mysql_close();
   }

    /*
    공지사항
        <ul>
            <li><a href="#">일, 생활 균형 캠페인 확인서</a><span>2017.12.19</span></li>
            <li><a href="#">소방훈련</a><span>2017.11.25</span></li>
            <li><a href="#">노사파트너쉽 교육</a><span>2017.09.04</span></li>
            <li><a href="#">2015 하반기 윤리교육 실천 캠페인</a><span>2015.11.01</span></li>
        </ul>
        
        
        자유게시판
        <li><a href="#">사랑나눔을 실천하는 포스플레이트</a><span>2018.10.02</span></li>
                        <li><a href="#">빛나는 마음 - 월드컵 16강을 기원하며..</a><span>2014.02.12</span></li>
                        <li><a href="#">봉사자에게 고마운 마음으로</a><span>2013.07.10</span></li>
                        <li><a href="#">비전 검사기 개발 및 제작</a><span>2013.05.09</span></li>
    */

?>