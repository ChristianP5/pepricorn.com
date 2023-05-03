<?php include('../config/constantsAdmin.php'); ?>

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM tbl_store WHERE id=$id";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);

    if($count==1){

        $rows = mysqli_fetch_assoc($res);

        $id = $rows['id'];
        $image_name = $rows['image_name'];

        //Delete Image if there is image
        if($image_name!=""){
            $remove_path = "../images/store/".$image_name;
            $remove = unlink($remove_path);

            if($remove==FALSE){
                $_SESSION['delete-store'] = "<div class='fail'>Failed to delete Image.</div>";
                header("location:".SITEURL."admin/manage-store.php");
                die();
            }
        }


        $sql2 = "DELETE FROM tbl_store WHERE id=$id";
        $res2 = mysqli_query($conn, $sql2);

        if($res2==TRUE){
            $_SESSION['delete-store'] = "<div class='success'>Store Deleted Successfully</div>";
            header("location:".SITEURL."admin/manage-store.php");
        }else{
            $_SESSION['delete-store'] = "<div class='fail'>Store Delete Failed.</div>";
            header("location:".SITEURL."admin/manage-store.php");
        }

    }else{
        header("location:".SITEURL."admin/manage-store.php");
    }
}else{
    header("location:".SITEURL."admin/manage-store.php");
}
?>