<?php include('partials/head.php'); ?>
<body class="text-xs">
    <div class="lg:h-screen mb-16 overflow-hidden px-4 md:px-8 lg:px-16" id="mainsection">
        <?php 
        if(isset($_SESSION['logged-in-user-id'])){
            include('partials/navbar-registered.php'); 
        }else{
            include('partials/navbar.php');
        }
        ?>
        <main class="lg:flex lg:items-start mt-32 lg:mt-72 px-4 md:px-8 lg:px-16">
            <div class="lg:w-1/2 h-full">
                <a href="hero.php" class="font-bold text-xl">P<span class="text-blue-600">epricorn.com</span></a>
                <h1 class="font-extrabold text-4xl text-gray-700 mt-4">
                    About Pepricorn
                </h1>
                <p class="mt-4 text-base">
                    Launched in 2023, pepricorn is the leading platform for global
                    wholesale trade. <br class="hidden lg:block"> We serve millions of buyers and suppliers around the
                    world.
                </p>
                <button
                    class="mt-8 w-full lg:w-auto text-base bg-blue-600 border border-blue-600 text-white font-bold py-2 px-3 lg:px-8 rounded-lg hover:bg-white hover:text-blue-600 hover:border hover:border-blue-600 transition duration-250 ease-in"
                    id="scroll">
                    Start Shopping
                </button>
                <div class="grid grid-cols-2 lg:flex gap-x-5 lg:gap-x-20 mt-8 lg:mt-16 overflow-hidden">
                    <div class="flex gap-x-4 items-center lg:block">
                        <img src="../public/img/visitor.png" class="w-8 h-8 lg:w-11 lg:h-11 max-w-full max-h-full lg:mb-2" />
                        <div>
                            <p class="text-gray-400 lg:mb-2">Monthly unique visit</p>
                            <p class="text-gray-700 text-xl lg:text-xl font-bold">30,254,699</p>
                        </div>
                    </div>
                    <div class="flex gap-x-4 items-center lg:mt-0 lg:block">
                        <img src="../public/img/user.png" class="w-8 h-8 lg:w-11 lg:h-11 max-w-full max-h-full lg:mb-2" />
                        <div>
                            <p class="text-gray-400 lg:mb-2">Active customers</p>
                            <p class="text-gray-700 text-xl lg:text-xl font-bold">33 Million</p>
                        </div>
                    </div>
                    <div class="flex gap-x-4 items-center mt-4 lg:mt-0 lg:block">
                        <img src="../public/img/skincare.png" class="w-8 h-8 lg:w-11 lg:h-11 max-w-full max-h-full lg:mb-2" />
                        <div>
                            <p class="text-gray-400 lg:mb-2">Selfcare need</p>
                            <p class="text-gray-700 text-xl lg:text-xl font-bold">100k</p>
                        </div>
                    </div>
                </div>
            </div>
            <img src="../public/img/pattern.jpg" class="mt-8 w-full h-1/2 lg:mt-0 lg:w-1/2 lg:h-full rounded-lg max-h-full"></img>
        </main>
        </div>
        
        <div data-aos="fade-up" class="px-4 sm:px-8 lg:px-16 sm:flex sm:justify-between">
            <div class="bg-blue-600 rounded-tr-2xl rounded-br-2xl py-4 px-4 flex items-center">
                <img src="../public/img/shopping-bags.png" class="w-h-14 h-14">
                <div class="ml-4">
                    <p class="text-2xl font-semibold text-white">New Arrivals: Shop the Latest Trends</p>
                    <p class="text-white font-light">Upgrade your self with our newest arrivals!</p>
                </div>
            </div>
            <a href="search.php"
                class="mt-2 sm:mt-0 align-right sm:self-end rounded-lg border-2 border-blue-600 py-1 px-4 sm:self-end sm:px-8 text-blue-600 font-semibold sm:ml-4 text-sm sm:text-base hover:bg-blue-600 hover:text-white transition duration-250 ease-in">
                See all
            </a>
        </div>
        
        <div class="mt-4 px-4 lg:px-16" data-aos="fade-up">
            <div class="lg:flex gap-2">
                <div class="w-full lg:w-1/2 cursor-pointer">
                    <div id="default-carousel" class="relative" data-carousel="static">
                        <!-- Carousel wrapper -->
                        <div class="overflow-hidden relative h-56 rounded-lg sm:h-64 xl:h-80 2xl:h-96">
                            <?php
                            $sql = "SELECT * FROM tbl_featuredimages WHERE active='Yes' AND section_name='Latest Trends'";
                            $res = mysqli_query($conn, $sql);

                            $count = mysqli_num_rows($res);
                            while($rows = mysqli_fetch_assoc($res)){
                                $image_name = $rows['image_name'];
                                
                                ?>
                                <!-- Item 1 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <span
                                        class="absolute top-1/2 left-1/2 text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 sm:text-3xl">First
                                        Slide</span>
                                    <img src="../images/featured/<?php echo $image_name;?>"
                                        class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                                </div>
                                
                                <?php
                            }
                            ?>
                            
                            
                        </div>
                        <!-- Slider indicators -->
                        <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                            <?php
                            for($i=0; $i<$count; $i++){
                                ?>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide <?php echo $i+1;?>"
                                data-carousel-slide-to="<?php echo $i;?>"></button>
                                <?php
                            }
                            ?>
                            
                        </div>
                        <!-- Slider controls -->
                        <button type="button"
                            class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                            data-carousel-prev>
                            <span
                                class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                                    </path>
                                </svg>
                                <span class="hidden">Previous</span>
                            </span>
                        </button>
                        <button type="button"
                            class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                            data-carousel-next>
                            <span
                                class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                    </path>
                                </svg>
                                <span class="hidden">Next</span>
                            </span>
                        </button>
                    </div>
                    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
                    <script>
                        setInterval(function () {
                            document.querySelector('[data-carousel-next]').click();
                        }, 4000);
                    </script>
                </div>
                <div class="mt-2 lg:mt-0">
                    <a href="" class="cursor-pointer"><img src="../public/img/carousel4.jpg"
                            class="overflow-hidden relative h-56 rounded-lg w-full sm:h-64 xl:h-80 2xl:h-96"></a>
                </div>
            </div>
        </div>
        
        <div>
            <div class="px-4 sm:px-8 lg:px-16" data-aos="fade-up">
                <div class="flex mt-8 justify-between">
                    <div class="bg-blue-600 rounded-tr-2xl rounded-br-2xl py-4 px-4 w-72 flex items-center">
                        <img src="../public/img/storm.png" class="w-h-14 h-14">
                        <div class="ml-4">
                            <p class="text-white text-2xl font-semibold">Flash Sale</p>
                            <p class="text-white font-light">Discount up to 50%!</p>
                        </div>
                    </div>
                    <a href="search.php"
                        class="self-end rounded-lg border-2 border-blue-600 py-1 px-4 sm:px-8 text-blue-600 font-semibold ml-4 text-sm sm:text-base hover:bg-blue-600 hover:text-white transition duration-250 ease-in">
                        See all
                    </a>
                </div>
            </div>
        
            <!-- Top Items Start -->
            <div class="grid grid-cols-2 px-4 gap-3 mt-4 sm:grid-cols-4 sm:px-8 lg:grid-cols-6 lg:px-16">
                <!-- Item Box Start -->
                <?php
                //Get the Data for Product
                $display_product_top_sql = "SELECT * FROM tbl_product WHERE active='Yes' AND discount>=50 ORDER BY discount DESC LIMIT 6";
                $display_product_top_res = mysqli_query($conn, $display_product_top_sql);
                $display_product_top_count = mysqli_num_rows($display_product_top_res);

                if($display_product_top_count>0){
                    while($display_product_top_rows = mysqli_fetch_assoc($display_product_top_res)){
                        $display_product_top_id = $display_product_top_rows['id'];
                        $display_product_top_name = $display_product_top_rows['name'];
                        $display_product_top_price = $display_product_top_rows['price'];
                        $display_product_top_rating = $display_product_top_rows['rating'];
                        $display_product_top_sold = $display_product_top_rows['sold'];
                        $display_product_top_store_id = $display_product_top_rows['store_id'];
                        $display_product_top_discount = $display_product_top_rows['discount'];

                        //Get the store data from the Product's Store ID
                        $get_top_product_store_data_sql = "SELECT * FROM tbl_store WHERE id = $display_product_top_store_id";
                        $get_top_product_store_data_res = mysqli_query($conn, $get_top_product_store_data_sql);
                        
                        $get_top_product_store_data_count = mysqli_num_rows($get_top_product_store_data_res);
                        if($get_top_product_store_data_count == 1){
                            $get_top_product_store_data_rows = mysqli_fetch_assoc($get_top_product_store_data_res);

                            $get_top_product_store_data_location_id = $get_top_product_store_data_rows['location_id'];

                            //Get the Location Name from the Store's Location ID
                            $get_top_product_location_data_sql = "SELECT * FROM tbl_location WHERE id = $get_top_product_store_data_location_id";
                            $get_top_product_location_data_res = mysqli_query($conn, $get_top_product_location_data_sql);

                            $get_top_product_location_data_count = mysqli_num_rows($get_top_product_location_data_res);
                            if($get_top_product_location_data_count == 1){
                                $get_top_product_location_data_rows = mysqli_fetch_assoc($get_top_product_location_data_res);
                                
                                $get_top_product_location_data_id = $get_top_product_location_data_rows['id'];
                                $display_product_top_location_name = $get_top_product_location_data_rows['name'];
                            }else{
                                $display_product_top_location_name = "NAN";
                            }
                        }else{
                            $display_product_top_location_name = "NAN";
                        }

                        //Get the Data for Product Image from Product ID
                        $display_product_top_image_sql = "SELECT * FROM tbl_product_images WHERE product_id = $display_product_top_id AND active='Yes' LIMIT 1";
                        $display_product_top_image_res = mysqli_query($conn, $display_product_top_image_sql);

                        $display_product_top_image_count = mysqli_num_rows($display_product_top_image_res);
                        if($display_product_top_image_count==1){
                            $display_product_top_image_rows = mysqli_fetch_assoc($display_product_top_image_res);

                            $display_product_top_image_name = $display_product_top_image_rows['image_name'];

                            if($display_product_top_image_name==""){
                                $display_product_top_image_name = "default.png";
                            }
                        }else{
                            $display_product_top_image_name = "default.png";
                        }


                        ?>
                        <a href="<?php echo SITEURL;?>views/item.php?id=<?php echo $display_product_top_id;?>">
                            <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                                data-aos="fade-up">
                                <img src="../images/product/<?php echo $display_product_top_image_name;?>" class="min-w-full aspect-square">
                                <p class="px-4 mt-2"><?php echo $display_product_top_name;?> </p>
                                <?php
                                if($display_product_top_discount > 0 && $display_product_top_discount != ""){
                                    //If a Discount is Available
                                    $display_product_top_discounted_price = $display_product_top_price - ($display_product_top_price * ($display_product_top_discount/100));
                                    ?>
                                    <p class="mt-1 px-4 font-bold text-sm">Rp<?php echo $display_product_top_discounted_price;?></p>
                                    <div class="flex px-4 py-1 items-center gap-x-1 mt-1">
                                        <div class="bg-red-200 rounded-md py-1 px-1 font-bold text-red-600 text-xs"><?php echo $display_product_top_discount;?>%</div>
                                        <p class="text-gray-500 strike line-through">Rp<?php echo $display_product_top_price;?></p>
                                    </div>
                                    <?php
                                }else{
                                    ?>
                                        <p class="mt-1 px-4 font-bold text-sm">Rp<?php echo $display_product_top_price;?></p>
                                    <?php
                                }
                                ?>
                                
                                <p class="px-4 mt-1"><?php echo $display_product_top_location_name;?></p>
                                <div class="flex items-center px-4 mt-1 gap-x-2">
                                    <img src="../public/img/star.png" class="w-4 h-4">
                                    <div class="flex items-center">
                                        <p class="mr-2"><?php echo $display_product_top_rating;?></p>
                                        <div class="border-l border-gray-700 h-4"></div>
                                    </div>
                                    <p><?php echo $display_product_top_sold;?> Sold</p>
                                </div>
                            </div>
                        </a>
                        <?php


                    }
                }else{
                    ?>
                    <a href="<?php echo SITEURL.'views/item.php';?>">
                        <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                            data-aos="fade-up">
                            <img src="../public/img/Product/kahf.jpg" class="min-w-full">
                            <p class="px-4 mt-2">Product Name </p>
                            <p class="mt-1 px-4 font-bold text-sm">Rp100.000</p>
                            
                            <p class="px-4 mt-1">Store's Location</p>
                            <div class="flex items-center px-4 mt-1 gap-x-2">
                                <img src="../public/img/star.png" class="w-4 h-4">
                                <div class="flex items-center">
                                    <p class="mr-2">Rating</p>
                                    <div class="border-l border-gray-700 h-4"></div>
                                </div>
                                <p>Sold Amm</p>
                            </div>
                        </div>
                    </a>
                    <?php
                }
                ?>
                
                <!--  Item Box End  -->
                
            </div>
        </div>
        <!-- Top Items End -->
        
        <div class="px-4 sm:px-8 lg:px-16" data-aos="fade-up">
            <div class="flex mt-8 justify-between">
                <div class="bg-blue-600 rounded-tr-2xl rounded-br-2xl py-4 px-4 w-72 flex items-center">
                    <img src="../public/img/favorites.png" class="w-h-14 h-14">
                    <div class="ml-4">
                        <p class="text-white text-2xl font-semibold">Best Products</p>
                        <p class="text-white font-light">La Roche Posay Specials!</p>
                    </div>
                </div>
                <a href="search.php"
                    class="self-end rounded-lg border-2 border-blue-600 py-1 px-4 sm:px-8 text-blue-600 font-semibold ml-4 text-sm sm:text-base hover:bg-blue-600 hover:text-white transition duration-250 ease-in">
                    See all
                </a>
            </div>
        </div>
        
        <div class="grid grid-cols-2 px-4 gap-3 mt-4 sm:grid-cols-4 sm:px-8 lg:grid-cols-6 lg:px-16">
        <?php
                //Get the Data for Product
                $display_product_best_sql = "SELECT * FROM tbl_product WHERE active='Yes' ORDER BY rating DESC LIMIT 6";
                $display_product_best_res = mysqli_query($conn, $display_product_best_sql);
                $display_product_best_count = mysqli_num_rows($display_product_best_res);

                if($display_product_best_count>0){
                    while($display_product_best_rows = mysqli_fetch_assoc($display_product_best_res)){
                        $display_product_best_id = $display_product_best_rows['id'];
                        $display_product_best_name = $display_product_best_rows['name'];
                        $display_product_best_price = $display_product_best_rows['price'];
                        $display_product_best_rating = $display_product_best_rows['rating'];
                        $display_product_best_sold = $display_product_best_rows['sold'];
                        $display_product_best_store_id = $display_product_best_rows['store_id'];
                        $display_product_best_discount = $display_product_best_rows['discount'];

                        //Get the store data from the Product's Store ID
                        $get_best_product_store_data_sql = "SELECT * FROM tbl_store WHERE id = $display_product_best_store_id";
                        $get_best_product_store_data_res = mysqli_query($conn, $get_best_product_store_data_sql);
                        
                        $get_best_product_store_data_count = mysqli_num_rows($get_best_product_store_data_res);
                        if($get_best_product_store_data_count == 1){
                            $get_best_product_store_data_rows = mysqli_fetch_assoc($get_best_product_store_data_res);

                            $get_best_product_store_data_location_id = $get_best_product_store_data_rows['location_id'];

                            //Get the Location Name from the Store's Location ID
                            $get_best_product_location_data_sql = "SELECT * FROM tbl_location WHERE id = $get_best_product_store_data_location_id";
                            $get_best_product_location_data_res = mysqli_query($conn, $get_best_product_location_data_sql);

                            $get_best_product_location_data_count = mysqli_num_rows($get_best_product_location_data_res);
                            if($get_best_product_location_data_count == 1){
                                $get_best_product_location_data_rows = mysqli_fetch_assoc($get_best_product_location_data_res);
                                
                                $get_best_product_location_data_id = $get_best_product_location_data_rows['id'];
                                $display_product_best_location_name = $get_best_product_location_data_rows['name'];
                            }else{
                                $display_product_best_location_name = "NAN";
                            }
                        }else{
                            $display_product_best_location_name = "NAN";
                        }

                        //Get the Data for Product Image from Product ID
                        $display_product_best_image_sql = "SELECT * FROM tbl_product_images WHERE product_id = $display_product_best_id AND active='Yes' LIMIT 1";
                        $display_product_best_image_res = mysqli_query($conn, $display_product_best_image_sql);

                        $display_product_best_image_count = mysqli_num_rows($display_product_best_image_res);
                        if($display_product_best_image_count==1){
                            $display_product_best_image_rows = mysqli_fetch_assoc($display_product_best_image_res);

                            $display_product_best_image_name = $display_product_best_image_rows['image_name'];

                            if($display_product_best_image_name==""){
                                $display_product_best_image_name = "default.png";
                            }
                        }else{
                            $display_product_best_image_name = "default.png";
                        }


                        ?>
                        <a href="<?php echo SITEURL;?>views/item.php?id=<?php echo $display_product_best_id;?>">
                            <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                                data-aos="fade-up">
                                <img src="../images/product/<?php echo $display_product_best_image_name;?>" class="min-w-full aspect-square">
                                <p class="px-4 mt-2"><?php echo $display_product_best_name;?> </p>
                                <?php
                                if($display_product_best_discount > 0 && $display_product_best_discount != ""){
                                    //If a Discount is Available
                                    $display_product_best_discounted_price = $display_product_best_price - ($display_product_best_price * ($display_product_best_discount/100));
                                    ?>
                                    <p class="mt-1 px-4 font-bold text-sm">Rp<?php echo $display_product_best_discounted_price;?></p>
                                    <div class="flex px-4 py-1 items-center gap-x-1 mt-1">
                                        <div class="bg-red-200 rounded-md py-1 px-1 font-bold text-red-600 text-xs"><?php echo $display_product_best_discount;?>%</div>
                                        <p class="text-gray-500 strike line-through">Rp<?php echo $display_product_best_price;?></p>
                                    </div>
                                    <?php
                                }else{
                                    ?>
                                        <p class="mt-1 px-4 font-bold text-sm">Rp<?php echo $display_product_best_price;?></p>
                                    <?php
                                }
                                ?>
                                
                                <p class="px-4 mt-1"><?php echo $display_product_best_location_name;?></p>
                                <div class="flex items-center px-4 mt-1 gap-x-2">
                                    <img src="../public/img/star.png" class="w-4 h-4">
                                    <div class="flex items-center">
                                        <p class="mr-2"><?php echo $display_product_best_rating;?></p>
                                        <div class="border-l border-gray-700 h-4"></div>
                                    </div>
                                    <p><?php echo $display_product_top_sold;?> Sold</p>
                                </div>
                            </div>
                        </a>
                        <?php


                    }
                }else{
                    ?>
                    <a href="<?php echo SITEURL.'views/item.php';?>">
                        <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                            data-aos="fade-up">
                            <img src="../public/img/Product/kahf.jpg" class="min-w-full">
                            <p class="px-4 mt-2">Product Name </p>
                            <p class="mt-1 px-4 font-bold text-sm">Rp100.000</p>
                            
                            <p class="px-4 mt-1">Store's Location</p>
                            <div class="flex items-center px-4 mt-1 gap-x-2">
                                <img src="../public/img/star.png" class="w-4 h-4">
                                <div class="flex items-center">
                                    <p class="mr-2">Rating</p>
                                    <div class="border-l border-gray-700 h-4"></div>
                                </div>
                                <p>Sold Amm</p>
                            </div>
                        </div>
                    </a>
                    <?php
                }
                ?>
        </div>
        
        <!-- <div class="grid grid-cols-2 md:grid-cols-3 lg:flex mt-16 gap-x-2 gap-y-2 px-4 lg:px-16" id="itemsection" data-aos="fade-up">
            <div
                class="bg-pink-600 text-white font-bold p-2 rounded-lg w-full lg:w-1/6 h-16 cursor-pointer hover:bg-pink-700 transition duration-250 ease-in">
                <p>For You</p>
            </div>
            <div
                class="bg-purple-600 text-white font-bold p-2 rounded-lg w-full lg:w-1/6 h-16 cursor-pointer hover:bg-purple-700 transition duration-250 ease-in">
                <p>Special Discount</p>
            </div>
            <div
                class="bg-orange-600 text-white font-bold p-2 rounded-lg w-full lg:w-1/6 h-16 cursor-pointer hover:bg-orange-700 transition duration-250 ease-in">
                <p>Hair Care</p>
            </div>
            <div
                class="bg-green-600 text-white font-bold p-2 rounded-lg w-full lg:w-1/6 h-16 cursor-pointer hover:bg-green-700 transition duration-250 ease-in">
                <p>Skin Care</p>
            </div>
            <div
                class="bg-red-600 text-white font-bold p-2 rounded-lg w-full lg:w-1/6 h-16 cursor-pointer hover:bg-red-700 transition duration-250 ease-in">
                <p>Lip Care</p>
            </div>
        </div> -->

        <!-- component -->
        <div class="flex flex-col bg-white mt-8" data-aos="fade-up">
            <div class="flex overflow-x-scroll hide-scroll-bar">
                <div class="flex flex-nowrap">
                    <div class="inline-block pr-2 pl-4 md:pl-8 lg:pl-16">
                        <div
                            class="w-44 h-16 max-w-xs overflow-hidden rounded-lg shadow-md bg-pink-600 text-white font-bold py-2 px-3 hover:bg-pink-700 transition duration-250 ease-in">
                            <p class="text-base">For You</p>
                        </div>
                    </div>
                    <div class="inline-block pr-2">
                        <div
                            class="w-44 h-16 max-w-xs overflow-hidden rounded-lg shadow-md bg-purple-600 text-white font-bold py-2 px-3 hover:bg-purple-700 transition duration-250 ease-in">
                            <p class="text-base">Special Discount</p>
                        </div>
                    </div>
                    <div class="inline-block pr-2">
                        <div
                            class="w-44 h-16 max-w-xs overflow-hidden rounded-lg shadow-md bg-orange-600 text-white font-bold py-2 px-3 hover:bg-orange-700 transition duration-250 ease-in">
                            <p class="text-base">Hair Care</p>
                        </div>
                    </div>
                    <div class="inline-block pr-2">
                        <div
                            class="w-44 h-16 max-w-xs overflow-hidden rounded-lg shadow-md bg-green-600 text-white font-bold py-2 px-3 hover:bg-green-700 transition duration-250 ease-in">
                            <p class="text-base">Skin Care</p>
                        </div>
                    </div>
                    <div class="inline-block pr-2">
                        <div
                            class="w-44 h-16 max-w-xs overflow-hidden rounded-lg shadow-md bg-red-600 text-white font-bold py-2 px-3 hover:bg-red-700 transition duration-250 ease-in">
                            <p class="text-base">Lip Care</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .hide-scroll-bar {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
        
            .hide-scroll-bar::-webkit-scrollbar {
                display: none;
            }
        </style>
        
        <div class="grid grid-cols-2 px-4 gap-3 mt-4 sm:grid-cols-4 sm:px-8 lg:grid-cols-6 lg:px-16">
            <a href="<?php echo SITEURL.'views/item.php';?>">
                <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                    data-aos="fade-up">
                    <img src="../public/img/Product/ceta.jpg" class="min-w-full">
                    <p class="px-4 mt-2">Cetaphil Gentle Skin Cleanser 100ml Sabun Pembersih</p>
                    <p class="mt-1 px-4 font-bold text-sm">Rp285.000</p>
                    <div class="flex px-4 py-1 items-center gap-x-1 mt-1">
                        <div class="bg-red-200 rounded-md py-1 px-1 font-bold text-red-600 text-xs">30%</div>
                        <p class="text-gray-500 strike line-through">Rp405.900</p>
                    </div>
                    <p class="px-4 mt-1">Tangerang</p>
                    <div class="flex items-center px-4 mt-1 gap-x-2">
                        <img src="../public/img/star.png" class="w-4 h-4">
                        <div class="flex items-center">
                            <p class="mr-2">4.9</p>
                            <div class="border-l border-gray-700 h-4"></div>
                        </div>
                        <p>Sold 5k+</p>
                    </div>
                </div>
            </a>
            <a href="<?php echo SITEURL.'views/item.php';?>">
                <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                    data-aos="fade-up">
                    <img src="../public/img/Product/hada.jpg" class="min-w-full">
                    <p class="px-4 mt-2">Hadalabo Gokujyun Ultimate Moisturizing Face Wash</p>
                    <p class="mt-1 px-4 font-bold text-sm">Rp33.304</p>
                    <div class="flex px-4 py-1 items-center gap-x-1 mt-1">
                        <div class="bg-red-200 rounded-md py-1 px-1 font-bold text-red-600 text-xs">8%</div>
                        <p class="text-gray-500 strike line-through">Rp36.200</p>
                    </div>
                    <p class="px-4 mt-1">Tangerang</p>
                    <div class="flex items-center px-4 mt-1 gap-x-2">
                        <img src="../public/img/star.png" class="w-4 h-4">
                        <div class="flex items-center">
                            <p class="mr-2">5.0</p>
                            <div class="border-l border-gray-700 h-4"></div>
                        </div>
                        <p>Sold 7k+</p>
                    </div>
                </div>
            </a>
            <a href="<?php echo SITEURL.'views/item.php';?>">
                <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                    data-aos="fade-up">
                    <img src="../public/img/Product/elvicto.jpg" class="min-w-full">
                    <p class="px-4 mt-2">ELVICTO Paket Acne 25ml + Toner 30ml</p>
                    <p class="mt-1 px-4 font-bold text-sm">Rp399.000</p>
                    <div class="flex px-4 py-1 items-center gap-x-1 mt-1">
                        <div class="bg-red-200 rounded-md py-1 px-1 font-bold text-red-600 text-xs">20%</div>
                        <p class="text-gray-500 strike line-through">Rp500.000</p>
                    </div>
                    <p class="px-4 mt-1">Tangerang</p>
                    <div class="flex items-center px-4 mt-1 gap-x-2">
                        <img src="../public/img/star.png" class="w-4 h-4">
                        <div class="flex items-center">
                            <p class="mr-2">5.0</p>
                            <div class="border-l border-gray-700 h-4"></div>
                        </div>
                        <p>Sold 80+</p>
                    </div>
                </div>
            </a>
            <a href="<?php echo SITEURL.'views/item.php';?>">
                <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                    data-aos="fade-up">
                    <img src="../public/img/Product/Kelaya.jpg" class="min-w-full">
                    <p class="px-4 mt-2">Kelaya Hair Treatment Shampoo Rambut Rontok</p>
                    <p class="mt-1 px-4 font-bold text-sm">Rp92.500</p>
                    <div class="flex px-4 py-1 items-center gap-x-1 mt-1">
                        <div class="bg-red-200 rounded-md py-1 px-1 font-bold text-red-600 text-xs">26%</div>
                        <p class="text-gray-500 strike line-through">Rp125.000</p>
                    </div>
                    <p class="px-4 mt-1">Tangerang</p>
                    <div class="flex items-center px-4 mt-1 gap-x-2">
                        <img src="../public/img/star.png" class="w-4 h-4">
                        <div class="flex items-center">
                            <p class="mr-2">5.0</p>
                            <div class="border-l border-gray-700 h-4"></div>
                        </div>
                        <p>Sold 1k+</p>
                    </div>
                </div>
            </a>
            <a href="<?php echo SITEURL.'views/item.php';?>">
                <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                    data-aos="fade-up">
                    <img src="../public/img/Product/Cherle.jpg" class="min-w-full">
                    <p class="px-4 mt-2">Cherie Clarifying Body Toner AHA 7% BHA 2% 150ml</p>
                    <p class="mt-1 px-4 font-bold text-sm">Rp125.000</p>
                    <p class="px-4 mt-1">Tangerang</p>
                    <div class="flex items-center px-4 mt-1 gap-x-2">
                        <img src="../public/img/star.png" class="w-4 h-4">
                        <div class="flex items-center">
                            <p class="mr-2">5.0</p>
                            <div class="border-l border-gray-700 h-4"></div>
                        </div>
                        <p>Sold 1k+</p>
                    </div>
                </div>
            </a>
            <a href="<?php echo SITEURL.'views/item.php';?>">
                <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                    data-aos="fade-up">
                    <img src="../public/img/Product/Skintific.jpg" class="min-w-full">
                    <p class="px-4 mt-2">SKINTIFIC 5X Ceramide Barrier Moisture Gel</p>
                    <p class="mt-1 px-4 font-bold text-sm">Rp135.00</p>
                    <div class="flex px-4 py-1 items-center gap-x-1 mt-1">
                        <div class="bg-red-200 rounded-md py-1 px-1 font-bold text-red-600 text-xs">20%</div>
                        <p class="text-gray-500 strike line-through">Rp169.000</p>
                    </div>
                    <p class="px-4 mt-1">Tangerang</p>
                    <div class="flex items-center px-4 mt-1 gap-x-2">
                        <img src="../public/img/star.png" class="w-4 h-4">
                        <div class="flex items-center">
                            <p class="mr-2">5.09</p>
                            <div class="border-l border-gray-700 h-4"></div>
                        </div>
                        <p>Sold 4k+</p>
                    </div>
                </div>
            </a>
            <a href="<?php echo SITEURL.'views/item.php';?>">
                <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                    data-aos="fade-up">
                    <img src="../public/img/Product/Skintific2.jpg" class="min-w-full">
                    <p class="px-4 mt-2">SKINTIFIC All Day Light Sunscreen Mist SPF50</p>
                    <p class="mt-1 px-4 font-bold text-sm">Rp85/000</p>
                    <div class="flex px-4 py-1 items-center gap-x-1 mt-1">
                        <div class="bg-red-200 rounded-md py-1 px-1 font-bold text-red-600 text-xs">47%</div>
                        <p class="text-gray-500 strike line-through">Rp159.000</p>
                    </div>
                    <p class="px-4 mt-1">Tangerang</p>
                    <div class="flex items-center px-4 mt-1 gap-x-2">
                        <img src="../public/img/star.png" class="w-4 h-4">
                        <div class="flex items-center">
                            <p class="mr-2">4.9</p>
                            <div class="border-l border-gray-700 h-4"></div>
                        </div>
                        <p>Sold 10k+</p>
                    </div>
                </div>
            </a>
            <a href="<?php echo SITEURL.'views/item.php';?>">
                <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                    data-aos="fade-up">
                    <img src="../public/img/Product/ponds.png" class="min-w-full">
                    <p class="px-4 mt-2">Ponds Age Miracle Retinol Night Cream Youthful Glow</p>
                    <p class="mt-1 px-4 font-bold text-sm">Rp163.710</p>
                    <div class="flex px-4 py-1 items-center gap-x-1 mt-1">
                        <div class="bg-red-200 rounded-md py-1 px-1 font-bold text-red-600 text-xs">34%</div>
                        <p class="text-gray-500 strike line-through">Rp246.720</p>
                    </div>
                    <p class="px-4 mt-1">Tangerang</p>
                    <div class="flex items-center px-4 mt-1 gap-x-2">
                        <img src="../public/img/star.png" class="w-4 h-4">
                        <div class="flex items-center">
                            <p class="mr-2">5.0</p>
                            <div class="border-l border-gray-700 h-4"></div>
                        </div>
                        <p>Sold 250+</p>
                    </div>
                </div>
            </a>
            <a href="<?php echo SITEURL.'views/item.php';?>">
                <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                    data-aos="fade-up">
                    <img src="../public/img/Product/cerave.png" class="min-w-full">
                    <p class="px-4 mt-2">Cerave Moisturizing Lotion</p>
                    <p class="mt-1 px-4 font-bold text-sm">Rp247.250</p>
                    <div class="flex px-4 py-1 items-center gap-x-1 mt-1">
                        <div class="bg-red-200 rounded-md py-1 px-1 font-bold text-red-600 text-xs">5%</div>
                        <p class="text-gray-500 strike line-through">Rp260.0000</p>
                    </div>
                    <p class="px-4 mt-1">Tangerang</p>
                    <div class="flex items-center px-4 mt-1 gap-x-2">
                        <img src="../public/img/star.png" class="w-4 h-4">
                        <div class="flex items-center">
                            <p class="mr-2">4.9</p>
                            <div class="border-l border-gray-700 h-4"></div>
                        </div>
                        <p>Sold 250+</p>
                    </div>
                </div>
            </a>
            <a href="<?php echo SITEURL.'views/item.php';?>">
                <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                    data-aos="fade-up">
                    <img src="../public/img/Product/cerave21.png" class="min-w-full">
                    <p class="px-4 mt-2">Cerave Moisturizing Lotion</p>
                    <p class="mt-1 px-4 font-bold text-sm">Rp275.000</p>
                    <div class="flex px-4 py-1 items-center gap-x-1 mt-1">
                        <div class="bg-red-200 rounded-md py-1 px-1 font-bold text-red-600 text-xs">39%</div>
                        <p class="text-gray-500 strike line-through">Rp275.000</p>
                    </div>
                    <p class="px-4 mt-1">Tangerang</p>
                    <div class="flex items-center px-4 mt-1 gap-x-2">
                        <img src="../public/img/star.png" class="w-4 h-4">
                        <div class="flex items-center">
                            <p class="mr-2">4.6</p>
                            <div class="border-l border-gray-700 h-4"></div>
                        </div>
                        <p>Sold 100k+</p>
                    </div>
                </div>
            </a>
            <a href="<?php echo SITEURL.'views/item.php';?>">
                <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                    data-aos="fade-up">
                    <img src="../public/img/Product/axe.png" class="min-w-full">
                    <p class="px-4 mt-2">Axe Deodorant Body Spray Apollo 135ml</p>
                    <p class="mt-1 px-4 font-bold text-sm">Rp29.319</p>
                    <div class="flex px-4 py-1 items-center gap-x-1 mt-1">
                        <div class="bg-red-200 rounded-md py-1 px-1 font-bold text-red-600 text-xs">38%</div>
                        <p class="text-gray-500 strike line-through">Rp46.920</p>
                    </div>
                    <p class="px-4 mt-1">Tangerang</p>
                    <div class="flex items-center px-4 mt-1 gap-x-2">
                        <img src="../public/img/star.png" class="w-4 h-4">
                        <div class="flex items-center">
                            <p class="mr-2">5.0</p>
                            <div class="border-l border-gray-700 h-4"></div>
                        </div>
                        <p>Sold 1k+</p>
                    </div>
                </div>
            </a>
            <a href="<?php echo SITEURL.'views/item.php';?>">
                <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                    data-aos="fade-up">
                    <img src="../public/img/Product/Marks.png" class="min-w-full">
                    <p class="px-4 mt-2">Marks & Spencer - Deodorant - Vetiver Roll Deodorant 50ml</p>
                    <p class="mt-1 px-4 font-bold text-sm">Rp99.000</p>
                    <p class="px-4 mt-1">Tangerang</p>
                    <div class="flex items-center px-4 mt-1 gap-x-2">
                        <img src="../public/img/star.png" class="w-4 h-4">
                        <div class="flex items-center">
                            <p class="mr-2">5.0</p>
                            <div class="border-l border-gray-700 h-4"></div>
                        </div>
                        <p>Sold 2k+</p>
                    </div>
                </div>
            </a>
            <a href="<?php echo SITEURL.'views/item.php';?>">
                <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                    data-aos="fade-up">
                    <img src="../public/img/Product/roche7.png" class="min-w-full">
                    <p class="px-4 mt-2">La Roche Posay Anthelios UVMune 400 Invisible</p>
                    <p class="mt-1 px-4 font-bold text-sm">Rp401.800</p>
                    <div class="flex px-4 py-1 items-center gap-x-1 mt-1">
                        <div class="bg-red-200 rounded-md py-1 px-1 font-bold text-red-600 text-xs">2%</div>
                        <p class="text-gray-500 strike line-through">Rp410.000</p>
                    </div>
                    <p class="px-4 mt-1">Tangerang</p>
                    <div class="flex items-center px-4 mt-1 gap-x-2">
                        <img src="../public/img/star.png" class="w-4 h-4">
                        <div class="flex items-center">
                            <p class="mr-2">4.9</p>
                            <div class="border-l border-gray-700 h-4"></div>
                        </div>
                        <p>Sold 1k+</p>
                    </div>
                </div>
            </a>
            <a href="<?php echo SITEURL.'views/item.php';?>">
                <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                    data-aos="fade-up">
                    <img src="../public/img/Product/Vaseline.jpg" class="min-w-full">
                    <p class="px-4 mt-2">Vaseline Petroleum Jelly Origina 50ml</p>
                    <p class="mt-1 px-4 font-bold text-sm">Rp25.665</p>
                    <div class="flex px-4 py-1 items-center gap-x-1 mt-1">
                        <div class="bg-red-200 rounded-md py-1 px-1 font-bold text-red-600 text-xs">32%</div>
                        <p class="text-gray-500 strike line-through">Rp37.560</p>
                    </div>
                    <p class="px-4 mt-1">Tangerang</p>
                    <div class="flex items-center px-4 mt-1 gap-x-2">
                        <img src="../public/img/star.png" class="w-4 h-4">
                        <div class="flex items-center">
                            <p class="mr-2">5.0</p>
                            <div class="border-l border-gray-700 h-4"></div>
                        </div>
                        <p>Sold 8k+</p>
                    </div>
                </div>
            </a>
            <a href="<?php echo SITEURL.'views/item.php';?>">
                <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                    data-aos="fade-up">
                    <img src="../public/img/Product/gatsby.png" class="min-w-full">
                    <p class="px-4 mt-2">GATSBY Texturizing Clay Mat Lift</p>
                    <p class="mt-1 px-4 font-bold text-sm">Rp39.500</p>
                    <p class="px-4 mt-1">Tangerang</p>
                    <div class="flex items-center px-4 mt-1 gap-x-2">
                        <img src="../public/img/star.png" class="w-4 h-4">
                        <div class="flex items-center">
                            <p class="mr-2">4.9</p>
                            <div class="border-l border-gray-700 h-4"></div>
                        </div>
                        <p>Sold 3k+</p>
                    </div>
                </div>
            </a>
            <a href="<?php echo SITEURL.'views/item.php';?>">
                <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                    data-aos="fade-up">
                    <img src="../public/img/Product/rexona.jpg" class="min-w-full">
                    <p class="px-4 mt-2">Rexona Men Motion SEnse INVISIBLE DRY Deodorant</p>
                    <p class="mt-1 px-4 font-bold text-sm">Rp45.000</p>
                    <p class="px-4 mt-1">Tangerang</p>
                    <div class="flex items-center px-4 mt-1 gap-x-2">
                        <img src="../public/img/star.png" class="w-4 h-4">
                        <div class="flex items-center">
                            <p class="mr-2">5.0</p>
                            <div class="border-l border-gray-700 h-4"></div>
                        </div>
                        <p>Sold 1k+</p>
                    </div>
                </div>
            </a>
            <a href="<?php echo SITEURL.'views/item.php';?>">
                <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                    data-aos="fade-up">
                    <img src="../public/img/Product/scarlet.jpg" class="min-w-full">
                    <p class="px-4 mt-2">Scarlett Whitening Body Lotion Pemutih Badan Handal</p>
                    <p class="mt-1 px-4 font-bold text-sm">Rp59.000</p>
                    <div class="flex px-4 py-1 items-center gap-x-1 mt-1">
                        <div class="bg-red-200 rounded-md py-1 px-1 font-bold text-red-600 text-xs">9%</div>
                        <p class="text-gray-500 strike line-through">Rp65.000</p>
                    </div>
                    <p class="px-4 mt-1">Tangerang</p>
                    <div class="flex items-center px-4 mt-1 gap-x-2">
                        <img src="../public/img/star.png" class="w-4 h-4">
                        <div class="flex items-center">
                            <p class="mr-2">4.9</p>
                            <div class="border-l border-gray-700 h-4"></div>
                        </div>
                        <p>Sold 10k+</p>
                    </div>
                </div>
            </a>
            <a href="<?php echo SITEURL.'views/item.php';?>">
                <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                    data-aos="fade-up">
                    <img src="../public/img/Product/Skintific3.jpg" class="min-w-full">
                    <p class="px-4 mt-2">SKINTIFIC Alaska Volcano Pore Detox Clay Mask</p>
                    <p class="mt-1 px-4 font-bold text-sm">Rp87.000</p>
                    <div class="flex px-4 py-1 items-center gap-x-1 mt-1">
                        <div class="bg-red-200 rounded-md py-1 px-1 font-bold text-red-600 text-xs">37%</div>
                        <p class="text-gray-500 strike line-through">Rp139.000</p>
                    </div>
                    <p class="px-4 mt-1">Tangerang</p>
                    <div class="flex items-center px-4 mt-1 gap-x-2">
                        <img src="../public/img/star.png" class="w-4 h-4">
                        <div class="flex items-center">
                            <p class="mr-2">5.0</p>
                            <div class="border-l border-gray-700 h-4"></div>
                        </div>
                        <p>Sold 1k+</p>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="grid grid-cols-2 px-4 gap-3 mt-4 sm:grid-cols-4 sm:px-8 lg:grid-cols-6 lg:px-16 hidden" id="hidden-1">
            <a href="<?php echo SITEURL.'views/item.php';?>">
                <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                    data-aos="fade-up">
                    <img src="../public/img/Product/Skintific2.jpg" class="min-w-full">
                    <p class="px-4 mt-2">SKINTIFIC All Day Light Sunscreen Mist SPF50</p>
                    <p class="mt-1 px-4 font-bold text-sm">Rp85/000</p>
                    <div class="flex px-4 py-1 items-center gap-x-1 mt-1">
                        <div class="bg-red-200 rounded-md py-1 px-1 font-bold text-red-600 text-xs">47%</div>
                        <p class="text-gray-500 strike line-through">Rp159.000</p>
                    </div>
                    <p class="px-4 mt-1">Tangerang</p>
                    <div class="flex items-center px-4 mt-1 gap-x-2">
                        <img src="../public/img/star.png" class="w-4 h-4">
                        <div class="flex items-center">
                            <p class="mr-2">4.9</p>
                            <div class="border-l border-gray-700 h-4"></div>
                        </div>
                        <p>Sold 10k+</p>
                    </div>
                </div>
            </a>
            <a href="<?php echo SITEURL.'views/item.php';?>">
                <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                    data-aos="fade-up">
                    <img src="../public/img/Product/ponds.png" class="min-w-full">
                    <p class="px-4 mt-2">Ponds Age Miracle Retinol Night Cream Youthful Glow</p>
                    <p class="mt-1 px-4 font-bold text-sm">Rp163.710</p>
                    <div class="flex px-4 py-1 items-center gap-x-1 mt-1">
                        <div class="bg-red-200 rounded-md py-1 px-1 font-bold text-red-600 text-xs">34%</div>
                        <p class="text-gray-500 strike line-through">Rp246.720</p>
                    </div>
                    <p class="px-4 mt-1">Tangerang</p>
                    <div class="flex items-center px-4 mt-1 gap-x-2">
                        <img src="../public/img/star.png" class="w-4 h-4">
                        <div class="flex items-center">
                            <p class="mr-2">5.0</p>
                            <div class="border-l border-gray-700 h-4"></div>
                        </div>
                        <p>Sold 250+</p>
                    </div>
                </div>
            </a>
            <a href="<?php echo SITEURL.'views/item.php';?>">
                <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                    data-aos="fade-up">
                    <img src="../public/img/Product/cerave.png" class="min-w-full">
                    <p class="px-4 mt-2">Cerave Moisturizing Lotion</p>
                    <p class="mt-1 px-4 font-bold text-sm">Rp247.250</p>
                    <div class="flex px-4 py-1 items-center gap-x-1 mt-1">
                        <div class="bg-red-200 rounded-md py-1 px-1 font-bold text-red-600 text-xs">5%</div>
                        <p class="text-gray-500 strike line-through">Rp260.0000</p>
                    </div>
                    <p class="px-4 mt-1">Tangerang</p>
                    <div class="flex items-center px-4 mt-1 gap-x-2">
                        <img src="../public/img/star.png" class="w-4 h-4">
                        <div class="flex items-center">
                            <p class="mr-2">4.9</p>
                            <div class="border-l border-gray-700 h-4"></div>
                        </div>
                        <p>Sold 250+</p>
                    </div>
                </div>
            </a>
            <a href="<?php echo SITEURL.'views/item.php';?>">
                <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                    data-aos="fade-up">
                    <img src="../public/img/Product/cerave21.png" class="min-w-full">
                    <p class="px-4 mt-2">Cerave Moisturizing Lotion</p>
                    <p class="mt-1 px-4 font-bold text-sm">Rp275.000</p>
                    <div class="flex px-4 py-1 items-center gap-x-1 mt-1">
                        <div class="bg-red-200 rounded-md py-1 px-1 font-bold text-red-600 text-xs">39%</div>
                        <p class="text-gray-500 strike line-through">Rp275.000</p>
                    </div>
                    <p class="px-4 mt-1">Tangerang</p>
                    <div class="flex items-center px-4 mt-1 gap-x-2">
                        <img src="../public/img/star.png" class="w-4 h-4">
                        <div class="flex items-center">
                            <p class="mr-2">4.6</p>
                            <div class="border-l border-gray-700 h-4"></div>
                        </div>
                        <p>Sold 100k+</p>
                    </div>
                </div>
            </a>
            <a href="<?php echo SITEURL.'views/item.php';?>">
                <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                    data-aos="fade-up">
                    <img src="../public/img/Product/axe.png" class="min-w-full">
                    <p class="px-4 mt-2">Axe Deodorant Body Spray Apollo 135ml</p>
                    <p class="mt-1 px-4 font-bold text-sm">Rp29.319</p>
                    <div class="flex px-4 py-1 items-center gap-x-1 mt-1">
                        <div class="bg-red-200 rounded-md py-1 px-1 font-bold text-red-600 text-xs">38%</div>
                        <p class="text-gray-500 strike line-through">Rp46.920</p>
                    </div>
                    <p class="px-4 mt-1">Tangerang</p>
                    <div class="flex items-center px-4 mt-1 gap-x-2">
                        <img src="../public/img/star.png" class="w-4 h-4">
                        <div class="flex items-center">
                            <p class="mr-2">5.0</p>
                            <div class="border-l border-gray-700 h-4"></div>
                        </div>
                        <p>Sold 1k+</p>
                    </div>
                </div>
            </a>
            <a href="<?php echo SITEURL.'views/item.php';?>">
                <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                    data-aos="fade-up">
                    <img src="../public/img/Product/Marks.png" class="min-w-full">
                    <p class="px-4 mt-2">Marks & Spencer - Deodorant - Vetiver Roll Deodorant 50ml</p>
                    <p class="mt-1 px-4 font-bold text-sm">Rp99.000</p>
                    <p class="px-4 mt-1">Tangerang</p>
                    <div class="flex items-center px-4 mt-1 gap-x-2">
                        <img src="../public/img/star.png" class="w-4 h-4">
                        <div class="flex items-center">
                            <p class="mr-2">5.0</p>
                            <div class="border-l border-gray-700 h-4"></div>
                        </div>
                        <p>Sold 2k+</p>
                    </div>
                </div>
            </a>
            <a href="<?php echo SITEURL.'views/item.php';?>">
                <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                    data-aos="fade-up">
                    <img src="../public/img/Product/roche7.png" class="min-w-full">
                    <p class="px-4 mt-2">La Roche Posay Anthelios UVMune 400 Invisible</p>
                    <p class="mt-1 px-4 font-bold text-sm">Rp401.800</p>
                    <div class="flex px-4 py-1 items-center gap-x-1 mt-1">
                        <div class="bg-red-200 rounded-md py-1 px-1 font-bold text-red-600 text-xs">2%</div>
                        <p class="text-gray-500 strike line-through">Rp410.000</p>
                    </div>
                    <p class="px-4 mt-1">Tangerang</p>
                    <div class="flex items-center px-4 mt-1 gap-x-2">
                        <img src="../public/img/star.png" class="w-4 h-4">
                        <div class="flex items-center">
                            <p class="mr-2">4.9</p>
                            <div class="border-l border-gray-700 h-4"></div>
                        </div>
                        <p>Sold 1k+</p>
                    </div>
                </div>
            </a>
            <a href="<?php echo SITEURL.'views/item.php';?>">
                <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                    data-aos="fade-up">
                    <img src="../public/img/Product/Vaseline.jpg" class="min-w-full">
                    <p class="px-4 mt-2">Vaseline Petroleum Jelly Origina 50ml</p>
                    <p class="mt-1 px-4 font-bold text-sm">Rp25.665</p>
                    <div class="flex px-4 py-1 items-center gap-x-1 mt-1">
                        <div class="bg-red-200 rounded-md py-1 px-1 font-bold text-red-600 text-xs">32%</div>
                        <p class="text-gray-500 strike line-through">Rp37.560</p>
                    </div>
                    <p class="px-4 mt-1">Tangerang</p>
                    <div class="flex items-center px-4 mt-1 gap-x-2">
                        <img src="../public/img/star.png" class="w-4 h-4">
                        <div class="flex items-center">
                            <p class="mr-2">5.0</p>
                            <div class="border-l border-gray-700 h-4"></div>
                        </div>
                        <p>Sold 8k+</p>
                    </div>
                </div>
            </a>
            <a href="<?php echo SITEURL.'views/item.php';?>">
                <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                    data-aos="fade-up">
                    <img src="../public/img/Product/gatsby.png" class="min-w-full">
                    <p class="px-4 mt-2">GATSBY Texturizing Clay Mat Lift</p>
                    <p class="mt-1 px-4 font-bold text-sm">Rp39.500</p>
                    <p class="px-4 mt-1">Tangerang</p>
                    <div class="flex items-center px-4 mt-1 gap-x-2">
                        <img src="../public/img/star.png" class="w-4 h-4">
                        <div class="flex items-center">
                            <p class="mr-2">4.9</p>
                            <div class="border-l border-gray-700 h-4"></div>
                        </div>
                        <p>Sold 3k+</p>
                    </div>
                </div>
            </a>
            <a href="<?php echo SITEURL.'views/item.php';?>">
                <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                    data-aos="fade-up">
                    <img src="../public/img/Product/rexona.jpg" class="min-w-full">
                    <p class="px-4 mt-2">Rexona Men Motion SEnse INVISIBLE DRY Deodorant</p>
                    <p class="mt-1 px-4 font-bold text-sm">Rp45.000</p>
                    <p class="px-4 mt-1">Tangerang</p>
                    <div class="flex items-center px-4 mt-1 gap-x-2">
                        <img src="../public/img/star.png" class="w-4 h-4">
                        <div class="flex items-center">
                            <p class="mr-2">5.0</p>
                            <div class="border-l border-gray-700 h-4"></div>
                        </div>
                        <p>Sold 1k+</p>
                    </div>
                </div>
            </a>
            <a href="<?php echo SITEURL.'views/item.php';?>">
                <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                    data-aos="fade-up">
                    <img src="../public/img/Product/scarlet.jpg" class="min-w-full">
                    <p class="px-4 mt-2">Scarlett Whitening Body Lotion Pemutih Badan Handal</p>
                    <p class="mt-1 px-4 font-bold text-sm">Rp59.000</p>
                    <div class="flex px-4 py-1 items-center gap-x-1 mt-1">
                        <div class="bg-red-200 rounded-md py-1 px-1 font-bold text-red-600 text-xs">9%</div>
                        <p class="text-gray-500 strike line-through">Rp65.000</p>
                    </div>
                    <p class="px-4 mt-1">Tangerang</p>
                    <div class="flex items-center px-4 mt-1 gap-x-2">
                        <img src="../public/img/star.png" class="w-4 h-4">
                        <div class="flex items-center">
                            <p class="mr-2">4.9</p>
                            <div class="border-l border-gray-700 h-4"></div>
                        </div>
                        <p>Sold 10k+</p>
                    </div>
                </div>
            </a>
            <a href="<?php echo SITEURL.'views/item.php';?>">
                <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
                    data-aos="fade-up">
                    <img src="../public/img/Product/Skintific3.jpg" class="min-w-full">
                    <p class="px-4 mt-2">SKINTIFIC Alaska Volcano Pore Detox Clay Mask</p>
                    <p class="mt-1 px-4 font-bold text-sm">Rp87.000</p>
                    <div class="flex px-4 py-1 items-center gap-x-1 mt-1">
                        <div class="bg-red-200 rounded-md py-1 px-1 font-bold text-red-600 text-xs">37%</div>
                        <p class="text-gray-500 strike line-through">Rp139.000</p>
                    </div>
                    <p class="px-4 mt-1">Tangerang</p>
                    <div class="flex items-center px-4 mt-1 gap-x-2">
                        <img src="../public/img/star.png" class="w-4 h-4">
                        <div class="flex items-center">
                            <p class="mr-2">5.0</p>
                            <div class="border-l border-gray-700 h-4"></div>
                        </div>
                        <p>Sold 1k+</p>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="flex justify-center mt-8">
            <button
                class="border-2 border-blue-600 text-blue-600 px-24 py-1 text-xl rounded-lg font-semibold hover:bg-blue-600 hover:text-white transition duration-250 ease-in"
                id="load-more">Load More
            </button>
        </div>
        
        <hr class="my-6 border-gray-300 sm:mx-auto lg:my-8" />
        
        <div class="px-4 md:px-8 lg:px-16 mt-8 text-sm">
            <p class="font-bold text-gray-700" data-aos="fade-up">Enjoy the Ease of Online Selling on Pepricorn.com</p>
            <p class="text-gray-400 mt-2" data-aos="fade-up">Pepricorn.com is an e-commerce platform in Indonesia that offers a
                variety of products and has become the preferred marketplace for many Indonesians. With Pepricorn, online
                shopping has become more comfortable, secure, and efficient. You can choose from various features and payment
                methods to ensure a smooth shopping experience. These options include bank transfers using accounts from various
                banks, electronic money like OVO, and installment payments. Pepricorn's shopping system is integrated with
                several shipping services, allowing them to offer free shipping and enabling buyers to track the status of their
                purchases. Whether you're buying skincare products, beauty accessories, makeup, bath and body essentials, hair
                care products, or even fragrance, you can track your order's whereabouts to ensure safe delivery. Pepricorn's
                privacy policy protects your personal data and all transactions, ensuring that your information remains secure
                and not misused. Because of these features, Pepricorn.com provides a safe and convenient solution for online
                shopping.</p>
        </div>
        <div class="px-4 md:px-8 lg:px-16 mt-8 text-sm">
            <p class="font-bold text-gray-700" data-aos="fade-up">Shop for Original Products with Ease & Secure</p>
            <p class="text-gray-400 mt-2" data-aos="fade-up">With a user-friendly interface and efficient search filters, you
                can easily find the products you need and make secure online purchases with a variety of payment options.
                Pepricorn.com is committed to providing a safe and hassle-free shopping experience for its customers. The
                platform is equipped with advanced security measures to protect your personal and financial information during
                transactions. Additionally, their customer service team is always ready to assist you with any concerns or
                issues you may have.</p>
        </div>
        <div class="px-4 md:px-8 lg:px-16 mt-8 text-sm">
            <p class="font-bold text-gray-700" data-aos="fade-up">Fast Delivery & Great Customer Service</p>
            <p class="text-gray-400 mt-2" data-aos="fade-up">One of the standout features of Pepricorn.com is their fast and
                reliable delivery service. With a wide network of shipping partners, they offer fast and efficient delivery
                options throughout Indonesia. You can track the progress of your order in real-time and rest assured that your
                purchases will be delivered to your doorstep safely and on time. In addition to their fast and reliable delivery
                service, Pepricorn.com also offers excellent customer support. If you have any questions or concerns about your
                order, you can easily reach out to their customer service team via phone or email. Their dedicated support team
                is available to assist you with any issues or inquiries you may have, ensuring a smooth and hassle-free shopping
                experience. With a commitment to quality, affordability, and customer satisfaction, Pepricorn.com is a trusted
                online retailer for original products in Indonesia. Shop with confidence knowing that you're getting authentic
                and high-quality products, backed by excellent customer support and a fast and reliable delivery service. Start
                browsing their website today to discover a wide range of products at affordable prices!</p>
        </div>
        
        <hr class="my-6 border-gray-300 sm:mx-auto lg:my-8" />
        
        <section class="bg-white">
            <div class="px-4 md:px-8 lg:px-16 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
                <h2 class="mb-8 text-2xl lg:text-4xl tracking-tight font-extrabold text-blue-600" data-aos="fade-up">Frequently Asked
                    Questions</h2>
                <div class="grid pt-8 text-left border-t border-gray-200 md:gap-16 md:grid-cols-2">
                    <div>
                        <div class="mb-10" data-aos="fade-up">
                            <h3 class="flex items-center mb-4 text-lg font-medium text-gray-700">
                                <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                What payment methods do you accept?
                            </h3>
                            <p class="text-gray-500">We accept a variety of payment methods for your convenience, including
                                credit/debit cards, PayPal, Apple Pay, and Google Pay. You can select your preferred payment
                                method during the checkout process. If you encounter any issues with payment, please contact our
                                customer support team for assistance.</p>
                        </div>
                        <div class="mb-10" data-aos="fade-up">
                            <h3 class="flex items-center mb-4 text-lg font-medium text-gray-700">
                                <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                How long will it take to receive my order?
                            </h3>
                            <p class="text-gray-500">Delivery times may vary depending on your location and the products you
                                ordered. You can check the estimated delivery time for your order during the checkout process.
                                Once your order has shipped, you will receive a tracking number via email or text message. You
                                can track your order's progress using the tracking number provided. If you have any questions
                                about your delivery, please contact our customer support team for assistance.</p>
                        </div>
                        <div class="mb-10" data-aos="fade-up">
                            <h3 class="flex items-center mb-4 text-lg font-medium text-gray-700">
                                <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Do you offer free shipping?
                            </h3>
                            <p class="text-gray-500">Yes, we offer free shipping on orders over a certain amount. The threshold
                                for free shipping may vary depending on your location. You can check the free shipping threshold
                                for your location on our website. If your order qualifies for free shipping, the option will be
                                available during the checkout process.</p>
                            <p class="text-gray-500">Feel free to <a href="#"
                                    class="font-medium underline text-primary-600 hover:no-underline" target="_blank"
                                    rel="noreferrer">contact us</a> and we'll help you out as soon as we can.</p>
                        </div>
                        <div class="mb-10" data-aos="fade-up">
                            <h3 class="flex items-center mb-4 text-lg font-medium text-gray-700">
                                <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Can I track my order?
                            </h3>
                            <p class="text-gray-500 ">Yes, you can track your order through the tracking information provided to
                                you via email or by logging into your account on our website. If you have any issues with
                                tracking your order, please contact our customer support team for assistance.</p>
                            <p class="text-gray-500">Find out more information by <a href="#"
                                    class="font-medium underline text-primary-600 hover:no-underline">order tracking</a>.</p>
                        </div>
                    </div>
                    <div>
                        <div class="mb-10" data-aos="fade-up">
                            <h3 class="flex items-center mb-4 text-lg font-medium text-gray-700">
                                <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                What is your return policy?
                            </h3>
                            <p class="text-gray-500">We offer a hassle-free return policy. If you're not satisfied with your
                                purchase, you can return it within a certain timeframe for a refund or exchange. Please refer to
                                our <a href="" class="font-medium underline text-primary-600 hover:no-underline">return
                                    policy</a> for more details.</p>
                        </div>
                        <div class="mb-10" data-aos="fade-up">
                            <h3 class="flex items-center mb-4 text-lg font-medium text-gray-700">
                                <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Do you offer international shipping?
                            </h3>
                            <p class="text-gray-500">Yes, we offer international shipping to select countries. You can check if
                                your country is eligible for international shipping during the checkout process. International
                                shipping rates and delivery times may vary depending on your location. If you have any questions
                                about international shipping, please contact our customer support team for assistance.</p>
                        </div>
                        <div class="mb-10" data-aos="fade-up">
                            <h3 class="flex items-center mb-4 text-lg font-medium text-gray-700 ">
                                <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500 " fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Can I cancel my order?
                            </h3>
                            <p class="text-gray-500 ">You may be able to cancel your order before it ships. Please refer to our
                                <a href="" class="font-medium underline text-primary-600 hover:no-underline">cancellation
                                    policy</a> for more details.</p>
                            <p class="text-gray-500 "> This is to ensure that the cancellation is properly processed and that
                                you receive the appropriate refund if applicable. If you need to cancel your order, we recommend
                                contacting our customer support team as soon as possible to minimize any delays or issues.</p>
                        </div>
                        <div class="mb-10" data-aos="fade-up">
                            <h3 class="flex items-center mb-4 text-lg font-medium text-gray-700 ">
                                <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                How can I contact customer support?
                            </h3>
                            <p class="text-gray-500">You can reach out to our customer support team by email or phone. Our
                                contact information is available on our website under the "Contact Us" section. You can also
                                submit a support ticket on our website, and our team will get back to you as soon as possible.
                                For urgent matters, we recommend calling our customer support team directly.</p>
                            <p class="text-gray-500">With that being said, feel free to use this website for your self care
                                needs.</p>
                            <p class="text-gray-500">Find out more information by <a href="#"
                                    class="font-medium underline text-primary-600 hover:no-underline">reading the license</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="../public/js/hero.js"></script>
    <?php include('partials/footer.php') ?>