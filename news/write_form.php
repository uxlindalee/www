<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
    //새글쓰기 =>  $table='concert'
    //수정 => $table=concert   $mode=modify   $num=1  $page=1


	include "../lib/dbconn.php";

	if ($mode=="modify") //수정 글쓰기면
	{
		$sql = "select * from $table where num=$num";
		$result = mysql_query($sql, $connect);

		$row = mysql_fetch_array($result);       
	
		$item_subject     = $row[subject];
		$item_content     = $row[content];

		$item_file_0 = $row[file_name_0];
		$item_file_1 = $row[file_name_1];
		$item_file_2 = $row[file_name_2];

		$copied_file_0 = $row[file_copied_0];
		$copied_file_1 = $row[file_copied_1];
		$copied_file_2 = $row[file_copied_2];
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>소식 글쓰기</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e49f5d3028.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub4/common/css/sub4common.css">
    <link rel="stylesheet" href="../sub4/css/content4_2.css">
    <link rel="stylesheet" href="css/news.css">
    
    <script>
      function check_input()
       {
          if (!document.board_form.subject.value)
          {
              alert("제목을 입력하세요!");    
              document.board_form.subject.focus();
              return;
          }

          if (!document.board_form.content.value)
          {
              alert("내용을 입력하세요!");    
              document.board_form.content.focus();
              return;
          }
          document.board_form.submit();
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
                    <li><a id="nav1" href="../greet/list.php">공지사항</a></li>
                    <li><a id="nav2" class="current"  href="list.php">소식</a></li>
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
                   <span>HOME</span> &gt; <span>알림/자료</span> &gt; <strong>소식</strong>
               </div>
                  
                   <h2>소식</h2>
                   
                   
            </div>
            
            <div class="content_area">     
                <div id="write_form_title">글쓰기</div>  
                
                <?
                if($mode=="modify")  //수정모드일때
                {

            ?>
                    <form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data"> 
            <?
                }
                else   //새글쓰기모드 일때
                {
            ?>
                    <form  name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data"> 
            <?
                }
            ?>
                    <div id="write_form">
                        <div class="write_line"></div>
                        <div id="write_row1"><div class="col1"> 별명 </div><div class="col2"><?=$usernick?></div>
            <?
                if( $userid && ($mode != "modify") )  //수정 글쓰기면
                {   //새글쓰기 에서만 HTML 쓰기가 보인다
            ?>
                            <div class="col3"><input type="checkbox" name="html_ok" value="y"> HTML 쓰기</div>
            <?
                }
            ?>						
                        </div>
                        <div class="write_line"></div>
                        <div id="write_row2"><div class="col1"> 제목   </div>
                                             <div class="col2"><input type="text" name="subject" value="<?=$item_subject?>" ></div>
                        </div>
                        <div class="write_line"></div>
                        <div id="write_row3"><div class="col1"> 내용   </div>
                                             <div class="col2"><textarea rows="15" cols="79" name="content"><?=$item_content?></textarea></div>
                        </div>
                        <div class="write_line"></div>
                        <div id="write_row4"><div class="col1"> 이미지파일1   </div>
                                             <div class="col2"><input type="file" name="upfile[]"></div>
                        </div>
                        <div class="clear"></div>
            <? 	if ($mode=="modify" && $item_file_0)
                {
            ?>
                        <div class="delete_ok"><?=$item_file_0?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="0"> 삭제</div>
                        <div class="clear"></div>
            <?
                }
            ?>
                        <div class="write_line"></div>
                        <div id="write_row5"><div class="col1"> 이미지파일2  </div>
                                             <div class="col2"><input type="file" name="upfile[]"></div>
                        </div>
            <? 	if ($mode=="modify" && $item_file_1)
                {
            ?>
                        <div class="delete_ok"><?=$item_file_1?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="1"> 삭제</div>
                        <div class="clear"></div>
            <?
                }
            ?>
                        <div class="write_line"></div>
                        <div class="clear"></div>
                        <div id="write_row6"><div class="col1"> 이미지파일3   </div>
                                             <div class="col2"><input type="file" name="upfile[]"></div>
                        </div>
            <? 	if ($mode=="modify" && $item_file_2)
                {
            ?>
                        <div class="delete_ok"><?=$item_file_2?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="2"> 삭제</div>
                        <div class="clear"></div>
            <?
                }
            ?>
                        <div class="write_line"></div>

                        <div class="clear"></div>
                    </div>

                    <div id="write_button"><input type="submit" value="완료">&nbsp;
                        <a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>
                    </div>

                    </form>
                </form>    
            </div>
     </article>
</div>
    
    
    
    
<? include "../common/sub_foot.html" ?>   
</body>
</html>
