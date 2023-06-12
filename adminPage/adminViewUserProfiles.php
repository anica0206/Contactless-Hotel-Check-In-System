<?php 

    session_start();
    include 'db.php';

    include 'function2.php';
    $result = display_user();

    if(isset($_POST['search']))
    {
        $valueToSearch = $_POST['valueToSearch'];
        $query = "select * from users where name = '$valueToSearch' or profile = '$valueToSearch'";
        $search_result = filterTable($query);
    }
    else
    {
        $query = "select * from users";
        $search_result = filterTable($query);
    }

    function filterTable($query)
    {
        $conn = mysqli_connect('sql112.epizy.com', 'epiz_34044351', '5seDrTWBZn31Qc', 'epiz_34044351_checkinn' );
        $filter_result = mysqli_query($conn, $query);
        return $filter_result;
    }

?>


<!DOCTYPE html> 
<html lang = "en"> 
    <head> 
        <meta charset = "UTF-8"> 
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge"> 
        <meta name = "viewport" content = "width =device-width, initial-scale=1.0"> 
        <title> All User Profiles </title> 
        <br> 
    </head> 

     <style>
     *{  
                    padding: 0;  
                    margin: 0;  
                    box-sizing: border-box;  
                    font-family: 'Poppins', sans-serif;
                    font-weight: 600;
                }  
                body{  
                    width: 100%;  
                    height: 100vh;  
                    background-color: #34495e;  
                    position: relative;  
                    font-family: 'verdana',sans-serif;  
                    background-image: url('cream.jpg');
                }

                header{  
                    width: 100%;  
                    height: 80px;  
                    background-color: #2c3e50;  
                }  

                table{  
                    width: 75%;  
                    position: absolute;  
                    top: 50%;  
                    left: 50%;  
                    transform: translate(-50%,-50%);  
                    border: 1px solid black;
                    margin: 5px;
                } 

                th{
                    border: 1px solid white; 
                    font-size: 30px; 
                }
                
                .heading{  
                    background-color: #FFFF;  
                }  

                h2{
                    text-align: center;
                }

                .heading th{  
                    padding: 10px 0; 
                    border: 1px solid black; 
                }  

                td
                {
                    border: 1px solid black;
                }

                #index 
                {
                    position: relative;   
                    transform: translate(10%, 0%);
                    width: 50%;
                    justify-content: center;
                    height: 300px;
                    position: absolute; 
                    bottom: -300px; 
                    right: -5px; 
                    left: -5px;
                    margin: 0; 
                }

                #inputbox
                {
                    
                    transform: translate(100%, 0%);
                    width:30%;
                    height: 40%;
                }

                .cont
                {
                    height: 300px; 
                    position: relative;   
                }

                .cont .btn-cont{

                    position: absolute; 
                    bottom: -200px; 
                    right: -5px; 
                    left: -5px;
                    margin: 0;
                    
                }

                .right-btn{
                    float: right;
                }

                #but 
                {
                    transform: translate(850%, 0%);
                    text-align: bottom;
                }

                #navbar
                {
                    text-align: right; 
                    height: 50%; 
                    display: flex; 
                    align-items: center;
                }

                nav{
                    flex: 1; 
                    text-align: right; 
                    transform: translate(-5%, 0%);
                }

                .data{  
                    text-align: center;  
                    color: #FFFF;  
                }  
                .data td{  
                    padding: 15px 0;  
                    
                }  

                .button
                {
                    background-color: #4CAF50;
                    border: none;
                    color: black;
                    padding: 10px 20px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;
                    margin-left: 10px;
                    float: right;
                    margin-top: 30px; 
                    padding-top: 30px;
                }

                #btn{  
                    text-decoration: none;  
                    color: red;  
                    background-color: #e74c3c;  
                    padding: 5px 20px;  
                    border-radius: 3px;  
                    height: 150px; 
                    justify-content: center; 
                    align-items: center;
                    bottom:5px;
                    left:0px;
                }  
                
                #btn:hover{  
                    background-color: darkred;  
                    color: #fff;
                    position:absolute;
                    bottom:5px;
                    bottom: 0;
                }  
            </style>
    </style>
    
    <body class = "bg-dark"> 
        <div class = "container"> 
            <div class = "row mt-5"> 
                <div class = "col">
                    <div class = "card mt-5"> 
                        <div class = "card-header"> 
                            <h2 class = "display-6 text-center"> All User Profiles </h2>
                        </div>

                        <form action = "" method = "POST"> 
                            <br>
                            <input id = "inputbox" type="text" name= "valueToSearch" placeholder="Search Name or Profile"> 
                            <input id = "but" type = "submit" name= "search" style="position:absolute; left:35%;" value="Search"><br><br><br>

                        <div class = "card-body">
                            <table class = "table table-bordered text-center">
                                <tr class = "bg-dark text-white">
                                    <th> Email </th> 
                                    <th> Name </th> 
                                    <th> Profile </th>
                                    <th> View </th>
                                </tr>

                              
                                <?php
                                    while($row = mysqli_fetch_array($search_result)) :?>
                                    <tr>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['profile']; ?></td>
                                    <td><a href="viewUserProfile.php?n=<?php echo $row['email']; ?>" style="color: black;">View</a></td>
                                </tr>
                                <?php endwhile;?>
                               
                                
                                </tr>
                                <?php
                              
                                ?>
                            </tr>
                        </table>
                                </div>

                                <p style="text-align:left;">

                                <tr>
                                    <td><br><input id="button" type="button" style="position:absolute; left: 40%; bottom:5%;" onclick="location.href='adminViewUserProfiles.php'" name="ua" value="View User Profiles"></td>
                                </tr>

                                <tr>
                                    <td><br><input id="button" type="button" style="position:absolute; left:50%; bottom:5%;" onclick="location.href='adminDashboard.php'" name="back" value="Back"></td>
                                </tr>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </body>
        
</html>