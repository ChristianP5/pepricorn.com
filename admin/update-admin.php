<?php include('partials/menu.php'); ?>

<?php

if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "SELECT * FROM tbl_admin WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count != 1){
            header("location:".SITEURL."admin/index.php");
        }else{
            $rows = mysqli_fetch_assoc($res);
            
            $username = $rows['username'];
            $full_name = $rows['full_name'];
        }

    }else{
        header("location:".SITEURL."admin/index.php");
    }
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
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
                    <td><input type="text" name="full-name" id="" value="<?php if(isset($_SESSION['full-name'])){echo $_SESSION['full-name']; }else{echo $full_name; }?>"></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" id="" value="<?php if(isset($_SESSION['username'])){echo $_SESSION['username']; }else{echo $username; }?>"></td>
                </tr>
                <tr>
                    <td>New Password:</td>
                    <td><input type="password" name="password" id=""></td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="password" name="confirm-password" id=""></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" value="Update Admin" class="btn-secondary" name="submit">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
    if(isset($_SESSION['full-name'])){
        unset($_SESSION['full-name']);
    }

    if(isset($_SESSION['username'])){
        unset($_SESSION['username']);
    }

    if(isset($_POST['submit'])){
        $id2 = $_POST['id'];
        $full_name2 = $_POST['full-name'];
        $username2 = $_POST['username'];
        $password2 = $_POST['password'];
        $confirm_password2 = $_POST['confirm-password'];

        if($password2==$confirm_password2){
            $password2 = md5($password2);
            $sql2 = "UPDATE tbl_admin SET
            full_name = '$full_name2',
            username = '$username2',
            password = '$password2'
            WHERE id=$id2
            ";

            $res2 =mysqli_query($conn, $sql2);

            if($res2 == TRUE){
                $_SESSION['update-admin'] = "<div class='success'>Update Succesful</div>";
                header("location:".SITEURL."admin/manage-admin.php");
            }else{
                $_SESSION['update-admin'] = "<div class='fail'>Update Failed. Try Again</div>";
                header("location:".SITEURL."admin/manage-admin.php");
            }

        }else{
            $_SESSION['not-match'] = "<div class='fail'>Password and Confirm Password does not match.</div>";
            $_SESSION['full-name'] = $full_name2;
            $_SESSION['username'] = $username2;
            header("location:".SITEURL."admin/update-admin.php?id=$id2");
        }
    }
?>


<?php include('partials/footer.php'); ?>