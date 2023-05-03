<?php include('../config/constantsAdmin.php') ?>

<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "SELECT * FROM tbl_admin WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count == 1){
            $sql2 = "DELETE FROM tbl_admin WHERE id=$id";

            $res2 = mysqli_query($conn, $sql2);

            if($res2==TRUE){
                $_SESSION['delete-admin'] = "<div class='success'>Admin Deleted Succesfully</div>";
                header("location:".SITEURL."admin/manage-admin.php");
            }else{
                $_SESSION['delete-admin'] = "<div class='fail'>Admin Deletion Failed</div>";
                header("location:".SITEURL."admin/manage-admin.php");
            }
        }else{
            header("location:".SITEURL."admin/index.php");
        }

    }else{
        header("location:".SITEURL."admin/index.php");
    }
?>
