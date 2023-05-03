<?php include('../config/constantsAdmin.php'); ?>

<?php

//Check if Product ID is passsed
if(isset($_GET['id'])){
    $id = $_GET['id'];

    //Check if Product ID exists in Product Database
    $confirm_sql = "SELECT * FROM tbl_product WHERE id=$id";
    $confirm_res = mysqli_query($conn, $confirm_sql);

    $confirm_count = mysqli_num_rows($confirm_res);
    if($confirm_count==1){
        //Product ID Exists
        $confirm_rows = mysqli_fetch_assoc($confirm_res);

        //Get Data of Product
        $id = $confirm_rows['id'];


    }else{
        header("location:".SITEURL."admin/manage-product.php");
    }
}else{
    header("location:".SITEURL."admin/manage-product.php");
}

//Delete Product Images with product_id == id
$get_product_images_sql = "SELECT * FROM tbl_product_images WHERE product_id=$id";
$get_product_images_res = mysqli_query($conn, $get_product_images_sql);

$get_product_images_count = mysqli_num_rows($get_product_images_res);

if($get_product_images_count>0){
    //Something to delete :(
        while($get_product_images_rows = mysqli_fetch_assoc($get_product_images_res)){
            $product_image_id = $get_product_images_rows['id'];
            $product_image_image_name = $get_product_images_rows['image_name'];

            //Is there an image to delete?
            if($product_image_image_name!=""){
                //There is an image to delete
                $product_image_delete_path = "../images/product/".$product_image_image_name;
                $product_image_delete = unlink($product_image_delete_path);

                if($product_image_delete==FALSE){
                    $_SESSION['delete-product'] = "<div class='fail'>Failed to delete an image of Product Image</div>";
                    header("location:".SITEURL."admin/manage-product.php");
                    die();
                }

            }

            //Remove Product Image from Database
            $product_image_delete_sql = "DELETE FROM tbl_product_images WHERE id=$product_image_id";

            $product_image_delete_res = mysqli_query($conn, $product_image_delete_sql);

            if($product_image_delete_res==FALSE){
                $_SESSION['delete-product'] = "<div class='fail'>Failed to delete a Product Image from database.</div>";
                header("location:".SITEURL."admin/manage-product.php");
                die();
            }
        }
}else{
    //Nothing to delete :)
}

//Delete Comments with product_id == id


//Delete Product from Database
$product_delete_sql = "DELETE FROM tbl_product WHERE id=$id";
$product_delete_res = mysqli_query($conn, $product_delete_sql);

if($product_delete_res==TRUE){
    $_SESSION['delete-product'] = "<div class='success'>Product removed successfully.</div>";
    header("location:".SITEURL."admin/manage-product.php");
}else{
    $_SESSION['delete-product'] = "<div class='fail'>Failed to delete a Product from database.</div>";
    header("location:".SITEURL."admin/manage-product.php");
}

?>