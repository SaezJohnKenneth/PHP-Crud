<?php
    include 'connect.php';
    //select query
    if(isset($_GET['alias'])){
        $sql = "SELECT ID,`EmployeeName`,`EmployeeAddress`,`Position` FROM employee WHERE `EmployeeName` LIKE '".$_GET['alias']."%'";
    }
    else{
        $sql = "SELECT ID,`EmployeeName`,`EmployeeAddress`,`Position` FROM employee";
    }
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$row['ID']."</td>";
            echo "<td>".$row['EmployeeName']."</td>";
            echo "<td>".$row['EmployeeAddress']."</td>";
            echo "<td>".$row['Position']."</td>";
            echo "<td><a href='update.php?id=".$row['ID']."'>Update</a> | <a href='delete.php?id=".$row['ID']."'>Delete</a></td>";
            echo "<tr>";
        }
    }
    else{
        echo "<tr><td colspan='4'>0 Results</td></tr>";
    }
    $conn->close();
?>