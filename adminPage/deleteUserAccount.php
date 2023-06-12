<?php

    include ("db.php");

    $email = $_GET['n'];
    $query = "select * from users where email='$email'";
    $result = mysqli_query($conn, $query);
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;

        }
        body
        {
            background-image: url('cream.jpg');
        }
        form
        {
            transform: translate(0%, 30%);
            margin: auto;
            height: 450px;
            width: 600px;
            padding: 20px;
            background: rgba(0, 0, 0, 0.5);
            box-sizing: border-box;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.8);
            border-radius: 10px;
        }
        h1
        {
            font-size: 40px;
            text-align: center;
        }
        td
        {
            padding: 5px;
            font-size: 25px;
        }
        #button
        {
            font-size: 20px;
        }
        #index
        {
            transform: translate(62%, 750%);
            width: 50%;
        }
    </style>
</head>
<body>
<form action="" method="POST">
<table>   
<?php
                echo "<h1>Delete User Account</h1></br>";

                while($row = mysqli_fetch_array($result)) :?>
                <tr>
                    <td><?php echo "Name: ".$row['name'];?></td>
                </tr>
                <tr>
                    <td><?php echo "Email: ".$row['email'];?></td>
                </tr>
                <tr>
                    <td><?php echo "Password: ".str_repeat('*', strlen($row['password']));?></td>
                </tr>
                <tr>
                    <td><?php echo "Date of Birth: ".$row['dateofbirth'];?></td>
                </tr>
                <tr>
                    <td><?php echo "Profile: ".$row['profile'];?></td>
                </tr>

                <tr>
                    <td><input id="button" type="submit" name="s" value="Delete"></td>
                    <td><input id="button" type="button" onclick="location.href='adminUserAccounts.php'" name="back" value="Back"></td>
                </tr>

                
                <?php endwhile;?>
</table>
</form>
<?php
    if(isset($_POST['s']))
    {
        $queries = "delete from users where email='$email'";
        mysqli_query($conn, $queries);

        echo "<script>window.location.href='adminUserAccounts.php'</script>";
    } 
?>
    
</body>
</html>