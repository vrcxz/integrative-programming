<html>
  <body>
     <?php
      if(isset($_GET['message']) && $_SERVER['REQUEST_METHOD'] == 'GET'){
       $message = $_GET['message'];
       echo "<script>alert('{$message}')</script>";
      }
     ?>
    <form action="validate.php" method="POST">
      <label>First Name: </label><input type="text" name="firstname"><br>
      <label>Middle Name: </label><input type="text" name="middlename"><br>
      <label>Last Name: </label><input type="text" name="lastname"><br>
      <label>Email: </label><input type="text" name="email"><br>
      <label>Sex: </label>
        <select name="sex">
          <option>Male</option>
          <option>Female</option>
        </select><br>
      <label>Subjects Taken: </label><br>
      <input type="checkbox" value="math" name="subjects[]">Math<br>
      <input type="checkbox" value="science" name="subjects[]">Science<br>
      <input type="checkbox" value="english" name="subjects[]">English<br>
      <input type="checkbox" value="filipino" name="subjects[]">Filipino<br>
      <input type="reset" value="Reset">
      <input type="submit" value="Submit">
    </form>
  </body>
</html>