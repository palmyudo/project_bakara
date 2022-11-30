<?php
    require_once("db.php");
    session_start();
$uemail=$_POST["email"];
$uname=$_POST["username"];
$upassword=$_POST["password"];

$sql="INSERT INTO user VALUES(0,'$uemail','$uname','".md5($upassword)."')";
if($conn->query($sql))
{   
    $_SESSION['login_name']=$uname ;
    header("location: index.php");
}
else
{
    echo "No!";
    header("location: add.php");
}
?>