<?php
    include("../config/constantsViewer.php");
    //Destroy the Session 
    session_destroy();

    //Redirect To Login Page
    if(headers_sent()){
        echo '<script type="text/javascript">window.location.href="hero.php";</script>';
      }else{
          header("location:../views/hero.php");
      }
?>