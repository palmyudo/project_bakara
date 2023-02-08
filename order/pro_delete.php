<?php
session_start();
require_once('../db.php');
if (isset($_GET["Line"]))
    $Line = $_GET["Line"];
$_SESSION["strProductID"][$Line] = "";
$_SESSION["strQty"][$Line] = "";
go('../cart.php');



?>