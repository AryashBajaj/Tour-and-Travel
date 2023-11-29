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
    $conn = mysqli_connect("localhost", "root", "", "dbwproj");
    $arrivalDate = $_SESSION['arrivalDate'];
    $departureDate = $_SESSION['departureDate'];
    $adults = $_SESSION['adults'];
    $kids = $_SESSION['kids'];
    $preference = isset($_SESSION['pref']) ? $_SESSION['pref'] : [];
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
?>