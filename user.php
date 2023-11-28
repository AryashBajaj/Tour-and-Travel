<?php
session_start();
if ($_SESSION["logged"] !== true) {
    echo "<script>
        location.replace('login.php');
    </script>";
}
$conn = mysqli_connect("localhost", "root", "", "dbwproj");
echo "This is user profile page.";
?>
