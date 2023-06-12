<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Create User Account</title>
    <br>
    
    <style>
             body
            {
                background: #B0E0E6;
                background-image: url("cream.jpg");
                background-size: cover;
                text-align:center; color:black
            }

            .small-container 
            {
                width: 700px; 
                margin: 50px auto; 
                margin-top:7%;
                font-size: 15px; 
                margin-bottom: 15px; 
                background: #FFFFFF; 
                box-shadow: 0px 2px rgba(0,0,0,0.3);
                padding: 30px; 
                border-radius: 8px;
                text-align:center; 
            }

            .title {
                text-align:center; 
            }
            
            .container
            {
                width: 800px; 
                margin: 50px auto; 
                font-size: 15px; 
                margin-bottom: 15px; 
                background: #f8f8f8; 
                box-shadow: 0px 2px 2px rgba(0,0,0,0.3);
                padding: 30px; 
                border-radius: 8px;
                text-align:center; 
            }

            .header 
            {
                text-align: center; 
                margin: 0 0 15px; 
                color: #FFFFFF; 
            }

            input[type="radio"] 
            {
                margin-top: -1px;
                vertical-align: middle;
                text-align:center; 
            }

            label 
            {
                font-size: 18px; 
                display: inline-block; 
                padding: auto;
                text-align:center; 
            }

            .smallbluebtn
            {
                font-weight: bold; 
                background-color: #329EAA; 
                color: white;
                border-radius: 8px; 
                border: none; 
                padding: 5px 15px 8px 15px; 
                text-align: center;
            }

            .exit 
            {
                display: block; 
                margin-left: auto; 
                margin-right: auto; 
                font-weight: bold; 
                background-color: #cd5c5c; 
                color: white; 
                border-radius: 8px; 
                border: none;
                text-align: center;
                padding: 10px 24px; 
            }

            .exit:hover
            {
                font-weight: 900;
                background-color: #cf3e3e;
                text-align:center;
            }

            .subjectbtn
            {
                display: block; 
                margin-left: auto; 
                margin-right: auto; 
                font-size: 20px; 
                font-weight: bold; 
                background-color: #329EAA; 
                color: white; 
                border-radius: 8px; 
                border: none; 
                width: 75%;
                padding: 14px 28px; 
                text-align: center;
            }

            .subjectbtn:hover
            {
                background-color: rgb(9, 111, 245);
                text-align:center; 
            }

            button
            {
                background-color: #329EAA;
                border: none;
                color: white; 
                padding: 15px 45px; 
                text-align: center; 
                text-decoration: none;
                display: inline-block; 
                font-size: 16px; 
                cursor: pointer;
            }

            .blueButton
            {
                background-color: #329EAA;
                border: none;
                color: white; 
                padding: 15px 32px; 
                text-align: center; 
                text-decoration: none;
                display: inline-block; 
                font-size: 16px; 
                cursor: pointer;
                border-radius: 8px;
            }

            .blueButton:hover
            {
                background-color: rgb(9, 111, 245);
            }

            .box {
                display:flex;
                align-items:baseli
            }

            .sortBtn
            {
                display: inline-block;
                margin-left:5%;
                margin-right:5%;
                font-weight: bold; 
                background-color: rgb(9, 155, 65);
                color: white; 
                border-radius: 8px; 
                border: none; 
                padding: 5px 15px 8px 15px; 
                text-align: center;
            }

            .sortBtn:hover
            {
                background-color: rgb(6, 99, 41);
                text-align:center; 
            }

            .sortBtn2
            {
                display: inline-block;
                font-weight: bold; 
                background-color: rgb(9, 155, 65);
                color: white; 
                border-radius: 8px; 
                border: none; 
                padding: 5px 15px 8px 15px; 
                text-align: center;
                font-size:15px;
            }

            .sortBtn2:hover
            {
                background-color: rgb(6, 99, 41);
            }

            .submitBtn
            {
                display: inline-block;
                font-weight: bold; 
                background-color: rgb(9, 155, 65);
                color: white; 
                border-radius: 8px; 
                border: none; 
                padding: 5px 15px 8px 15px; 
                text-align: center;
            }

            .submitBtn:hover
            {
                background-color: red !important;
            }

            .boxShadow {
                box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);
                text-align:center; 
            }

            .back
            {
                display: block; 
                margin-left: auto; 
                margin-right: auto;
                float:center; 
                font-weight: bold; 
                background-color: #329EAA;
                color: white; 
                border-radius: 8px; 
                border: none; 
                padding: 5px 15px 8px 15px; 
                text-align: center;
            }

            .back:hover
            {
                background-color:rgb(9, 111, 245);
                text-align:center; 
            }

            .navigationBtn
            {
                border: none;
                display: inline-block;
                padding: 8px 16px;
                overflow: hidden;
                text-decoration: none;
                color: inherit;
                background-color: inherit;
                cursor: pointer;
                white-space: nowrap;
                width: auto;
                border: none;
                outline: 0;
                font-weight: bold;
                color: #fff !important;
                background-color: #009688 !important;
                border-radius: 5px;
                text-align:center; 
            }

            .navigationBtn:hover
            {
                background-color: rgb(9, 111, 245) !important;
                text-align:center; 
            }

            .table-container {
                height: 10em;
                text-align:center; 
            }
            table {
                display: flex;
                flex-flow: column;
                height: 200%;
                width: 300%;
                text-align:center;
            }
            table thead 
            {
                /* head takes the height it requires, 
                and it's not scaled when table is resized */
                flex: 1 1 auto;
                width: 94.9%;
                text-align:center; 
            }
            table tbody 
            {
                /* body takes all the remaining available space */
                flex: 1 1 auto;
                display: block;
                overflow-y: scroll;
                text-align:center; 
            }
            table tbody tr 
            {
                width: 100%;
                text-align:center; 
            }
            table thead, table tbody tr 
            {
                display: table;
                table-layout: fixed;
                text-align:center; 
            }

            /* { border: 1px solid red; }

    </style>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if ($_SERVER['REQUEST_METHOD'] == "POST") 
    {
        // removes backslashes
        $email = stripslashes($_REQUEST['email']);
        //escapes special characters in a string
        $email = mysqli_real_escape_string($conn, $email);

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            echo "<script>alert('Invalid Email')</script>";
            echo "<script>window.location.href = 'adminCreateUser.php';</script>";
            exit();
        }

        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0)
        {
            echo "<script>alert('User with same Email already exists')</script>";
            echo "<script>window.location.href = 'adminCreateUser.php';</script>";
            exit();
        }
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $name = stripslashes($_REQUEST['name']);
        $name = mysqli_real_escape_string($conn, $name);
        $dateofbirth = stripslashes($_REQUEST['dateofbirth']);
        $dateofbirth = mysqli_real_escape_string($conn, $dateofbirth);
        $profile = stripslashes($_REQUEST['profile']);
        $profile = mysqli_real_escape_string($conn, $profile);
        $status = stripslashes($_REQUEST['status']);
        $status = mysqli_real_escape_string($conn, $status);

        if(strlen($password) < 8)
        {
            echo "<script>alert('Password needs to be 8 characters long.')</script>";
            echo "<script>window.location.href = 'adminCreateUser.php';</script>";
        }

        else 
        {
            $query    = "INSERT into `users` (email, password, name, dateofbirth, profile, status)
                        VALUES ('$email', '" .$password. "', '" .$name. "', '" .$dateofbirth. "' , '" .$profile. "', '" .$status. "')";

            $result   = mysqli_query($conn, $query);

            if ($result) 
            {
                $logfile = fopen("user_create.txt", "a"); 
                $logdata = "Email: $email, Password: $password, Name: $name, Date of Birth: $dateofbirth, Profile: $profile, Status: $status\n"; // Compose the log data
                fwrite($logfile, $logdata); 
                fclose($logfile); 
               
                echo "<div class='form'>
                    <h3>You have registered successfully.</h3><br/>
                    <p class='link'>Click here to <a href='adminUserAccounts.php'>view accounts.</a></p>
                    </div>";
            } 
            else 
            {
                echo "<div class='form'>
                    <h3>Required fields are missing.</h3><br/>
                    <p class='link'>Click here to <a href='adminCreateUser.php'>register.</a> again.</p>
                    </div>";
            }
            
        }

                
    } 
    
    else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Create User Account</h1>
        <br>

        <label for="email">Email:</label> 
        <input type="text" class="login-input" name="email" required />
        <br><br>

        <label for="password">Password:</label> 
        <input type="password" class="login-input" name="password" required>
        <br><br> 

        <label for="name">Name:</label> 
        <input type="text" class="login-input" name="name" required>

        <br><br>
        <label for="dateofbirth">Date of Birth:</label> 
        <input type="date" id="dateofbirth" name="dateofbirth" required> 

        <br><br>
        <label for="profile">Profile: </label>
        <select name = "profile" id = "profile"> 
            <option value = "Administrator">Administrator</option> 
            <option value = "Hotel Operator">Hotel Operator</option> 
        </select>

        <br><br>
        <label for="status">Status:</label>
        <input type = "text" id="status" name="status" value="Active" readonly><br>

        <tr>
            <br><br><br>
            <td><input id="button" type="submit" name="s" value="Submit"></td>
            <td><input id="button" type="button" onclick="location.href='adminDashboard.php'" name="back" value="Back"></td>
        </tr>
    </form>

<?php
    }
?>
</body>
</html>
            