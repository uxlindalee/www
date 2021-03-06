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
	<title>회원정보수정</title>
	<link rel="stylesheet" href="../css/common.css">
	<link rel="stylesheet" href="../member/css/member_form.css">
	
    	 
    <script src="../js/jquery-1.12.4.min.js"></script>
	<script src="../js/jquery-migrate-1.4.1.min.js"></script>
	<script>
	 $(document).ready(function() {
           //id 중복검사
         $("#id").keyup(function() {    // id입력 상자에 id값 입력시
            var id = $('#id').val(); //aaa

            $.ajax({
                type: "POST",     //get으로 넘겨도 됨
                url: "check_id.php",
                data: "id="+ id,  
                cache: false,     //기록을 남기지 마라, 남기면 메모리가 많아서 느려진다.
                success: function(data)
                {
                     $("#loadtext").html(data);
                }
            });
        });

        //nick 중복검사		 
        $("#nick").keyup(function() {    // id입력 상자에 id값 입력시
            var nick = $('#nick').val();

            $.ajax({
                type: "POST",
                url: "check_nick.php",
                data: "nick="+ nick,  
                cache: false, 
                success: function(data)
                {
                     $("#loadtext2").html(data);
                }
            });
        });		 


        });
	
	
	
	</script>
	<script>
       function check_nick()
       {
         window.open("check_nick.php?nick=" + document.member_form.nick.value,
             "NICKcheck",
             "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
       }

       function check_input()
       {
          if (!document.member_form.pass.value)
          {
              alert("비밀번호를 입력하세요");    
              document.member_form.pass.focus();
              return;
          }

          if (!document.member_form.pass_confirm.value)
          {
              alert("비밀번호확인을 입력하세요");    
              document.member_form.pass_confirm.focus();
              return;
          }

          if (!document.member_form.name.value)
          {
              alert("이름을 입력하세요");    
              document.member_form.name.focus();
              return;
          }

          if (!document.member_form.nick.value)
          {
              alert("닉네임을 입력하세요");    
              document.member_form.nick.focus();
              return;
          }

          if (!document.member_form.hp2.value || !document.member_form.hp3.value )
          {
              alert("휴대폰 번호를 입력하세요");    
              document.member_form.nick.focus();
              return;
          }

          if (document.member_form.pass.value != 
                document.member_form.pass_confirm.value)
          {
              alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
              document.member_form.pass.focus();
              document.member_form.pass.select();
              return;
          }

          document.member_form.submit();
       }

       function reset_form()
       {
          document.member_form.id.value = "";
          document.member_form.pass.value = "";
          document.member_form.pass_confirm.value = "";
          document.member_form.name.value = "";
          document.member_form.nick.value = "";
          document.member_form.hp1.value = "010";
          document.member_form.hp2.value = "";
          document.member_form.hp3.value = "";
          document.member_form.email1.value = "";
          document.member_form.email2.value = "";

          document.member_form.id.focus();

          return;
       }
</script>
		
</head>

<?
    //$userid='aaa';
    
    include "../lib/dbconn.php";

    $sql = "select * from member where id='$userid'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);
    //$row[id]....$row[level]

    $hp = explode("-", $row[hp]);  //000-0000-0000
    $hp1 = $hp[0];
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    $email = explode("@", $row[email]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysql_close();
?>
<body>
 
	<article id="content">  
	  
	  <h2>회원정보수정</h2>
	  <form  name="member_form" method="post" action="modify.php"> 
		
     <table>
      <caption class="hidden">회원가입</caption>
     	<tr>
     		<th scope="col"><label for="id">아이디</label></th>
     		<td><?= $row[id] ?></td>
     	</tr>
     	<tr>
     		<th scope="col"><label for="pass">비밀번호</label></th>
     		<td>
     			 <input type="password" name="pass" value="">
     		</td>
     	</tr>
     	<tr>
     		<th scope="col"><label for="pass_confirm">비밀번호 확인</label></th>
     		<td>
     			<input type="password" name="pass_confirm" value="">
     		</td>
     	</tr>
     	<tr>
     		<th scope="col"><label for="name">이름</label></th>
     		<td>
     			<input type="text" name="name" value="<?= $row[name] ?>"> 
     		</td>
     	</tr>
     	<tr>
     		<th scope="col"><label for="nick">닉네임</label></th>
     		<td>
     			 <input type="text" name="nick" value="<?= $row[nick] ?>">
			     <span id="loadtext2"></span>
     		</td>
     	</tr>
     	<tr>
     		<th scope="col">휴대폰</th>
     		<td>
     			<label class="hidden" for="hp1">전화번호앞3자리</label>
     			<select class="hp" name="hp1" id="hp1"> 
              <option value='010'>010</option>
              <option value='011'>011</option>
              <option value='016'>016</option>
              <option value='017'>017</option>
              <option value='018'>018</option>
              <option value='019'>019</option>
          </select>  - 
          <label class="hidden" for="hp2">전화번호중간4자리</label><input type="text" class="hp" name="hp2" value="<?= $hp2 ?>"> - <label class="hidden" for="hp3">전화번호끝4자리</label><input type="text" class="hp" name="hp3" value="<?= $hp3 ?>">
     			
     		</td>
     	</tr>
     	<tr class="email_area">
     		<th scope="col">이메일</th>
     		<td>
     		  <label class="hidden" for="email1">이메일아이디</label>
     			<input type="text" id="email1" name="email1" value="<?= $email1 ?>"> @ 
     			<label class="hidden" for="email2">이메일주소</label>
     			<input type="text" name="email2" 
			           value="<?= $email2 ?>">
     		</td>
     	</tr>
     	<tr>
     		<td colspan="2" class="cancel">
     			<a href="#" onclick="check_input()">정보수정</a>&nbsp;&nbsp;
				 <a href="#" onclick="reset_form()">다시쓰기</a>
     		</td>
     	</tr>
     </table>

	 </form>
	  
	</article>



	 
</body>
</html>


