<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Location</h1>
        <br>
        <a href="<?php echo SITEURL;?>admin/add-location.php" class="btn-primary">Add Location</a>
        <br><br>
        <?php
        if(isset($_SESSION['add-location'])){
            echo $_SESSION['add-location'];
            unset($_SESSION['add-location']);
        }

        if(isset($_SESSION['delete-location'])){
            echo $_SESSION['delete-location'];
            unset($_SESSION['delete-location']);
        }

        if(isset($_SESSION['update-location'])){
            echo $_SESSION['update-location'];
            unset($_SESSION['update-location']);
        }
        ?>
        <br>
        <table class="tbl-full">
            <tr>
                <th>SN</th>
                <th>Name</th>
                <th>Active</th>
                <th>Action</th>
            </tr>

            <?php
            $sql = "SELECT * FROM tbl_location";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count>0){
                $ssn = 1;
                while($rows = mysqli_fetch_assoc($res)){
                    $id = $rows['id'];
                    $name = $rows['name'];
                    $active = $rows['active'];

                    ?>
                    <tr>
                        <td><?php echo $ssn++;?></td>
                        <td><?php echo $name;?></td>
                        <td><?php echo $active;?></td>
                        <td>
                            <a href="<?php echo SITEURL;?>admin/update-location.php?id=<?php echo $id;?>" class="btn-secondary">Update Location</a>
                            <a href="<?php echo SITEURL;?>admin/delete-location.php?id=<?php echo $id;?>" class="btn-danger">Delete Location</a>
                        </td>
                    </tr>
                    <?php
                }
            }else{
                echo "<tr><td><div class='fail'>There are no locations in the database.</div></td></tr>";
            }
            ?>
            
        </table>
    </div>
</div>
<?php include('partials/footer.php');?>