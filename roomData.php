<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "dbwproj");
$hid = $_GET["hid"];
$sql = "SELECT * FROM `hotel_room` WHERE `hid` = $hid";
$res = mysqli_query($conn, $res);
$data = [];
while ($row = mysqli_fetch_assoc($res)) {
    $data[] = $row;
}
echo json_encode($data);
?>