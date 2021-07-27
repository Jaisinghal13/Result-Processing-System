<?php
  $con = mysqli_connect("localhost","root","","rps")
  or die(mysqli_error($con));

  $enroll_no = $_POST['enroll_no'];

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
      $select_query2="select course_code, course_name from course where dept_no='$dept_no' and semester='$semester' and session_code='$a_session'";
  }else{
    $select_query2="select course_code, course_name from course where (dept_no,semester) in (select dept_no,semester from student_status where enroll_no='$enroll_no') and session_code='$a_session'";
  }

  
  $select_query_result2 = mysqli_query($con,$select_query2)
  or die(mysqli_error($err));

//   $row1 = mysqli_fetch_array($select_query_result2);
//   echo $row1['course_code'];
//   echo $row1['course_name'];

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
    <form method="post" action="successful_marks.php">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
           
                
                    <div class="form-group">
                        <label for="enroll_no">Enrollment No</label>
                        <?php echo '<input value="' . $enroll_no . '" type="text" class="form-control" name="enroll_no" >';  ?>
                    </div>
                    <!-- <div  class="form-group">
                        <label for="course_code">Course Code</label>
                        <input type="text" class="form-control" name="course_code">
                    </div>
                    <div  class="form-group">
                        <label for="course_code">Course Name</label>
                        <input type="text" class="form-control" name="course_code"> -->
                    <!-- </div>
                    <div  class="form-group">
                        <label for="theory">Theory</label>
                        <input type="text" class="form-control" name="theory">
                    </div>
                    <div  class="form-group">
                        <label for="practical">Practical</label>
                        <input type="text" class="form-control" name="practical">
                    </div>
                    <div  class="form-group">
                        <label for="midterm">Midterm</label>
                        <input type="text" class="form-control" name="midterm">
                    </div> -->
                    <!-- <div  class="form-group">
                        <label for="total_theory">Total Theory</label>
                        <input type="text" class="form-control" name="total_theory">
                    </div>
                    <div  class="form-group">
                        <label for="total_practical">Total Practical</label>
                        <input type="text" class="form-control" name="total_practical">
                    </div>
                    <div>
                        <label for="grade_point">Grade Point</label>
                        <input type="text" class="form-control" name="grade_point">
                    </div>
                    <div  class="form-group">
                        <label for="credit_point">Credit Point</label>
                        <input type="text" class="form-control" name="credit_point">
                    </div>
                    <div  class="form-group">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" name="status">
                    </div> -->
                    <!-- <div  class="form-group"> -->
                        <!-- <label for="semester">Semester</label>
                         <?php //echo '<input value="' . $row['semester'] . '" type="text" class="form-control" name="semester">';  ?> 
                    </div>
                    <div  class="form-group">
                        <label for="dept_no">Department No</label>
                        <input type="text" class="form-control" name="dept_no">
                    </div>
                    <div  class="form-group">
                        <label for="session_code">Session Code</label>
                        <input type="text" class="form-control" name="session_code">
                    </div> -->
                    <!-- <input type="submit" class="btn btn-primary">
                </form> -->
            <!-- </div> -->

            <div class="col-lg-4">
                    <div class="form-group">
                        <?php 

                            if($semester%2==1){
                                echo '<label for="roll_no">Enter Roll No</label>';
                                echo '<input type="text" class="form-control" name="roll_no">';
                            }else{

                                $previous_semester = $semester-1;

                                $select_query3 = "select roll_no from result_table where enroll_no='$enroll_no' and semester='$previous_semester'";

                                $select_query_result3 = mysqli_query($con,$select_query3)
                                or die(mysqli_error($err));
                                
                                $row3 = mysqli_fetch_array($select_query_result3);
                                $roll_no = $row3['roll_no']; 

                                echo '<label for="roll_no">Roll No</label>';
                                echo '<input value="' . $roll_no . '" type="text" class="form-control" name="roll_no" >';
                            }
                         ?>
                    </div>
            </div>
        </div>


       
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
            <form method="post">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Course Code</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Midterm</th>
                    <th scope="col">Practical</th>
                    <th scope="col">Theory</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        $marks = array();
                        $i=0;
                    while($row1=mysqli_fetch_array($select_query_result2)){
                        
                            $marks[$i] = array();

                            $course_code = $row1['course_code'];

                            $select_query3="select cht,chp,mmm,mmt,mmp from course where dept_no='$dept_no' and semester='$semester' and session_code='$a_session' and course_code='$course_code'";
                            //die($select_query3);
                            $select_query_result3 = mysqli_query($con,$select_query3)
                            or die(mysqli_error($err));

                                                    
                            $row3=mysqli_fetch_array($select_query_result3);
                            //echo $row3['cht'];
                            //echo $row3['chp'];

                            $cht = $row3['cht'];
                            $chp = $row3['chp'];
                            $mmm = $row3['mmm'];
                            $mmt = $row3['mmt'];
                            $mmp = $row3['mmp'];

                    ?>
                    <tr>
                    

                    <?php //\echo '<th scope="row name="marks'.$i.'3> '.$row1['course_code'].'</th>'
                        
                    ?>
                    <!-- <input type="text" placeholder=""> -->
                    <td scope="row"><?php echo  $row1['course_code']; ?></td>
                    <td><?php echo  $row1['course_name']; ?></td>
                    <td>
                    <?php echo '<input type="number" class="form-control" name="marks'.$i.'0" placeholder="Max. Marks '.$mmm.'">';  ?>
                    <!-- <input class="form-control" name="marks[i][0]"  type="number" > -->
                    </td>
                    <td>
                    <?php 
                        if($chp==0){
                            echo '<input type="number" class="form-control" name="marks'.$i.'1" placeholder="NA" disabled>';     
                        }else{
                            echo '<input type="number" class="form-control" name="marks'.$i.'1" placeholder="Max. Marks '.$mmp.'">'; 
                        }
                    ?>
                    <!-- <input class="form-control" name="marks[i][1]" type="number" > -->
                    </td>
                    <td>
                    <?php 
                    
                        if($cht==0){
                            echo '<input type="number" class="form-control" name="marks'.$i.'2" placeholder="NA" disabled>';     
                        }else{
                            echo '<input type="number" class="form-control" name="marks'.$i.'2" placeholder="Max. Marks '.$mmt.'">';
                        }
                      ?>
                    <!-- <input class="form-control" name="marks[i][2]" type="number" > -->
                    </td>
                    </tr>
                    <?php  
                    //$marks[$i][3]=(string)$row1['course_code'];
                        //echo $row1['course_code'];
                        
                    $i=$i+1;
                        }
                    ?>
                </tbody>
            </table>
<!-- <input type="submit" class="btn btn-priamry" name="button1" value="Button1"> -->

            </div>
            <div class="col-lg-1"></div>
        </div>
        <input type="submit" class="btn btn-primary">

        </form>
    </div>
</body>
</html>