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

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Product Images : <?php echo $confirm_product_name;?></h1>
        <br>
        <a href="<?php echo SITEURL;?>admin/add-product-images.php?id=<?php echo $id?>" class="btn-primary">Add Product Image</a>
        <br><br>
        <br>
        <?php
        if(isset($_SESSION['add-product-image'])){
            echo $_SESSION['add-product-image'];
            unset($_SESSION['add-product-image']);
        }

        if(isset($_SESSION['remove-product-image'])){
            echo $_SESSION['remove-product-image'];
            unset($_SESSION['remove-product-image']);
        }

        if(isset($_SESSION['update-product-image'])){
            echo $_SESSION['update-product-image'];
            unset($_SESSION['update-product-image']);
        }
        ?>
        <br>
        <table class="tbl-full">
            <tr>
                <th>SN</th>
                <th>Image</th>
                <th>Active</th>
                <th>Product_id</th>
                <th>Action</th>
            </tr>
            <?php
            //Get Data of Product Images of the Product ID
            $table_sql = "SELECT * FROM tbl_product_images WHERE product_id=$product_id";
            $table_res = mysqli_query($conn, $table_sql);

            $table_count = mysqli_num_rows($table_res);
            if($table_count>0){
                $ssn = 1;
                while($table_rows = mysqli_fetch_assoc($table_res)){
                    $id = $table_rows['id'];
                    $image_name = $table_rows['image_name'];
                    $active = $table_rows['active'];

                    ?>
                    <tr>
                        <td><?php echo $ssn++;?></td>
                        <td>
                            <?php
                            if($image_name!=""){
                                ?>
                                <img src="../images/product/<?php echo $image_name;?>" alt="" width="100px">
                                <?php
                            }else{
                                echo "<div class='fail'>No Image Added.</div>";
                            }
                            ?>
                        </td>
                        <td><?php echo $active;?></td>
                        <td><?php echo $product_id;?></td>
                        <td>
                            <a href="<?php echo SITEURL; ?>admin/update-product-images.php?product_id=<?php echo $product_id;?>&id=<?php echo $id;?>" class="btn-secondary">Update Prouct Image</a>
                            <a href="<?php echo SITEURL; ?>admin/delete-product-images.php?product_id=<?php echo $product_id;?>&id=<?php echo $id;?>" class="btn-danger">Remove Product Image</a>
                        </td>
                    </tr>

                    <?php
                }
            }else{
                echo "<tr><td><div class='fail'>No Image Data for this Product in Database.</div></td></tr>";
            }
            ?>
        </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>