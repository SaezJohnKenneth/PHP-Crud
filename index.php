<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div style="margin-bottom:5px;">
                <h1>Employee List CRUD Application</h1>
            </div>            
            <div style="margin-bottom:5px;">
                Search : <input type="text" id="search" name="search" class="form-control" placeholder="Search by employee name..."/>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Employee Name</th>
                        <th>Address</th>
                        <th>Position</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="employee">

                </tbody>
            </table>
            <button id="add" type="button" class="btn btn-primary">Add New</button>
        </div>
    </body>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#employee").html("<tr><td colspan='5'><center>Please wait. Loading list</center></td></tr>");
            $.ajax({
                type: "GET",
                url: "loaddata.php",             
                dataType: "html",   //expect html to be returned                
                success: function(response){                    
                    $("#employee").html(response); 
                    console.log(response);
                    //alert(response);
                }
            });
            $('#search').keyup(function (){
                gg = $('#search').val();
                console.log($('#search').val());
                $.ajax({
                    type: "GET",
                    url: "loaddata.php?alias=" + $('#search').val(),             
                    dataType: "html",   //expect html to be returned                
                    success: function(response){                    
                        $("#employee").html(response); 
                        console.log(response);
                        //alert(response);
                    }
                }); 
            });
            $('#add').click(function (){
                window.location.href='add.php';
            });
        });
    </script>
</html>