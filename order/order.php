<?php
    session_start();
    require_once('../db.php');
    if(!isset($_SESSION["intLine"])) {
    $_SESSION ["intLine"] = 0;
    $_SESSION["strProductID"][0] = $_GET["p_id"];
    $_SESSION["srtQty"][0] = 1;
    header("location:../cart.php");
    }
    else {
    $key = array_search($_GET["p_id"], $_SESSION["strProductID"]);
    if ((string) $key != "")
    {
        $_SESSION["srtQty"][$key] = $_SESSION["srtQty"][$key] + 1;

    } else {
        $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
        $intNewLine = $_SESSION["intLine"];
        $_SESSION["strProductID"]["$intNewLine"] = $_GET["p_id"];
        $_SESSION["srtQty"]["$intNewLine"] = 1;
    }
    header("location:../cart.php");
    }


?>