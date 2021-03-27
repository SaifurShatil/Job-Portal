<?php
include 'header.php';
session_start();
require 'config.php';
?>


 <div id="main">
   <form class="myform" action="jobpost.php" method="post" enctype="multipart/form-data">
      <div id="main-wrapper">
          <center>
              <h2>Post Job</h2>
          </center>

              <label><b>Job Title:</b></label><br>
              <input type="text" class="inputvalues" name="name"required><br>
              <label><b>Salary:</b></label><br>
              <input type="number" class="inputvalues" name="salary"required><br><br>

              <label><b>Minimum CGPA:</b></label><br>
              <input type="text" class="inputvalues" name="cgpa" required><br>

              <label><b>Job Description:</b></label><br>
               <textarea name="jd"   class="inputvalues"  rows="4" required></textarea><br>
              <input type="submit" id="signup_btn" value="POST" name="submit_btn"><br>

          </form>
          <?php
          if(isset($_POST['submit_btn']))
          {
            $name=$_POST['name'];
            $salary=$_POST['salary'];
            $cgpa=$_POST['cgpa'];
            $jd=$_POST['jd'];
            $cname=$_SESSION['companyname'];
            $cid=$_SESSION['cid'];

            $query="insert into job values('','$cid','$name','$cname','$salary','$cgpa','$jd')";
            $query_run=mysqli_query($con,$query);
            if($query_run)
            {
              echo '<script type="text/javascript"> alert("Job Posted..Go...")</script>';
            }
            else {
              echo '<script type="text/javascript"> alert("Error")</script>';
            }

          }


           ?>


        </div>
<?php
include 'footer.php';
 ?>
