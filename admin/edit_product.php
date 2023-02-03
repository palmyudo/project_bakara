<?php
session_start();
require_once('../db.php');
if(checkpermis()!=0)
    {
        go("../default.php");
    }
    if (isset($_POST['product_id']) && trim($_POST['product_id']) != ""){
        $pid = $_POST['product_id'];
        $pn = $_POST['product_name'];
        // echo $pd;
    $sql = "SELECT * FROM productss WHERE product_id='" . $pid."'";
    // echo "$sql";
    // echo "<br>";
    $result = $conn->query($sql);
    $rs = $result->fetch_array();
    // $conn ขอการเชื่อมต่อ querry สั่งทำงาน
    // echo $rs;
     if ($result->num_rows == 1){
        $sql = "UPDATE productss  SET product_name =('" . trim($_POST['product_name']) . "')WHERE product_id=$pid";

    }
    else{
        alert("ไม่มีสินค้าตัวนี้");

    } ?>
    <!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="font/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body class="text-center">
        <div class="container">
        <?php
    $pid = $_GET['product_id'];
    $sql = "SELECT * FROM productss WHERE product_id = $pid";
    $result = $conn->query($sql);
    $rs = $result->fetch_array();
    $pid = $rs['product_id'];
    $pn = $rs['product_name'];
    ?>
        <input for="product_name" name="product_name" placeholder="กรุณาเลือกสินค้าที่ต้องการแก้ไข " value="<?=$pn?>">
                    <input type="hidden" name="product_id" value="<?=$pid?>">
                    <br>
                    <button type="submit" class="btn btn-outline-light me-2" value="OK!"><i class="fa fa-paper-plane-o" aria-hidden="true"></i>submit!</button>

        </div>
</body>
</html>
    <?php
    } 
else{
    go("../index.php");
}
    ?>

