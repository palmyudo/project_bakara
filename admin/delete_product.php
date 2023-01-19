<?php
session_start();
if (isset($_SESSION['user_level'])  == 0) { 
    require_once('../db.php');
    if (isset($_GET['product_id'])) {
        $id = $_GET['product_id'];
        $sql = "DELETE FROM productss WHERE product_id='$id'";
        if ($result = $conn->query($sql) == true) {
            header('location:../admin.php');
        } else {
            header('location:../admin.php');
        }
    } else {
        header('location: ../admin.php');
    }
} else {
    header('location: ../index.php');

}

?>