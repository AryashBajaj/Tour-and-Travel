<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels Nearby</title>
    <style>
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
    color: #333;
    padding: 20px;
}

#hotelDetails {
    max-width: 800px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

div {
    margin-bottom: 20px;
}

p {
    margin: 0;
    padding: 10px;
    border-bottom: 1px solid #eee;
}

p:last-child {
    border-bottom: none;
}
a.room-link {
        display: block;
        text-align: center;
        padding: 10px;
        margin-top: 10px; /* Add some spacing between the "Hotels in this area" link and "Room descriptions" link */
        background-color: #3498db;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        transition: background-color 0.3s ease-in-out;
    }

a.room-link:hover {
    background-color: #2980b9;
}
    </style>
</head>
<body>
    <h1>HOTELS NEARBY</h1>
    <div id="hotelDetails"></div>
    <script>
        function fetchData(locationId) {
            var xml = new XMLHttpRequest();
            xml.open("GET", "hotelData.php?lid=" + locationId,true);
            xml.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    var hotelData = JSON.parse(this.responseText);
                    displayHotelDetails(hotelData);
                }
            };
            xml.send();
        }
        function displayHotelDetails(hotelData) {
            var hotelDetailsContainer = document.getElementById("hotelDetails");
            if (hotelData.length > 0) {
                hotelData.forEach(function(hotel) {
                    var hotelDiv = document.createElement("div");
                    var hotelName = document.createElement("p");
                    hotelName.textContent = "Hotel Name - " + hotel.hName;
                    hotelDiv.appendChild(hotelName);
                    var contactNumber = document.createElement("p");
                    contactNumber.textContent = "Contact Number - " + hotel.phone;
                    hotelDiv.appendChild(contactNumber);
                    var email = document.createElement("p");
                    email.textContent = "Email - " + hotel.email;
                    hotelDiv.appendChild(email);
                    hotelDiv.style.borderBottom = "1px solid #ccc";
                    hotelDiv.style.marginBottom = "10px";
                    var roomLink = document.createElement('a');
                    roomLink.href = 'rooms.php?hid=' + hotel.hid;
                    roomLink.textContent = 'Room descriptions';
                    hotelDiv.appendChild(roomLink);
                    hotelDetailsContainer.appendChild(hotelDiv);
                });
            } else {
                hotelDetailsContainer.innerHTML = "No hotel data available.";
            }
        }
        fetchData(<?php echo $_GET["lid"]?>);
    </script>
</body>
</html>
