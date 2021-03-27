<table class="table">
  <thead>
    <tr>
      <th>Job Id</th>
      <th>Company Id</th>
      <th>Job Name</th>
      <th>Company Name</th>
      <th>Salary</th>
      <th>Cgpa</th>
      <th>Description</th>
    </tr>
  </thead>

  <tbody>
    <?php
        $conn=mysqli_connect("localhost","root","","ruet");
        $result=mysqli_query($conn,"SELECT * FROM job");
        while ($row=mysqli_fetch_assoc($result)):

     ?>

     <tr>
       <td><?php echo $row['jid']; ?></td>
       <td><?php echo $row['cid']; ?></td>
       <td><?php echo $row['jname']; ?></td>
       <td><?php echo $row['cname']; ?></td>
       <td><?php echo $row['salary']; ?></td>
       <td><?php echo $row['cgpa']; ?></td>
       <td><?php echo $row['description']; ?></td>
     </tr>

   <?php endwhile; ?>


</table>

<link rel="stylesheet" href="bootstrap.css">
<script  src="tables/js/jquery.js"></script>
<script  src="tables/js/dataTables.bootstrap.js"></script>
<script  src="tables/js/jquery.dataTables.js"></script>
<script>
$(".table").DataTable();
</script>
