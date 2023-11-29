<?php
session_start();
$_SESSION["username"] = "";
$_SESSION["uid"] = "";
$_SESSION["email"] = "";
$_SESSION["name"] = "";
$_SESSION["logged"] = false;
$_SESSION["arrivalDate"] = "";
$_SESSION["departureDate"] = "";
$_SESSION["adults"] = "";
$_SESSION["kids"] = "";
$_SESSION["pref"] = [];
echo "<script>location.replace('login.php');</script>";
?>