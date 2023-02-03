<?php
    session_start();
    require_once("db.php"); 

$uname=$_POST["usernames"];
$upassword=$_POST["passwords"];

$sql="SELECT * FROM user WHERE user_name='$uname' AND passwords='".md5($upassword)."'";


$result=$conn->query($sql);
if($result->num_rows == 1)
{
    $rs=$result->fetch_array();
    $_SESSION['user_id']=(int)$rs['user_id'];
    $_SESSION['login_name']=$rs['user_name'] ;
    $_SESSION['user_level']=$rs['level'];

    if($_SESSION ['user_level'] ==0)
    {
        header("location: admin.php");

    }
    else if($_SESSION ['user_level'] ==1)
    {
        header("location: index.php");
    } else 
    {
        header("location: login.php");
    }
}
else
{
        
        // header("location: login.php");
}
