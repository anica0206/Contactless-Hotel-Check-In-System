<?php 
    include 'db.php';

    $inputJSON = file_get_contents('php://input');
    $obj = json_decode($inputJSON, TRUE);

    if (isset($obj['email']) && isset($obj['password'])) {
        $email = $obj['email'];
        $password = $obj['password'];

        $query = "SELECT * FROM users WHERE email = '$email'";
        $query_result = mysqli_query($connect_db, $query);

        if (mysqli_num_rows($query_result)) {
            $DB_Elements= mysqli_fetch_array($query_result);

            if ($DB_Elements['password'] == $password) {
                echo "ok";
            } else { 
                echo "try again";
            }
        } 
        else {
            echo "try again";
        }
    } else {
        echo "Missing parameters";
    }
?>
