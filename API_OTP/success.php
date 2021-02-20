<?php
session_start();


if ($_SESSION["opt"] == $_POST['otp']) {

echo "<h3 id='hsuccess' style='display:block'> Name:: ". $_SESSION["name"] ."</h3> <br>";

echo "<h3 id='hsuccess' style='display:block'> Email:: ". $_SESSION["email"] ."</h3> <br>";
echo "<h3 id='hsuccess' style='display:block'> Mobile Number:: ". $_SESSION["mobile"] ."</h3><br>";


echo "<h1 id='hsuccess' style='display:block'>Registered</h1><a href='index.php'>Go Back</a>";
} 
else {
    $Message = "Wrong OTP";
    header("Location:index.php?Message={$Message}");
}

session_unset();
?>