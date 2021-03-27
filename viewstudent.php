<?php
include 'header.php';
session_start();
require 'config.php';
?>

 <div id="main">

   <?php
   $results_per_page = 5;

   // find out the number of results stored in database
   $sql='SELECT student.sid,student.fullname,student.email,department,roll,session,gender,job.jid,job.jname FROM student INNER JOIN appliedjob ON student.sid=appliedjob.sid
    INNER JOIN job ON appliedjob.jid=job.jid INNER JOIN company ON appliedjob.cid=company.cid';
   $result = mysqli_query($con, $sql);
   $number_of_results = mysqli_num_rows($result);

   // determine number of total pages available
   $number_of_pages = ceil($number_of_results/$results_per_page);

   // determine which page number visitor is currently on
   if (!isset($_GET['page'])) {
     $page = 1;
   } else {
     $page = $_GET['page'];
   }

   // determine the sql LIMIT starting number for the results on the displaying page
   $this_page_first_result = ($page-1)*$results_per_page;

   // retrieve selected results from database and display them on page
   $sql='SELECT student.sid,student.fullname,student.email,department,roll,session,gender,job.jid,job.jname FROM student INNER JOIN appliedjob ON student.sid=appliedjob.sid
    INNER JOIN job ON appliedjob.jid=job.jid INNER JOIN company ON appliedjob.cid=company.cid LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
   $result = mysqli_query($con, $sql);

   while($row = mysqli_fetch_array($result)) {

     // echo  $row['jid']. ' ' . $row['jname']. '<br>';
     echo "Job Id :".' '.$row['jid'].'<br>';
     echo "Job Name :".' '.$row['jname'].'<br>';
      echo "Student Id :".' '.$row['sid'].'<br>';

      echo " Name :".' '.$row['fullname'].'<br>';
       echo "Email :".' '.$row['email'].'<br>';
      echo "Department :".' '.$row['department'].'<br>';

      echo "Roll :".' '.$row['roll'].'<br>';

      echo "Session :".' '.$row['session'].'<br>';

      echo "Gender :".' '.$row['gender'].'<br>';
      echo "<hr>";
   }



   // display the links to the pages
   for ($page=1;$page<=$number_of_pages;$page++) {
     echo '<a href="viewstudent.php?page=' . $page . '">' . $page . '</a> ';
   }
    ?>



 <?php
include 'footer.php';

  ?>
