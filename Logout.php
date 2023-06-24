<?php
session_start();

// Destroy all sessions
session_unset();
session_destroy();
    
// Redirect to the Login Page
header("Location: Login.php");
exit();
?>