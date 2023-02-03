<?php
session_start();
require_once('../db.php');
if (checkpermis() != 0) {
    go("../default.php");
}
if (isset($_GET['product_id']) && trim($_GET['product_id']) != "") {



    if (isset($_POST['product_id']) && trim($_POST['product_id']) != "") {
        $pid = $_POST['product_id'];
        $pn = trim($_POST['product_name']);
        $pp = $_POST['product_price'];
        $cid = $_POST['cate_id'];
        $pqty = $_POST['product_qty'];
        // echo $pqty;
        $sql = "SELECT * FROM productss WHERE product_id='" . $pid . "'";
        // echo "$sql";
        // echo "<br>";
        $result = $conn->query($sql);
        $rs = $result->fetch_array();
        // $conn ขอการเชื่อมต่อ querry สั่งทำงาน
        // echo $rs;
        if ($result->num_rows == 1) {
            $sql = "UPDATE productss  SET cate_id = '" . $cid . "',product_name = '" . $pn . "',product_price = '" . $pp . "',product_qty = '" . $pqty . "' WHERE product_id=$pid";
            $result = $conn->query($sql);
            // echo "$sql";
            
        } else {
            alert("ไม่มีสินค้าตัวนี้");
        }
    } ?>
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

        <body class="text-center">
            <div class="container">
                <?php
                $pid = $_GET['product_id'];
                $sql = "SELECT * FROM productss WHERE product_id = $pid";
                $result = $conn->query($sql);
                $rs = $result->fetch_array();
                $pid = $rs['product_id'];
                $pn = $rs['product_name'];
                $pp = $rs['product_price'];
                $pqty = $rs['product_qty'];

                ?>
                <form class="form " action="" method="POST">
                    <div class="form-inline">
                        <label for="cate_id">ชื่อของสินค้า</label>
                        <input type="text" name="product_name" placeholder="ชื่อของสินค้า" value="<?= $pn ?>" required>
                        <select name="cate_id" id="cate_id">
                            <?php
                            $sqlz = "SELECT * FROM categorys ORDER BY cate_name";
                            $resulti = $conn->query($sqlz);
                            while ($rsi = $resulti->fetch_array()) {
                                echo "<option value='" . $rsi['cate_id'] . "' >" . $rsi['cate_name'] . "</option>";
                            }
                            ?>
                        </select>
                        <input type="number" name="product_price" placeholder="ราคา" value="<?= $pp ?>" min="1" require>
                        <input type="number" name="product_qty" placeholder="จำนวน" value="<?= $pqty ?>" min="1" require>
                        <input type="hidden" name="product_id" value="<?= $pid ?>">
                    </div>
                    <br>
                    <button class="w-50 btn btn-lg btn-outline-primary" type="submit" value="ok">Add</button>
                    <br><br>
                    <a class="w-10 btn btn-lg btn-primary" href="../admin.php">Close</a>
                    <br>
                </form>
            </div>
       
        </body>

        </html>
<?php
    
}
else {
    go("../admin.php");
}
?>