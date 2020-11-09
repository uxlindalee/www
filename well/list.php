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
    <title>한국관광공사 칭찬합시다</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e49f5d3028.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub3/common/css/sub3common.css">
    <link rel="stylesheet" href="../sub3/css/content35.css">
    <link rel="stylesheet" href="css/well.css">
    
    <script src="../common/js/prefixfree.min.js"></script>

    <!--[if IE9]>  
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
</head>

<?
	include "../lib/dbconn.php";

	
  if (!$scale)
    $scale=10;			// 한 화면에 표시되는 글 수

    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from well where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from well order by num desc";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      

	$number = $total_record - $start;
?>

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
              
      
<!-- 본문콘텐츠영역 -->       
        <article id="content">
            <div class="title_area">
               <div class="line_map">
                   <span>HOME</span> &gt; <span>국민참여</span> &gt; <strong>칭찬합니다</strong>
               </div>
                  
                   <h2>국민참여</h2>
                   <p>문의사항이나 이용안내에 대한 정보를 보실 수 있습니다.</p>
                   
            </div>
            
            <div class="content_area">

                <ul class="subNav">
                    <li><a href="../sub3/sub3_2.html"><span><i class="far fa-question-circle"></i>자주묻는질문</span></a></li>
                    <li><a href="../sub3/sub3_3.html"><span><i class="far fa-comment-dots"></i>똑똑한 문의</span></a></li>
                    <li><a href="../sub3/sub3_4.html"><span><i class="fas fa-users"></i>똑똑한 제안</span></a></li>
                    <li class="current"><a href="list.php"><span><i class="far fa-thumbs-up"></i>칭찬합니다</span></a></li>
                    <li><a href="../sub3/sub3_6.html"><span><i class="fas fa-cog"></i>관광정보수정</span></a></li>
                </ul>
              
                <h3>칭찬합니다</h3>  

                <p>헌신적으로 업무를 수행하거나 친절하게 응대한 공사직원’또는 관광업계 관계자를 칭찬하고 싶으실 경우 글을 올리시는 게시판입니다. <br>
                * 게시내용이 본 게시판의 목적에 맞지 않을 경우 예고 없이 삭제될 수 있습니다.</p>
                
                
            
        
 
               
<!--공지사항영역 -->                 
               
                <section id="announce">
                    <form action="list.php?mode=search">
                        <div id="list_search">
                            <div class="list_search1"></div>
                            <div class="list_search2">검색</div>
                            <div class="list_search3">
                                <select name="find" id="">
                                    <option value="subject">제목</option>
                                    <option value="content">내용</option>
                                    <option value="nick">별명</option>
                                    <option value="name">이름</option>
                                </select>
                            </div>
                            <div class="list_search4"><input type="text" name="search"></div>
                            <div class="list_search5"><input type="image" src="images/searching.png"></div>

                        </div>
                    </form>

                    <select name="scale" onchange="location.href='list.php?scale='+this.value" id="">
                        <option value="">보기</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                    </select>


                    <div id="list_title">
                        <ul>
                            <li id="list_title1">번호</li>
                            <li id="list_title2">제목</li>
                            <li id="list_title3">글쓴이</li>
                            <li id="list_title4">등록일</li>
                            <li id="list_title5">조회</li>
                        </ul>
                    </div>

                    <div id="list_content">
    <?		
       for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
       {
          mysql_data_seek($result, $i);       
          // 가져올 레코드로 위치(포인터) 이동  
          $row = mysql_fetch_array($result);       
          // 하나의 레코드 가져오기

          $item_num     = $row[num];
          $item_id      = $row[id];
          $item_name    = $row[name];
          $item_nick    = $row[nick];
          $item_hit     = $row[hit];

          $item_date    = $row[regist_day];
          $item_date = substr($item_date, 0, 10);  

          $item_subject = str_replace(" ", "&nbsp;", $row[subject]);

    ?>
                <div id="list_item">
                    <div id="list_item1"><?= $number ?></div>
                    <div id="list_item2"><a href="view.php?num=<?=$item_num?>&page=<?=$page?>"><?= $item_subject ?></a></div>
                    <div id="list_item3"><?= $item_nick ?></div>
                    <div id="list_item4"><?= $item_date ?></div>
                    <div id="list_item5"><?= $item_hit ?></div>
                </div>


    <?
           $number--;
       }
    ?>
                <div id="page_button">
                    <div id="page_num">  &nbsp;&nbsp;&nbsp;&nbsp; 
    <?
       // 게시판 목록 하단에 페이지 링크 번호 출력
       for ($i=1; $i<=$total_page; $i++)
       {
            if ($page == $i)     // 현재 페이지 번호 링크 안함
            {
                echo "<b> $i </b>";
            }
            else
            { 
               if($mode=="search"){
                 echo "<a href='list.php?page=$i&scale=$scale&mode=search&find=$find&search=$search'> $i </a>"; 
                }else{    

                  echo "<a href='list.php?page=$i&scale=$scale'> $i </a>";
               }
            }      
       }
    ?>			
                &nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                    <div id="button">
                        <a href="list.php?page=<?=$page?>">목록</a>&nbsp;
    <? 
        if($userid)
        {
    ?>
            <a href="write_form.php">글쓰기</a>
    <?
        }
    ?>
                    </div>
                   </div> 
                </div>
            </section>
        </div>
    

    </article>

    
    
    
    
<? include "../common/sub_foot.html" ?>    
    
    
    
    
    
</body>
</html>