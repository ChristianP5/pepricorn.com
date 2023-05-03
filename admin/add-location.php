<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Location</h1>
        <form action="" method="post">
            <table class="table-30">
                <tr>
                    <td>Name: </td>
                    <td>
                        <input type="text" name="name" id="">
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
                    <td colspan="2">
                        <input type="submit" value="Add Location" name='submit' class='btn-secondary'>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        
        if(isset($_POST['active'])){
            $active = $_POST['active'];
        }else{
            $active = "No";
        }

        $sql = "INSERT INTO tbl_location SET
        name='$name',
        active='$active'
        ";

        $res = mysqli_query($conn, $sql);

        if($res==TRUE){
            $_SESSION['add-location'] = "<div class='success'>Location Added Succesfully</div>";
            header("location:".SITEURL."admin/manage-location.php");
        }else{
            $_SESSION['add-location'] = "<div class='fail'>Failed to add Location</div>";
            header("location:".SITEURL."admin/manage-location.php");
        
        }
    }
?>
<?php include('partials/footer.php'); ?>