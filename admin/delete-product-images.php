<?php include('partials/menu.php'); ?>

<?php

//Check if Product_ID Passing is Valid
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

//Check if Product Image ID Passing is Valid
if(isset($_GET['id'])){
    $id = $_GET['id'];
    //Search if Prduct Image ID Exists
    $confirm_sql = "SELECT * FROM tbl_product_images WHERE id=$id";
    $confirm_res = mysqli_query($conn, $confirm_sql);

    $confirm_count = mysqli_num_rows($confirm_res);
    if($confirm_count==1){
        $confirm_rows = mysqli_fetch_assoc($confirm_res);
        $id = $confirm_rows['id'];
        $image_name = $confirm_rows['image_name'];

        //Remove Image
        $remove_path = '../images/product/'.$image_name;

        $remove = unlink($remove_path);

        if($remove==FALSE){
            $_SESSION['remove-product-image'] = "<div class='fail'>Failed to remove Image</div>";
            header("location:".SITEURL."admin/manage-product-images.php?id=".$product_id);
        }

        //Remove Data
        $sql = "DELETE FROM tbl_product_images WHERE id=$id";
        $res = mysqli_query($conn, $sql);

        if($res==TRUE){
            $_SESSION['remove-product-image'] = "<div class='success'>Product Image Successfully Removed!</div>";
            header("location:".SITEURL."admin/manage-product-images.php?id=".$product_id);
        }else{
            $_SESSION['remove-product-image'] = "<div class='fail'>Failed to remove Product Image</div>";
            header("location:".SITEURL."admin/manage-product-images.php?id=".$product_id);
        }

    }else{
        header("location:".SITEURL."admin/manage-product-images.php?id=".$product_id);
        die();
    }
}else{
    header("location:".SITEURL."admin/manage-product-images.php?id=".$product_id);
    die();
}

?>

<?php include('partials/footer.php'); ?>