<?php
session_start();
if (isset($_SESSION['user_level']) && $_SESSION['user_level'] == 0) {
    require_once('../db.php');
    if (isset($_POST['cate_name']) && trim($_POST['cate_name']) != "") {
        $cn = $_POST['cate_name'];
        $cid = $_POST['cate_id'];
        $sql="SELECT * FROM `categorys` WHERE cate_id ='" . $_POST['cate_id']."'";
        $result = $conn->query($sql); 
       if ($result->num_rows==1) {
            $sql = "UPDATE categorys  SET cate_name =('" . trim($_POST['cate_name']) . "')WHERE cate_id=$cid";
            $result = $conn->query($sql);
            header('location:../admin.php');
        }else{
            // echo "1";
        }
    } else {
        // echo "2";
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
        <?php
        $cid = $_GET['cate_id'];
        $sql = "SELECT * FROM categorys WHERE cate_id=$cid";
        $result = $conn->query($sql);
        $rs = $result->fetch_array();
        $cid = $rs['cate_id'];
        $cn = $rs['cate_name'];
        ?>
            <form class="form" action="" method="POST">
                <div class="form-inline">
                    <input for="cate_name" name="cate_name" placeholder="กรุณาเลือกประเภทสินค้าที่ต้องการแก้ไข " value="<?=$cn?>">
                    <input type="hidden" name="cate_id" value="<?=$cid?>">
                    <br>
                    <button type="submit" class="btn btn-outline-light me-2" value="OK!"><i class="fa fa-paper-plane-o" aria-hidden="true"></i>submit!</button>

                </div>
            </form>
    </body>

    </html>
    <?php
} else {
    header('location:../index.php');
    echo $_SESSION['user_level'];
}
?>