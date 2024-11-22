<?php
$db = mysqli_connect('localhost','root','12345678','member');

if($conn)
{
    echo "로그인 성공";
}
else
{ 
    echo "로그인 실패";
}
?>
