<?php
  $con = mysqli_connect("localhost","root","","rps")
  or die(mysqli_error($con));

  $course_code = $_POST['course_code'];
  $course_name = $_POST['course_name'];  
  $cht = $_POST['cht'];
  $chp = $_POST['chp'];  
  $mmt = $_POST['mmt'];
  $mmp = $_POST['mmp'];  
  $mmm = $_POST['mmm'];
  $dept_no = $_POST['dept_no'];  
  $semester = $_POST['semester'];  
  $session_code = $_POST['session_code'];

  $query = "insert into course(course_code,course_name,cht,chp,mmt,mmp,mmm,dept_no,semester,session_code) values ('$course_code','$course_name','$cht','$chp','$mmt','$mmp','$mmm','$dept_no','$semester','$session_code')";
  
  $query_submission = mysqli_query($con,$query)
   or die(mysqli_error());

   echo "Data successfully inserted";
?>