<?php
  $con = mysqli_connect("localhost","root","","rps")
  or die(mysqli_error($con));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result Processing System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <style>
       body{
        background-color: #ffffff;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='160' height='160' viewBox='0 0 200 200'%3E%3Cpolygon fill='%23DCEFFA' points='100 0 0 100 100 100 100 200 200 100 200 0'/%3E%3C/svg%3E");
       }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <form method="post" action="successful_course.php">
                    <div  class="form-group">
                        <label for="course_code">Course Code</label>
                        <input type="text" class="form-control" name="course_code">
                    </div>
                    <div  class="form-group">
                        <label for="course_name">Course Name</label>
                        <input type="text" class="form-control" name="course_name">
                    </div>
                    <div  class="form-group">
                        <label for="cht">Credit Hour Theory</label>
                        <input type="text" class="form-control" name="cht">
                    </div>
                    <div  class="form-group">
                        <label for="chp">Credit Hour Practical</label>
                        <input type="text" class="form-control" name="chp">
                    </div>
                    <div  class="form-group">
                        <label for="mmt">Maximum Marks Theory</label>
                        <input type="text" class="form-control" name="mmt">
                    </div>
                    <div  class="form-group">
                        <label for="mmp">Maximum Marks Practical</label>
                        <input type="text" class="form-control" name="mmp">
                    </div>
                    <div  class="form-group">
                        <label for="mmm">Maximum Marks Mid Term</label>
                        <input type="text" class="form-control" name="mmm">
                    </div>
                    <div class="form-group">
                        <label for="dept_no">Department No</label>
                        <input type="text" class="form-control" name="dept_no">
                    </div>
                    <div class="form-group">
                        <label for="semester">Semester</label>
                        <input type="text" class="form-control" name="semester">
                    </div>    
                    <div  class="form-group">
                        <label for="session_code">Session code</label>
                        <input type="text" class="form-control" name="session_code">
                    </div>                  
                    <input type="submit" class="btn btn-primary">
                </form>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
</body>
</html>