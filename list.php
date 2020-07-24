<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        h1 {
            margin-top: 2rem;
            text-align: center;
        }
        .container a {
            display: block;
            font-size: 1.2rem;
            padding: .5rem 100%;
        }
        .container a:nth-child(odd) {
            background-color: whitesmoke;
        }
        .container a:nth-child(even) {
            background-color: rgb(229, 229, 229);
        }
        .container {
            margin-top: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <?php include 'topbar.php'; ?>
    <h1>REGISTERED STUDENTS</h1>

    <div class="container">
        <?php
            include 'connection.php';
            $query = "SELECT reg_no FROM student_info";
            $results = mysqli_query($connection, $query);
            while($result = mysqli_fetch_assoc($results)) {
                echo "<a href='view.php?reg=" . $result['reg_no'] . "'>" . $result['reg_no'] . '</a>';
            }
        ?>
    </div>
</body>
</html>