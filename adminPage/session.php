<?php
    function userData($conn)
    {
        if(isset($_SESSION['email']))
        {
            $email = $_SESSION['email'];
            $query = "select * from users where email = '$email' limit 1";
            $result = mysqli_query($conn, $query);
            if($result && mysqli_num_rows($result) > 0)
            {
                $userData = mysqli_fetch_assoc($result);
                return $userData;
            }
        }

        header("Location: login.php");
        die;
    }
?>