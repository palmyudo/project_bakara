<?php
    require_once("db.php");
    session_start();

$uname=$_POST["username"];
$upassword=$_POST["password"];

$sql="SELECT * FROM user WHERE user_name='$uname' AND password='".md5($upassword)."'";

$result=$conn->query($sql);
if($result->num_rows == 1)
{
    $rs=$result->fetch_array();
    $_SESSION['user_id']=(int)$rs['user_id'];
    $_SESSION['login_name']=$rs['user_name'] ;
    header("location: index.php");
    
    
    
    
}
else
{
    
    header("location: login.php");
}
?>
