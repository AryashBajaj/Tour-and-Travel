<?php
    session_start();
    function determineSeason($arrivalDate) {
        $dateTime = new DateTime($arrivalDate);
        $formattedDate = $dateTime->format('Y-m-d');
        $month = date('m', strtotime($formattedDate));
        if ($month >= 3 && $month <= 6) {
            return 2; // Summer
        } elseif ($month >= 7 && $month <= 9) {
            return 3; // Monsoon
        } else {
            return 1; // Winter
        }
    }
    $conn = mysqli_connect("localhost", "root", "", "dbwproj");
    $arrivalDate = $_SESSION['arrivalDate'];
    $departureDate = $_SESSION['departureDate'];
    $adults = $_SESSION['adults'];
    $kids = $_SESSION['kids'];
    $preference = isset($_SESSION["pref"]) ? $_SESSION["pref"] : [];
    $season = determineSeason($arrivalDate);
    $sql = "SELECT l.*, ld.* FROM locations l, ld WHERE l.locationId = ld.lid AND `season` = $season";
    if (!empty($preference)) {
        foreach ($preference as $pref) {
            $sql .= " AND `$pref` = 1";
        }
    }
    $res = mysqli_query($conn, $sql);
    $data = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }
    echo json_encode($data);
?>