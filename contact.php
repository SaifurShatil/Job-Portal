<?php
require 'config.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
    <link rel="stylesheet" href="contact.css">
</head>
<body>
    <div class="contact-title">
        <h1>Say Hello</h1>
        <h2>We are always to serve you !</h2>
    </div>
    <div class="contact-form">
       <form id="contact-form" method="post" action="">
           <input name="name" type="text" class="form-control" placeholder="Your Name" required><br>
           <input name="email" type="text" class="form-control" placeholder="Your Email" required><br>
           <textarea name="message"   class="form-control" placeholder="Message" rows="4" required></textarea><br>
           <input type="submit" name="submit_btn" class="submit" value="SEND MESSAGE">
       </form>

       <?php
             if(isset($_POST['submit_btn']))
             {
               $name=$_POST['name'];
               $email=$_POST['email'];
               $msg=$_POST['message'];
               $query="insert into contact values('','$name','$email','$msg')";
               $query_run=mysqli_query($con,$query);
               if($query_run)
               {
                 echo '<script type="text/javascript"> alert("Message Sent")</script>';
               }
               else {
                 echo '<script type="text/javascript"> alert("Error")</script>';
               }
             }

        ?>

    </div>

</body>
</html>
