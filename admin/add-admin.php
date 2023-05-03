<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <?php
            if(isset($_SESSION['not-match'])){
                echo $_SESSION['not-match'];
                unset($_SESSION['not-match']);
            }

        ?>

        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full-name" id="" value="<?php if(isset($_SESSION['full-name'])){ echo $_SESSION['full-name']; }?>" placeholder="E.g. Chris Evans"></td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" id="" value="<?php if(isset($_SESSION['username'])){ echo $_SESSION['username']; }?>" placeholder="E.g. chrisevans"></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" id=""></td>
                </tr>
                <tr>
                    <td>Confirm Password: </td>
                    <td><input type="password" name="confirm-password" id=""></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name='submit' value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        
    </div>
</div>

<?php

    if(isset($_POST['submit'])){
        $full_name = $_POST['full-name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_pasword = $_POST['confirm-password'];

        if($password == $confirm_pasword){

            if(isset($_SESSION['full-name'])){
                unset($_SESSION['full-name']);
            }
        
            if(isset($_SESSION['username'])){
                unset($_SESSION['username']);
            }

            $password = md5($password);

            $sql = "INSERT INTO tbl_admin SET
            full_name = '$full_name',
            username = '$username',
            password = '$password'
            ";

            $res = mysqli_query($conn, $sql);

            if($res==TRUE){
                $_SESSION['add-admin'] = "<div class='success'>Add Admin Succesful!</div>";
                header("location:".SITEURL."admin/manage-admin.php");
            }else{
                $_SESSION['add-admin'] = "<div class='fail'>Add Admin Failed</div>";
                header("location:".SITEURL."admin/manage-admin.php");
            }

        }else{
            $_SESSION['not-match'] = "<div class='fail'>Confirmation Password does not match. Try Again</div>";
            $_SESSION['username'] = $username;
            $_SESSION['full-name'] = $full_name;
            header("location:".SITEURL."admin/add-admin.php");
        }
    }
?>
<?php include('partials/footer.php'); ?>