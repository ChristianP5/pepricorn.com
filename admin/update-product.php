<?php include('partials/menu.php')?>

<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $confirm_sql = "SELECT * FROM tbl_product WHERE id=$id";
        $confirm_res = mysqli_query($conn, $confirm_sql);

        $confirm_count = mysqli_num_rows($confirm_res);

        if($confirm_count==1){
            $confirm_rows = mysqli_fetch_assoc($confirm_res);
            //Get Data
            //...
            $id = $confirm_rows['id'];
            $name = $confirm_rows['name'];
            $description = $confirm_rows['description'];
            $price = $confirm_rows['price'];
            $discount = $confirm_rows['discount'];
            $rating = $confirm_rows['rating'];
            $stock = $confirm_rows['stock'];
            $sold = $confirm_rows['sold'];
            $active = $confirm_rows['active'];
            $featured = $confirm_rows['featured'];
            $store_id = $confirm_rows['store_id'];

        }else{
            header("location:".SITEURL."admin/manage-product.php");   
        }

    }else{
        header("location:".SITEURL."admin/manage-product.php");
    }
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Product</h1>
        <br>
        <br>
        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Name: </td>
                    <td>
                        <input type="text" name="name" id="" value="<?php echo $name;?>">
                    </td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" id="" cols="30" rows="10"><?php echo $description;?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price (Rp): </td>
                    <td>
                        <input type="number" step='0.01' name="price" id="" value="<?php echo $price;?>">
                    </td>
                </tr>
                <tr>
                    <td>Discount (%): </td>
                    <td>
                        <input type="number" step='1' name="discount" id="" value="<?php echo $discount;?>">
                    </td>
                </tr>
                <tr>
                    <td>Rating: </td>
                    <td>
                        <input type="number" step='0.01' name="rating" id="" value="<?php echo $rating;?>">
                    </td>
                </tr>
                <tr>
                    <td>Stock: </td>
                    <td>
                        <input type="number" step='1' name="stock" id="" value="<?php echo $stock;?>">
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" id="" value="Yes" <?php if($active=='Yes'){ echo "checked";}?>>Yes
                        <input type="radio" name="active" id="" value="No" <?php if($active=='No'){ echo "checked";}?>>No
                    </td>
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" id="" value="Yes" <?php if($featured=='Yes'){ echo "checked";}?>>Yes
                        <input type="radio" name="featured" id="" value="No" <?php if($featured=='No'){ echo "checked";}?>>No
                    </td>
                </tr>
                <tr>
                    <td>Store_name: </td>
                    <td>
                        <select name="store-id" id="">
                            <?php
                            $store_id_sql = "SELECT * FROM tbl_store WHERE active='Yes'";
                            $store_id_res = mysqli_query($conn, $store_id_sql);

                            $store_id_count = mysqli_num_rows($store_id_res);
                            if($store_id_count>0){
                                while($store_id_rows = mysqli_fetch_assoc($store_id_res)){
                                    $store_store_id = $store_id_rows['id'];
                                    $store_name = $store_id_rows['name'];
                                    ?>
                                    <option value='<?php echo $store_store_id;?>' <?php if($store_store_id == $store_id){ echo "selected";}?>><?php echo $store_name; ?></option>
                                    <?php
                                }
                            }else{
                                echo "<option value='0'>No Stores in Database</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="sold" value="<?php echo $sold;?>">
                        <input type="submit" value="Update Product" name='submit' class='btn-secondary'>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
if(isset($_POST['submit'])){
    $id2 = $_POST['id'];
    $name2  = $_POST['name'];
    $description2 = $_POST['description'];

    $price2 = $_POST['price'];
    if($price2 < 0){
        $price2 = 0;
    }
    
    $discount2 = $_POST['discount'];
    if($discount2 < 0 || $discount2 == ""){
        $discount2 = 0;
    }else if($discount2 > 100){
        $discount2 = 100;
    }

    $rating2 = $_POST['rating'];
    if($rating2 > 5 || $rating2 == ""){
        $rating2 = 5;
    }else if($rating2 < 0){
        $rating2 = 0;
    }

    $stock2 = $_POST['stock'];
    if($stock2 < 0 || $stock2 == ""){
        $stock2 = 0;
    }

    $sold2 = $_POST['sold'];
    $featured2 = $_POST['featured'];
    $active2 = $_POST['active'];
    $store_id2 = $_POST['store-id'];

    $sql = "UPDATE tbl_product SET
    name='$name2',
    description='$description2',
    price = $price2,
    discount = $discount2,
    rating = $rating2,
    stock = $stock2,
    sold = $sold2,
    featured = '$featured2',
    active = '$active2',
    store_id = $store_id2
    WHERE id=$id2
    ";

    $res = mysqli_query($conn, $sql);

    if($res==TRUE){
        $_SESSION['update-product'] = "<div class='success'>Product Updated Successfully!</div>";
        header("location:".SITEURL."admin/manage-product.php");
    }else{
        $_SESSION['update-product'] = "<div class='fail'>Product Update Failed.</div>";
        header("location:".SITEURL."admin/manage-product.php");
    }


}
?>
<?php include('partials/footer.php')?>