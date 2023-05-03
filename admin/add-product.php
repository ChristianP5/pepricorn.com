<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Product</h1>
        <br>
        <br>
        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Name: </td>
                    <td>
                        <input type="text" name="name" id="" required>
                    </td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" id="" cols="30" rows="10"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price (Rp): </td>
                    <td>
                        <input type="number" step="0.1" name="price" id="" required>
                    </td>
                </tr>
                <tr>
                    <td>Disount (%): </td>
                    <td>
                        <input type="number" step="1" name="discount" id="" >
                    </td>
                </tr>
                <tr>
                    <td>Rating: </td>
                    <td>
                        <input type="number" step="0.01" name="rating" id="" required>
                    </td>
                </tr>
                <tr>
                    <td>Stock: </td>
                    <td>
                        <input type="number" step="1" name="stock" id="" required>
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" id="" value="Yes">Yes
                        <input type="radio" name="active" id="" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" id="" value="Yes">Yes
                        <input type="radio" name="featured" id="" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Store_name: </td>
                    <td>
                        <select name="store-id" id="">
                            <?php
                            //Gather Active Stores Data
                            $store_name_sql = "SELECT * FROM tbl_store WHERE active='Yes'";
                            $store_name_res = mysqli_query($conn, $store_name_sql);
                            $store_name_count = mysqli_num_rows($store_name_res);

                            if($store_name_count>0){
                                while($store_name_rows = mysqli_fetch_assoc($store_name_res)){
                                    echo $store_id = $store_name_rows['id'];
                                    echo $store_name = $store_name_rows['name'];
                                    ?>
                                        <option value="<?php echo $store_id; ?>"><?php echo $store_name; ?></option>";
                                    <?php

                                }
                            }else{
                                echo "<option value='0'>No Stores Available</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="sold" value="0">
                        <input type="submit" value="Add Product" name='submit' class='btn-secondary'>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
    if(isset($_POST['submit'])){
        //Gather Data from Forms
        echo $name = $_POST['name'];
        echo $description = $_POST['description'];
        echo $price = $_POST['price'];
        echo $discount = $_POST['discount'];
        echo $rating = $_POST['rating'];
        echo $sold = $_POST['sold'];

        if($rating > 5){
            $rating = 5;
        }elseif($rating < 0 || $rating == ""){
            $rating = 0;
        }else{
            $rating = $rating;
        }

        if($price < 0 || $price == ""){
            $price = 0;
        }

        if($discount < 0 || $discount ==""){
            $discount = 0;
        }else if($discount > 100){
            $discount = 100;
        }

        echo $stock = $_POST['stock'];

        if($stock < 0 || $stock == ""){
            $stock = 0;
        }


        if(!isset($_POST['active'])){
            $active = "No";
        }else{
            $active = $_POST['active'];
        }


        if(!isset($_POST['featured'])){
            $featured = "No";
        }else{
            $featured = $_POST['featured'];
        }

        echo $store_id = $_POST['store-id'];

        //INSERT INTO DATABASE

        $sql = "INSERT INTO tbl_product SET
        name = '$name',
        price = $price,
        discount = $discount,
        rating = $rating,
        stock = $stock,
        active = '$active',
        featured = '$featured',
        sold = $sold,
        description = '$description',
        store_id = $store_id
        ";

        $res = mysqli_query($conn, $sql);

        if($res==TRUE){
            $_SESSION['add-product'] = "<div class='success'>Product Successfully Added!</div>";
            header("location:".SITEURL."admin/manage-product.php");
        }else{
            $_SESSION['add-product'] = "<div class='fail'>Product Add Failed.</div>";
            header("location:".SITEURL."admin/manage-product.php");
        }

        
    }
?>

<?php include('partials/footer.php');?>