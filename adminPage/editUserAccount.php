<?php

    include ("db.php");

    $email = $_GET['n'];
    $query = "select * from users where email='$email'";
    $result = mysqli_query($conn, $query);

    if(isset($_POST['s']))
    {
        $password = $_POST['password'];

        if(strlen($password) < 8)
        {
            echo "<script>alert('Password needs to be 8 characters long')</script>";
        }

        else 
        {
            $name = $_POST['name'];
            $newEmail = $_POST['email'];
            $password = $_POST['password'];
            $dateofbirth = $_POST['dateofbirth'];
            $profile = $_POST['profile'];

            $queries = "update users set password ='$password', dateofbirth ='$dateofbirth', profile = '$profile' where name ='$name'";
            mysqli_query($conn, $queries);


            header("Location: adminUserAccounts.php");
            die;
        }
    } 
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
            font-family: 'Arial';
            font-weight: 600;

        }
        body
        {
            background-image: url('cream.jpg');
        }
        form
        {
            transform: translate(0%, 20%);
            margin: auto;
            height: 500px;
            width: 600px;
            padding: 20px;
            background: rgba(0, 0, 0, 0.5);
            box-sizing: border-box;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.8);
            border-radius: 10px;
            color: black;
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
            transform: translate(62%, 600%);
            width: 50%;
        }
    </style>
</head>
<body>
<form action="" method="POST">
<table>   
<?php
                echo "<h1><center>Edit User Account<center></h1><br>";
                while($row = mysqli_fetch_array($result)) :?>
                <tr>
                    <td>Name: <input type="text" name="name" value= "<?php echo $row['name'];?>" required></td>
                </tr>

                <tr>
                    <td>Email: <input type="text" name="email" value="<?php echo $row['email'];?>" disabled></td>
                </tr>

                <tr>
                    <td>Password: <input type="text" name="password" value="<?php echo $row['password'];?>" required></td>
                </tr>

                <tr>
                    <td>Date of Birth: <input type="date" name="dateofbirth" value="<?php echo $row['dateofbirth'];?>" required></td>
                </tr>

                <tr>
                    <td>Profile:
                        <select name="profile" required>
                            <option value="Administrator"<?php if($row['profile'] == 'Administrator') echo ' selected="selected"'; ?>>Administrator</option>
                            <option value="Hotel Operator"<?php if($row['profile'] == 'Hotel Operator') echo ' selected="selected"'; ?>>Hotel Operator</option>
                        </select>
                    </td>
                </tr>
                 
                <tr>
                    <td><br><input id="button" type="submit" name="s" value="Submit"></td>
                    <td><br><input id="button" type="button" onclick="location.href='adminUserAccounts.php'" name="back" value="Back"></td>
                </tr>

                <?php endwhile;?>
</table>
</form>

</body>
</html>
