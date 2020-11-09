<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	$table = "news";   //해당 게시판의 테이블명
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>한국관광공사 소식</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e49f5d3028.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub4/common/css/sub4common.css">
    <link rel="stylesheet" href="../sub4/css/content4_2.css">
    <link rel="stylesheet" href="css/news.css">
    
    <script src="../common/js/prefixfree.min.js"></script>
    
    <!--[if IE9]>  
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
</head>

<?
	include "../lib/dbconn.php";

    
   if (!$scale)
    $scale=4;			// 한 화면에 표시되는 글 수

    
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

		$sql = "select * from $table where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by num desc";
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
              
      
<!-- 서브네비영역 -->   
        <div class="subnav_box">    
            <div class="subNav">
                <ul>
                    <li><a id="nav1" href="../free/list.php">공지사항</a></li>
                    <li><a id="nav2" class="current" href="list.php">소식</a></li>
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
                 <section id="news">
                     <form  name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search"> 
                    <div id="list_search">
                        <div class="list_search1">TOTAL <?= $total_record ?>   </div>
                        <div class="list_search2">검색</div>
                        <div class="list_search3">
                            <select name="find">
                                <option value='subject'>제목</option>
                                <option value='content'>내용</option>
                                <option value='nick'>별명</option>
                                <option value='name'>이름</option>
                            </select></div>
                        <div class="list_search4"><input type="text" name="search"></div>
                        <div class="list_search5"><input type="image" src="images/searching.png"></div>
                    </div>
                    </form>

                    <select name="scale" class="scale" onchange="location.href='list.php?scale='+this.value">
                        <option value="">보기</option>
                        <option value="4">4</option>
                        <option value="8">8</option>
                    </select>


                    

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
                  $content = str_replace(" ", "&nbsp;", $row[content]);
                   
                  $len_subject = strlen($row[content]);   
                   
                  if ($len_subject > 70)  //글자길이 제한 ...처리
                    {
                        $content = mb_substr($row[content], 0, 150, 'utf-8');  //임의의 문자열을 추출하는 함수
                        $content = $content."...";
                    } 
                   
                   

                  if($row[file_copied_0]){   //첫번째 첨부이미지가 있으면...
                    $item_img = './data/'.$row[file_copied_0];  //./data/2020_10_12_10_41_01_0.jpg
                  }else{
                    $item_img = './data/default.jpg'  ;
                  }

            ?>
                        <div id="list_item">
                            <div id="list_item1"><?= $number ?></div>
                            <div id="list_item2">    
                               <a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>"> 
                                <img src="<?=$item_img?>" alt="" width="200"
                                 height="200">  <!-- width랑 height은 css에서 적용할것-->
                                &nbsp; &nbsp; 
                                    </a>
                                <a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>"> 
                                    <dl>
                                        <dt><?= $item_subject ?></dt><br>
                                        <dd><?= $content ?></dd>
                                        <dd>
                                            <span><i class="fas fa-user"></i><?= $item_nick ?></span>
                                            <span><i class="far fa-clock"></i><?= $item_date ?></span>
                                            <span><i class="fas fa-eye"></i><?= $item_hit ?></span>
                                        </dd>
                                    </dl>
                                </a>
                            </div>
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
                                <a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
            <? 
                if($userid)
                {
            ?>
                    <a href="write_form.php?table=<?=$table?>">글쓰기</a>
            <?
                }
            ?>
                            </div>
                        </div> <!-- end of page_button -->		
                    </div> <!-- end of list content -->

                 
                </section>
            </div>
            
        </article>
    </div>
    
    
    
    
<? include "../common/sub_foot.html" ?>    
    
</body>
</html>