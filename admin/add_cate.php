<?php
session_start();
if (isset($_SESSION['user_level']) && $_SESSION['user_level'] == 0) {
    require_once('../db.php');
    if (isset($_REQUEST['cate_name']) && trim($_REQUEST['cate_name']) != "") {
        $sql = "SELECT cate_name FROM categorys WHERE cate_name = ' " . trim($_REQUEST['cate_name']) . "'";
        // echo $sql;
        // die();
        $result = $conn->query($sql);
        // echo "$sql";

        if ($result->num_rows == 0) {
            $sql = "INSERT INTO categorys(cate_name) VALUES ('" . trim($_REQUEST['cate_name']) . "')";
            $result = $conn->query($sql);
            header('location:../admin.php');
        } else {
            // alert('เฮ้ย! สินค้านี้มีอยู่แล้วนะจ๊ะ');
            header("location:../add_cate.php");
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">

            <form class="from" action="" method="get">
                <div class="from-inline">
                    <input for="cate_name" name="cate_name" placeholder="กรุณาป้อนชื่อประเภทสินค้า ">ประเภทสินค้า</input>
                    <br>
                    <button type="submit" class="btn btn-outline-light me-2" value="OK!"><i class="fa fa-paper-plane-o" aria-hidden="true"></i>submit!</button>

                </div>
            </form>
    </body>

    </html>
<?php
} else {
    header('location:../index.php');
    // echo $_SESSION['user_level'];
}
?>