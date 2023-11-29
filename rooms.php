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
            padding: 20px;
        }

        .room-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .room-item {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            background-color: white;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Types of Rooms</h2>
    <br>
    <div class="room-container" id="roomContainer">
    </div>
    <script>
        function displayRoomDetails(data) {
            var roomContainer = document.getElementById('roomContainer');
            roomContainer.innerHTML = '';
            if (data.length === 0) {
                var noDataMessage = document.createElement('p');
                noDataMessage.textContent = 'No room data found.';
                roomContainer.appendChild(noDataMessage);
            } else {
                data.forEach(function (room) {
                    var roomDiv = document.createElement('div');
                    roomDiv.classList.add('room-item');
                    var roomTypeParagraph = document.createElement('p');
                    roomTypeParagraph.textContent = 'Room Type: ' + room.typeName;
                    var costParagraph = document.createElement('p');
                    costParagraph.textContent = 'Cost: ' + room.cost;
                    roomDiv.appendChild(roomTypeParagraph);
                    roomDiv.appendChild(costParagraph);
                    roomContainer.appendChild(roomDiv);
                });
            }
        }
        var hid = <?php echo $_GET["hid"];?>;
        var xml = new XMLHttpRequest();
        xml.open('GET', 'roomData.php?hid=' + hid, true);
        xml.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var res = JSON.parse(this.responseText);
                displayRoomDetails(res);
            }
        }
        xml.send();
    </script>
</body>
</html>
