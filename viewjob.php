<?php
include 'header2.php';
session_start();
require 'config.php';
?>

 <div id="main">

<?php
$results_per_page = 5;

// find out the number of results stored in database
$sql='SELECT * FROM job';
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
$sql='SELECT * FROM job LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_array($result)) {

  // echo  $row['jid']. ' ' . $row['jname']. '<br>';
   echo "Job Id :".' '.$row['jid'].'<br>';

   echo "Job Name :".' '.$row['jname'].'<br>';
    echo "Company Id :".' '.$row['cid'].'<br>';
   echo "Company Name :".' '.$row['cname'].'<br>';

   echo "Salary :".' '.$row['salary'].'<br>';

   echo "CGPA :".' '.$row['cgpa'].'<br>';

   echo "Description :".' '.$row['description'].'<br>';
   echo "<hr>";
}



// display the links to the pages
for ($page=1;$page<=$number_of_pages;$page++) {
  echo '<a href="viewjob.php?page=' . $page . '">' . $page . '</a> ';
}

 ?>


<?php
include 'footer.php';

 ?>
