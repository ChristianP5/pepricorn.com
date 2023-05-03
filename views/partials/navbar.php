<header class="fixed top-0 left-0 w-full bg-blue-600 lg:bg-white shadow-md" style="z-index: 2;" id="navbar">
    <div class="flex flex-col px-4 md:px-8 lg:px-16 py-4 lg:border-b lg:border-gray-300">
        <ul class="flex justify-between gap-x-8 text-gray-400 text-sm">
            <div class="hidden lg:flex gap-x-8">
                <li>
                    <a href="/contact" class="hover:text-blue-600 transition duration-250 ease-in"
                        id="contact-us">Contact us</a>
                </li>
                <li>
                    <a href="/about" class="hover:text-blue-600 transition duration-250 ease-in" id="about-us">About
                        us</a>
                </li>
                <li>
                    <a href="/faq" class="hover:text-blue-600 transition duration-250 ease-in" id="faq">FAQ</a>
                </li>
            </div>
            <div class="hidden lg:flex gap-x-8">
                <select name="" id="" class="focus:outline-none">
                    <option value="rupiah">Rp. IDR</option>
                    <option value="dollar">$ USD</option>
                </select>
                <div class="flex gap-x-1 items-center">
                    <img src="../public/img/indonesia.png" class="w-5 h-5 max-w-full max-h-full mr-2 cursor-pointer" />
                    <select name="" id="language-selector" class="focus:outline-none">
                        <option value="english">English</option>
                        <option value="indonesia">Indonesia</option>
                    </select>
                </div>
            </div>
        </ul>
        <nav class="container lg:mt-4">
            <ul class="grid grid-cols-12 lg:flex justify-between gap-x-8 items-center">
                <div class="col-span-7 lg:flex lg:gap-x-8 items-center">

                    <!-- Navbar Pepricorn Logo Start -->
                    <a href="<?php echo SITEURL;?>views/hero.php" class="hidden lg:block font-bold text-3xl" id="home">P<span class="text-blue-600">epricorn.com</span></a>
                    <!-- Navbar Pepricorn Logo End -->

                    <li>
                        <div class="flex lg:py-2 lg:px-3 rounded-lg bg-gray-100">
                            <div class="hidden lg:block relative w-32">
                                <select
                                    class="text-sm bg-white text-gray-700 rounded-lg border border-gray-200 font-medium py-2 px-8 hover:bg-blue-600 hover:text-white focus:border-none focus:outline-none appearance-none cursor-pointer transition duration-250 ease-in">
                                    <option id="nav-product">Products</option>
                                    <option>Services</option>
                                    <option>Event</option>
                                </select>
                            </div>
                            <img src="../public/img/search.png" class="w-3 h-3 mt-3 ml-2">
                            
                            <!-- SEARCH BAR START -->
                            <form action="<?php echo SITEURL;?>views/search.php" method="post">
                            <input
                                class="appearance-none text-sm w-full py-2 px-2 bg-gray-100 text-gray-700 placeholder-gray-500 rounded leading-tight border border-gray-100 focus:outline-none lg:focus:border lg:focus:border-blue-600"
                                name='search' type="search" placeholder="Search on Pepricorn . . ." id="nav-search" required/>
                            </form>
                            

                            <!-- SEARCH BAR END -->
                        </div>
                    </li>
                </div>
                <div class="col-span-5 items-center lg:hidden">
                    <div class="flex gap-x-4">
                        <img src="../public/img/email.png" class="w-5 h-5 max-w-full max-h-full">
                        <img src="../public/img/bell.png" class="w-5 h-5 max-w-full max-h-full">
                        <img onclick="toggleSlideover()" src="../public/img/shopping-cart (1).png" class="w-5 h-5 max-w-full max-h-full">
                        <img onclick="toggleSlideover2()" src="../public/img/hamburger.png" class="w-5 h-5 max-w-full max-h-full">
                    </div>
                </div>
                <!-- <div class="col-span-5 mt-2 flex items-center">
                    <img src="../public/img/location-pin (2).png" class="w-3 h-3" />
                    <select href="" class="bg-blue-600 text-white cursor-pointer">
                        <option value="" class="text-white">Send to Tangerang</option>
                    </select>
                </div> -->

                <!-- Slide Over 1 -->
                <div id="slideover-container" class="w-full h-full fixed inset-0 invisible">
                    <div id="slideover-bg"
                        class="w-full h-full duration-500 ease-out transition-all inset-0 absolute bg-gray-900 opacity-0"></div>
                    <div  id="slideover"
                        class="w-96 bg-white h-full absolute right-0 duration-300 ease-out transition-all translate-x-full">
                        <div class="flex h-full flex-col justify-between overflow-y-scroll">
                            <div class="px-5">
                                <div class="flex justify-between items-center mt-5">
                                    <p class="text-lg font-medium text-gray-900">Shoppping Cart</p>
                                    <div
                                        onclick="toggleSlideover()" class="cursor-pointer text-gray-600 top-0 w-8 h-8 flex items-center justify-center right-0">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="mt-8">
                                    <div class="flow-root">
                                        <ul role="list" class="-my-6 divide-y divide-gray-200">
                                            <li class="flex gap-x-4 py-6">
                                                <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                    <img src="https://tailwindui.com/../public/img/ecommerce-images/shopping-cart-page-04-product-01.jpg"
                                                        alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt."
                                                        class="h-full w-full object-cover object-center">
                                                </div>
                                
                                                <div class="flex flex-1 flex-col">
                                                    <div>
                                                        <div class="flex justify-between text-base font-medium text-gray-900">
                                                            <h3>
                                                                <a href="#">Throwback Hip Bag</a>
                                                            </h3>
                                                            <p class="mr-3">$90.00</p>
                                                        </div>
                                                        <p class="mt-1 text-sm text-gray-500">Salmon</p>
                                                    </div>
                                                    <div class="flex flex-1 items-end justify-between text-sm">
                                                        <p class="text-gray-500">Qty 1</p>
                                
                                                        <div class="flex">
                                                            <button type="button"
                                                                class="mr-3 font-medium text-blue-600 hover:text-blue-800">Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                
                                            <li class="flex py-6">
                                                <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                    <img src="https://tailwindui.com/../public/img/ecommerce-images/shopping-cart-page-04-product-02.jpg"
                                                        alt="Front of satchel with blue canvas body, black straps and handle, drawstring top, and front zipper pouch."
                                                        class="h-full w-full object-cover object-center">
                                                </div>
                                
                                                <div class="flex flex-1 flex-col">
                                                    <div>
                                                        <div class="flex justify-between text-base font-medium text-gray-900">
                                                            <h3>
                                                                <a href="#">Medium Stuff Satchel</a>
                                                            </h3>
                                                            <p class="mr-3">$32.00</p>
                                                        </div>
                                                        <p class="mt-1 text-sm text-gray-500">Blue</p>
                                                    </div>
                                                    <div class="flex flex-1 items-end justify-between text-sm">
                                                        <p class="text-gray-500">Qty 1</p>
                                
                                                        <div class="flex">
                                                            <button type="button"
                                                                class="mr-3 font-medium text-blue-600 hover:text-blue-800">Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="ml-92 border-t border-gray-200 px-5 py-6 sm:px-6">
                                <div class="flex justify-between text-base font-medium text-gray-900">
                                    <p>Subtotal</p>
                                    <p>$262.00</p>
                                </div>
                                <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                                <div class="mt-6">
                                    <a href="#"
                                        class="flex items-center justify-center rounded-md border border-transparent bg-blue-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-blue-800">Checkout</a>
                                </div>
                                <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                                    <p>
                                        or
                                        <button type="button" class="font-medium text-blue-600 hover:text-blue-800">
                                            Continue Shopping
                                            <span aria-hidden="true"> &rarr;</span>
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide Over 2 -->
                <div id="slideover-container2" class="w-full h-full fixed inset-0 invisible">
                    <div id="slideover-bg2"
                        class="w-full h-full duration-500 ease-out transition-all inset-0 absolute bg-gray-900 opacity-0"></div>
                    <div  id="slideover2"
                        class="w-full bg-white h-full absolute right-0 duration-300 ease-out transition-all translate-y-full">
                        <div class="flex h-full flex-col justify-between overflow-y-scroll">
                            <div class="px-5">
                                <div class="flex justify-between items-center mt-5">
                                    <p class="text-lg font-medium text-gray-900">Main Menu</p>
                                    <div
                                        onclick="toggleSlideover2()" class="cursor-pointer text-gray-600 top-0 w-8 h-8 flex items-center justify-center right-0">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </div>
                                </div>
                                
                                <div class="mt-8">
                                    <div class="flow-root grid grid-cols-2 gap-x-2">
                                        <a href="<?php echo SITEURL;?>views/sign-in.php">
                                            <li>
                                                <button
                                                    class="text-blue-600 w-full border-2 border-blue-600 px-4 py-2 rounded-lg hover:bg-blue-600 hover:text-white transition duration-250 ease-in font-bold"
                                                    id="sign-in">Sign in</button>
                                            </li>
                                        </a>
                                        <a href="<?php echo SITEURL;?>views/sign-up2.php">
                                            <li>
                                                <button
                                                    class="text-white w-full border-2 border-blue-600 px-4 py-2 rounded-lg bg-blue-600 transition duration-250 ease-in font-bold hover:bg-blue-800"
                                                    id="sign-up">Sign up</button>
                                            </li>
                                        </a>
                                    </div>
                                </div>

                                <div class="mt-8 flex items-center justify-between">
                                    <p class="text-lg font-semibold text-gray 700">Transaction History</p>
                                    <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>

                                <div class="mt-2 flex items-center justify-between w-full border border-gray-300 rounded-lg py-2 px-4">
                                    <img src="../public/img/transactions.svg" alt="" srcset="">
                                    <p>Status belanjaanmu nanti bisa dicek di sini, <br> lho!</p>
                                </div>

                                <div class="mt-4 w-full border-b border-gray-300"></div>

                                <div class="mt-4 flex items-center justify-between">
                                    <p class="text-lg font-semibold text-gray 700">Followed Shop</p>
                                    <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>

                                <div class="mt-2 flex items-center justify-between w-full border border-gray-300 rounded-lg py-2 px-4">
                                    <img src="../public/img/shop-follow.svg" alt="" srcset="">
                                    <p>Status belanjaanmu nanti bisa dicek di sini, <br> lho!</p>
                                </div>

                                <div class="mt-4 w-full border-b border-gray-300"></div>

                                <p class="mt-4 text-lg font-semibold text-gray 700">Your Activity</p>
                                <div class="mt-4 flex items-center gap-x-2 w-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                                        class="w-5 h-5 max-w-full max-h-full mr-2 cursor-pointer  hover:fill-current text-red-600 transition duration-250 ease-in">
                                        <path
                                            d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                    </svg>
                                    <p>Wishlist</p>
                                </div>
                                <div class="mt-4 flex items-center gap-x-2 w-full">
                                    <img src="../public/img/star3.png" class="w-5 h-5 mr-2 cursor-pointer">
                                    <p>Rating</p>
                                </div>
                                <div class="mt-4 w-full border-b border-gray-300"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden lg:flex gap-x-4 lg:gap-x-12 items-center">
                    <li class="flex items-center">
                        <img src="../public/img/price-tag.png" class="w-5 h-5 max-w-full max-h-full mr-2" />
                        <a href="" class="hover:text-blue-600 transition duration-250 ease-in" id="best-offers">Best offers</a>
                    </li>
                    <li>
                        <a href="" class="hover:text-blue-600 transition duration-250 ease-in"
                            id="discover">Discover</a>
                    </li>
                </div>
                <div class="hidden lg:flex gap-x-4">
                    <a href="<?php echo SITEURL;?>views/sign-in.php">
                        <li>
                            <button
                                class="text-blue-600 border-2 border-blue-600 px-4 py-1 rounded-lg hover:bg-blue-600 hover:text-white transition duration-250 ease-in font-bold"
                                id="sign-in">Sign in</button>
                        </li>
                    </a>
                    <a href="<?php echo SITEURL;?>views/sign-up2.php">
                    <li>
                        <button
                            class="text-white border-2 border-blue-600 px-4 py-1 rounded-lg bg-blue-600 transition duration-250 ease-in font-bold hover:bg-blue-800"
                            id="sign-up">Sign up</button>
                    </li>
                    </a>
                </div>
            </ul>
        </nav>
    </div>

    <div class="hidden lg:flex justify-between items-center px-16 py-4">
        <div class="flex items-center cursor-pointer">
            <div class="flex items-center justify-center">
                <button id="dropdownDefault"
                    class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-xs px-4 py-2.5 text-center inline-flex items-center transition duration-250 ease-in"
                    type="button">
                    Filter by category
                    <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdown"
                    class="absolute mt-32 z-10 hidden w-56 p-3 bg-white border-2 border-gray-200 rounded-lg shadow-md">
                    <h6 class="mb-3 text-sm font-medium text-gray-900">
                        Category
                    </h6>
                    <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
                        <!-- Category Option -->
                        <?php
                        $sql = "SELECT title FROM tbl_category WHERE active='Yes'"; 

                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);

                        if($count > 0){
                            while($rows = mysqli_fetch_assoc($res)){
                                $title = $rows['title'];
                                ?>
                                <li class="flex items-center">
                                    <input id="" type="checkbox" value=""
                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500" />

                                    <label for="apple" class="ml-2 text-sm font-medium text-gray-900">
                                        <?php echo $title;?>
                                    </label>
                                </li>
                                <?php
                            }
                        }
                        ?>
                        

                    </ul>
                </div>
            </div>
        </div>

        <div class="flex gap-x-16">
            <a class="hover:text-blue-600 transition duration-250 ease-in cursor-pointer" id="bestproducts">Best
                products</a>
            <a href="" class="hover:text-blue-600 transition duration-250 ease-in">Eshop plus</a>
            <a href="" class="hover:text-blue-600 transition duration-250 ease-in">Customer Service</a>
            <a href="" class="hover:text-blue-600 transition duration-250 ease-in">Best sellers</a>
        </div>
        <div class="flex items-center">
            <img src="../public/img/location-pin.png" class="w-5 h-5 max-w-full max-h-full mr-2" />
            <select href="" class="hover:text-blue-600 transition duration-250 ease-in cursor-pointer">
                <option value="">Indonesia, Tangerang</option>
            </select>
        </div>
    </div>
</header>

<hr />

<script src="../public/js/navbar.js"></script>