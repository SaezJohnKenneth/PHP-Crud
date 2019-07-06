<?php
    $username = "root";
    $password = "";
    $dbName = "employees";
    $server = "127.0.0.1";

    $conn = new mysqli($server,$username,$password,$dbName);
    if($conn->connect_error){
        die("Connection Error : ".$conn->connect_error);
    }
    else{
        //do nothing
    }
?>
