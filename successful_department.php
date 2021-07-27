<?php
  $con = mysqli_connect("localhost","root","","rps")
  or die(mysqli_error($con));

  $dept_name = $_POST['dept_name'];
  $dept_no = $_POST['dept_no'];  

  $query = "insert into department(dept_no,dept_name) values ('$dept_no','$dept_name')";
  
  $query_submission = mysqli_query($con,$query)
   or die(mysqli_error());

   echo "Data successfully inserted";
?>