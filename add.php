<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <h2>Add new Employee</h2>
            <form action="addaction.php" method="POST">
                <div class="form-group">
                    <label>
                        Employee Name
                    </label>
                    <input type="text" name="empName" class="form-control">
                </div>
                <div class="form-group">
                    <label>
                        Employee Address
                    </label>
                    <input type="text" name="empAddress" class="form-control">
                </div>
                <div class="form-group">
                    <label>
                        Position
                    </label>
                    <input type="text" name="empPosition" class="form-control">
                </div>
                <div class="button-group">
                    <input type="submit" class="btn btn-primary" value="Add Employee"/> <button type="button" id="back" class="btn btn-danger">Cancel</button> 
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
                url: "addemployee.php",
                success: function(response){
                    if(response==="Added"){
                        alert("Employee Added!");
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