<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link rel=stylesheet href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <h2>Seats of Bus</h2>


        <table class="table">
            <thead>
                <tr>

                    <th>ID</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>

                <?php

                include 'config.php';

                $sql = "SELECT * FROM ticket";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query " . $connection->error);
                }

                $count=1;
               
                while ($row = $result->fetch_assoc()) {
                    

                    echo "
            <tr>
           
            <td>$row[id]</td>
            <td><div class='rectangle' id='$count'>$row[operation]<div></td>
            <td>
                <a class='btn btn-primary btn-sm' href='./edit.php?id=$row[id]'>Update</a>
            </td>
        </tr>
            ";
            $count++;
                }

              

                ?>


            </tbody>
        </table>

    </div>

    <script src="script.js"></script>

</body>

</html>