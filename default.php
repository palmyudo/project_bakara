<?php
session_start();
require('db.php');
$per = checkpermis();
if ($per == 1)
    go("index.php");
else
    go("login.php");


?>