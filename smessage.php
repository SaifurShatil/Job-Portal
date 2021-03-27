<?php
include 'header.php';
session_start();
require 'config.php';
?>


<div id="main">

  <form class="myform" action="smessage.php" method="post" enctype="multipart/form-data">
     <div id="main-wrapper">
         <center>
             <h2>Send Message</h2>
         </center>

             <label><b>Student Id:</b></label><br>
             <input type="number" class="inputvalues" name="sid"required><br>
             <label><b>Job Id:</b></label><br>
             <input type="number" class="inputvalues" name="jid"required><br>

             <label><b>Message:</b></label><br>
              <textarea name="msg"   class="inputvalues"  rows="4" required></textarea><br>
             <input type="submit" id="signup_btn" value="SEND" name="submit_btn"><br>

         </form>

   <?php
   if(isset($_POST['submit_btn']))
   {
     $sid=$_POST['sid'];
     $jid=$_POST['jid'];
     $msg=$_POST['msg'];
     $cid=$_SESSION['cid'];

     $query="insert into message values('','$sid','$cid','$jid','$msg')";
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


<?php
include 'footer.php';
 ?>
