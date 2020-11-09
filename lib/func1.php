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
				<div class='col1'>
                <a href='./$table/view.php?table=$table&num=$num'>$subject</a>
                </div> 
                <div class='col2'>$regist_day</div>
				<div class='clear'></div>
			";
		}
		mysql_close();
   }
?>




<!--

뉴스
<div class="notice">
               <div class="news">
                   <a href="greet/list.php"><h3>NEWS</h3></a>
                       <ul>
                           <li><a href="#">■ 2020 청춘여행 공모전 트래블리그 지원자 모집<span class="date">2020.05.29</span><span>국민관광마켓팅팀 담당</span></a></li>
                           <li><a href="#">■ 코로나19 해외 주요국 관광재개 동향 &#40;5.26 기준&#41;<span class="date">2020.05.26</span><span>국제관광전략팀</span></a></li>
                           <li><a href="#">■ 2020년 사천시 단체관광객 유치 인센티브 지원알림<span class="date">2020.05.22</span><span>사천시청 관광진흥과</span></a></li>
                           <li><a href="#">■ 포스트 코로나 대응 평창군 여행사등 변경 알림<span class="date">2020.05.22</span><span>평창군청 문화관광과</span></a></li>
                       </ul>
                       <a href="greet/list.php"><span class="hidden">더보기</span><i class="fas fa-ellipsis-v"></i></a>
공지사항
               </div>
               <div class="announcement">
                   <a href="news/list.php"><h3>ANNOUNCEMENTS</h3></a>
                       <ul>
                           <li><a href="#">■ 2020년 한국관광공사 단체상해보험 용역 입찰공고<span class="date">2020.05.29</span><span>노무팀</span></a></li>
                           <li><a href="#">■ 2020 근로자휴가지원사업 프로모션 행사 평가 공개<span class="date">2020.05.28</span><span>관광복지센터</span></a></li>
                           <li><a href="#">■ 중장기 경영전략 및 경영개선 수립 용역 사전 공개<span class="date">2020.05.28</span><span>기획조정팀</span></a></li>
                           <li><a href="#">■ 관광분야 투자유치 활성화 교육, 컨설팅 용역 제안사<span class="date">2020.05.27</span><span>관광기업육성팀</span></a></li>
                       </ul>
                       <a href="#"><span class="hidden">더보기</span><i class="fas fa-ellipsis-v"></i></a>
               </div>
           </div>

-->