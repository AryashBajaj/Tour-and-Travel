<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "dbwproj");
if (!$conn) {
    die("Error!!!");
}
$sql1 = "Drop trigger if exists updateLogger";

$sql2 = "create trigger updateLogger BEFORE UPDATE on users for each row
begin
    insert into updatelog values (old.userId, old.name, new.name, old.email, new.name, SYSDATE());
end;";
if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
    echo "Trigger succesfully created.";
}
?>
