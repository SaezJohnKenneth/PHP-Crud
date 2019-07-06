<?php 
    include 'connect.php';
    include 'employee.php';
    $emp = new Employee;
    $emp->ID = $_POST["ID"];
    $emp->EmployeeName = $_POST["empName"];
    $emp->Address = $_POST["empAddress"];
    $emp->Position = $_POST["empPosition"];

    $sql = "UPDATE employee SET EmployeeName='$emp->EmployeeName',EmployeeAddress='$emp->Address',Position='$emp->Position' WHERE ID = $emp->ID";
    if($conn->query($sql) === TRUE){
        echo "Updated";
    }
    else{
        echo "Error updating record: " . $conn->error;
        $conn->close();
    }
?>