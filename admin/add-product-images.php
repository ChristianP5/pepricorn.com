<?php include('partials/menu.php'); ?>

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    //Search if Product ID Exists
    $confirm_product_sql = "SELECT * FROM tbl_product WHERE id=$id";
    $confirm_product_res = mysqli_query($conn, $confirm_product_sql);

    $confirm_product_count = mysqli_num_rows($confirm_product_res);
    if($confirm_product_count==1){
        $confirm_product_rows = mysqli_fetch_assoc($confirm_product_res);
        $id = $confirm_product_rows['id'];
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

<div class="main-content">
    <div class="wrapper">
        <h1>Add Product Image : <?php echo $confirm_product_name;?></h1>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Insert Image: </td>
                    <td><input type="file" name="image" id=""></td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" id="" value="Yes">Yes
                        <input type="radio" name="active" id="" value="No">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="product-id" value=<?php echo $id;?>>
                        <input type="submit" value="Add Product Image" name='submit' class='btn-secondary'>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
if(isset($_POST['submit'])){
    $product_id = $_POST['product-id'];
    $image_name = $_FILES['image']['name'];
    
    if(isset($_POST['active'])){
        $active = $_POST['active'];
    }else{
        $active = "No";
    }

    if($image_name != ""){
        //There is image

        $ext = pathinfo($image_name, PATHINFO_EXTENSION);

        $image_name = "Product-".$id."-Image-".rand(0000,9999).".".$ext;

        //Upload Image
        $source_path = $_FILES['image']['tmp_name'];
        $dest_path = "../images/product/".$image_name;

        $upload = move_uploaded_file($source_path, $dest_path);
        if($upload==FALSE){
            $_SESSION['add-product-image'] = "<div class='fail'>Failed to Upload Image.</div>";
            header("location:".SITEURL."admin/manage-product-images.php?id=".$id);
        }

        
    }else{
        $image_name = "";
    }

    //Insert Into Database
    $sql = "INSERT INTO tbl_product_images SET
    image_name='$image_name',
    product_id=$product_id,
    active='$active'";

    $res = mysqli_query($conn, $sql);
    if($res==TRUE){
        $_SESSION['add-product-image'] = "<div class='success'>Product Image Added</div>";
        header("location:".SITEURL."admin/manage-product-images.php?id=".$id);
    }else{
        $_SESSION['add-product-image'] = "<div class='fail'>Failed to Add Product Image.</div>";
        header("location:".SITEURL."admin/manage-product-images.php?id=".$id);
        
    }
}
?>

<?php include('partials/footer.php'); ?>