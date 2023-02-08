<?php
session_start();
if (isset($_SESSION["login_name"])) {
    require_once('db.php');
    if (isset($_SESSION["intLine"]) != "") {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
            <link href="bootstrap-5.0.2-dist/css/headers.css" rel="stylesheet">
            <title>Document</title>
        </head>

        <body>
            <div class="container">
                <?php
                require_once("menu.php");
                ?>
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md -10">
                            <table class="table table-hover">
                                <tr>
                                    <th>ลำดับที่</th>
                                    <th>ชื่อสินค้า</th>
                                    <th>ราคา</th>
                                    <th>จำนวน</th>
                                    <th>ราคารวม</th>
                                    <th>ลบรายการ</th>
                                </tr>
                                <?php
                                $Total = 0;
                                $sumall = 0;
                                $ord = 1;
                                for ($i = 0; $i <= (int)$_SESSION["intLine"]; $i++) {
                                    if (($_SESSION["strProductID"][$i]) != "") {
                                        $sql1 = "SELECT * FROM productss WHERE product_id='" . $_SESSION["strProductID"][$i] . "' ";
                                        $result1 = $conn->query($sql1);
                                        $rs_pro = $result1->fetch_array();

                                        $_SESSION["price"][$i] = $rs_pro['product_price'];
                                        $Total = $_SESSION["strQty"][$i];
                                        $sump = $Total * $_SESSION['price'][$i];
                                        $sumall = $sumall + $sump;
                                ?>
                                        <tr>
                                            <td><?= $ord ?></td>
                                            <td><?= $rs_pro['product_name'] ?></td>
                                            <td><?= $rs_pro['product_price'] ?></td>
                                            <td><?= $_SESSION["strQty"][$i] ?></td>
                                            <td><?= $sump ?></td>
                                            <td><a  class="btn btn-outline-primary me-2" href="order/pro_delete.php?Line=<?= $i ?>">Delete</a></td>
                                        </tr>
                                <?php
                                        $ord++;
                                    }
                                }
                                ?>
                                <tr>
                                    <td>รวมเป็นเงิน</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                    <td><?= $sumall ?></td>
                                    <td>บาท</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </form>
                <div style="text-align:right">
                    <a href="index.php"><button type="button" class="btn btn-outline-primary me-2">เลือกสินค้า</button></a>
                    <button type="button" class="btn btn-primary me-2">ยืนยันคำสั่งซื้อ</button>
                </div>
            </div>
        </body>

        </html>
<?php
    } else {
        header('location:index.php');
    }
} else {
    header('location:login.php');
}


?>