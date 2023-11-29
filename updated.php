<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "dbwproj");
if(!$conn){	die("Couldnt connect: ".mysqli_connect_error());   }
if(isset($_POST['upd'])){
    $nname = $_POST['nm1'];
    $em = $_POST['em1'];
    $id = $_SESSION['uid'];
    $query = "UPDATE users SET name='$nname', email='$em' WHERE UserId = $id;";
    if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
        $_SESSION['name']=$nname;
        $_SESSION['email']=$em;
        echo "<script>location.replace('user.php')</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>