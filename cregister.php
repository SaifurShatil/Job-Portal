<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Company Register</title>
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
<body>

<form class="myform" action="cregister.php" method="post" enctype="multipart/form-data">
   <div id="main-wrapper">
       <center>
           <h2>Registration Form</h2>
           <img id="uploadPreview" src="cmp.png" class="avatar"><br>
            <input type="file" id="imglink" name="imglink" accept=".jpg,.jpeg,.png" onchange="PreviewImage();"/>
       </center>


           <label><b>Fullname:</b></label><br>
           <input type="text" class="inputvalues" name="fullname" required ><br>
           <label><b>Company name:</b></label><br>
           <input type="text" class="inputvalues" name="companyname" required><br>
           <label><b>Website:</b></label><br>
           <input type="text" class="inputvalues" name="website"required><br>
           <label><b>Email:</b></label><br>
           <input type="email" class="inputvalues" name="email"required><br>
           <label><b>Phone No.:</b></label><br>
           <input type="number" class="inputvalues" name="phone"required><br><br>
           <label><b>Company Type:</b></label>
           <select class="type" name="type">
             <option value="IT">IT</option>
             <option value="Textile">Textile</option>
             <option value="Educational">Educational</option>
           </select><br>
           <label><b>Password:</b></label><br>
           <input type="password" class="inputvalues" name="password" required><br>
           <label><b>Confirm Password:</b></label><br>
           <input type="password" class="inputvalues" name="cpassword" required><br>
           <label><b>Company Description:</b></label><br>
            <textarea name="cd"   class="inputvalues"  rows="4" required></textarea><br>
           <input type="submit" id="signup_btn" value="Sign Up" name="submit_btn"><br>

           <a href="register.php"><input type="button" id="csignup_btn" value="Student signup"></a>

       </form>
       <?php
              if(isset($_POST['submit_btn']))
              {
                //echo '<script type="text/javascript"> alert("Signup Button Clicked")</script>';
                $fullname=$_POST['fullname'];
                $companyname=$_POST['companyname'];
                $website=$_POST['website'];
                $email=$_POST['email'];
                $phone=$_POST['phone'];
                $type=$_POST['type'];
                $cd=$_POST['cd'];
                $password=$_POST['password'];
                $cpassword=$_POST['cpassword'];

                $img_name=$_FILES['imglink']['name'];
                $img_size=$_FILES['imglink']['size'];
                $img_tmp=$_FILES['imglink']['tmp_name'];

                $directory='cuploads/';
                $target_file=$directory.$img_name;

                if($password==$cpassword)
                {
                  $encrypted_password=md5($password);
                  $query="select * from company where companyname='$companyname'";
                  $query_run=mysqli_query($con,$query);
                  if(mysqli_num_rows($query_run)>0)
                  {
                    echo '<script type="text/javascript"> alert("Comapny Already Exists")</script>';
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
                    $query="insert into company values('','$fullname','$companyname','$website','$email','$phone','$type','$encrypted_password','$target_file','$cd')";
                    $query_run=mysqli_query($con,$query);
                    if($query_run)
                    {
                      echo '<script type="text/javascript"> alert("Company Registered..Go...")</script>';
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
