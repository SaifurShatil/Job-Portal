<?php
include 'header2.php';
session_start();
require 'config.php';
?>

<div id="main">


<form  action="search2.php" method="post">
  <input type="text" name="q" placeholder="Search Query..">
  <select  name="column">
    <option value="">Select Filter</option>
    <option value="jname">Job Name</option>
    <option value="cname">Company Name</option>
    <option value="salary">Salary</option>
    <option value="cgpa">CGPA</option>
  </select>
  <input type="submit" name="submit"  value="Find">

</form>

<?php
      if(isset($_POST['submit'])){
        $conn=new mysqli("localhost","root","","ruet");
        $q=$conn->real_escape_string($_POST['q']);
        $column=$conn->real_escape_string($_POST['column']);
        if($column=="" || $column !="jname" && ($column !="cname" && $column !="salary" && $column !="cgpa")){
          $column="jname";
        }
        $sql= $conn->query("select * from job where $column LIKE '%$q%' ");

        $results_per_page = 5;
        $number_of_results = mysqli_num_rows($sql);
        $number_of_pages = ceil($number_of_results/$results_per_page);
        if (!isset($_GET['page'])) {
          $page = 1;
        } else {
          $page = $_GET['page'];
        }
        $this_page_first_result = ($page-1)*$results_per_page;




        if ($sql->num_rows >0){


          echo "<br>";
          echo "<br>";







          while ($data = $sql->fetch_array()) {



            echo "Job Id :".' '.$data['jid'].'<br>';

            echo "Job Name :".' '.$data['jname'].'<br>';
             echo "Company Id :".' '.$data['cid'].'<br>';
            echo "Company Name :".' '.$data['cname'].'<br>';

            echo "Salary :".' '.$data['salary'].'<br>';

            echo "CGPA :".' '.$data['cgpa'].'<br>';

            echo "Description :".' '.$data['description'].'<br>';
            echo "<hr>";
          }

          for ($page=1;$page<=$number_of_pages;$page++) {
            echo '<a href="search2.php?page=' . $page . '">' . $page . '</a> ';
          }


        }else {
          echo "<br>";
          echo "<br>";
          echo "Your search query doesnt match any data!";
        }

      }

 ?>



<?php
include 'footer.php';
 ?>
