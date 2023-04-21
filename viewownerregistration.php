<?php
include 'connection.php';
$data=mysqli_query($con,"SELECT * FROM `owner_registration`");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,tr,th,td
        {
         border:3px solid black;
         border-collapse:collapse;
        }
    </style>
</head>
<body>
    <center>
    <table>
        <tr>
            <th>owner_name</th>
            <th>address</th>
            <th>email</th>
            <th>contact</th>
            <th>approval_status</th>
            
        </tr>
        <?php
        while($row=mysqli_fetch_assoc($data))
        { 
        ?>
        <tr>
            <td><?php echo $row['owner_name'];?></td>
            <td><?php echo $row['address'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['contact'];?></td>
            <td><?php echo $row['approval_status'];?></td>
        </tr>
        <?php
        }
        ?>
    </table>
    </center>
    
</body>
</html>