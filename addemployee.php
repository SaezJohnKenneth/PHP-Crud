<?php
    include 'connect.php';
    include 'employee.php';

    $emp = new Employee;
    $emp->EmployeeName = $_POST["empName"];
    $emp->Address = $_POST["empAddress"];
    $emp->Position = $_POST["empPosition"];

    $sql = "INSERT INTO employee(EmployeeName,EmployeeAddress,Position,MangerID) VALUES('$emp->EmployeeName','$emp->Address','$emp->Position',1)";

    if($conn->query($sql)===TRUE){
        echo "Added";
    }
    else{
        echo "Error inserting record: " . $conn->error;
        $conn->close();
    }
?>