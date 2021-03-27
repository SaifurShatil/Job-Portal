<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>

   <div id="main-wrapper">
       <center>
           <h2>Welcome
           <?php echo $_SESSION['username'] ?>
           <?php echo $_SESSION['companyname'] ?>
           </h2>
           <img src="stu.png" class="avatar">
       </center>

       <form class="myform" action="welcome.php" method="post">

           <input name="logout" type="submit" id="logout_btn" value="Log Out"></a><br>


       </form>
       <?php
            if(isset($_POST['logout'])){
               session_destroy();
               header('location:index.html');
             }

        ?>

   </div>

</body>
</html>
