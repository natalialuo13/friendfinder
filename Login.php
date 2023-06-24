<?php
require('db.php');
session_start();

// If form submitted, insert values into the database.
if (isset($_POST['username'])) {
    // removes backslashes
    $username = stripslashes($_POST['username']);
    //escapes special characters in a string
    $username = mysqli_real_escape_string($conn, $username);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($conn, $password);

    // Checking if the user exists in the database
    $query = "SELECT * FROM `tabel_user` WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $rows = mysqli_num_rows($result);

    if ($rows == 1) {
        $_SESSION['username'] = $username;
        // Redirect user to Dashboard.php
        header("Location: Home.php");
        exit();
    } else {
        echo "<div class='form'>
                <h2>Username/password is incorrect.</h2>
                <br/><h3>Click here to <a href='Login.php'>Login</a></h3>
              </div>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../CSS/Login.css"
    <script src="../JS/Login.js"></script>
</head>

<body>
<main>
    <h2>Friend Finder</h2>
    <form method="post" action="Login.php">
        <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="text" name="username" id="username" placeholder="Username" required>
        </div>
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="Password" required>
        </div>
        <div class="input-group">
            <input type="submit" value="Login">
        </div>
        <h3>Do not have a Friend Finder account yet? <a href="SignUp.php" class="no-underline">Register</a></h3>
    </form>
</main>
</body>
</html>
