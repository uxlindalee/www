<?
	session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>로그인</title>
    
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="css/member.css">
    
</head>
<body>
    <div id="wrap">
  
	<div id="login_page">
        <form  name="member_form" method="post" action="login.php"> 
		<div id="title">
			<a href="../index.html"><h2>로그인</h2></a>
		</div>
       
		<div id="login_form">
         
             <div class="haseyo">
				<img src="images/hello.jpg">
			 </div>
         

			 <div id="login_insert">
			     <p>한국관광공사에 <br> 오신걸 환영합니다</p>
                 <p>로그인 하시면 더 많은 서비스를 경험하실 수 있습니다.</p>
                 
				<div class="id_input">
						<ul>
						<li><input type="text" name="id" class="login_input" title="유저 아이디" placeholder="아이디"></li>
						<li><input type="password" name="pass" class="login_input" title="비밀번호" placeholder="비밀번호"></li>
						</ul>						
                        <input class="login_button" type="submit" title="로그인" value="로그인">
				</div>
            </div>
            
            <div class="join_button">
                <p>▶ 아직 회원이 아니십니까?
                <a href="../member/join.html">회원가입하기</a></p>
            </div>
				
			 			 
		</div> <!-- end of form_login -->

	    </form>
	    
	    <a href="javascript:;" class="close_icon" onclick="join_cancel()"><i class="fas fa-times-circle"></i></a>
	</div> <!-- end of col2 -->

</div> <!-- end of wrap -->
<script>
    $(document).ready(function(){
        $('.sitemap_wrap').hide(); //�쇰떒 sitemap �덈낫�닿쾶
    
    $('#headerArea .top_left .site_map a').click(function(){
        $('.sitemap_wrap').fadeIn();
    });
    
    $('.sitemap_close_btn').click(function(){
        $('.sitemap_wrap').fadeOut();
    });
    
    $('.sitemap_wrap ul li dd').hover(function(){
        var $target=$(event.target);
        $target.css('background','#2580f2')
        $target.parents('dl').children('dt').addClass('text_blue');
    },function(){
        var $target=$(event.target);
        $target.css('background','none')
        $target.parents('dl').children('dt').removeClass('text_blue');
    });
    });

</script>


</body>
</html>