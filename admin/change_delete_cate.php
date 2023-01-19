<?php
session_start();
if (isset($_SESSION['user_level']) && $_SESSION['user_level'] == 0) {
    require_once('../db.php');
    if (isset($_GET['cate_id'])) {
        $id = $_GET['cate_id'];
        $sql = "DELETE FROM categorys WHERE cate_id='$id'";
        if ($result = $conn->query($sql) == true) {
            echo ('การลบสำเร็จ');
            header('location:../admin.php');
        } else {
            echo ('การลบผิดพลาด');
            header('location:../admin.php');
        }
    } ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>

    <body class="text-center">
        <div class="container">
            <!-- nav bar -->
            <?php
            require_once('../menu.php');
            ?>
            <div class="alert alert-primary" role="alert">Category</div>
            <table class="table table-striped">
                <tr>
                    <th>ประเภทสินค้า</th>
                    <th></th>
                    <th>แก้ไข,ลบ</th>
                    <th></th>
                </tr>
                <?php
                $sql = "SELECT * FROM categorys ORDER BY cate_id";
                $result = $conn->query($sql);
                while ($rs = $result->fetch_array()) {
                    $cid = $rs['cate_id'];
                ?>
                    

                    <tr>

                        <td>
                            <?php
                            echo $rs['cate_name'];
                            ?>
                        </td>
                        <td></td>
                        <td>
                            <?php
                            echo "<a type='button'  class='btn btn-outline-primary ' href='edit_cate.php?cate_id=$cid'>EDIT</a>";
                            // echo $_SESSION['user_level'];
                            echo " ";
                            echo "<a type='button'  class='btn btn-primary ' href='change_delete_cate.php?cate_id=$cid'>DELETE</a>";
                            ?>
                        </td>
                        <td></td>
                    </tr>


                <?php
                }
                ?>
                <td>
                    <a type="button" class='btn btn-outline-primary' href='add_cate.php'>add-catagory</a>
                    <a type="button" class='btn btn-primary' href="../admin.php">Close</a>
                </td>
                <td></td>
                <td></td>
                <td></td>
        </div>
    </body>

    </html>

<?php  } else {
    header('location:../index.php');
}
?>