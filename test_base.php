<?php
 
    $password = "asldfjlskajd324";
     
    $base64_encode = base64_encode( $password );
     
    echo "Original Password = ".$password;
    echo "<br/>";
    echo "Encode with Base64 = ".($base64_encode);
    echo "<br/>";
     
    $base64_decode = base64_decode( $base64_encode );
    echo "Decode with Base64 = ".($base64_decode);
 
?>