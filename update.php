<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
            include 'connect.php';
            include 'employee.php';

            $id = $_GET["id"];
            if($id==null){
                die("Something went wrong. I think you forced to redirect here via url");
            }
            else{
                //Update the data
                $sql = "SELECT * FROM employee WHERE ID = $id";
                $result = $conn->query($sql);
                $emp = new Employee;
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc())
                    {
                        $emp->EmployeeName = $row['EmployeeName'];
                        $emp->Address = $row['EmployeeAddress'];
                        $emp->Position = $row['Position'];   
                    }
                }
                else{
                    echo "There is no going to update.";
                }
            }
        ?>
        <div class="container">
            <h2>Update Employee</h2>
            <form action="updateaction.php" method="POST">
                <input type="text" value = "<?php echo $id?>" hidden="true" name="ID">
                <div class="form-group">
                    <label>
                        Employee Name
                    </label>
                    <input type="text" name="empName" value="<?php echo $emp->EmployeeName?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>
                        Employee Address
                    </label>
                    <input type="text" name="empAddress" value="<?php echo $emp->Address?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>
                        Position
                    </label>
                    <input type="text" name="empPosition" value="<?php echo $emp->Position?>" class="form-control">
                </div>
                <div class="button-group">
                    <input type="submit" class="btn btn-primary" value="Update Employee"/> <button type="button" id="back" class="btn btn-danger">Cancel</button> 
                </div>
            </form>
        </div>
    </body>
    <script type="text/javascript">
        $(document).ready(function(){
            $('form').on('submit',function (e){
                e.preventDefault();
                $.ajax({
                type: "post",
                data: $('form').serialize(),
                url: "updateaction.php",
                success: function(response){
                    if(response==="Updated"){
                        alert("Employee Updated!");
                        window.location.href='index.php';
                    }
                    else{
                        alert("Something Went wrong. Please try again : " + response);
                    }
                    
                }
            });
            });

            $('#back').click(function (){
                window.location.href='index.php';
            });
        });
    </script>
</html>