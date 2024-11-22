<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>

    <!-- 컨트롤+/ = 주석처리 -->


     <!-- 스타일시트 -->
    <!-- <link rel="stylesheet" type="text/css" href="css/join_black.css"> -->
    <link rel="stylesheet" type="text/css" href="css/join.css">
</head>
<body>
    <!-- form 시작 -->
<form action="register_server.php" method="post">
<h2>회원가입</h2>

<?php if(isset($_GET['error']))
{?>
<p class="error"><?php echo $_GET['error']; ?></p>
<?php } ?>

<?php if(isset($_GET['success']))
{?>
<p class="success"><?php echo $_GET['success']; ?></p>
<?php } ?>


<label>ID</label>
<input type="text" placeholder="ID 입력" name="user_id">

<label>PW</label>
<input type="password" placeholder="PW 입력" name="user_pw1" >

<label>PW 확인</label>
<input type="password" placeholder="PW 입력" name="user_pw2" >

<button type="submit" name="save">저장</button>
<a href="" class="save">이미 회원이신가요? (로그인 페이지)</a>

</form>
</body>
</html>

