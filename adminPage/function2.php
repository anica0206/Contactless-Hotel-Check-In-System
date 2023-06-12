<?php 

    require_once 'db.php';

    function display_user()
    {
        global $conn; 
        $query = "select * from users";
        $result = mysqli_query($conn, $query);
        return $result;
    }
?>