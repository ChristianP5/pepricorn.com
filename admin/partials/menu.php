<?php 
    include('../config/constantsAdmin.php');
    include('logincheck.php');
?>

<html>
    <head>
        <title>Admin Panel Pepricorn</title>
        
        <link rel="stylesheet" href="../admin/css/admin.css">
    </head>
    
    <body>
        <h1><?php echo $_SESSION['user']?>'s Admin Panel</h1>
        <!-- Menu Section Starts -->
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="<?php echo SITEURL; ?>admin/manage-admin.php">Admin</a></li>
                    <li><a href="<?php echo SITEURL; ?>admin/manage-category.php">Category</a></li>
                    <li><a href="<?php echo SITEURL; ?>admin/manage-featured-images.php">Featured Images</a></li>
                    <li><a href="<?php echo SITEURL; ?>admin/manage-user.php">User</a></li>
                    <li><a href="<?php echo SITEURL; ?>admin/manage-location.php">Location</a></li>
                    <li><a href="<?php echo SITEURL; ?>admin/manage-store.php">Store</a></li>
                    <li><a href="<?php echo SITEURL; ?>admin/manage-product.php">Product</a></li>
                    <li><a class='logout' href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        <!-- Menu Section Ends -->