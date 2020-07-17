<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zonaed's PHP</title>
</head>
<body>
    <?php
    // ja ja dorkar
        include "connection.php";
    // query read
        $results = mysqli_query($connection, "SELECT * FROM student_info");
      
        while($result =  mysqli_fetch_assoc($results)) {
            print_r($result);
        }

        // create

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
      <input type="submit" name="submit">
    </form>
    

    <?php
        $host = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "enroll";

        $connection = mysqli_connect($host, $user, $pass, $dbname);

        if (isset($_POST['submit'])) {
          $reg_no = htmlspecialchars( strip_tags($_POST['reg_no']));
          $department_name = htmlspecialchars(strip_tags($_POST['department_name']));
          $std_name =  htmlspecialchars(strip_tags($_POST['std_name']));
          $gender = htmlspecialchars(strip_tags($_POST['gender']));
          $college = htmlspecialchars(strip_tags($_POST['college']));
          $hsc_group =  htmlspecialchars(strip_tags($_POST['hsc_group']));
          $f_name = htmlspecialchars(strip_tags($_POST['f_name']));

          $query = "INSERT INTO `student_info` (`reg_no`, `department_name`, `std_name`, `gender`, `college`, `hsc_group`, `f_name`) VALUES ('$reg_no', '$department_name', '$std_name', '$gender', '$college', '$hsc_group', '$f_name');";

          $result = mysqli_query($connection, $query);
          if($result) echo "NICE DUDE";
          else echo "OPPS";
        }
    ?>

</body>
</html>