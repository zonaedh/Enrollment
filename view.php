<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet"> 
    <style>
      body {
        font-family: 'Montserrat', sans-serif;
        font-weight: 300;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
      }
      h1 {
        margin: 2rem 0;
      }
      p {
        font-size: 1.2rem;
      }
      form {
        margin: 2rem 0 4rem 0;
      }
      .cta {
          margin-top: 2rem;
          width: 100%;
          display: flex;
          justify-content: space-around;
      }
      .cta a {
        padding: .5rem 1.5rem;
        border: none;
        cursor: pointer;
        text-decoration: none;
        color: black;
      }
      .ops {
          background-color: lightpink;
          
      }
      .nice {
        background-color: lightskyblue;
      }
    </style>
    <title>View</title>
</head>
<body>
<?php include 'topbar.php'; ?>
    <h1>Student Information</h1>
    <form method="GET">
        <input type="text" name="reg">
        <button type="submit">Search</button>
    </form>
    <?php
        include "connection.php";
        if(isset($_GET['reg'])) {
            $reg =  $_GET['reg'];
            $query = "SELECT * FROM student_info WHERE reg_no = '" . $reg . "'";

            $result = mysqli_query($connection, $query);
            $res = mysqli_fetch_assoc($result);
            
            if(!$res['reg_no']) echo "NOTHING FOUND!";
            else {
                echo "<p>REGISTRATION NUMBER: " . $res['reg_no'] . "</p>";
                echo "<p>Student Name:  " . $res['std_name'] . "</p>";
                echo "<p>Father's Name:  " . $res['f_name'] . "</p>";
                echo "<p>College: " . $res['college'] . "</p>";
                echo "<p>Group: " . $res['hsc_group'] . "</p>";
                echo "<p>Sex: " . $res['gender'] . "</p>";
                echo "<p>Department Name: " . $res['department_name'] . "</p>";
                echo "<div class='cta'>";
                    echo "<a class='ops' href='delete.php?reg=" . $res['reg_no'] . "'>DELETE</a>";
                    echo "<a class='nice' href='update.php?reg=" . $res['reg_no'] . "'>Update</a>";
                echo "</div>";
            }
        }
    ?>
</body>
</html>