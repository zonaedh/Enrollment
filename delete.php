<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELETE</title>

    <style>
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
</head>
<body>
    <?php include 'topbar.php'; ?>
    <h1>DELETE ME!</h1>

    <?php
      if(isset($_GET['allow'])) {
        if($_GET['allow'] == 'true') {
          include 'connection.php';

          $query = "DELETE FROM student_info WHERE reg_no LIKE " . $_GET['reg'] . ";";
          $result = mysqli_query($connection, $query);
          header('Location: view.php');
          die();
        }
        else if($_GET['allow'] == 'false') {
          header('Location: view.php?reg=' . $_GET['reg']);
          die();
        }
      }
    ?>

    <div class="dialog">
        <p>ARE YOU SURE?</p>
        <div class="cta">
            <?php
              echo "<a class='nice' href='delete.php?reg=" . $_GET['reg'] . "&allow=true'>Yes</a>";
              echo "<a class='ops' href='delete.php?reg=" . $_GET['reg'] . "&allow=false'>No</a>";
            ?>
        </div>
    </div>

</body>
</html>