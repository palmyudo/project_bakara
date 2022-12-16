<?php
session_start();
if (isset($_SESSION['level'])  == 0) 
{
    require_once('../db.php');
    if (isset($_POST['cate_name']) && trim($_POST['cate_name']) != "")
     {
        $sql = "SELECT cate_name FROM category WHERE cate_name = ' " . trim($_POST['cate_name']) . "'";
        $result = $conn->query($sql);
        if ($result->num_rows == 0)
         {
            $sql = "INSERT INTO category(cate_name) VALUES ('" . trim($_POST['cate_name']) . "')";
            $result = $conn->query($sql);
            header('location:../admin.php');
        } 
        else 
        {
            // alert('เฮ้ย! สินค้านี้มีอยู่แล้วนะจ๊ะ');
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="font/css/font-awesome.min.css">
</head>
<body>
    <div class="container">

    <from class="from" action="" method="post">
        <div class="from-inline">
            <input for="cate_name" name="cate_name" placeholder="กรุณาป้อนชื่อประเภทสินค้า " >ประเภทสินค้า</input> 
             <br>
             <button type="submit" class="btn btn-outline-light me-2" value="OK!"><i class="fa fa-paper-plane-o" aria-hidden="true"></i>submit!</button>


</body>
</html>
<?php
}
else
{
    header('location:../index.php');
}
?>