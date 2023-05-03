<?php include('../config/constantsAdmin.php');?>

<?php
    if(!isset($_GET['id'])){
        header('location:'.SITEURL."admin/manage-category.php");
    }else{
        $id = $_GET['id'];

        $sql = "SELECT * FROM tbl_category WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count==1){
            //Category Exists
            $rows = mysqli_fetch_assoc($res);

            $id = $rows['id'];
            $title = $rows['title'];
            $image_name = $rows['image_name'];
            $featured = $rows['featured'];
            $active = $rows['active'];

            //Delete Image First

            if($image_name!=""){
                $delete_path = "../images/category/".$image_name;
                
                $remove_image = unlink($delete_path);

                if($remove_image==FALSE){
                    $_SESSION['delete-category'] = "<div class='fail'>Failed to delete image. Try Again</div>";
                    header('location:'.SITEURL."admin/manage-category.php");
                    die();
                }

            }


            //Delete the rest
            $sql2 = "DELETE FROM tbl_category WHERE id=$id";

            $res2 = mysqli_query($conn, $sql2);

            if($res2==TRUE){
                $_SESSION['delete-category'] = "<div class='success'>Category Deleted Successfully</div>";
                header('location:'.SITEURL."admin/manage-category.php");
            }else{
                $_SESSION['delete-category'] = "<div class='fail'>Failed to delete category. Try Again</div>";
                header('location:'.SITEURL."admin/manage-category.php");
                
            }
        }else{
            header('location:'.SITEURL."admin/manage-category.php");
        }
    }
?>