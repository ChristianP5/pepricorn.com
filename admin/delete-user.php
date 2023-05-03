<?php include('../config/constantsAdmin.php'); ?>

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM tbl_user WHERE id=$id";

    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if($count==1){
        $rows = mysqli_fetch_assoc($res);
        $id = $rows['id'];
        $image_name = $rows['image_name'];

        if($image_name!=""){
            //Image Exists

            //Remove Image
            $remove_path = '../images/user/'.$image_name;
            $remove = unlink($remove_path);

            if($remove==FALSE){
                $_SESSION['delete-user'] = "<div class='fail'>Failed to remove image.</div>";
                header("location:".SITEURL."admin/manage-user.php");
                die();
            }
            
        }

        //Remove Data from Database
        $sql = "DELETE FROM tbl_user WHERE id=$id";
        $res = mysqli_query($conn, $sql);
        if($res==TRUE){
            $_SESSION['delete-user'] = "<div class='success'>User Removed Successfully!</div>";
            header("location:".SITEURL."admin/manage-user.php");
        }else{
            $_SESSION['delete-user'] = "<div class='fail'>Failed to remove user.</div>";
            header("location:".SITEURL."admin/manage-user.php");
        }
    }else{
        header("location:".SITEURL."admin/manage-user.php");
    }
}else{
    header("location:".SITEURL."admin/manage-user.php");
}
?>