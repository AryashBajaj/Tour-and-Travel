<?php
session_start();
if (isset($_POST['login'])) {
$conn = mysqli_connect("localhost", "root", "", "dbwproj");
$username = $_POST["username"];
$pw = $_POST["password"];
$sql = "Select password from users where username = '$username'";
$res = mysqli_query($conn, $sql);
if (!$res->num_rows) {
    echo `<p style='color:crimson;'>User does not exist.</p>`;
} else {
    $arr = mysqli_fetch_assoc($res);
    $dbp = $arr['password'];
    if ($dbp == $pw) {
        $sql = "SELECT `UserId`, `name`, `email` from users where username = '$username'";
        $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        $uid = $row["UserId"];
        $name = $row["name"];
        $email = $row["email"];
        $_SESSION["username"] = $username;
        $_SESSION["uid"] = $uid;
        $_SESSION["email"] = $email;
        $_SESSION["name"] = $name;
        $_SESSION["logged"] = true;
        $_SESSION["arrivalDate"] = "";
        $_SESSION["departureDate"] = "";
        $_SESSION["adults"] = "";
        $_SESSION["kids"] = "";
        $_SESSION["pref"] = [];
        echo `<p style='color:crimson;'>Succesfully logged in.</p>`;
        echo "
        <script>
            var delay = 1000;
            setTimeout(function() {
                location.replace('index.php');
            }, delay);
            setTimeout();
        </script>";
    } else {
        echo `<p style='color:crimson;'>Incorrent password.</p>`;
        echo "
        <script>
            var delay = 1000;
            setTimeout(function() {
                location.replace('index.html');
            }, delay);
        </script>";
    }
}
mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <meta name="description" content="Log into the website">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="login.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&family=Montserrat&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>
<body>
<?php
    $u = $_SESSION["uid"];
    if (isset($u)) {
        echo "<p> $u </p>";
    } else {
        echo "<p> HELLO </p>";
    }
?>
<video autoplay muted loop id="backgroundVideo" src="https://player.vimeo.com/external/406227594.sd.mp4?s=d4f7b20af5b399e8a6fe8d4b48c7a6a12a0a4bb3&profile_id=139&oauth2_token_id=57447761"></video>
  <video autoplay muted loop src="https://player.vimeo.com/external/504717899.sd.mp4?s=f97ae0cbf3dab49c7ddedcbef15346dcac089cdf&profile_id=165&oauth2_token_id=57447761" alt="Mobile-Image" id="backgroundImage"></video>
  <div class="Site-Title"><a href="index.php" class="Text">TRAVELLOG</a></div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="login-form">
        <div class="login-box">
        <h1>Login</h1>
        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="username" id="username" required>
        </div>
        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="User Id" name="uid" id="uid" required>
        </div>
        <div class="textbox">
            <i class="fas fa-key"></i>
            <input type="password" placeholder="Password" name="password" id="password" required>
        </div>
        <input class="btn" type="submit" value="Sign In" name="login">
        <hr>
        <div class="Acc">
            Don't have an account?
            <a href="signup.php">Create one!</a>
        </div>
        </div>
    </form>
</body>
</html>