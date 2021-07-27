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
<br><br><br>
<div class="row">
       <h1 class="text-center">RESULT PROCESSING SYSTEM</h1>
       <br>
       <div class="col-lg-2"></div>
       <div class="col-lg-8">

       <div class="d-grid gap-2">
          <a href="academic_session.php" class="btn btn-secondary m-3 btn-lg">Add Academic Session</a>
          <a href="student.php" class="btn btn-primary m-3 btn-lg">Add Student</a>
          <a href="course.php" class="btn btn-success m-3 btn-lg">Add Subjects</a>
      </div>

       <div class="col-lg-2"></div>
</div>

<br><br><br><br>
<div class="row">
       <div class="col-lg-2"></div>
       <div class="col-lg-8">
            <div class="d-grid gap-2">
              <button class="btn btn-danger m-3 btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Marks</button>
              <a href="department.php" class="btn btn-warning m-3 btn-lg">Add Department</a>
              <a class="btn btn-danger m-3" data-bs-toggle="modal" data-bs-target="#resultModal" class="btn btn-info m-3 btn-lg">View Result</a>
            </div>
            <!-- <a class="btn btn-dark m-3" data-bs-toggle="modal" data-bs-target="#studentStatus">Student Status</a></div> -->
       <div class="col-lg-2"></div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="marks.php">
                    
          <div  class="form-group">
              <label for="enroll_no">Enrollnment Number</label>
              <input type="text" class="form-control" name="enroll_no">
          </div>
          <!-- <div  class="form-group">
              <label for="enroll_no">Enrollnment Number</label>
              <input type="text" class="form-control" name="enroll_no">
          </div> -->
          <br> 

         <input type="submit" class="btn btn-primary">
        </form>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="resultModalLabel">Result</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="result.php">
                    
          <div  class="form-group">
              <label for="enroll_no">Enrollnment Number</label>
              <input type="text" class="form-control" name="enroll_no">
          </div>
          <!-- <div  class="form-group">
              <label for="enroll_no">Enrollnment Number</label>
              <input type="text" class="form-control" name="enroll_no">
          </div> -->
          <br> 

          <div  class="form-group">
              <label for="semester">Semester</label>
              <select class="form-select" aria-label="Default select example" id="semester" name="semester">
                <option selected>Select Semester</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
              </select>
              <!-- <input type="text" class="form-control" name="semester"> -->
          </div>

          <br>

         <input type="submit" class="btn btn-primary">
        </form>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="studentStatus" tabindex="-1" aria-labelledby="studentStatusLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="studentStatusLabel">Student Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="student_status.php">
                    
          <div  class="form-group">
              <label for="enroll_no">Enrollnment Number</label>
              <input type="text" class="form-control" name="enroll_no">
          </div>
          <!-- <div  class="form-group">
              <label for="enroll_no">Enrollnment Number</label>
              <input type="text" class="form-control" name="enroll_no">
          </div> -->
          <br> 

         <input type="submit" class="btn btn-primary">
        </form>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

</body>
</html>