<?php
  $con = mysqli_connect("localhost","root","","rps")
  or die(mysqli_error($con));

  $enroll_no = $_POST['enroll_no'];
  $stu_name = $_POST['stu_name'];  
  $stu_fathers_name = $_POST['stu_fathers_name'];
  $stu_mothers_name = $_POST['stu_mothers_name'];  
  $email = $_POST['email'];
  $phone = $_POST['phone'];  
  $gender = $_POST['gender'];
  $address = $_POST['address'];  
  $dob = $_POST['dob'];
  $degree_name = $_POST['degree_name'];
  $dept_no = $_POST['branch'];

  $query = "insert into student(enroll_no,stu_name,stu_fathers_name,stu_mothers_name,email,phone,gender,address,dob,degree_name) values ('$enroll_no','$stu_name','$stu_fathers_name','$stu_mothers_name','$email','$phone','$gender','$address','$dob','$degree_name')";

  $query_submission = mysqli_query($con,$query)
   or die(mysqli_error($con));

   $str1 = substr($enroll_no,0,4);
   $num = (int)$str1;
   $num = $num + 1;
   $str2 = (string)$num;
   $str3 = substr($str2,2,2);
   $a_year = $str1."-".$str3;

   $semester = 1;
  $query2 = "insert into student_status(enroll_no,a_year,semester,dept_no) values ('$enroll_no','$a_year','$semester','$dept_no')";

  $query_submission2 = mysqli_query($con,$query2)
   or die(mysqli_error($con));
   echo "Data successfully inserted";
?>