<?php
$conn = mysqli_connect("localhost", "root", "", "dbwproj");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
for ($hid = 1; $hid <= 30; $hid++) {
    for ($i = 1; $i <= 2; $i++) {
        $typeName = "Room Type " . $i; 
        $cost = rand(50, 200); 
        $sqlInsertRoom = "INSERT INTO hotel_room (hid, typeName, cost) VALUES ($hid, '$typeName', $cost)";

        if (mysqli_query($conn, $sqlInsertRoom)) {
            echo "Inserted into hotel_room for hid=$hid, typeName=$typeName<br>";
        } else {
            echo "Error inserting into hotel_room: " . mysqli_error($conn) . "<br>";
        }
    }
}
mysqli_close($conn);
?>