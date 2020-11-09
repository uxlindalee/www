<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	include "../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = mysql_query($sql, $connect);
    $row = mysql_fetch_array($result);       
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

	$image_name[0]   = $row[file_name_0];
	$image_name[1]   = $row[file_name_1];
	$image_name[2]   = $row[file_name_2];
	$image_copied[0] = $row[file_copied_0];
	$image_copied[1] = $row[file_copied_1];
	$image_copied[2] = $row[file_copied_2];

    $item_date    = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);
	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}	
    if ($is_html!="y")
	{
    $item_content = str_replace("&lt;", "<", $item_content);
    $item_content = str_replace("&gt;", ">", $item_content);
    }
	for ($i=0; $i<3; $i++)
	{
		if ($image_copied[$i]) 
		{
			$imageinfo = GetImageSize("./data/".$image_copied[$i]);
			$image_width[$i] = $imageinfo[0];
			$image_height[$i] = $imageinfo[1];
			$image_type[$i]  = $imageinfo[2];

			if ($image_width[$i] > 785)
				$image_width[$i] = 785;
		}
		else
		{
			$image_width[$i] = "";
			$image_height[$i] = "";
			$image_type[$i]  = "";
		}
	}
	$new_hit = $item_hit + 1;
	$sql = "update $table set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>공지사항 글보기</title>

    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e49f5d3028.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub4/common/css/sub4common.css">
    <link rel="stylesheet" href="../free/css/free.css">

    <script>
        function check_input()
        {
            if (!document.ripple_form.ripple_content.value)
            {
                alert("내용을 입력하세요!");    
                document.ripple_form.ripple_content.focus();
                return;
            }
            document.ripple_form.submit();
        }

        function del(href) 
        {
            if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                    document.location.href = href;
            }
        }
    </script>
    
</head>
<body>
    
<? include "../common/sub_head.html" ?>
<script>
     window.onload=function(){

        var num = '<?=$_GET['num']?>';
        var nav1= document.getElementById('nav1'); 
        var nav2= document.getElementById('nav2');
        var nav3= document.getElementById('nav3');
        var nav4= document.getElementById('nav4');
        var nav5= document.getElementById('nav5');
         
         if(num==1){
              nav1.className='current';
          }else if(num==2){
              nav2.className='current';
          }else if(num==3){
              nav3.className='current';
          }else if(num==4){
              nav4.className='current';
          }else if(num==5){
              nav5.className='current';
          }

}

</script>
       

       
<!-- 메인비주얼영역 -->
        <div class="visual"></div>
              
      
<!-- 서브네비영역 -->   
        <div class="subnav_box">    
            <div class="subNav">
                <ul>
                    <li><a id="nav1" class="current" href="list.php">공지사항</a></li>
                    <li><a id="nav2" href="../sub4/sub4_2.html">소식</a></li>
                    <li><a id="nav3" href="../sub4/sub4_3.html">갤러리</a></li>
                    <li><a id="nav4" href="../sub4/sub4_4.html">공모전</a></li>
                    <li><a id="nav5" href="../sub4/sub4_5.html">홍보영상</a></li>
                </ul>
            </div>
        </div>    
   
   
<!-- 본문콘텐츠영역 -->    
    <div id="wrap">
        <article id="content">
           <div class="title_area">
               <div class="line_map">
                   <span>HOME</span> &gt; <span>알림/자료</span> &gt; <strong>공지사항</strong>
               </div>
                  
                   <h2>공지사항</h2>
                   
                   
            </div>
            
            <div class="content_area">
                <div id="view_comment"> &nbsp;</div>    
                <div id="view_title">
                    <div id="view_title1"><?= $item_subject ?></div><div id="view_title2"><?= $item_nick ?> | 조회 : <?= $item_hit ?>  
                                          | <?= $item_date ?> </div>	
                </div>

                <div id="view_content">
        <?
            for ($i=0; $i<3; $i++)
            {
                if ($image_copied[$i])
                {
                    $img_name = $image_copied[$i];
                    $img_name = "./data/".$img_name;
                    $img_width = $image_width[$i];

                    echo "<img src='$img_name' width='$img_width'>"."<br><br>";
                }
            }
        ?>
                    <?= $item_content ?>
                </div>

                <div id="ripple">
        <?
                $sql = "select * from free_ripple where parent='$item_num'";
                $ripple_result = mysql_query($sql);

                while ($row_ripple = mysql_fetch_array($ripple_result))
                {
                    $ripple_num     = $row_ripple[num];
                    $ripple_id      = $row_ripple[id];
                    $ripple_nick    = $row_ripple[nick];
                    $ripple_content = str_replace("\n", "<br>", $row_ripple[content]);
                    $ripple_content = str_replace(" ", "&nbsp;", $ripple_content);
                    $ripple_date    = $row_ripple[regist_day];
        ?>
                    <div id="ripple_writer_title">
                    <ul>
                    <li id="writer_title1"><i class="fas fa-user-circle"></i> &nbsp; <?=$ripple_nick?></li>
                    <li id="writer_title2"><?=$ripple_date?></li>
                    <li id="writer_title3"> 
                      <? 
                            if($userid=="admin" || $userid==$ripple_id)
                              echo "<a href='delete_ripple.php?table=$table&num=$item_num&ripple_num=$ripple_num'>삭제</a>"; 
                      ?>
                    </li>
                    </ul>
                    </div>
                    <div id="ripple_content"><?=$ripple_content?></div>
                    <div class="hor_line_ripple"></div>
        <?
                }
        ?>			
                    <form  name="ripple_form" method="post" action="insert_ripple.php?table=<?=$table?>&num=<?=$item_num?>">  
                    <div id="ripple_box">
                        <div id="ripple_box1"><i class="fas fa-comment-alt"></i> COMMENT </div>
                        <div id="ripple_box2"><textarea rows="5" cols="150" name="ripple_content"></textarea>
                        </div>
                        <div id="ripple_box3"><a href="#"><input type="submit" value="등록"></a></div>
                    </div>
                    </form>
                </div> <!-- end of ripple -->

                <div id="view_button">
                        <a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
        <? 
            if($userid && ($userid==$item_id))
            {
        ?>
                        <a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>">수정</a>&nbsp;
                        <a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')">삭제</a>&nbsp;
        <?
            }
        ?>
        <? 
            if($userid)
            {
        ?>
                        <a href="write_form.php?table=<?=$table?>">글쓰기</a>
        <?
            }
        ?>
                </div>
                <div class="clear"></div>

            </div>
    
    
       

    </article>
</div>
    
    
    
    
<? include "../common/sub_foot.html" ?>  
    
    
    
    
    
    
</body>
</html>
