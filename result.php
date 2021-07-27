<?php
  $con = mysqli_connect("localhost","root","","rps")
  or die(mysqli_error($con));

  $enroll_no = $_POST['enroll_no'];
  //echo $enroll_no;

  $semester = $_POST['semester'];
  //echo $semester;

  $select_query1 = "select stu_name,stu_fathers_name,stu_mothers_name from student where enroll_no='$enroll_no'";

  $select_query1_result = mysqli_query($con,$select_query1)
  or die(mysqli_error($err));

  $row1 = mysqli_fetch_array($select_query1_result);

  //echo $row1['stu_name'].'<br>';
  //echo $row1['stu_fathers_name'].'<br>';
  //echo $row1['stu_mothers_name'].'<br>';

  $stu_name=$row1['stu_name'];
  $stu_fathers_name=$row1['stu_fathers_name'];
  $stu_mothers_name=$row1['stu_mothers_name'];

  if($semester%2==0){
      $sem="Second";
  }else{
      $sem="First";
  }

  if($semester==1 || $semester==2){
    $class="First Year";
    $count=0;
  }else if($semester==3 || $semester==4){
    $class="Second Year";
    $count=1;
  }else if($semester==5 || $semester==6){
    $class="Third Year";
    $count=2;
  }else if($semester==7 || $semester==8){
    $class="Fourth Year";
    $count=3;
  }

  $str1 = substr($enroll_no,0,4);
  $num = (int)$str1;
  $num = $num+$count;
  $str2 = (string)$num;
  $num = $num + 1;
  $str3 = (string)$num;
  $str4 = substr($str3,2,2);
  $session = $str2."-".$str4;

  //echo $class.'<br>';
  //echo $sem.'<br>';
  //echo $session.'<br>';

  $select_query6 = "select roll_no,sgpa,ogpa,tch,tcp,tchapeb,tcpapeb,tchas,tcpas from result_table where enroll_no='$enroll_no' and semester='$semester'";

    $select_query6_result = mysqli_query($con,$select_query6)
    or die(mysqli_error($con));

    $row6 = mysqli_fetch_array($select_query6_result);

  echo '<div class="container">';
    echo '<div class="row">';
        echo '<div class="col-lg-2">';
            echo '<img src="assets/MPUATlogo.png" alt="University logo">';
        echo '</div>';
        echo '<div class="col-lg-10">';
            echo '<h3 class="text-center" style="color:#8c6539">MAHARANA PRATAP UNIVERSITY OF AGRICULTURE AND TECHNOLOGY</h3>';
            echo '<h4 class="text-center" style="color:#8c6539">UDAIPUR</h4>';
            echo "<h4 class='text-center' style='color:#8c6539'>STUDENT'S GRADE REPORT</h4>";
            echo '<br>';
            echo '<h6 class="text-center">ENGINEERING AND TECHNOLOGY</h6>';
            if($semester==1 || $semester==2){
                $dept_no=0;
            }else{
                $select_query2 = "select dept_no from student_status where enroll_no='$enroll_no'";

                $select_query2_result = mysqli_query($con,$select_query2)
                or die(mysqli_error($err));

                $row2 = mysqli_fetch_array($select_query2_result);

                $dept_no = $row2['dept_no']; 
            }

            $select_query3 = "select dept_name from department where dept_no='$dept_no'";

            $select_query3_result = mysqli_query($con,$select_query3)
            or die(mysqli_error($err));

            $row3 = mysqli_fetch_array($select_query3_result);

            $dept_name = $row3['dept_name'];     
            echo '<h6 class="text-center">BACHELOR OF TECHNOLOGY ('.$dept_name.')</h6>';
        echo '</div>';
    echo '</div>';
    echo '<br>';
    echo '<div class="row">';
        echo '<div class="col-lg-6">';
            echo '<p ><pre><span style="color:#8c6539">Roll No. : </span>          '.$row6['roll_no'].'</pre></p>';
            echo '<p><pre><span style="color:#8c6539">Name :   </span>            '.$stu_name.' </pre></p>';
            echo "<p><pre><span style='color:#8c6539'>Father's Name :  </span>    ".$stu_fathers_name." </pre></p>";
            echo "<p><pre><span style='color:#8c6539'>Mother's Name : </span>     Mrs. ".$stu_mothers_name." </pre></p>";
        echo '</div>';
        echo '<div class="col-lg-6">';
            //echo '<p><pre>Employee Name	:             af</pre></p>';
            echo '<p><pre><span style="color:#8c6539">Enrollment No. :  </span>   '.$enroll_no.' </pre></p>';
            echo '<p><pre><span style="color:#8c6539">Class :           </span>   '.$class.' </pre></p>';
            echo '<p><pre><span style="color:#8c6539">Semester :        </span>   '.$sem.' </pre></p>';
            echo '<p><pre><span style="color:#8c6539">Session :         </span>   '.$session.'</pre></p>';
        echo '</div>';
    echo '</div>';
  echo '</div>';

  $str1 = substr($enroll_no,0,4);
  $num = (int)$str1;
  $num = $num + 1;
  $str2 = (string)$num;
  $str3 = substr($str2,2,2);
  $a_session = $str1."-".$str3;

  if($semester==1 || $semester==2){
    $dept_no=0;
    $select_query4="select course_code,course_name,cht,chp from course where dept_no='$dept_no' and semester='$semester' and session_code='$a_session'";
  }else{
    // $select_query4="select course_code,course_name,cht,chp from course where (dept_no,semester) in (select dept_no,semester from student_status where enroll_no='$enroll_no') and session_code='$a_session'";
    $select_query4="select course_code,course_name,cht,chp from course where dept_no='$dept_no' and semester='$semester' and session_code='$a_session'";
  }

  $select_query_result4 = mysqli_query($con,$select_query4)
  or die(mysqli_error($err));

  

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
           background-color: #FBFCFC  ;
          /*background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='160' height='160' viewBox='0 0 200 200'%3E%3Cpolygon fill='%23DCEFFA' points='100 0 0 100 100 100 100 200 200 100 200 0'/%3E%3C/svg%3E"); */
         }
         table{
             background-image: url('assets/mpuatbg.png'); 
            
         }
      </style>
  </head>

<body>
    <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered" style="border:#8c6539">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col" rowspan="2" style="color:#8c6539">Course No.</th>
                                <th class="text-center" scope="col" rowspan="2" style="color:#8c6539">Title of the course</th>
                                <th class="text-center" scope="col" colspan="2" style="color:#8c6539">Credit Hours</th>
                                <th class="text-center" scope="col" colspan="4" style="color:#8c6539">Marks Obtained</th>
                                <th class="text-center" scope="col" rowspan="2" style="color:#8c6539">Grade Point</th>
                                <th class="text-center" scope="col" rowspan="2" style="color:#8c6539">Credit Points</th>
                            </tr>
                            <tr>
                                <th class="text-center" scope="col" style="color:#8c6539">Th</th>
                                <th class="text-center" scope="col" style="color:#8c6539">Pr</th>
                                <th class="text-center" scope="col" style="color:#8c6539">Th</th>
                                <th class="text-center" scope="col" style="color:#8c6539">Pr</th>
                                <th class="text-center" scope="col" style="color:#8c6539">MT</th>
                                <th class="text-center" scope="col" style="color:#8c6539">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row4=mysqli_fetch_array($select_query_result4)){ 
                                
                                 $course_code = $row4['course_code'];
                                //echo $dept_no;
                                //echo $a_session;
                                 $select_query5 = "select midterm,theory,practical,grade_point,credit_point from marks where enroll_no='$enroll_no' and dept_no='$dept_no' and course_code='$course_code' and session_code='$a_session'";

                                 $select_query5_result = mysqli_query($con,$select_query5)
                                 or die(mysqli_error($con));
                
                                 $row5 = mysqli_fetch_array($select_query5_result);                
                                ?>
                            <tr>
                                <td><?php echo  $row4['course_code']; ?></td>
                                <td><?php echo  $row4['course_name']; ?></td>
                                <td class="text-center"><?php echo  $row4['cht']; ?></td>
                                <td class="text-center"><?php
                                $p=$row4['chp'];
                                $q=$p*10;
                                $r=$q%10;
                                if($r==0){
                                    $s=$q/10;
                                }else{
                                    $s=$p;
                                }
                                
                                 echo $s;  ?></td>
                                <td class="text-center"><?php if($row5['theory']==NULL){
                                                                echo  "--";
                                                              }else{
                                                                echo  $row5['theory'];
                                                            } ?>
                                </td>
                                <td class="text-center"><?php if($row5['practical']==NULL){
                                                                echo  "--";
                                                              }else{
                                                                echo  $row5['practical'];
                                                            } ?>
                                </td>
                                <td class="text-center"><?php echo  $row5['midterm']; ?></td>
                                <td class="text-center"><?php echo  $row5['grade_point']*10; ?></td>
                                <td class="text-center"><?php echo  $row5['grade_point']; ?></td>
                                <td class="text-center"><?php echo  $row5['credit_point']; ?></td> 
                            </tr>
                            <?php } ?>
                            <tr>
                                <th scope="row" colspan="2" style="color:#8c6539">Total</th>
                                <td class="text-center" colspan="2"><?php echo  $row6['tch']; ?></td>
                                <td colspan="5"></td>
                                <td class="text-center" ><?php echo  $row6['tcp']; ?></td>
                            </tr>
                            <tr>
                                <th colspan="10" style="color:#8c6539">Grade Point Average for the Semester (SGPA) <span style="color:black;"> <?php echo  $row6['sgpa']; ?> </span></th>
                            </tr>
                            <tr>
                                <th colspan="10" style="color:#8c6539">BACKLOG COURSE(S) OF LOWER CLASS</th>
                            </tr>
                            <tr style="height:150px">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="color:#8c6539"> Total of all previous semesters excluding backlog course(s) offered in current semester</td>
                                <td colspan="2" class="text-center"><?php echo  $row6['tchapeb']; ?></td>
                                <td colspan="5"></td>
                                <td colspan="1" class="text-center"><?php echo  $row6['tcpapeb']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="color:#8c6539"> Total of all semesters including current one [regular and backlog courses]</td>
                                <td colspan="2" class="text-center"><?php echo  $row6['tchas']; ?></td>
                                <td colspan="5"></td>
                                <td colspan="1" class="text-center"><?php echo  $row6['tcpas']; ?></td>
                            </tr>
                            <tr>
                                <th colspan="5" style="color:#8c6539">Overall Grade Point Average (OGPA) <span style="color:black;"><?php echo  $row6['ogpa']; ?></span> </th>
                                <th colspan="5" style="color:#8c6539">Result: </th>
                            </tr>
                        </tbody>
                    </table>
                    <br><br>
                </div>
            </div>
    </div>
</body>
</html>