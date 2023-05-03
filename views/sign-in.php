<?php include('partials/head.php');?><body class="bg-gray-50 overflow-hidden">
    <section class="bg-whtie" data-aos="fade-up">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="../views/hero.php" class="flex items-center mb-6 text-2xl text-blue-600 font-bold">
                <span class="text-gray-700">P</span>epricorn.com
            </a>
            <div class="w-full bg-white rounded-lg shadow-xl border-2 border-gray-200 md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-700 md:text-2xl">
                        Sign in to your account
                    </h1>
                    <br>
                    <?php
                    if(isset($_SESSION['incorrect-credentials'])){
                        echo $_SESSION['incorrect-credentials'];
                        unset($_SESSION['incorrect-credentials']);
                    }
                    ?>
                    <form class="space-y-4 md:space-y-6" action="" method="POST">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Your email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-700 sm:text-sm rounded-lg focus:outline-none focus:border focus:border-blue-600 block w-full p-2.5"
                                placeholder="name@company.com" required="" />
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-700 sm:text-sm rounded-lg focus:outline-none focus:border focus:border-blue-600 block w-full p-2.5"
                                required="" />
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                                        required="" />
                                </div>
                                <div class="ml-3 text-sm mb-8">
                                    <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                                </div>
                            </div>
                            <a href="#"
                                class="text-sm font-medium text-blue-600 hover:underline dark:text-primary-500 mb-8">Forgot
                                password?</a>
                        </div>
                        <input type="submit" value="Sign In" name="submit" class="block text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 transition duration-250 ease-in text-center">
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Don’t have an account yet?
                            <a href="../views/sign-up2.php" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign
                                up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    </body>
</html>

<?php
if(isset($_POST['submit'])){
    
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM tbl_user WHERE email = '$email' AND password = '$password'";
    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);
    if($count==1){
        //Correct Credentials
        $rows = mysqli_fetch_assoc($res);

        $id = $rows['id'];
        $_SESSION['logged-in-user-id'] = $id;

        //Redirect
        if(headers_sent()){
            echo '<script type="text/javascript">window.location.href="hero.php";</script>';
        }else{
            header("location:../views/hero.php");
        }
    }else{
        //Incorrect Credentials
        $_SESSION['incorrect-credentials'] = "<div class='fail'>Incorrect username/password. Try again</div>";
    }
    

    
    
}
?>