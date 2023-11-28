<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "DBWproj";

$conn = mysqli_connect($host, $username, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sqlCreateDatabase = "CREATE DATABASE IF NOT EXISTS $database";
if (mysqli_query($conn, $sqlCreateDatabase)) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . mysqli_error($conn) . "<br>";
}

mysqli_select_db($conn, $database);

$sqlCreateUsersTable = "
    CREATE TABLE IF NOT EXISTS users (
        UserId INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255) UNIQUE,
        name varchar(50), 
        password VARCHAR(255),
        email VARCHAR(255)
    )";
if (mysqli_query($conn, $sqlCreateUsersTable)) {
    echo "Users table created successfully<br>";
} else {
    echo "Error creating Users table: " . mysqli_error($conn) . "<br>";
}

$sqlCreateLocationsTable = "
    CREATE TABLE IF NOT EXISTS locations (
        locationId INT PRIMARY KEY,
        locationName VARCHAR(255),
        latitude DECIMAL(9, 6),
        longitude DECIMAL(9, 6),
        railway INT,
        airport INT,
        beaches INT,
        mountains INT,
        grasslands INT,
        pilgrimage INT, 
        snow INT,
        season INT
    )";
if (mysqli_query($conn, $sqlCreateLocationsTable)) {
    echo "Locations table created successfully<br>";
} else {
    echo "Error creating Locations table: " . mysqli_error($conn) . "<br>";
}

$sqlCreateLocationDetails = "
    CREATE TABLE IF NOT EXISTS ld (
        lid INT PRIMARY KEY,
        wlink varchar(200),
        ilink varchar(300)
    )";

if (mysqli_query($conn, $sqlCreateLocationDetails)) {
    echo "ld table created succesfully.";
} else {
    echo "Error creating ld table: " . mysqli_error($conn) . "<br>";
}

$sqlCreateSavedTable = "
    CREATE TABLE IF NOT EXISTS saved (
        userId INT,
        locationId INT,
        PRIMARY KEY (userId, locationId),
        FOREIGN KEY (userId) REFERENCES users(UserId),
        FOREIGN KEY (locationId) REFERENCES locations(locationId)
    )";
if (mysqli_query($conn, $sqlCreateSavedTable)) {
    echo "Saved table created successfully<br>";
} else {
    echo "Error creating Saved table: " . mysqli_error($conn) . "<br>";
}

$sqlCreateHotelsTable = "
    CREATE TABLE IF NOT EXISTS hotels (
        hid INT PRIMARY KEY,
        locationId INT,
        phone VARCHAR(20),
        email VARCHAR(255),
        FOREIGN KEY (locationId) REFERENCES locations(locationId)
    )";
if (mysqli_query($conn, $sqlCreateHotelsTable)) {
    echo "Hotels table created successfully<br>";
} else {
    echo "Error creating Hotels table: " . mysqli_error($conn) . "<br>";
}

$sqlCreateHotelRoomTable = "
    CREATE TABLE IF NOT EXISTS hotel_room (
        hid INT,
        roomType INT,
        PRIMARY KEY (hid, roomType),
        typeName VARCHAR(255),
        cost DECIMAL(10, 2),
        FOREIGN KEY (hid) REFERENCES hotels(hid)
    )";
if (mysqli_query($conn, $sqlCreateHotelRoomTable)) {
    echo "Hotel Room table created successfully<br>";
} else {
    echo "Error creating Hotel Room table: " . mysqli_error($conn) . "<br>";
}

mysqli_close($conn);
?>