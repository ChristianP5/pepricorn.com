<?php include('partials/head.php') ?>

<?php
if(isset($_GET['id'])){

    $product_id = $_GET['id'];

    $product_data_search_sql = "SELECT * FROM tbl_product WHERE id = $product_id";
    $product_data_search_res = mysqli_query($conn, $product_data_search_sql);

    $product_data_search_count = mysqli_num_rows($product_data_search_res);
    if($product_data_search_count==1){
        $product_data_search_rows = mysqli_fetch_assoc($product_data_search_res);

        //Get Product Data
        $product_data_id = $product_data_search_rows['id'];
        $product_data_name = $product_data_search_rows['name'];
        $product_data_price = $product_data_search_rows['price'];
        $product_data_rating = $product_data_search_rows['rating'];
        $product_data_stock = $product_data_search_rows['stock'];
        $product_data_active = $product_data_search_rows['active'];
        $product_data_sold = $product_data_search_rows['sold'];
        $product_data_featured = $product_data_search_rows['featured'];
        $product_data_description = $product_data_search_rows['description'];
        $product_data_store_id = $product_data_search_rows['store_id'];

        //Get Store Data from Product's Store ID
        $product_store_data_search_sql = "SELECT * FROM tbl_store WHERE id = $product_data_store_id";
        $product_store_data_search_res = mysqli_query($conn, $product_store_data_search_sql);

        $product_store_data_search_count = mysqli_num_rows($product_store_data_search_res);
        if($product_store_data_search_count == 1){
            $product_store_data_search_rows = mysqli_fetch_assoc($product_store_data_search_res);
            $product_store_id = $product_store_data_search_rows['id'];
            $product_store_name = $product_store_data_search_rows['name'];
        }else{
            $product_store_name = "NA";
        }
    }else{
        header("location:".SITEURL."views/hero.php");
    }

}else{
    header("location:".SITEURL."views/hero.php");
}
?>

    <body class="text-xs">
    <?php 
        if(isset($_SESSION['logged-in-user-id'])){
            include('partials/navbar-registered.php'); 
        }else{
            include('partials/navbar.php');
        }
        ?>
            <div class="mb-16 overflow-hidden px-4 md:px-8 lg:px-16">
                <main class="mt-20 lg:mt-52" data-aos="fade-up">
                    <div class="grid grid-cols-1 lg:flex justify-between items-center">
                        <nav class="flex" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                                <li class="inline-flex items-center">
<!-- Home Button Redirect -->
                                    <a href="<?php echo SITEURL;?>views/hero.php"
                                        class="inline-flex items-center lg:text-sm font-medium text-gray-700 hover:text-blue-600 transition duration-250 ease-in">
                                        <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                            </path>
                                        </svg>
                                        Home
                                    </a>
<!--  -->
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <a href="#"
                                            class="ml-1 lg:text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 transition duration-250 ease-in">Skin
                                            Cares</a>
                                    </div>
                                </li>
                                <li aria-current="page">
                                    <div class="flex items-center">
                                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="ml-1 lg:text-sm font-medium text-gray-700 "><?php echo $product_data_name;?></span>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                        <div class="flex justify-between items-center gap-x-2 lg:gap-x-4">
                            <div class="flex bg-white items-center gap-x-4 lg:px-4 py-2 rounded-full">
                                <div class="flex items-center bg-gray-200 py-2 pl-4 pr-7 lg:px-4 rounded-full">
                                    <img src="../public/img/viewer.png" class="w-5 h-5 max-w-full max-h-full mr-2 cursor-pointer">
                                    <p>15</p>
                                </div>
                                <p>total view</p>
                            </div>
                            <div class="bg-white flex items-center gap-x-4 lg:px-4 py-2 rounded-full">
                                <div class="flex items-center lg:px-4 py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                                        class="w-5 h-5 max-w-full max-h-full mr-2 cursor-pointer  hover:fill-current text-red-600 transition duration-250 ease-in">
                                        <path
                                            d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                    </svg>
                                    <p>298</p>
                                </div>
                                <div class="border-l border-gray-400 h-6"></div>
                                <div class="flex items-center lg:px-4 py-2">
                                    <img src="../public/img/save-instagram.png"
                                        class="w-5 h-5 max-w-full max-h-full mr-2 cursor-pointer">
                                    <p>23</p>
                                </div>
                            </div>
                            <img src="../public/img/share.png"
                                class="w-8 h-8 lg:w-12 lg:h-12 max-w-full max-h-full bg-white rounded-full cursor-pointer">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:flex mt-4 gap-x-16">
                    <div class="lg:w-1/3">
                            <div class="overflow-hidden rounded-lg">
                    <?php
                        //Display Image
                        $display_product_images_sql = "SELECT * FROM tbl_product_images WHERE product_id = $product_data_id LIMIT 1";
                        $display_product_images_res = mysqli_query($conn, $display_product_images_sql);

                        $display_product_images_count = mysqli_num_rows($display_product_images_res);
                        if($display_product_images_count>0){
                            while($display_product_images_rows = mysqli_fetch_assoc($display_product_images_res)){
                                $display_product_images_image_name = $display_product_images_rows['image_name'];
                                if($display_product_images_image_name == ""){
                                    $display_product_images_image_name = "default.png";
                                }
                                ?>
                                    <img src="../images/product/<?php echo $display_product_images_image_name;?>" class="rounded-lg w-full aspect-square object-cover cursor-crosshair" id="item-picture" style="transition: transform 0.3s ease-out;">
                                <?php
                            }
                        }else{
                            $display_product_images_image_name = "default.png";
                            ?>
                                <img src="../images/product/<?php echo $display_product_images_image_name;?>" class="rounded-lg w-full aspect-square object-cover cursor-crosshair" id="item-picture" style="transition: transform 0.3s ease-out;">
                            <?php
                        }
                        ?>
                        </div>

                        <div class="grid grid-cols-4 gap-x-2 mt-4">
                        <?php
                        //Display Images
                        $display_product_images_sql = "SELECT * FROM tbl_product_images WHERE product_id = $product_data_id LIMIT 4";
                        $display_product_images_res = mysqli_query($conn, $display_product_images_sql);

                        $display_product_images_count = mysqli_num_rows($display_product_images_res);
                        if($display_product_images_count>0){
                            $display_product_images_counter = 1;
                            while($display_product_images_rows = mysqli_fetch_assoc($display_product_images_res)){
                                $display_product_images_image_name = $display_product_images_rows['image_name'];
                                if($display_product_images_image_name == ""){
                                    $display_product_images_image_name = "default.png";
                                }
                                ?>
                                    <img src="../images/product/<?php echo $display_product_images_image_name;?>" class="rounded-lg aspect-square cursor-pointer border-2 border-white hover:border-blue-600 transition duration-250 ease-in" id="item-picture-<?php echo $display_product_images_counter;?>">
                                <?php
                            }
                        }
                        ?>
                        </div>
                   
                        </div>
                        <div>
                            <p class="text-blue-600 font-semibold text-2xl mt-4 mb-4"><?php echo $product_store_name;?></p>
                            <p class="text-gray-700 font-semibold text-3xl mb-4"><?php echo $product_data_name;?>
                            </p>
                            <div class="flex items-center">
                                <div class="flex gap-x-2">
                                <?php
                                    $x = 0;
                                    for($i = 0; $i<5; $i++){
                                        if($x+1 <= $product_data_rating){
                                            ?>
                                            <img src="../public/img/star.png" class="w-5 h-5 max-w-full max-h-full">
                                            <?php
                                            $x+=1;
                                        }else{
                                            ?>
                                            <img src="../public/img/star2.png" class="w-5 h-5 max-w-full max-h-full">
                                            <?php
                                        }
                                    }
                                    ?>
                                    <p class="flex items-center gap-x-2"><?php echo $product_data_rating; ?> <span
                                            class="text-gray-400  text-xs">(...)</span></p>
                                    <p class="ml-6 font-bold">... Review</p>
                                </div>
                            </div>
                            <p class="mt-4 font-bold text-3xl" id="product-price">Rp<?php echo $product_data_price; ?></p>
                            <p class="mt-4 lg:mt-8 text-gray-700 text-base">Quantity:</p>
                            <div class="flex justify-between items-center mt-2 lg:mt-4">
                                <div class="flex items-center bg-white justify-between flex-1 py-2 px-4 rounded-md border border-gray-200 text-base"
                                    style="max-width: 150px;">
                                    <div><span id="quantity">1</span></div>
                                    <div class="flex justify-between">
                                        <button
                                            class="px-2 py-1 rounded-l cursor-default hover:bg-gray-300 transition duration-250 ease-in"
                                            id="minus"><img src="../public/img/minus-sign.png"
                                                class="w-3 h-3 max-w-full max-h-full"></button>
                                        <button
                                            class="px-2 py-1 rounded-r cursor-default hover:bg-gray-300 transition duration-250 ease-in"
                                            id="plus"><img src="../public/img/plus.png"
                                                class="w-3 h-3 max-w-full max-h-full"></button>
                                    </div>
                                </div>
                                <p class="flex-1 ml-4 text-yellow-500 text-lg">Limited quantity available</p>
                            </div>
                            <div class="mt-4">
                                <div class="bg-white border-2 border-blue-600 cursor-pointer rounded-lg p-4 hover:bg-blue-600 hover:text-white transition duration-250 ease-in variant"">
                            <div class=" flex justify-between">
                                    <p class="text-lg font-semibold">Oily skins</p>
                                    <p>chice card</p>
                                </div>
                                <div class="flex justify-between">
                                    <p>spf 50</p>
                                    <p>description</p>
                                </div>
                            </div>
                            <div
                                class="bg-white cursor-pointer rounded-lg p-4 hover:bg-blue-600 hover:text-white transition duration-250 ease-in variant2 mt-4">
                                <div class=" flex justify-between">
                                    <p class="text-lg font-semibold">Dry skins</p>
                                    <p>chice card</p>
                                </div>
                                <div class="flex justify-between">
                                    <p>spf 100</p>
                                    <p>description</p>
                                </div>
                            </div>
                        </div>
                        <label class="inline-flex items-center mt-4">
                            <input type="checkbox" class="form-checkbox h-5 w-5 rounded-full">
                            <span class="ml-2 text-gray-700">2-year protection plan <span class="font-bold">IDR.
                                    232,538.25</span></span>
                        </label>
                    </div>
                    <div>
                        <div class="mt-8 lg:mt-16 bg-white py-4 px-4 rounded-lg text-base shadow-xl">
                            <div
                                class="border-2 border-blue-600 p-4 rounded-lg hover:bg-blue-600 transition duration-250 ease-in cursor-pointer text-blue-600 hover:text-white font-semibold">
                                Free 2-day delivery</div>
                            <div class="bg-gray-200 rounded-lg p-4 mt-4">
                                <p>This is a NOTE for showing the content inside component</p>
                            </div>
                            <div class="border-2 border-gray-200 p-4 mt-4 rounded-lg">
                                <p class="font-semibold">Free pickup-today</p>
                                <p>In stock at San Leandro,</p>
                                <p>15555 Hesperian Blvd</p>
                            </div>
                            <div class="flex justify-between mt-4 items-center">
                                <p class="font-semibold">Total amount:</p>
                                <p class="font-bold text-xl" id="total-price">Rp<?php echo $product_data_price;?></p>
                            </div>
                            <button
                                class="w-full py-4 rounded-lg bg-blue-600 text-white font-semibold mt-4 border-2 border-blue-600 hover:bg-blue-800 hover:border-blue-800 transition duration-250 ease-in">Add to cart
                            </button>
                            <button
                                class="w-full py-4 rounded-lg text-blue-600 font-semibold mt-4 border-2 border-blue-600 hover:bg-blue-600 hover:text-white transition duration-250 ease-in">Beli Langsung
                            </button>
                        </div>
                        <div class="flex justify-between border-2 border-gray-200 p-4 bg-white rounded-lg mt-4">
                            <p class="bold">Have a better price?</p>
                            <a class="text-blue-600 cursor-pointer">Send offer</a>
                        </div>
                    </div>
            </div>
            </main>
        </div>

        <section class="bg-white mt-16 px-4 py-8 lg:py-16">
            <div class="max-w-2xl mx-auto x-4" id="comment-section">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg lg:text-2xl font-bold text-gray-900">Discussion (20)</h2>
                </div>
                <form class="mb-6">
                    <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 shadow-md">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea id="comment" rows="6"
                            class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none"
                            placeholder="Write a comment..." required></textarea>
                    </div>
                    <a class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center bg-blue-600 text-white rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-blue-800 transition duration-250 ease-in cursor-pointer"
                        id="post-comment">
                        Post comment
                    </a>
                </form>
                <article class="p-6 mb-6 text-base bg-white rounded-lg shadow-md">
                    <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <p class="inline-flex items-center mr-3 text-sm text-gray-900"><img
                                    class="mr-2 w-6 h-6 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                    alt="Michael Gough">Michael Gough</p>
                            <p class="text-sm text-gray-600"><time pubdate datetime="2022-02-08" title="February 8th, 2022">Feb.
                                    8, 2022</time></p>
                        </div>
                        <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50"
                            type="button">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                </path>
                            </svg>
                            <span class="sr-only">Comment settings</span>
                        </button>
                    </footer>
                    <p class="text-gray-500">Very straight-to-point article. Really worth time reading. Thank you! But tools are
                        just the
                        instruments for the UX designers. The knowledge of the design tools are as important as the
                        creation of the design strategy.</p>
                    <div class="flex items-center mt-4 space-x-4">
                        <button type="button" class="flex items-center text-sm text-gray-500 hover:underline">
                            <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                </path>
                            </svg>
                            Reply
                        </button>
                    </div>
                </article>
                <article class="p-6 mb-6 ml-6 lg:ml-12 text-base bg-white rounded-lg shadow-md">
                    <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <p class="inline-flex items-center mr-3 text-sm text-gray-900"><img
                                    class="mr-2 w-6 h-6 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Jese Leos">Jese
                                Leos</p>
                            <p class="text-sm text-gray-600"><time pubdate datetime="2022-02-12"
                                    title="February 12th, 2022">Feb. 12, 2022</time></p>
                        </div>
                        <button id="dropdownComment2Button" data-dropdown-toggle="dropdownComment2"
                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50"
                            type="button">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                </path>
                            </svg>
                            <span class="sr-only">Comment settings</span>
                        </button>
                    </footer>
                    <p class="text-gray-500">Much appreciated! Glad you liked it ☺️</p>
                    <div class="flex items-center mt-4 space-x-4">
                        <button type="button" class="flex items-center text-sm text-gray-500 hover:underline">
                            <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                </path>
                            </svg>
                            Reply
                        </button>
                    </div>
                </article>
                <article class="p-6 mb-6 text-base bg-white border-t border-gray-200 rounded-lg shadow-md">
                    <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <p class="inline-flex items-center mr-3 text-sm text-gray-900"><img
                                    class="mr-2 w-6 h-6 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-3.jpg"
                                    alt="Bonnie Green">Bonnie Green</p>
                            <p class="text-sm text-gray-600"><time pubdate datetime="2022-03-12" title="March 12th, 2022">Mar.
                                    12, 2022</time></p>
                        </div>
                        <button id="dropdownComment3Button" data-dropdown-toggle="dropdownComment3"
                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50"
                            type="button">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                </path>
                            </svg>
                            <span class="sr-only">Comment settings</span>
                        </button>
                    </footer>
                    <p class="text-gray-5000">The article covers the essentials, challenges, myths and stages the UX designer
                        should consider while creating the design strategy.</p>
                    <div class="flex items-center mt-4 space-x-4">
                        <button type="button" class="flex items-center text-sm text-gray-500 hover:underline">
                            <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                </path>
                            </svg>
                            Reply
                        </button>
                    </div>
                </article>
                <article class="p-6 text-base bg-white border-t border-gray-200 rounded-lg shadow-md">
                    <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <p class="inline-flex items-center mr-3 text-sm text-gray-900"><img
                                    class="mr-2 w-6 h-6 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-4.jpg"
                                    alt="Helene Engels">Helene Engels</p>
                            <p class="text-sm text-gray-600"><time pubdate datetime="2022-06-23" title="June 23rd, 2022">Jun.
                                    23, 2022</time></p>
                        </div>
                        <button id="dropdownComment4Button" data-dropdown-toggle="dropdownComment4"
                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50"
                            type="button">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                </path>
                            </svg>
                        </button>
                    </footer>
                    <p class="text-gray-500">Thanks for sharing this. I do came from the Backend development and explored some
                        of the tools to design my Side Projects.</p>
                    <div class="flex items-center mt-4 space-x-4">
                        <button type="button" class="flex items-center text-sm text-gray-500 hover:underline">
                            <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                </path>
                            </svg>
                            Reply
                        </button>
                    </div>
                </article>
            </div>
        </section>

        <div class="lg:hidden flex items-center justify-between bg-white shadow-md gap-x-2 px-4 py-4">
            <button class="px-12 py-2 border border-blue-600 text-blue-600 w-full rounded-lg font-semibold">Buy</button>
            <button class="px-12 py-2 bg-blue-600 text-white w-full border border-blue-600 rounded-lg font-semibold">+ Cart</button>
        </div>

        <?php include('partials/footer.php') ?>
    </body>
    <script src="../public/js/item.js"></script>