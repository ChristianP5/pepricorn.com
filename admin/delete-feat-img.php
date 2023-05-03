<?php include('../config/constantsAdmin.php'); ?>

<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "SELECT * FROM tbl_featuredimages WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count != 1){
            header('location:'.SITEURL."admin/manage-featured-images.php");
        }else{
            $rows = mysqli_fetch_assoc($res);

            $id = $rows['id'];
            $image_name = $rows['image_name'];

            if($image_name != ""){
                //There is Image
                $remove_path = "../images/featured/".$image_name;

                $remove = unlink($remove_path);

                if($remove == FALSE){
                    $_SESSION['delete-featured-images'] = "<div class='fail'>Failed to remove image file.</div>";
                    header('location:'.SITEURL."admin/manage-featured-images.php");
                    die();
                }
            }

            $sql2 = "DELETE FROM tbl_featuredimages WHERE id=$id";
            $res2 = mysqli_query($conn, $sql2);

            if($res2==TRUE){
                $_SESSION['delete-featured-images'] = "<div class='success'>Successfully Removed Featured Image</div>";
                header('location:'.SITEURL."admin/manage-featured-images.php");
            }else{
                $_SESSION['delete-featured-images'] = "<div class='fail'>Failed to remove Featured Image.</div>";
                header('location:'.SITEURL."admin/manage-featured-images.php");
                    
            }
        }

    }else{
        header('location:'.SITEURL."admin/manage-featured-images.php");
    }
?>