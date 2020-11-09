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

	$file_name[0]   = $row[file_name_0];
	$file_name[1]   = $row[file_name_1];
	$file_name[2]   = $row[file_name_2];

	$file_type[0]   = $row[file_type_0];
	$file_type[1]   = $row[file_type_1];
	$file_type[2]   = $row[file_type_2];

	$file_copied[0] = $row[file_copied_0];
	$file_copied[1] = $row[file_copied_1];
	$file_copied[2] = $row[file_copied_2];

    $item_date    = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = str_replace(" ", "&nbsp;", $row[content]);
	$item_content = str_replace("\n", "<br>", $item_content);

    if ($is_html!="y")
	{
    $item_content = str_replace("&lt;", "<", $item_content);
    $item_content = str_replace("&gt;", ">", $item_content);
    }

	$new_hit = $item_hit + 1;

	$sql = "update $table set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>한국관광공사 정보목록수정</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e49f5d3028.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub5/common/css/sub5common.css">
    <link rel="stylesheet" href="../sub5/css/content5_4.css">
    <link rel="stylesheet" href="css/download.css">
    
    <script src="../common/js/prefixfree.min.js"></script>
    <script>
    function del(href) 
    {
        if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                document.location.href = href;
        }
    }
</script>

    <!--[if IE9]>  
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
            
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

         
         if(num==1){
              nav1.className='current';
          }else if(num==2){
              nav2.className='current';
          }else if(num==3){
              nav3.className='current';
          }else if(num==4){
              nav4.className='current';
          }

}

</script>




<!-- 메인비주얼영역 -->
        <div class="visual"></div>
              
<!-- 서브네비영역 -->   
        <div class="subnav_box">    
            <div class="subNav">
                <ul>
                    <li><a id="nav1" href="../sub5/sub5_1.html">이용안내</a></li>
                    <li><a id="nav2" href="../sub5/sub5_2.html">공공데이터개방</a></li>
                    <li><a id="nav3" href="../sub5/sub5_3.html">정보공개청구</a></li>
                    <li><a id="nav4" class="current" href="list.php">정보목록</a></li>

                </ul>
            </div>
        </div>    
    
    
<!-- 본문콘텐츠영역 -->       
        <article id="content">
            <div class="title_area">
               <div class="line_map">
                   <span>HOME</span> &gt; <span>정보공개</span> &gt; <strong>정보목록</strong>
               </div>
               
                <h2>정보목록</h2>
                <p>보유 관리되는 정보에 대하여 국민이 쉽게 알 수 있도록 정보 목록을 작성 비치하고 있습니다.</p>
            </div>   
              

                <div id="view_comment"> &nbsp;</div>

                <div id="view_title">
                    <div id="view_title1"><?= $item_subject ?></div><div id="view_title2"><?= $item_nick ?> | 조회 : <?= $item_hit ?>  
                                          | <?= $item_date ?> </div>	
                </div>

                <div id="view_content">
        <?
            for ($i=0; $i<3; $i++)
            {
                if ($userid && $file_copied[$i])
                {
                    $show_name = $file_name[$i];
                    $real_name = $file_copied[$i];
                    $real_type = $file_type[$i];
                    $file_path = "./data/".$real_name;
                    $file_size = filesize($file_path);

                    echo "▷ 첨부파일 : $show_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
                           <a href='download.php?table=$table&num=$num&real_name=$real_name&show_name=$show_name&file_type=$real_type'>[저장]</a><br>";
                }
            }
        ?>
                    <br>
                    <?= $item_content ?>
                </div>

                <div id="view_button">
                        <a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
        <? 
            if($userid && $userid==$item_id) //실제로 파일올린 사람들에게만 수정이 가능하게
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


 
                  
        </article>        
        
 <? include "../common/sub_foot.html" ?>   
    
    
</body>
</html>

