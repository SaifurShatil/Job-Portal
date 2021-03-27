<?php
include 'header.php';
session_start();
require 'config.php';
?>

<div id="main">


<form  action="searcht.php" method="post">
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
        if ($sql->num_rows >0){
          while ($data = $sql->fetch_array()) {
            echo $data['jname']."<br>";
          }


        }else {
          echo "Your search query doesnt match any data!";
        }

      }

 ?>



<?php
include 'footer.php';
 ?>
