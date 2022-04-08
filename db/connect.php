<?php
    $sever = "localhost";
    $user = "root";
    $password = "";
    $database = "trai_cay";

    $connection = mysqli_connect($sever, $user, $password);
    if(!$connection){
        error_log("Fail to connect to MySQL: " .mysqli_error($$connection));
        die('Internal sever error');
    }

    $db_select = mysqli_select_db($connection, $database);
    if(!$db_select){        
        error_log("Database selection failed: " .mysqli_error($connection));
        die("Internal sever error");
    }
?>