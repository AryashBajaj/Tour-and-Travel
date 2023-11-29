<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "dbwproj");
if (!$conn) {
    echo "Connection could not be made!!!";
}
if (isset($_POST["signup"])) {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $pw = $_POST["password"];
    $email = $_POST["email"];
    $confirm = $_POST["confirm"];
    $sql = "SELECT * from users where email = '$email'";
    $eres = mysqli_query($conn, $sql);
    $sql = "SELECT * from users where email = '$email'";
    $nres = mysqli_query($conn, $sql);
    if ($eres->num_rows > 0) {
        echo "<script>
        alert('Email already in use!');
    </script>";
    } elseif ($nres->num_rows > 0) {
        echo "<script>
        alert('Username already in use!');
    </script>";
    } else {
        if ($pw === $confirm) {
            $sql = "INSERT into `users` (`username`, `name`, `password`, `email`) values ('$username', '$name', '$pw', '$email')";
            mysqli_query($conn, $sql);
            $sql = "SELECT UserId from users where username = '$username'";
            $res = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($res);
            $uid = $row["UserId"];
            $_SESSION["uid"] = $uid;
            $_SESSION["name"] = $name;
            $_SESSION["username"] = $username;
            $_SESSION["email"] = $email;
            $_SESSION["logged"] = true;
            echo "Succesfully signed Up!";
            echo "
            <script>
                var delay = 1000;
                setTimeout(function() {
                    location.replace('index.php');
                }, delay);
                setTimeout();
            </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sign Up</title>
  <meta name="description" content="Log into the website">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="signup.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&family=Montserrat&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>

<body>
  <img src="https://images.pexels.com/photos/998641/pexels-photo-998641.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" id="backgroundVideo">
  <img src="https://images.pexels.com/photos/1624496/pexels-photo-1624496.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" alt="Mobile-Imange" id="backgroundImage">
  <div class="Site-Title"><a href="index.php" class="Text">TRAVELLOG</a></div>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="signup-form">
    <div class="login-box">
      <h1 id="sutext">Sign Up</h1>
      <div class="textbox">
        <i class="fas fa-user"></i>
        <input type="text" placeholder="Name" name="name" id="name" required>
      </div>
      <div class="textbox">
        <i class="fas fa-envelope"></i>
        <input type="email" placeholder="Email" name="email" id="email" required>
      </div>
      <div class="textbox">
        <i class="fas fa-at"></i>
        <input type="text" placeholder="Username" name="username" id="username" required>
      </div>
      <div class="textbox">
        <i class="fas fa-key"></i>
        <input type="password" placeholder="Password" name="password" id="password" required>
      </div>
      <div class="textbox">
        <i class="fas fa-key"></i>
        <input type="password" placeholder="Confirm Password" name="confirm" id="confirm" required>
      </div>
      <input class="btn" type="submit" value="Sign Up" name="signup">
      <hr>
      <div class="Acc">
        Already have an account?
        <a href="login.php">Login!</a>
      </div>
    </div>
  </form>
</body>
</html>