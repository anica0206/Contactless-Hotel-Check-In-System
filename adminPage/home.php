<?php 
    require('db.php');
?>

<!DOCTYPE html> 
<html> 
    <head>
        <title>Administrator Home Page</title>
        <link rel = "stylesheet" href = "stylesheet.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
        <style>
            body {
                background: #1690A7;
                background-image: url("cream.jpg");
                background-size: cover;
            }
            h1 {
                text-align:center; color:black
            }
            h2 {
                text-align:center; color:black
            }
            h3{
                text-align:center; color:black
            }
            html * {
                font-family: Montserrat;
            }
        </style>
    </head>

    <body> 
        <h1 class = "header"> Administrator Home Page </h1>
        <div class = "small-container">

                <button class = "subjectbtn boxShadow" onclick = "window.location.href = 'adminUserAccounts.php';"> All User Accounts </button><br><br> 
                <button class = "subjectbtn boxShadow" onclick = "window.location.href = 'adminViewUserProfiles.php';"> View User Profiles </button><br><br> 
                <button class = "subjectbtn boxShadow" onclick = "window.location.href = 'adminCreateUser.php';"> Create User Account </button><br><br> 
                <button class = "exit boxShadow" onclick = "window.location.href = 'login.php';">Logout</button>
        </div>
    </body>
</html>