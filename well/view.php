<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

    //세션변수
    //view.php?num=7&page=1

	include "../lib/dbconn.php";

	$sql = "select * from well where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

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

	$new_hit = $item_hit + 1;

	$sql = "update well set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
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
<link rel="stylesheet" href="../sub4/css/content4_1.css">
<link rel="stylesheet" href="css/well.css">

<script>
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
                    <?= $item_content ?>
                </div>

                <div id="view_button">
				<a href="list.php?page=<?=$page?>">목록</a>&nbsp;
<? 
	if($userid==$item_id || $userlevel==1 || $userid=="admin")
	{
?>
				<a href="modify_form.php?num=<?=$num?>&page=<?=$page?>">수정</a>&nbsp;
				<a href="javascript:del('delete.php?num=<?=$num?>')">삭제</a>&nbsp;
<?
	}
?>
<? 
	if($userid )  //로인인이 되면 글쓰기
	{
?>
				<a href="write_form.php">글쓰기</a>
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