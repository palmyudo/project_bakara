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
    <title>Bakara</title>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link href="bootstrap-5.0.2-dist/css/headers.css" rel="stylesheet">
</head>
<body>
<div class="container">
  <?php
  require_once("menu.php");
  ?>

   <table align="center" border="3" class="table table-striped">
        <tr>
        <th>สินค้า</th>
        <th>รูปสินค้า</th>
        <th>ประเภทสินค้า</th>
        <th>จำนวนสินค้า</th>
        <th>ราคาสินค้า</th>  
        <th>สั่งซื้อสินค้า</th>
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
       <?= number_format($rs['product_price']) ; ?>
   </td>
   <td><a type='button' class='btn btn-outline-primary me-2' href='order/order.php?p_id=<?=$pid?>'>เพิ่มลงตะกร้า</a></td>
   <?php
}
    
    $conn->close();
    ?>
    </table>
</div>
</body>
</html>