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
        //Colect the data of the Product Image
        $confirm_rows = mysqli_fetch_assoc($confirm_res);

        $id = $confirm_rows['id'];
        $image_name = $confirm_rows['image_name'];
        $active = $confirm_rows['active'];

    }else{
        header("location:".SITEURL."admin/manage-product-images.php?id=".$product_id);
        die();
    }
}else{
    header("location:".SITEURL."admin/manage-product-images.php?id=".$product_id);
    die();
}

?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Product Image : <?php echo $confirm_product_name;?></h1>
        <br><br>
        <?php
        if(isset($_SESSION['delete-image'])){
            echo $_SESSION['delete-image'];
            unset($_SESSION['delete-image']);
        }
        ?>
        <br>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Current Image: </td>
                    <?php
                    if($image_name!=""){
                    ?>
                    <td><img src="../images/product/<?php echo $image_name;?>" alt="" width="100px"></td>
                    <td><a href="<?php echo SITEURL;?>admin/update-product-images-delete-image.php?product_id=<?php echo $product_id;?>&id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-danger">Remove Image</a></td>
                    <?php
                    }else{
                        echo "<td><div class='fail'>No Image Added</div></td>";
                    }
                    ?>
                </tr>
                <tr>
                    <td>New Image: </td>
                    <td>
                        <input type="file" name="image" id="">
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" id="" value="Yes" <?php if($active=='Yes'){ echo 'checked';}?>>Yes
                        <input type="radio" name="active" id="" value="No" <?php if($active=='No'){ echo 'checked';}?>>No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="current-image" value="<?php echo $image_name;?>">
                        <input type="submit" value="Update Product Image" name='submit' class='btn-secondary'>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
    if(isset($_POST['submit'])){
        $id2 = $_POST['id'];
        $current_image2 = $_POST['current-image'];
        $new_image2 = $_FILES['image']['name'];
        $active2 = $_POST['active'];

        if($new_image2!=""){
            //There is New Image

                //Upload New Image
                $ext2 = pathinfo($new_image2, PATHINFO_EXTENSION);

                $image_name2 = "Product-".$product_id."-Image-".rand(0000,9999).".".$ext2;

                $src_path2 = $_FILES['image']['tmp_name'];
                $dest_path2 = '../images/product/'.$image_name2;

                $upload2 = move_uploaded_file($src_path2, $dest_path2);
                if($upload2==FALSE){
                    $_SESSION['update-product-image'] = "<div class='fail'>Failed to upload image</div>";
                    header("location:".SITEURL."admin/manage-product-images.php?id=".$product_id);
                }


                //Remove Old Image
                    //Is there Old Image
                    if($current_image2!=""){
                        //Delete Old Image
                        $remove_path2 = '../images/product/'.$current_image2;
                        $remove2 = unlink($remove_path2);

                        if($remove2==FALSE){
                            $_SESSION['update-product-image'] = "<div class='fail'>Failed to remove current image</div>";
                            header("location:".SITEURL."admin/manage-product-images.php?id=".$product_id);
                        }
                    }
        }else{
            $image_name2 = $current_image2;
        }

        //Update Database
        $sql2 = "UPDATE tbl_product_images SET
        image_name = '$image_name2',
        active = '$active2'
        WHERE id=$id2";

        $res2 = mysqli_query($conn, $sql2);
        
        if($res2==TRUE){
            $_SESSION['update-product-image'] = "<div class='success'>Product Image Updated Successfully!</div>";
            header("location:".SITEURL."admin/manage-product-images.php?id=".$product_id);
        }else{
            $_SESSION['update-product-image'] = "<div class='fail'>Failed to update Product Image</div>";
            header("location:".SITEURL."admin/manage-product-images.php?id=".$product_id);
        }

    }
?>
<?php include('partials/footer.php'); ?>