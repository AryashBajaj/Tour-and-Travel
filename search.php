<?php 
session_start();
function determineSeason($arrivalDate) {
    $month = date('m', strtotime($arrivalDate));
    if ($month >= 10 || $month <= 2) {
        return 1;
    } elseif ($month >= 3 && $month <= 6) {
        return 2;
    } else {
        return 3;
    }
}
?>

<script>
    function displayResults(res) {
        var resultsContainer = document.querySelector(".search-results");
        resultsContainer.innerHTML = ""; // Clear previous results

        // Loop through each result and display information
        for (var i = 0; i < res.length; i++) {
            var result = res[i];
            var resultItem = document.createElement("div");
            resultItem.className = "result-item";

            // Display the image, name, and link
            resultItem.innerHTML += "<img src='" + result.ilink + "' alt='Location Image' width='100'>";
            resultItem.innerHTML += "<p>Name: " + result.locationName + "</p>";
            resultItem.innerHTML += "<p><a href='hotel_page.php?locationId=" + result.locationId + "'>View Hotels</a></p>";

            // Display notable features
            resultItem.innerHTML += "<p>Notable Features: " + getNotableFeatures(result) + "</p>";

            // Append the result item to the results container
            resultsContainer.appendChild(resultItem);
        }
    }

    function getNotableFeatures(result) {
        var features = [];
        if (result.beaches) features.push("Beaches");
        if (result.mountains) features.push("Mountains");
        if (result.land) features.push("Land");
        if (result.pilgrimage) features.push("Pilgrimage");

        return features.join(", ");
    }
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="search.css">
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
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" id="search-form">
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
                    <td><button name="search" value="search">Search</button></td>
                </tr>
            </table>
        </form>
    </div>
    <div class="search-results">
        <!-- Results will be displayed here -->
    </div>
<?php
    if (isset($_POST['search'])) {
        $conn = mysqli_connect("localhost", "root", "", "dbwproj");
        $arrivalDate = $_POST['arrivalDate'];
        $departureDate = $_POST['departureDate'];
        $adults = $_POST['adults'];
        $kids = $_POST['kids'];
        $preference = isset($_POST['pref']) ? $_POST['pref'] : [];
        $season = determineSeason($arrivalDate);
        $sql = "SELECT l.*, ld.* FROM locations l, ld WHERE l.locationId = ld.lid AND `season` = $season";
        foreach ($preference as $pref) {
            $sql .= " AND `$pref` = 1";
        }
        $res = mysqli_query($conn, $sql);
        $data = array();
        while ($row = mysqli_fetch_assoc($res)) {
            $data[] = $row;
        }
        echo json_encode($data);
    }
?>
<script>
    function displayResults(res) {
        
    }
    var xml = new XMLHttpRequest();
    xml.open("GET", "search.php", true);
    xml.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var res = JSON.parse(this.responseText);
            console.log(res);
            displayResults(res);
        }
    }
    xml.send();
</script>
</body>
</html>