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
    <title>공지사항 글쓰기</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e49f5d3028.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub4/common/css/sub4common.css">
    <link rel="stylesheet" href="../sub4/css/content4_1.css">
    <link rel="stylesheet" href="css/well.css">
    
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
                  
                   <h2>공지사항 글쓰기</h2>
                   
                   
            </div>
            
            <div class="content_area">    
                <div id="write_form_title">글쓰기</div>
                    <form  name="board_form" method="post" action="insert.php"> 
                    <div id="write_form">
                        <div class="write_line"></div>
                        <div id="write_row1">
                            <div class="col1"> 닉네임 </div>
                            <div class="col2"><?=$usernick?></div>
                            <div class="col3"><input type="checkbox" name="html_ok" value="y"> HTML 쓰기</div>
                        </div>
                        <div class="write_line"></div>
                        <div id="write_row2"><div class="col1"> 제목   </div>
                                             <div class="col2"><input type="text" name="subject"></div>
                        </div>
                        <div class="write_line"></div>
                        <div id="write_row3"><div class="col1"> 내용   </div>
                                             <div class="col2"><textarea rows="15" cols="79" name="content"></textarea></div>
                        </div>
                        <div class="write_line"></div>
                    </div>

                    <div id="write_button"><input type="submit" value="완료">&nbsp;
                                            <a href="list.php?page=<?=$page?>">목록</a>
                    </div>
                    </form>
            </div>
    

    </article>
</div>
    
    
    
    
<? include "../common/sub_foot.html" ?>    
            
</body>
</html>