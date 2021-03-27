<?php
   require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">

     <script type="text/javascript">
            function PreviewImage(){
              var oFReader=new FileReader();
              oFReader.readAsDataURL(document.getElementById("imglink").files[0]);

              oFReader.onload=function(oFREvent){
                document.getElementById("uploadPreview").src=oFREvent.target.result;
              };
            };

     </script>


</head>
<body >
<form class="myform" action="register.php" method="post" enctype="multipart/form-data">
   <div id="main-wrapper">
       <center>
           <h2>Registration Form</h2>
           <img id="uploadPreview" src="stu.png" class="avatar"><br>
            <input type="file" id="imglink" name="imglink" accept=".jpg,.jpeg,.png" onchange="PreviewImage();"/>
       </center>


         <label><b>Fullname:</b></label><br>
         <input type="text" class="inputvalues" name="fullname"  required><br>
         <label><b>Email:</b></label><br>
         <input type="email" class="inputvalues" name="email"  required><br>
             <label><b>Gender:</b></label>
             <input type="radio" class="radiobtns" name="gender" value="male" checked required>Male
             <input type="radio" class="radiobtns" name="gender" value="female"  required>Female <br>

           <label><b>Username:</b></label><br>
           <input type="text" class="inputvalues" name="username"  required><br>
           <label><b>Department:</b></label>
           <select class="department" name="department">
             <option value="CSE">CSE</option>
             <option value="EEE">EEE</option>
             <option value="CIVIL">CIVIL</option>
             <option value="ME">ME</option>
           </select><br>
           <label><b>Roll No:</b></label><br>
           <input type="number" class="inputvalues" name="roll"  required><br>
           <label><b>Session:</b></label><br>
           <input type="text" class="inputvalues" name="session"  required><br>
           <label><b>Password:</b></label><br>
           <input type="password" class="inputvalues" name="password"  required><br>
           <label><b>Confirm Password:</b></label><br>
           <input type="password" class="inputvalues" name="cpassword"  required><br>
           <input name="submit_btn" type="submit" id="signup_btn" value="Sign Up"><br>
           <a href="cregister.php"><input type="button" id="csignup_btn" value="Company signup"></a>

       </form>

       <?php
              if(isset($_POST['submit_btn']))
              {
                //echo '<script type="text/javascript"> alert("Signup Button Clicked")</script>';
              $fullname=$_POST['fullname'];
              $email=$_POST['email'];
              $gender=$_POST['gender'];
              $username=$_POST['username'];
                $department=$_POST['department'];
                $roll=$_POST['roll'];
                $session=$_POST['session'];
                $password=$_POST['password'];
                $cpassword=$_POST['cpassword'];

                $img_name=$_FILES['imglink']['name'];
                $img_size=$_FILES['imglink']['size'];
                $img_tmp=$_FILES['imglink']['tmp_name'];

                $directory='suploads/';
                $target_file=$directory.$img_name;

                if($password==$cpassword)
                {
                  $encrypted_password=md5($password);
                  $query="select * from student where email='$email'";
                  $query_run=mysqli_query($con,$query);
                  if(mysqli_num_rows($query_run)>0)
                  {
                    echo '<script type="text/javascript"> alert("Try another email")</script>';
                  }
                  elseif (file_exists($target_file)) {
                    // code...
                      echo '<script type="text/javascript"> alert("Image file exists...Try another image file")</script>';
                  }
                  elseif ($img_size>2097152) {
                    // code...
                      echo '<script type="text/javascript"> alert("Image file larger than 2MB..Try another image file")</script>';
                  }
                  else
                  {
                    move_uploaded_file($img_tmp,$target_file);
                    $query="insert into student values('','$fullname','$username','$email','$department','$roll','$session','$gender','$encrypted_password','$target_file')";
                    $query_run=mysqli_query($con,$query);
                    if($query_run)
                    {
                      echo '<script type="text/javascript"> alert("User Registered..Go...")</script>';
                    }
                    else {
                      echo '<script type="text/javascript"> alert("Error")</script>';
                    }
                  }
                }else {
                     echo '<script type="text/javascript"> alert("Password Doesnot Match")</script>';
                }
              }
        ?>

   </div>

</body>
</html>
