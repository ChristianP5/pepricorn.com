<?php
    //Authorization Control
    //Check wheteher the user is Logged in or not
    if(!isset($_SESSION['user'])){
        //User is Not Logged In
        $_SESSION['no-login-message'] = "<div class='fail text-center'>Please Login First to Access Admin Panel</div>";
        //Redirect to Login Page
        header("location:".SITEURL."admin/login.php");
    }
?>