<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: /auth/login.php');
}

include_once('functions.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- fav icon -->
  <link rel="shortcut icon" href="/assets/logo gue.png" />

  <!-- Title -->
  <title>A'S Company | Login</title>

  <!-- Link -->
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="hello.css">

</head>
<body>

  <!-- hello -->

  <div class="span-hello-container">
          <span class="span-hello"></span>
        </div>
      </div>

<script>
    const hello_arr = ["A'S Company"];

window.onload = function () {
    const spanHelloContainer = document.querySelector(".span-hello-container");
    const spanHello = document.querySelector(".span-hello");

    let currentIndex = 0;

    function displayNextHello() {
        if (currentIndex < hello_arr.length) {
            spanHello.textContent = hello_arr[currentIndex];
            currentIndex++;
            setTimeout(displayNextHello, 1000);
        } else {
            spanHelloContainer.classList.add("translate-animation");
        }
    }

    displayNextHello();
};

</script>
   
<div class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
    <div class="max-w-screen-xl m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1">
        <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
            <div>
                <img src="/assets/logo gue.png" class=" w-40 mx-auto">
            </div>
            <div class="mt-12 flex flex-col items-center ">
                <h1 class="text-3xl xl:text-3xl font-extrabold">
                    Tambah Akun
                </h1>
                <div class="w-full flex-1 mt-8">
                    

                    <div class="mx-auto max-w-xs">
                        <form action="" method="POST">

                        <input
                            class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white "
                            type="text" name="nama" placeholder="Nama" />

                        <input
                            class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                            type="text" name="username" placeholder="Username" />

                        <input
                            class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                            type="password" name="password" placeholder="Password" />
                        <button
                             name="submit" class="mt-5 tracking-wide font-semibold bg-gradient-to-tr from-blue-600 to-blue-400 shadow-md shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 text-gray-100 w-full py-4 rounded-lg hover:bg-blue-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                            <svg class="w-6 h-6 -ml-2" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                <circle cx="8.5" cy="7" r="4" />
                                <path d="M20 8v6M23 11h-6" />
                            </svg>
                            <span class="ml-3">
                                Tambah
                            </span>


                        </button>

                    </form>
                        <p class="mt-6 text-xs text-gray-600 text-center">
                            I agree to abide by A'S Company
                            <a href="#" class="border-b border-gray-500 border-dotted">
                                Terms of Service
                            </a>
                            and its
                            <a href="#" class="border-b border-gray-500 border-dotted">
                                Privacy Policy
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-1 bg-indigo-100 text-center hidden lg:flex">
            <div class=" rounded-lg  w-full bg-cover bg-center bg-no-repeat"
                style="background-image: url('https://wallpapers.com/images/hd/cool-javascript-code-8tctio4amzli9c5m.jpg');">
            </div>
        </div>
    </div>
</div>

 
</body>

<?php
if (isset ($_POST['submit'])){
    $hasil=tambahAkun($_POST);
    if ($hasil > 0) {
        echo "<script>
        Swal.fire({
        title: 'Good job!',
        text: 'Akun Berhasil Di Tambahkan!',
        icon: 'success',
          confirmButtonColor: '#3085d6',

        })
        .then((result) => {
        window.location.href = 'index2.php'
    })
        </script>";;
    }
}

?>

</html>