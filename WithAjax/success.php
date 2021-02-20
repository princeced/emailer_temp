<?php
session_start();


if ($_SESSION["opt"] == $_POST['otp']) {

echo "<h3 id='hsuccess' style='display:block'> Name:: ". $_SESSION["name"] ."</h3> <br>";

echo "<h3 id='hsuccess' style='display:block'> Email:: ". $_SESSION["email"] ."</h3> <br>";
echo "<h3 id='hsuccess' style='display:block'> Mobile Number:: ". $_SESSION["mobile"] ."</h3><br>";


echo "<h1 id='hsuccess' style='display:block'>Registered</h1>";
} 
else {
echo "<h1 id='hfailed' style='display:block'>Failed</h1>";
}

session_unset();
?>