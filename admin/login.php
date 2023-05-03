<?php include('../config/constantsAdmin.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pepricorn Admin Panel</title>
    <link rel="stylesheet" href="../admin/css/admin.css">
</head>
<body>
    <div class="login">
        <h1 class="text-center">Login</h1>
        <br>
        
        <?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'] ; //to display Session Message ('Admin Added Succesfully/Failed')
                    unset($_SESSION['login']); //to remove Session Message ('Admin Added Succesfully/Failed')
                }

                if(isset($_SESSION['no-login-message'])){
                    echo $_SESSION['no-login-message'] ; //to display Session Message ('Admin Added Succesfully/Failed')
                    unset($_SESSION['no-login-message']); //to remove Session Message ('Admin Added Succesfully/Failed')
                }

                
        ?>

        <br>

        <!-- Login Form Starts Here -->
        <form action="" method="POST" class="text-center">
            Username:
            <br>
            <input type="text" name="username" placeholder="Enter Username">
            <br>
            <br>
            Password:
            <br>
            <input type="password" name="password" placeholder="Enter Password">
            <br>
            <br>
            <input type="submit" name="submit" value="Login" class="btn-primary">
        </form>
        <!-- Login Form Ends Here -->
        <br>
        <p class="text-center">Created By Me</p>
    </div>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    //Button Pressed
    
    //Gather the Data
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //Check whether the User  with Username and Password Exists or not
    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

    $res = mysqli_query($conn, $sql);


    if($res==TRUE){
        $count = mysqli_num_rows($res);
        
        if($count == 1){
            $rows = mysqli_fetch_assoc($res);
            $full_name = $rows['full_name'];
            $_SESSION['login'] = "<div class='success'>Login Succesful!</div>";
            $_SESSION['user'] = $full_name; //this data will only be unset on logout (so this data will identify if the user is logged in)
            header("location:".SITEURL."admin/index.php");
        }else{
            $_SESSION['login'] = "<div class='fail text-center'>Invalid Password or Username</div>";
            header("location:".SITEURL."admin/login.php");
        }
    }else{
        echo "wrong pass";
        //Query Unresolved
        $_SESSION['login'] = "<div class='fail text-center'>Login Failed. Try Again</div>";
        header("location:".SITEURL."admin/login.php");
    }
}
    ?>