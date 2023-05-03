<?php include('../config/constantsAdmin.php'); ?>

<?php
//Check if Product Exists
if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    //Search if Product ID Exists
    $confirm_product_sql = "SELECT * FROM tbl_product WHERE id=$product_id";
    $confirm_product_res = mysqli_query($conn, $confirm_product_sql);

    $confirm_product_count = mysqli_num_rows($confirm_product_res);
    if($confirm_product_count==1){
        $confirm_product_rows = mysqli_fetch_assoc($confirm_product_res);
        $product_id = $confirm_product_rows['id'];
        $confirm_product_name = $confirm_product_rows['name'];
    }else{
        header("location:".SITEURL."admin/manage-product.php");
        die();
    }
}else{
    header("location:".SITEURL."admin/manage-product.php");
    die();
}
?>

<?php
    if(isset($_GET['image_name'])&&isset($_GET['id'])){
        echo $id = $_GET['id'];
        echo $image_name = $_GET['image_name'];
        
        $sql = "SELECT * FROM tbl_product_images WHERE id=$id AND image_name='$image_name'";
        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);
        if($count == 1){
            $rows = mysqli_fetch_assoc($res);

            $id = $rows['id'];
            $image_name = $rows['image_name'];
            
            //Delete the Image from Storage
            $delete_path = "../images/product/".$image_name;

            $remove_image = unlink($delete_path);

            if($remove_image==FALSE){
                $_SESSION['delete-image'] = "<div class='fail'>Failed to delete image file. Try Again</div>";
                header('location:'.SITEURL.'admin/update-product-images.php?product_id='.$product_id.'&id='.$id);
                die();
            }else{
                $image_name = "";
            }


            //Change the Database's 'image_name' for this id to ""
            $sql2 = "UPDATE tbl_product_images SET
            image_name = '$image_name'
            WHERE id = $id
            ";

            $res2 = mysqli_query($conn, $sql2);

            if($res2==TRUE){
                $_SESSION['delete-image'] = "<div class='success'>Image deleted succesful.</div>";
                header('location:'.SITEURL.'admin/update-product-images.php?product_id='.$product_id.'&id='.$id);

            }else{
                $_SESSION['delete-image'] = "<div class='fail'>Failed to delete image from database. Try Again</div>";
                header('location:'.SITEURL.'admin/update-product-images.php?product_id='.$product_id.'&id='.$id);
            }


        }else{
            header('location:'.SITEURL.'admin/update-product-images.php?product_id='.$product_id.'&id='.$id);
        }

    }else{
        header('location:'.SITEURL.'admin/update-product-images.php?product_id='.$product_id.'&id='.$id);
    }
?>