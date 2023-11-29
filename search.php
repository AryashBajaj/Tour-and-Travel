<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="search.css">
    <style>
        td {
            color: white;
        }
    </style>
</head>
<body>
    <div class="content">
        <h2>Find your next travel.</h2>
    </div>

    <div class="box">
        <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>

    <div class="search">
        <form action="search.php" method="post" id="search-form">
            <table class="form-table">
                <tr>
                    <td>Arrival Date</td>
                    <td colspan="2">
                        <input type="date" name="arrivalDate" id="arrivalDate">
                    </td>
                </tr>
                <tr>
                    <td>Departure Date</td>
                    <td colspan="2">
                        <input type="date" name="departureDate" id="departureDate">
                    </td>
                </tr>
                <tr>
                    <td>People</td>
                    <td>Adults: 
                        <input type="number" name="adults" id="kids">
                    </td>
                    <td>
                        Kids:
                        <input type="number" name="kids" id="kids">
                    </td>
                </tr>
                <tr>
                    <td>Preference:</td>
                    <td>
                        <input type="checkbox" name="pref[]" id="beach" value="beaches"> Beaches <br>
                        <input type="checkbox" name="pref[]" id="mountain" value="mountains"> Mountains <br>
                        <input type="checkbox" name="pref[]" id="land" value="grasslands"> Land <br>
                        <input type="checkbox" name="pref[]" id="pilgrimage" value="pilgrimage"> Pilgrimage <br>
                    </td>
                </tr>
                <tr>
                    <td><button id="search" name="search" value="search">Search</button></td>
                </tr>
            </table>
        </form>
    </div>
    <div class="search-results">
        <!-- Results will be displayed here -->
    </div>
<?php
if (isset($_POST['login'])) {
    $_SESSION["arrivalDate"] = $_POST['arrivalDate'];
    $_SESSION["departureDate"] = $_POST['departureDate'];
    $_SESSION["adults"] = $_POST['adults'];
    $_SESSION["kids"] = $_POST['kids'];
    $_SESSION["preference"] = isset($_POST['pref']) ? $_POST['pref'] : [];
}
?>
<script>
    function displayResults(res) {
        return;
    }
    function func() {
        event.preventDefault();
        var xml = new XMLHttpRequest();
        xml.open("GET", "search1.php", true);
        xml.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log("Hello");
                var res = JSON.parse(this.responseText);
                console.log(this.responseText);
            }
        }
        xml.send();
    }
    document.getElementById("search").addEventListener("click", func);
</script>

</body>
</html>