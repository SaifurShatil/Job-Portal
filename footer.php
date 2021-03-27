


<form class="myform1" action="footer.php" method="post">

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
