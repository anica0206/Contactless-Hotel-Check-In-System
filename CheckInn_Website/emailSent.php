<?php 
    $conn = new mysqli('sql112.epizy.com', 'epiz_34044351', '5seDrTWBZn31Qc', 'epiz_34044351_checkinn');

    if($conn -> connect_error)
    {
        die('Connection failed: '.$conn->connect_error);
    }

    $bookingID = $_POST['bookingID'];

    $sql = "SELECT email FROM bookings WHERE id = $bookingID";
    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
        $row = $result->fetch_assoc(); 
        $bookingEmail = $row['email'];
    }
    else 
    {
        echo "Email not found in the booking table.";
    }

    $recipientEmail = $bookingEmail; 
    $subject = 'Payment Confirmation';

    $message = "Dear Customer, \n\n";
    $message .= "Thank you for your payment!\n";
    $message .= "We have received your payment for booking ID: $bookingID.\n";
    $message .= "Here are the booking details:\n\n";
    $message .= "Hotel ID: ".$hotelID . "\n";
    $message .= "Room ID: ".$roomID . "\n";
    $message .= "Check-in Date: ".$checkIn. "\n";
    $message .= "Check-out Date: ".$checkOut. "\n";
    $message .= "Number of Customers: ".$noOfCustomer. "\n";
    $message .= "Notes: ".$notes. "\n\n";
    $message .= "Thank you for booking with us!\n\n";

    $headers = "From: Your Name <yourname@example.com>\r\n";
    $headers .= "Reply-To: yourname@example.com\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    $mailSent = mail($bookingEmail, $subject, $message, $headers);

    if($mailSent)
    {
        echo "Email sent successfully.";
    } 
    else 
    {
        echo "Failed to send email.";
    }
?>
