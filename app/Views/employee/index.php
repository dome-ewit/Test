<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
        <table border='1' align='center' width='500'>


            <tr align='center' bgcolor='#CCCCCC'>
            <td>ID</td>
            <td>First_Name</td>
            <td>Last_Name</td>
            <td>Email</td>
            <td>Phone</td>



        <?php foreach($employee as $row) : ?>

            <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['first_name'] ?></td>
            <td><?= $row['last_name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['phone'] ?></td>


        </tr>

        <?php endforeach; ?>


   
</body>
</html>

