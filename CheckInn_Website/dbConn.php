<?php

$db = mysqli_connect("sql112.epizy.com","epiz_34044351","5seDrTWBZn31Qc","epiz_34044351_checkinn");  // database connection

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>