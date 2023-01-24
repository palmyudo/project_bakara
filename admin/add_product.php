<?php
session_start();
if (isset($_SESSION['user_level']) && $_SESSION['user_level'] == 0) {
    require_once('../db.php');
    if (isset($_POST['product_name']) && trim($_POST['product_name']) != "") {
        $cate_id = $_POST['cate_id'];
        $product_qty = $_POST['product_qty'];
        $product_price = $_POST['product_price'];

        $sql = "SELECT product_name FROM productss WHERE product_name = '" . trim($_POST['product_name']) . "'";
        $result = $conn->query($sql);
        echo $sql;
        echo "<br>";
        echo $result->num_rows;


        if ($result->num_rows == 0) {
            $sql1 = "INSERT INTO productss(cate_id,product_name,product_price,product_qty) 
            VALUES($cate_id','" . trim($_POST['product_name']) . "'," . $product_price . "," . $product_qty . ",'')";
            $result1 = $conn->query($sql);
            $id = $conn->insert_id;
        }
        else{
            echo "มีชื่อสินค้าอยู่แล้ว";
        }
    }
    

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
        <title>Document</title>
    </head>

    <body class="text-center">
        <div class="container">

            <form class="form " action="" method="post" >

                <div class="form-inline">
                    <label for="cate_id">ประเภทสินค้า</label>
                    <select name="cate_id" id="cate_id">
                        <?php
                        $sql = "SELECT * FROM `categorys`";
                        $result = $conn->query($sql);
                        while($rs = $result->fetch_array()) {
                            echo "<option value='" . $rs['cate_id'] . "'>" . $rs['cate_name'] . "</option>";
                        }
                        ?>

                    </select>
                    <input type="text" name="product_name" placeholder="ชิ่อสินค้า" require>
                    <input type="number" name="product_price" min="1" max="1000" placeholder="ราคา" require>
                    <input type="number" name="product_qty" placeholder="จำนวน" min="1" require>
                    <br>
                 

                </div>
                <br>
                <button class="w-50 btn btn-lg btn-primary" type="submit" value="ok">Add</button>

                <br><br>
                <a type='button' class='btn btn-outline-primary me-2' href="../admin.php">Close</a>
                
            </form>


        </div>
    </body>

    </html>
<?php
} else {
    header("location:../index.php");
}
?>