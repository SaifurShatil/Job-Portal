<?php
include 'header2.php';
session_start();
require 'config.php';
?>

<div id="main">
  <div class="login-box">
     <h1>Apply Job</h1>
    <form class="myform" action="applyjob.php" method="post">
     <div class="textbox">

         <input type="number" name="jid" placeholder="Job Id" required>

     </div>
      <div class="textbox">

         <input type="number" name="cid" placeholder="Company Id" required>

     </div>

     <input name="apply" type="submit" class="btn"  value="Apply">

   </form>
   <?php
   if(isset($_POST['apply']))
   {
     $jid=$_POST['jid'];
     $cid=$_POST['cid'];
     $sid=$_SESSION['sid'];

     $query="insert into appliedjob values('','$jid','$cid','$sid')";
     $query_run=mysqli_query($con,$query);
     if($query_run)
     {
       echo '<script type="text/javascript"> alert("Applied..Go...")</script>';
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
