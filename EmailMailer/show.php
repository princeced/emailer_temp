<?php
session_start();


if ($_SESSION["opt"] == $_POST['otp']) {

echo "<h3 id='hsuccess' style='display:block'> Name:: ". $_SESSION["name"] ."</h3> <br>";

echo "<h3 id='hsuccess' style='display:block'> Email:: ". $_SESSION["email"] ."</h3> <br>";
echo "<h3 id='hsuccess' style='display:block'> Password:: ". $_SESSION["password"] ."</h3><br>";
echo "<h3 id='hsuccess' style='display:block'> Subject:: ". $_SESSION["subject"] ."</h3><br>";
echo "<h3 id='hsuccess' style='display:block'> Comment:: ". $_SESSION["comment"] ."</h3><br>";

echo "<h1 id='hsuccess' style='display:block'>Registered Successfully</h1><a href='index.php'>Go Back</a>";
} 
else {
echo "<h1 id='hfailed' style='display:block'>Failed</h1><a href='index.php'>Register Again</a>";
    
}

session_unset();
?>