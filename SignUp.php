<?php
require ('db.php');

// If form submitted, insert values into the database.
if (isset($_POST['username'])) {
    // Get form inputs and sanitize them
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Validate form data
    if (empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "<div class='form'>
            <h2>All fields are required.</h2>
            <br/><h2>Click here to <a href='SignUp.php'>Sign Up</a></h2>
        </div>";
        exit();
    } elseif ($password != $confirm_password) {
        echo "<div class='form'>
            <h2>Passwords do not match.</h2>
            <br/><h2>Click here to <a href='SignUp.php'>Sign Up</a></h2>
        </div>";
        exit();
    }

    // Check if the username or email already exists in the database
    $query = "SELECT * FROM `tabel_user` WHERE username='$username' OR email='$email'";
    $result = mysqli_query($conn, $query);
    $rows = mysqli_num_rows($result);

    if ($rows > 0) {
        echo "<div class='form'>
            <h2>Username or email already exists.</h2>
            <br/><h2>Click here to <a href='SignUp.php'>Sign Up</a></h2>
        </div>";
        exit();
    }


    // Insert user data into the database
    $query = "INSERT INTO `tabel_user` (`firstname`, `lastname`, `username`, `email`, `password`, `confirm_password`) VALUES ('$firstname', '$lastname', '$username', '$email', '$password', '$confirm_password')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header ("Location: Login.php");
    } else {
        echo "<div class='form'>
            <h2>Sign up failed. Please try again later.</h2>
            <br/><h2>Click here to <a href='SignUp.php'>Sign Up</a></h2>
        </div>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../CSS/SignUp.css" />
    </head>
    <body>
        <main>
            <div class="container">
                <div class="title">
                    <h2>Sign Up</h2>
                    <h5>Enter your details to create your Friend Finder account</h5>
                </div>
                
                <form method="POST" action="SignUp.php">
                    <div class="center-bar">
                        <div class="input-group">
                            <span class="details">First Name</span>
                            <input type="text" name="firstname" required>
                        </div>
                        
                        <div class="input-group">
                            <span class="details">Last Name</span>
                            <input type="text" name="lastname" required>
                        </div>
                        
                        <div class="input-group">
                            <span class="details">Username</span>
                            <input type="text" name="username" required>
                        </div>

                        <div class="input-group">
                            <span class="details">Email</span>
                            <input type="email" name="email" required>
                        </div>

                        <div class="input-group">
                            <span class="details">Password</span>
                            <input type="password" name="password" required>
                        </div>

                        <div class="input-group">
                            <span class="details">Confirm Password</span>
                            <input type="password" name="confirm_password" required>
                        </div>
                    </div>

                    <div class="check1">
                        <input type="checkbox" id="checkbox1" required>
                        <label for="checkbox1">I agree to join Friend Finder's mailing list.</label>
                    </div>

                    <div class="check2">
                        <input type="checkbox" id="checkbox2" required>
                        <label for="checkbox2">I am not a robot.</label>
                    </div>

                    <div class="input-group">
                        <input type="submit" value="Sign Up">
                    </div>

                    <h4>Already have a Friend Finder account? <a href="Login.php" class="no-underline">Login</a></h4>
                </form>
            </div>
        </main>
    </body>
</html>