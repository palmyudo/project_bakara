<?php
    session_start();
    require_once('../db.php');
    if(!isset($_SESSION["intLine"])) {
    $_SESSION ["intLine"] = 0;
    $_SESSION["strProductID"][0] = $_GET["p_id"];
    $_SESSION["strQty"][0] = 1;
    header("location:../cart.php");
    // echo 1;
    }
    else {
    $key = array_search($_GET["p_id"],$_SESSION["strProductID"]);
    if ((string) $key != "")
    {
        $_SESSION["strQty"][$key] = $_SESSION["strQty"][$key] + 1;
        // echo 2;

    } else {
        $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
        $intNewLine = $_SESSION["intLine"];
        $_SESSION["strProductID"][$intNewLine] = $_GET["p_id"];
        $_SESSION["strQty"][$intNewLine] = 1;
        // echo 3;
    }
    header("location:../cart.php");
    // echo 4;
    }


?>

<