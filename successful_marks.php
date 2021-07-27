<?php
  $con = mysqli_connect("localhost","root","","rps")
  or die(mysqli_error($con));

  $enroll_no = $_POST['enroll_no'];
  //echo $enroll_no;

  $roll_no = $_POST['roll_no'];

  $str1 = substr($enroll_no,0,4);
  $num = (int)$str1;
  $num = $num + 1;
  $str2 = (string)$num;
  $str3 = substr($str2,2,2);
  $a_session = $str1."-".$str3;

  $select_query="select semester,dept_no from student_status where enroll_no='$enroll_no'";

  $select_query_result = mysqli_query($con,$select_query)
  or die(mysqli_error($err));
  

  $row = mysqli_fetch_array($select_query_result);
  //echo $row['semester'];
  //echo $row['dept_no'];
  $dept_no = $row['dept_no'];
  $semester = $row['semester'];
  if($semester==1 || $semester==2){
    $dept_no=0;
    //echo $dept_no;
  } 

  //$select_query2="select course_code, course_name from course where (dept_no,semester) in (select dept_no,semester from student_status where enroll_no='$enroll_no') and session_code='$a_session'";
  $select_query2="select course_code, course_name from course where dept_no='$dept_no' and semester='$semester' and session_code='$a_session'";
  $select_query_result2 = mysqli_query($con,$select_query2)
  or die(mysqli_error($err));
  //die($select_query2);
  $i=0;
  $tch=0;
  $tcp=0;

  while($row1=mysqli_fetch_array($select_query_result2)){

    $marks[$i]=array();
    
    $course_code = $row1['course_code'];



    //$select_query3="select cht,chp from course where dept_no='$dept_no'";
    $select_query3="select cht,chp from course where dept_no='$dept_no' and semester='$semester' and session_code='$a_session' and course_code='$course_code'";
    //die($select_query3);
    $select_query_result3 = mysqli_query($con,$select_query3)
    or die(mysqli_error($err));

    $row3=mysqli_fetch_array($select_query_result3);
//    echo $row3['cht'];
  //  echo $row3['chp'];

    $cht = $row3['cht'];
    $chp = $row3['chp'];


    $tch=$tch+$cht+$chp;

    //echo $tch.'<br>';

    $marks[$i][0]=$_POST['marks'.$i.'0'];

    if($chp==0){
      $marks[$i][1]=-1;
      //echo $marks[$i][1];
    }else{
      $marks[$i][1]=$_POST['marks'.$i.'1'];
    }

    if($cht==0){
      $marks[$i][2]=-1;
    }else{
      $marks[$i][2]=$_POST['marks'.$i.'2']; 
    }
    //echo $_POST['marks'.$i.'1'];
    //$marks[$i][1]=$_POST['marks'.$i.'1'];
    //$marks[$i][1]=0;
    //$marks[$i][2]=$_POST['marks'.$i.'2'];

    $theory=$marks[$i][2];
    $practical=$marks[$i][1];
    $midterm=$marks[$i][0];

    if($practical==-1){
      $total_theory=$marks[$i][0]+$marks[$i][2];  
      $total_practical=$marks[$i][1];
      $total=$total_theory;
      $grade_point=$total/10;
      $credit_point = $grade_point * ($cht+$chp);

      $tcp=$tcp+$credit_point;
      //echo $tcp.'<br>';
      $status = 1;
      $query4 = "insert into marks(enroll_no,course_code,theory,midterm,total_theory,grade_point,credit_point,status,dept_no,session_code) values ('$enroll_no','$course_code','$theory','$midterm','$total_theory','$grade_point','$credit_point','$status','$dept_no','$a_session')";
    
    }else if($theory==-1){
      $total_theory=$marks[$i][2];
      $total_practical=$marks[$i][0]+$marks[$i][1];
      $total=$total_practical;
      $grade_point=$total/10;
      $credit_point = $grade_point * ($cht+$chp);
      $tcp=$tcp+$credit_point;
      //echo $tcp.'<br>';
      $status = 1;    
      $query4 = "insert into marks(enroll_no,course_code,practical,midterm,total_practical,grade_point,credit_point,status,dept_no,session_code) values ('$enroll_no','$course_code','$practical','$midterm','$total_practical','$grade_point','$credit_point','$status','$dept_no','$a_session')";
    }else{      
      $total_theory=$marks[$i][0]+$marks[$i][2];
      $total_practical=$marks[$i][1];
      $total=$total_theory+$total_practical;
      $grade_point=$total/10;
      $credit_point = $grade_point * ($cht+$chp);
      $tcp=$tcp+$credit_point;
      //echo $tcp.'<br>';
      $status = 1;
      $query4 = "insert into marks(enroll_no,course_code,theory,practical,midterm,total_theory,total_practical,grade_point,credit_point,status,dept_no,session_code) values ('$enroll_no','$course_code','$theory','$practical','$midterm','$total_theory','$total_practical','$grade_point','$credit_point','$status','$dept_no','$a_session')";
      //die($query4);
    }

    //$course_code = $row1['course_code'];
    //$dept_no = $row['dept_no'];
    //$semester = $row['semester'];


    //$select_query3="select cht,chp from course where dept_no='$dept_no'";
    //$select_query3="select cht,chp from course where dept_no='$dept_no' and semester='$semester' and session_code='$a_session' and course_code='$course_code'";
    //die($select_query3);
    //$select_query_result3 = mysqli_query($con,$select_query3)
    //or die(mysqli_error($err));

    //$row3=mysqli_fetch_array($select_query_result3);
    //echo $row3['cht'];
    //echo $row3['chp'];

    //$cht = $row3['cht'];
    //$chp = $row3['chp'];

    //$total=$total_theory+$total_practical;
    //$grade_point=$total/10;

    //$credit_point = $grade_point * ($cht+$chp);

    //$status = 1;

    //$query4 = "insert into marks(enroll_no,course_code,theory,practical,midterm,total_theory,total_practical,grade_point,credit_point,status,dept_no) values ('$enroll_no','$course_code','$theory','$practical','$midterm','$total_theory','$total_practical','$grade_point','$credit_point','$status','$dept_no')";
    //die($query4);


    $query_submission = mysqli_query($con,$query4)
    or die(mysqli_error($con));
  
    $i=$i+1;
  }

  // $marks = array();
  // $i=0;
  // while($i!=2){
  //   $marks[$i]=array();

  //   $marks[$i][0]=$_POST['marks'.$i.'0'];
  //   $marks[$i][1]=$_POST['marks'.$i.'1'];
  //   $marks[$i][2]=$_POST['marks'.$i.'2'];
  //   //$marks[$i][3]=$_POST['marks'.$i.'3'];

  //   $i=$i+1;
  // }

  // print_r($marks);

  // $enroll_no = $_POST['enroll_no'];
  // $course_code = $_POST['course_code'];  
  // $theory = $_POST['theory'];
  // $practical = $_POST['practical'];  
  // $midterm = $_POST['midterm'];
  // $total_theory = $_POST['total_theory'];  
  // $total_practical = $_POST['total_practical'];
  // $grade_point = $_POST['grade_point'];  
  // $credit_point = $_POST['credit_point'];
  // $status = $_POST['status'];
  // $dept_no = $_POST['dept_no'];
  // $session_code = $_POST['session_code'];

  // $query = "insert into marks(enroll_no,course_code,theory,practical,midterm,total_theory,total_practical,grade_point,credit_point,status,dept_no,session_code) values ('$enroll_no','$course_code','$theory','$practical','$midterm','$total_theory','$total_practical','$grade_point','$credit_point','$status','$dept_no','$session_code')";
   
  // $query_submission = mysqli_query($con,$query)
  //  or die(mysqli_error());

    $sgpa = $tcp/$tch;
    $sgpa = round($sgpa,2);
    if($semester==1){
      $tcpas=$tcp;
      $tchas=$tch;
      $ogpa=$tcpas/$tchas;

      $query5="insert into result_table (enroll_no,roll_no,semester,academic_year,sgpa,ogpa,tch,tcp,tchas,tcpas) values ('$enroll_no','$roll_no','$semester','$a_session','$sgpa','$ogpa','$tch','$tcp','$tchas','$tcpas')";
      $query5_submission = mysqli_query($con,$query5)
      or die(mysqli_error($con));
    }else{
      $previous_semester=$semester-1;
      $select_query4="select tcpas,tchas from result_table where enroll_no='$enroll_no' and semester='$previous_semester'";
      $select_query_result4=mysqli_query($con,$select_query4)
      or die(mysqli_error($con));

      $row4=mysqli_fetch_array($select_query_result4);

      $tcpapeb= $row4['tcpas'];
      $tchapeb= $row4['tchas'];

      $tcpas=$tcp+$tcpapeb;
      $tchas=$tch+$tchapeb;
      $ogpa=$tcpas/$tchas;

      $query5="insert into result_table (enroll_no,roll_no,semester,academic_year,sgpa,ogpa,tch,tcp,tchapeb,tcpapeb,tchas,tcpas) values ('$enroll_no','$roll_no','$semester','$a_session','$sgpa','$ogpa','$tch','$tcp','$tchapeb','$tcpapeb','$tchas','$tcpas')";
      $query5_submission = mysqli_query($con,$query5)
      or die(mysqli_error($con));
    }

    if($semester%2==0){
      $str1 = substr($enroll_no,0,4);
      $num = (int)$str1;
      $num = $num + 1;
      $str2 = (string)$num;
      $str3 = substr($str2,2,2);
      $num1 = (int)$str3;
      $num2 = $num1+1;
      $str4 = (string)$num2;
      $a_year = $str2."-".$str4;

      $new_sem = $semester+1;
      $query6="update student_status set semester='$new_sem',a_year='$a_year' where enroll_no='$enroll_no'";
      $query6_submission = mysqli_query($con,$query6)
      or die(mysqli_error($con));

    }else{
      $new_sem = $semester+1;
    $query6="update student_status set semester='$new_sem' where enroll_no='$enroll_no'";
    $query6_submission = mysqli_query($con,$query6)
    or die(mysqli_error($con));
    }
   echo '<h1>Marks Data successfully inserted</h1>';
?>