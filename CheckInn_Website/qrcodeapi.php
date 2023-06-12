
<?php 
    //connect to the database 
    $conn = mysqli_connect("sql112.epizy.com", "epiz_34044351", "5seDrTWBZn31Qc", "epiz_34044351_checkinn");

    if($conn-> connect_error)
    {
        die("Connection failed: " . $conn->connect_error);

    }

    if(isset($_POST['generate']))
    {
        $num_codes = $_POST['num_codes'];
        $code = $_POST['text_code'];

        for($i=1; $i <= $num_codes; $i++)
        {
            $image_url = "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$code $i&choe=UTF-8";
            $sql = "INSERT INTO qrcodes (image_url) VALUES ('$image_url')";

            if($conn->query($sql) === TRUE)
            {
                echo "<img src='$image_url'><br><br>";
            }
            else
            {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
?>