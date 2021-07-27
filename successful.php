<?php
  $con = mysqli_connect("localhost","root","","rps")
  or die(mysqli_error($con));

  $start_year = $_POST['start_year'];
  //$end_year = $_POST['end_year'];  

  $str1 = substr($start_year,0,4);
  $str2 = substr($start_year,5,2);
  $num1 = (int)$str1;
  $num1 = $num1 + 3;
  $num2 = (int)$str2;
  $num2 = $num2 + 3;
  $str3 = (string)$num1;
  $str4 = (string)$num2;
  $end_year = $str3."-".$str4;

  $query = "insert into academic_session(start_year,end_year) values ('$start_year','$end_year')";
  
  $query_submission = mysqli_query($con,$query)
   or die(mysqli_error());

   echo "Data successfully inserted";
?>