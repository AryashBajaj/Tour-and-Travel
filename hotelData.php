<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "dbwproj");
$lid = $_GET["lid"];
$sql = "SELECT * from `hotels` WHERE `locationId` = $lid";
$res = mysqli_query($conn, $sql);
$data = [];
while ($row = mysqli_fetch_assoc($res)) {
    $data[] = $row;
}
echo json_encode($data);
?>