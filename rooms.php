<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Rooms</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .room-list {
            list-style: none;
            padding: 0;
        }

        .room-item {
            background-color: #fff;
            margin: 10px 0;
            padding: 10px;
            border-radius: 4px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .no-rooms {
            text-align: center;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Types of Rooms</h1>
        <ul class="room-list" id="roomList">
            <!-- Room details will be displayed here -->
        </ul>
        <p class="no-rooms" id="noRooms"></p>
    </div>

    <script>
        var hid = <?php echo $_GET["hid"]?>;
        var xml = new XMLHttpRequest();
        xml.open("GET", "roomData.php?hid="+ hid, true); 
        xml.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var roomList = document.getElementById('roomList');
                console.log(this.responseText);
                var rooms = JSON.parse(this.responseText);

                rooms.forEach(function(rooms) {
                    if (rooms.length > 0) {
                        var roomItem = document.createElement('li');
                        roomItem.classList.add('room-item');
                        roomItem.textContent = "Room Type: " + room.typeName + " - Cost: $" + room.cost.toFixed(2);
                        roomList.appendChild(roomItem);
                    } else {
                        var noRoomsMessage = document.getElementById('noRooms');
                        noRoomsMessage.innerHTML = "Room details not found.";
                    }
                });
            }
        }
        xml.send();
    </script>
</body>
</html>
