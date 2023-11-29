<?php
session_start();
if (isset($_GET["lid"])) {
    $_SESSION["lid"] = $_GET["lid"];
}

?>