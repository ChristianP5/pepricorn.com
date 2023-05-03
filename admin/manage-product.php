<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Product</h1>
        <br>
        <a href="<?php echo SITEURL;?>admin/add-product.php" class="btn-primary">Add Product</a>
        <br><br>
        <?php
            if(isset($_SESSION['add-product'])){
                echo $_SESSION['add-product'];
                unset($_SESSION['add-product']);
            }

            if(isset($_SESSION['delete-product'])){
                echo $_SESSION['delete-product'];
                unset($_SESSION['delete-product']);
            }

            if(isset($_SESSION['update-product'])){
                echo $_SESSION['update-product'];
                unset($_SESSION['update-product']);
            }
        ?>
        <br>
        <table class="tbl-full big-table-text">
            <tr>
                <th>SN</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Stock</th>
                <th>Rating</th>
                <th>Sold</th>
                <th>Store_id</th>
                <th>Store_name</th>
                <th>Store_location</th>
                <th>Images</th>
                <th>Comments</th>
                <th>Action</th>
                
            </tr>

            <?php
                //Gather Data from database
                $table_sql = "SELECT * FROM tbl_product ORDER BY id DESC";
                $table_res = mysqli_query($conn, $table_sql);

                $table_count = mysqli_num_rows($table_res);
                if($table_count>0){
                    $ssn = 1;
                    while($table_rows = mysqli_fetch_assoc($table_res)){
                        //Get Data
                        $id = $table_rows['id'];
                        $name = $table_rows['name'];
                        $price = $table_rows['price'];
                        $rating = $table_rows['rating'];
                        $stock = $table_rows['stock'];
                        $active = $table_rows['active'];
                        $sold = $table_rows['sold'];
                        $featured = $table_rows['featured'];
                        $description = $table_rows['description'];
                        $store_id = $table_rows['store_id'];
                        $discount = $table_rows['discount'];

                        //Search for the Store Name from the Store Table
                        $store_name_sql = "SELECT * from tbl_store WHERE id=$store_id";
                        $store_name_res = mysqli_query($conn, $store_name_sql);
                        $store_name_count = mysqli_num_rows($store_name_res);
                        
                        if($store_name_count==1){
                            $store_name_rows = mysqli_fetch_assoc($store_name_res);
                            
                            $store_id = $store_name_rows['id'];
                            $store_name = $store_name_rows['name'];
                            $locatoin_id = $store_name_rows['location_id'];

                            //Search for the Location Name from the Location Table
                            $location_name_sql = "SELECT * FROM tbl_location WHERE id=$locatoin_id";

                            $location_name_res = mysqli_query($conn, $location_name_sql);
                            $location_name_count = mysqli_num_rows($location_name_res);

                            if($location_name_count==1){
                                $location_name_rows = mysqli_fetch_assoc($location_name_res);

                                $location_name = $location_name_rows['name'];
                            }else{
                                $location_name = "NA";
                            }

                        }else{
                            $store_name = "NA";
                        }

                        ?>
                            <tr>
                                <td><?php echo $ssn++?></td>
                                <td><?php echo $name;?></td>
                                <td><?php echo $description;?></td>
                                <td>Rp.<?php echo $price;?></td>
                                <td class='text-center'><?php echo $discount;?>%</td>
                                <td><?php echo $featured;?></td>
                                <td><?php echo $active;?></td>
                                <td><?php echo $stock;?></td>
                                <td><?php echo $rating;?></td>
                                <td><?php echo $sold;?></td>
                                <td><?php echo $store_id;?></td>
                                <td><?php echo $store_name;?></td>
                                <td><?php echo $location_name ;?></td>
                                <td>
                                    <a href="<?php echo SITEURL;?>admin/manage-product-images.php?id=<?php echo $id;?>" class="btn-secondary">Manage Images</a>
                                </td>
                                <td>
                                    <a href="<?php echo SITEURL;?>admin/update-store.php?id=<?php echo $id;?>" class="btn-secondary">Manage Comments</a>
                                </td>
                                <td>
                                    <a href="<?php echo SITEURL;?>admin/update-product.php?id=<?php echo $id;?>" class="btn-secondary">Update Product</a>
                                    <a href="<?php echo SITEURL;?>admin/delete-product.php?id=<?php echo $id;?>" class='btn-danger'>Remove Product</a>
                                        
                                </td>
                            </tr>
                        <?php
                    }
                }else{
                    echo "<tr><td colspan='2'><div class='fail'>No Products in database yet.</div><td></tr>";
                }
            ?>
            
        </table>
    </div>
</div>
<?php include('partials/footer.php');?>