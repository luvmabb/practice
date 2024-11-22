<?php 
//다른 파일에 있는 명령어를 사용할 수 있게 해줌
include('db.php');

if(isset($_POST['user_id']) && isset($_POST['user_pw1']) && isset($_POST['user_pw2']))
{
  //보안을 더욱 강화(시큐어 코딩,보안 코딩)
  $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
  $user_pw1 = mysqli_real_escape_string($db, $_POST['user_pw1']);
  $user_pw2 = mysqli_real_escape_string($db, $_POST['user_pw2']);
  
  //에러를 체크

  if(empty($user_id))
  {
    header("location: register.php?error=아이디가 비어있어요");
    exit();
  }
  else if(empty($user_pw1))
  {
    header("location: register.php?error=패스워드가 비어있어요");
    exit();
  }
  else if(empty($user_pw2))
  {
    header("location: register.php?error=패스워드가 비어있어요");
    exit();
  }
  else if($user_pw1 !== $user_pw2)
  {
    header("location: register.php?error=패스워드가 일치하지 않아요");
    exit(); 
  }
  else
  {
    
    // 암호화

    $user_pw1 = password_hash($user_pw1, PASSWORD_DEFAULT); //단방향 암호

   
    // 중복체크
    $sql_same = "SELECT * FROM member where mb_id = '$user_id'"; 
    $order = mysqli_query($db,  $sql_same);

    if(mysqli_num_rows($order)>0)
    {
        header("location: register.php?error=이미 있는 아이디 입니다");
        exit();
    }
    else
    {
        //에러가 없다면 insert into 삽입 시켜줘
        $sql_save ="insert into member(mb_id, user_pw1) values('$user_id','$user_pw1') ";
        $result = mysqli_query($db,$sql_save);
        
        if($result)
        {
            header("location: register.php?success=성공적으로 가입 되었습니다");
            exit();
        }
        else
        {
            header("location: register.php?success=가입에 실패하였습니다");
            exit();
        }
      }
    }
}
else
{
    //에러 메세지
    header("location: register.php?success=알 수 없는 오류가 발생하였습니다");
            exit();
}

if(isset($_POST['save']))

?>