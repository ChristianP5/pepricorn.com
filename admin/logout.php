<?php
    include("../config/constantsAdmin.php");
    //Destroy the Session 
    session_destroy();

    //Redirect To Login Page
    header("location:".SITEURL."admin/login.php");
?>