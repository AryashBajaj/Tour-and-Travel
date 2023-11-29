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
        .search-results {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .result-item {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
            cursor: pointer;
        }

        .result-item:hover {
            transform: scale(1.05);
        }

        .result-item img {
            width: 100%;
            height: auto;
            border-radius: 8px 8px 0 0;
        }

        .result-item p {
            padding: 10px;
            text-align: center;
        }

        /* Style for "Hotels in this area" link */
        .result-item a {
            display: block;
            text-align: center;
            padding: 10px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 0 0 8px 8px;
            transition: background-color 0.3s ease-in-out;
        }

        .result-item a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<?php
    if (isset($_POST["search"])) {
        $_SESSION["arrivalDate"] = $_POST["arrivalDate"];
        $_SESSION["departureDate"] = $_POST["departureDate"];
        $_SESSION["adults"] = $_POST["adults"];
        $_SESSION["kids"] = $_POST["kids"];
        $_SESSION["pref"] = isset($_POST["pref"]) ? $_POST["pref"] : [];
        echo "<script>
            location.replace('searchResult.php');
        </script>
        ";
    }
?>
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
        <form method="post" id="search-form">
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
                    <td><input type="submit" id="search" name="search" value="search"></td>
                </tr>
            </table>
        </form>
    </div>
    <div class="search-results">
    </div>
</body>
</html>