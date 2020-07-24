<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Update</title>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css' integrity='sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk' crossorigin='anonymous'>

    <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap' rel='stylesheet'> 

    <style>
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
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
    <?php
    include 'topbar.php';
    include 'connection.php';

    echo "<h1>UPDATE INFORMATION</h1>";

    $reg =  $_GET['reg'];
    $query = "SELECT * FROM student_info WHERE reg_no = '" . $reg . "'";

    $result = mysqli_query($connection, $query);
    $res = mysqli_fetch_assoc($result);

    if(isset($_POST['submit'])) {
      $reg_no = htmlspecialchars(strip_tags($_POST['reg_no']));
        $department_name = htmlspecialchars(strip_tags($_POST['department_name']));
        $std_name =  htmlspecialchars(strip_tags($_POST['std_name']));
        $gender = htmlspecialchars(strip_tags($_POST['gender']));
        $college = htmlspecialchars(strip_tags($_POST['college']));
        $hsc_group =  htmlspecialchars(strip_tags($_POST['hsc_group']));
        $f_name = htmlspecialchars(strip_tags($_POST['f_name']));

        $query = "UPDATE student_info SET department_name = '$department_name', std_name = '$std_name', gender = '$gender', college = '$college', hsc_group = '$hsc_group', f_name = '$f_name' WHERE reg_no = $reg_no;";
        $result = mysqli_query($connection, $query);
        
        if($result) header("location: update.php?reg=" . $reg_no . "&success=true");
        else echo "<p class='ops msg'>ops</p>";
    }

    if(isset($_GET['success'])) {
      if($_GET['success'] =='true') echo "<p class='nice msg'>Nice Dude</p>";
    }

    echo "<form method='POST'>";
      echo "<label for='reg_no'>";
        echo "<span>Registration Number</span>";
        echo "<input type='number' id='reg_no' name='reg_no' placeholder='Registration Number' min=0 autocomplete='off' value=" . $res['reg_no'] . ">";
      echo "</label>";
      echo "<label for='department'>";
        echo "Department:";
        echo "<select name='department_name' id='department' >";
        if($res['department_name'] == 'CSE') echo "<option value='CSE' selected>CSE</option>";
        else echo "<option value='CSE'>CSE</option>";
        
        if($res['department_name'] == 'ECE') echo "<option value='ECE' selected>ECE</option>";
        else echo "<option value='ECE'>ECE</option>";
        
        if($res['department_name'] == 'BBA') echo "<option value='BBA' selected>BBA</option>";
        else echo "<option value='BBA'>BBA</option>";
        echo "</select>";
      echo "</label>";
      echo "<label for='std_name'>";
        echo "<span>Student Name</span>";
        echo "<input type='text' id='std_name' name='std_name' placeholder='Student's Name' autocomplete='off' value='" . $res['std_name'] . "'>";
      echo "</label>";
      echo "<label for='gender'>";
        echo "Gender:";
        echo "<select name='gender' id='gender' >";
          if($res['gender'] == 'male') echo "<option value='male' selected>Male</option>";
          else echo "<option value='male'>Male</option>";

          if($res['gender'] == 'female') echo "<option value='female' selected>Female</option>";
          else echo "<option value='female'>Female</option>";
        echo "</select>";
      echo "</label>";
      echo "<label for='college'>";
        echo "<span>College</span>";
        echo "<input type='text' id='college' name='college' placeholder='College' value='" . $res['college'] . "'>";
      echo "</label>";
      echo "<label for='hsc_group'>";
        echo "Group:";
        echo "<select name='hsc_group' id='hsc_group' >";
          if($res['hsc_group'] == 'science') echo "<option value='science' selected>Science</option>";
          else echo "<option value='science'>Science</option>";

          if($res['hsc_group'] == 'commerce') echo "<option value='commerce' selected>Commerce</option>";
          else echo "<option value='commerce'>Commerce</option>";
        echo "</select>";
      echo "</label>";
      echo "<label for='f_name'>";
        echo "<span>Father's Name</span>";
        echo "<input type='text' id='f_name' name='f_name' placeholder='Father's Name' autocomplete='off' value='" . $res['f_name'] . "'>";
      echo "</label>";
      echo "<input type='submit' name='submit' value='Update'>";
    echo "</form>";

    ?>
</body>
</html>