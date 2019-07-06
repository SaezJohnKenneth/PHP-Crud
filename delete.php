<?php
    include 'connect.php';
    $id = $_GET["id"];

    $sql = "DELETE FROM employee WHERE ID = $id";
    if($conn->query($sql)===TRUE){
        header("Location:index.php");
    }
    else{
        echo "Error in deleting";
        $conn->close();
    }
?>