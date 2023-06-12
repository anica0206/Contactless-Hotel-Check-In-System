<?php
    session_start();
    include "db.php";

    $logFilePath = 'user_login.txt'; 

    if (isset($_POST['email']) && isset($_POST['password'])) 
    {
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $email = validate($_POST['email']);
        $password = validate($_POST['password']);

        if (empty($email)) 
        {
            header("Location: login1.php?error=Email cannot be empty");
            exit();
        } 
        else if (empty($password)) 
        {
            header("Location: login1.php?error=Password cannot be empty");
            exit();
        } 
        else 
        {
            $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);

                if ($row['profile'] === "Administrator") 
                {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['password'] = $row['password'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['dateofbirth'] = $row['dateofbirth'];
                    $_SESSION['profile'] = $row['profile'];
                    $_SESSION['status'] = $row['status'];

                    $logMessage = "Email: $email | Password: $password";
                    writeLog($logFilePath, $logMessage);

                    header("Location: home.php");
                    exit();
                } 
                else 
                {
                    header("Location: login1.php?error=User account not found");
                    exit();
                }
            } 
            else 
            {
                header("Location: login1.php?error=Incorrect email or password");
                exit();
            }
        }
    } 

    else 
    {
        header("Location: login1.php?error");
        exit();
    }

    function writeLog($filePath, $message)
    {
        date_default_timezone_set('Asia/Singapore');
        $timestamp = date('Y-m-d H:i:s'); 
        $logMessage = "[$timestamp] $message"; 

        $logFile = fopen($filePath, 'a');
        if ($logFile) 
        {
            fwrite($logFile, $logMessage . PHP_EOL);
            fclose($logFile);
        } 
        else 
        {
            echo "Failed to open the log file.";
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>

<body>
    <form action="login2.php" method="post">
        <h2>LOGIN</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <label>Email</label>
        <input type="text" name="email" placeholder="Email"><br>

        <label>Password</label>
        <input type="password" name="password" placeholder="Password"><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
