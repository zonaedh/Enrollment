<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet"> 
    
    <title>Zonaed's PHP</title>
    <style>
      body {
        font-family: 'Montserrat', sans-serif;
        font-weight: 300;
        height: 100vh;
      }
      h1 {
        margin-top: 2rem;
        text-align: center;
      }
      select {
        font-weight: 300;
      }
      form {
        margin-top: 2rem;
        display: flex;
        padding: 0 25%;
        flex-direction: column;
        align-items: center;
      }
      input, select, label {
        display: block;
        width: 100%;
      }
      .msg {
        text-align: center;
        font-size: 1.2rem;
        padding: 1rem .5rem;
      }
      .nice {
        background-color: lightgreen;
      }
      .ops {
        background-color: lightpink;
      }
    </style>
</head>
<body>
      
  <?php include 'topbar.php'; ?>

  <h1>REGISTER STUDENT</h1>

  <?php
        $host = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "enroll";

        $connection = mysqli_connect($host, $user, $pass, $dbname);

        if (isset($_POST['submit'])) {
          $reg_no = htmlspecialchars(strip_tags($_POST['reg_no']));
          $department_name = htmlspecialchars(strip_tags($_POST['department_name']));
          $std_name =  htmlspecialchars(strip_tags($_POST['std_name']));
          $gender = htmlspecialchars(strip_tags($_POST['gender']));
          $college = htmlspecialchars(strip_tags($_POST['college']));
          $hsc_group =  htmlspecialchars(strip_tags($_POST['hsc_group']));
          $f_name = htmlspecialchars(strip_tags($_POST['f_name']));

          $query = "INSERT INTO `student_info` (`reg_no`, `department_name`, `std_name`, `gender`, `college`, `hsc_group`, `f_name`) VALUES ($reg_no, '$department_name', '$std_name', '$gender', '$college', '$hsc_group', '$f_name');";
          $result = mysqli_query($connection, $query);
          if($result) echo "<p class='nice msg'>Nice Dude</p>";
          else echo "<p class='ops msg'>ops</p>";
        }
    ?>

    <form method="POST">
      <label for="reg_no">
        <span>Registration Number</span>
        <input type="number" id="reg_no" name="reg_no" placeholder="Registration Number" min=0 autocomplete="off">
      </label>
      <label for="department">
        Department:
        <select name="department_name" id="department" >
          <option value="CSE">CSE</option>
          <option value="ECE">ECE</option>
          <option value="BBA">BBA</option>
        </select>
      </label>
      <label for="std_name">
        <span>Student Name</span>
        <input type="text" id="std_name" name="std_name" placeholder="Student's Name" autocomplete="off">
      </label>
      <label for="gender">
        Gender:
        <select name="gender" id="gender" >
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
      </label>
      <label for="college">
        <span>College</span>
        <input type="text" id="college" name="college" placeholder="College" >
      </label>
      <label for="hsc_group">
        Group:
        <select name="hsc_group" id="hsc_group" >
          <option value="science">Science</option>
          <option value="commerce">Commerce</option>
        </select>
      </label>
      <label for="f_name">
        <span>Father's Name</span>
        <input type="text" id="f_name" name="f_name" placeholder="Father's Name" autocomplete="off">
      </label>
      <input type="submit" name="submit" value="Register">
    </form>

</body>
</html>

