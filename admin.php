<?php
    session_start();
    if (isset($_SESSION['user_level']) && $_SESSION['user_level'] == 0) {
    require_once("db.php");
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
<?php
    require_once("menu.php");
?>
    <h1>ผู้ก่อตั้ง</h1>
    <table align="center" border="3" class="table table-striped">
        <tr>
        <th>สินค้า</th>
        <th>รูปสินค้า</th>
        <th>ประเภทสินค้า</th>
        <th>จำนวนสินค้า</th>
        <th>ราคาสินค้า</th>  
        <th>แก้ไขข้อมูลสินค้า</th>
        </tr>
    
    <?php
 $sql = "SELECT p. *,c.cate_name 
 FROM productss p INNER Join categorys c ON p.cate_id = c.cate_id ORDER by product_name  ";

    
        
 $result = $conn->query($sql);
 while ($rs = $result->fetch_array()) {
   $cid = $rs['cate_id'];
   $pid = $rs['product_id'];
    $pn = $rs['product_name'];
    ?>  
    <tr>

   
    <td>
        <?= $rs['product_name']; ?>
    </td>
    <td></td>
    <td>
        <?=$rs['cate_name']; ?>
    </td>
    <td>
        <?=$rs['product_qty']; ?>
    </td>
    <td>
        <?=$rs['product_price']; ?>
    </td>
    <td>
        <?php echo "<a type='button' class='btn btn-outline-primary me-2' href='admin/edit_cate.php?product_id=$pid'>edit</a>"; 
        echo "<a type='button' class='btn btn-outline-primary me-2' href='admin/delete_product.php?product_id=$pid'>delete</a>";
        ?>
    </td>

    </tr>
        
    <?php
}
    
    $conn->close();

} else {
    header('location:index.php');
}
    ?>
    <td><a type='button' class='btn btn-outline-primary me-2' href='admin/add_product.php'>add-product</a></td>
    <td></td>
    <td><a type='button' class='btn btn-outline-primary me-2' href='admin/add_cate.php'>add-category</a><a type='button' class='btn btn-outline-primary me-2' href='admin/edit_cate.php'>edit</a> </td>
    <td></td>
    </table>

</body>
</html>
