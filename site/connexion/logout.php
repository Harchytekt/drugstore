<?php
    session_start(); //to ensure you are using same session
    $_SESSION = array(); //clears the $_SESSION variable
    session_destroy(); //destroy the session
    header("location: ../index.php"); //to redirect back to "index.php" after logging out
    die("Redirecting to: ../index.php");
?>
