<?php
session_start();
require 'config.php';
 ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>login</title>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>

    <div class="login-box">
       <h1>Login</h1>
      <form class="myform" action="login.php" method="post">
       <div class="textbox">
          <i class="fa fa-user" aria-hidden="true"></i>
           <input type="text" name="email" placeholder="Email" required>

       </div>
        <div class="textbox">
          <i class="fa fa-lock" aria-hidden="true"></i>
           <input type="password" name="password" placeholder="Password" required>

       </div>

       <input name="login" type="submit" class="btn" name="" value="Sign In">

     </form>
     <?php
            if(isset($_POST['login']))
            {
              $email=$_POST['email'];
              $password=$_POST['password'];
              $encrypted_password=md5($password);
              $query="select * from student where email='$email' and password='$encrypted_password'";
              $query_run=mysqli_query($con,$query);
              if(mysqli_num_rows($query_run)>0)
              {
                $row=mysqli_fetch_assoc($query_run);
                $_SESSION['username']=$row['username'];
                $_SESSION['sid']=$row['sid'];
                $_SESSION['imglink']=$row['imglink'];
                header('location:viewjob.php');
              }
              else {
                echo '<script type="text/javascript"> alert("Invalid Credentials")</script>';
              }

              $query1="select * from company where email='$email' and password='$encrypted_password'";
              $query_run1=mysqli_query($con,$query1);
              if(mysqli_num_rows($query_run1)>0)
              {
                $row=mysqli_fetch_assoc($query_run1);
                $_SESSION['companyname']=$row['companyname'];
                $_SESSION['cid']=$row['cid'];
                $_SESSION['imglink']=$row['imglink'];
                header('location:jobpost.php');
              }
              else {
                echo '<script type="text/javascript"> alert("Invalid Credentials")</script>';
              }



            }
      ?>

    </div>

    </body>
    </html>
