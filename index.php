<?php
    session_start();    
    require_once("db.php");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
if(isset($_SESSION["login_name"])) {
        
        echo "$_SESSION[login_name]";
        echo "<br>";
        echo "<a href='logout.php'>Logout</a>";
        
    }
    else{
        
        echo "<a  href='login.php'>Login</a>";
        echo "<br>";
        echo "<a  href='sigup.php'>Sign-up</a>";
        
    }
    ?>
</body>
</html>