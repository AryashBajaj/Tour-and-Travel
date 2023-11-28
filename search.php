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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            height: 100vh;
        }
        .content{
            background: rgb(12, 12, 24);
            height: 100%;
            /* overflow: hidden; */
        }
        .content h2{
            color: white;
            position: absolute;
            top: 30%;
            left: 50%;
            font-family: 'Poppins', sans-serif;
            transform: translate(-50%, -50%);
            z-index: 1;
            font-size: 60px;
            text-align: center;
        }
        .box ul li{
            position: absolute;
            width: 35px;
            height: 35px;
            list-style: none;
            opacity: 0;
            background: radial-gradient(rgb(59, 192, 244), transparent,transparent);
            bottom: 0;
            left: 10vw;
            animation: animate 15s linear infinite;
        }
        .box ul li:nth-child(2) {
            left: 37vw;
            animation-delay: 2s;
        }
        .box ul li:nth-child(3) {
            left: 25vw;
            animation-delay: 4s;
        }
        .box ul li:nth-child(4) {
            left: 60vw;
            animation-delay: 6s;
        }
        .box ul li:nth-child(5) {
            left: 75vw;
            animation-delay: 4s;
        }
        @keyframes animate {
            0% {
                transform: scale(0);
                opacity: 1;
                bottom: 0;
            }
            100% {
                transform: scale(10);
                opacity: 0;
                bottom: 100vh;
            }
        }
        .search{
            position: absolute;
            top: 40%;
            left: 30%;
            color: white;
            height: 500px;
            padding: 0 90px;
        }
        .form-table, .form-table tr, .form-table td{
            border: 2px solid white;
        }
        .form-table{
            border: 1px solid white;
            height: 200px;
            width: 300px;
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