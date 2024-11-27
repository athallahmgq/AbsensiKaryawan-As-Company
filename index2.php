<?php
session_start();

include "functions.php";

if (!isset($_SESSION['role_name']) && $_SESSION['role_name'] != 'karyawan') {
  header("Location: /auth/login.php");
}


$karyawan = query("SELECT jabatan.name AS jabatan_name, status1.name AS status1_name, karyawan.* FROM karyawan 
JOIN jabatan ON karyawan.jabatan_id = jabatan.id
JOIN status1 ON karyawan.status1_id = status1.id");

$status1 = query("SELECT * FROM status1");
$jabatan = query("SELECT * FROM jabatan");

$totalAbsensi = query("SELECT COUNT(*) as total FROM karyawan");

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- fav icon -->
  <link rel="shortcut icon" href="/assets/logo gue.png" />

  <!-- Title -->
  <title>A'S Company </title>

  <!-- Link -->
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="hello.css">

</head>

<body>

  <!-- navbar -->

  <?php
  if (isset($_POST["submit"])) {
    $result = tambah($_POST);

    // Ketika Berhasil

    if ($result > 0) {
      echo "<script>
        Swal.fire({
        title: 'Good job!',
        text: 'Berhasil Menambahkan Data!',
        icon: 'success',
          confirmButtonColor: '#3085d6',

        })
        .then((result) => {
        window.location.href = 'index2.php'
    })
        </script>";

      // Ketika NIK Sama

    } else if ($result == -1) {
      echo "<script>
        Swal.fire({
        title: 'Failed',
        text: 'ID Karyawan Sudah Ada !',
        icon: 'error'
    })
    .then((result) => {
        window.location.href = 'index2.php'
    })
        </script>";

      // Ketika Gagal

    } else {
      echo "<script>
        Swal.fire({
        title: 'Failed!',
        text: 'Gagal Menambahkan Data!',
        icon: 'error'
    })
    .then((result) => {
        window.location.href = 'index2.php'
    })
        </script>";
    }
  }
  ?>

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

  <div class="min-h-screen bg-gray-50/50">
    <aside class="bg-gradient-to-br from-gray-800 to-gray-900 -translate-x-80 fixed inset-0 z-50 my-4 ml-4 h-[calc(100vh-32px)] w-72 rounded-xl transition-transform duration-300 xl:translate-x-0">
      <div class="relative border-b border-white/20">
        <a class="  gap-4 py-6 px-8" href="#/">
          <img class=" ml-12 h-48" src="assets/logo gue.png" alt="">
          <h6 class="block text-center antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-white"> A'S COMPANY</h6>
        </a>
        <button class="middle none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-8 max-w-[32px] h-8 max-h-[32px] rounded-lg text-xs text-white hover:bg-white/10 active:bg-white/30 absolute right-0 top-0 grid rounded-br-none rounded-tl-none xl:hidden" type="button">
          <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" aria-hidden="true" class="h-5 w-5 text-white">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </span>
        </button>
      </div>
      <div class="m-4">
        <ul class="mb-4 flex flex-col gap-1">
          <li>
            <a aria-current="page" class="active" href="#">
              <button class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-md shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85] w-full flex items-center gap-4 px-4 capitalize" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-5 h-5 text-inherit">
                  <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z"></path>
                  <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z"></path>
                </svg>
                <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Dashboard</p>
              </button>
            </a>
          </li>
          <li>
            <a class="" href="profile.php">
              <button class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg text-white hover:bg-white/10 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-5 h-5 text-inherit">
                  <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd"></path>
                </svg>
                <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Profile</p>
              </button>
            </a>
          </li>
          <li>
            <a class="" href="#">
              <button class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg text-white hover:bg-white/10 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-5 h-5 text-inherit">
                  <path fill-rule="evenodd" d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z" clip-rule="evenodd"></path>
                </svg>
                <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Notification</p>
              </button>
            </a>
          </li>

        </ul>
        <ul class="mb-4 flex flex-col gap-1">
          <li class="mx-3.5 mt-4 mb-2">
            <p class="block antialiased font-sans text-sm leading-normal text-white font-black uppercase opacity-75">AUTH</p>
          </li>
          <li>
            <a class="" href="users.php">
              <button class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg text-white hover:bg-white/10 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-5 h-5 text-inherit">
                  <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"></path>
                </svg>
                <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">sign up</p>
              </button>
            </a>
          </li>
          <li>
            <a class="" href="auth.php?page=logout">
              <button class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg text-white hover:bg-white/10 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-5 h-5 text-inherit">
                  <path fill-rule="evenodd" d="M7.5 3.75A1.5 1.5 0 006 5.25v13.5a1.5 1.5 0 001.5 1.5h6a1.5 1.5 0 001.5-1.5V15a.75.75 0 011.5 0v3.75a3 3 0 01-3 3h-6a3 3 0 01-3-3V5.25a3 3 0 013-3h6a3 3 0 013 3V9A.75.75 0 0115 9V5.25a1.5 1.5 0 00-1.5-1.5h-6zm10.72 4.72a.75.75 0 011.06 0l3 3a.75.75 0 010 1.06l-3 3a.75.75 0 11-1.06-1.06l1.72-1.72H9a.75.75 0 010-1.5h10.94l-1.72-1.72a.75.75 0 010-1.06z" clip-rule="evenodd"></path>
                </svg>
                <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Logout</p>
              </button>
            </a>
          </li>
        </ul>
      </div>
    </aside>

    <div class="p-4 xl:ml-80">
      <nav class="block w-full max-w-full bg-transparent text-white shadow-none rounded-xl transition-all px-0 py-1">
        <div class="flex flex-col-reverse justify-between gap-6 md:flex-row md:items-center">
          <div class="capitalize">
            <nav aria-label="breadcrumb" class="w-max">
              <ol class="flex flex-wrap items-center w-full bg-opacity-60 rounded-md bg-transparent p-0 transition-all">
                <li class="flex items-center text-blue-gray-900 antialiased font-sans text-sm font-normal leading-normal cursor-pointer transition-colors duration-300 hover:text-light-blue-500">
                  <a href="#">
                    <p class="block antialiased font-sans text-sm leading-normal text-blue-900 font-normal opacity-50 transition-all hover:text-blue-500 hover:opacity-100">dashboard</p>
                  </a>
                  <span class="text-gray-500 text-sm antialiased font-sans font-normal leading-normal mx-2 pointer-events-none select-none">/</span>
                </li>
                <li class="flex items-center text-blue-900 antialiased font-sans text-sm font-normal leading-normal cursor-pointer transition-colors duration-300 hover:text-blue-500">
                  <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal">home</p>
                </li>
              </ol>
            </nav>
            <h6 class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-gray-900">home</h6>
          </div>
          <div class="flex items-center">
            <div class="mr-auto md:mr-4 md:w-56">
              <div class="relative w-full min-w-[200px] h-10">
                <input class="peer w-full h-full bg-transparent text-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-2.5 rounded-[7px] border-blue-gray-200 focus:border-blue-500" placeholder=" ">
                <label class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal peer-placeholder-shown:text-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[' '] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[' '] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[3.75] text-blue-gray-400 peer-focus:text-blue-500 before:border-blue-gray-200 peer-focus:before:border-blue-500 after:border-blue-gray-200 peer-focus:after:border-blue-500">Type here</label>
              </div>
            </div>

            <div class="max-w-screen-xl flex flex-wrap items-center justify-between p-4 xl:hidden">
              <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
              </button>
              <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                  <li>
                    <a href="index2.php" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:hidden lg:hidden xl:hidden md:dark:text-blue-500" aria-current="page">Dashboard</a>
                  </li>
                  <li>
                    <a href="profile.php" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:hidden lg:hidden xl:hidden md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Profile</a>
                  </li>
                  <li>
                    <a href="#" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:hidden lg:hidden xl:hidden md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Notification</a>
                  </li>
                </ul>
              </div>
            </div>

            <!-- Sign In Button -->

            <a href="#">
              <div>
                <img class="h-10 w-10" src="assets/foto pp.png" alt="">
              </div>
            </a>

          </div>
      </nav>

      <div class="mt-12">

        <div class="relative overflow-x-auto my-34">
          <h1 class="text-5xl text-blue-600 font-bold text-start mb-12 "><span class="bg-gradient-to-r from-blue-400 via-blue-700 to-blue-900 text-transparent bg-clip-text drop-shadow-md ">Silahkan Absen, <?php echo $_SESSION['name'] ?></span>👨‍💻</h1>
          <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4 m">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative pb-5">
              <div class="absolute pb-5 inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
              </div>
              <input type="text" id="table-search" class="block p-2 ps-10 text-sm text-white border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-[#151c2b] dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
            </div>
            <div>

              <!-- Modal toggle -->
              <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 -mt-3" type="button">
                Tambah Data Absen
              </button>

              <!-- Main modal -->
              <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                  <!-- Modal content -->
                  <div class="relative bg-white rounded-lg shadow dark:bg-[#151c2b]">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Tambah Data Absen Karyawan
                      </h3>
                      <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                      </button>
                    </div>
                    <!-- Modal body -->
                    <form enctype=multipart/form-data class="p-4 md:p-5 " action="" method="POST">
                      <div class="grid gap-4 mb-4 grid-cols-3">
                        <div class="col-span-1">
                          <label for="id_karyawan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID Karyawan</label>
                          <input type="text" name="id_karyawan" id="id_karyawan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tulis Yang Benar" required="">
                        </div>
                        <div class="col-span-1">
                          <label for="Nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                          <input type="text" name="name" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tulis Yang Benar" required="">
                        </div>

                        <div class="col-span-2 sm:col-span-1">
                          <label for="status1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                          <select name="status1" id="status1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected disabled>--Set Status--</option>
                            <?php foreach ($status1 as $status1) : ?>
                              <option value=<?= $status1["id"] ?>> <?= $status1["name"] ?> </option>
                            <?php endforeach ?>
                          </select>
                        </div>

                        <div class="col-span-2 sm:col-span-1">
                          <label for="jabatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                          <select name="jabatan" id="jabatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected disabled>--Jabatan--</option>
                            <?php foreach ($jabatan as $jabatan) : ?>
                              <option value=<?= $jabatan["id"] ?>> <?= $jabatan['name'] ?> </option>
                            <?php endforeach ?>
                          </select>
                        </div>

                        <div class="col-span-2">
                          <label for="foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto</label>
                          <input type="file" name="foto" accept="image/*" id="foto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-50" required>
                        </div>

                      </div>
                      <button name="submit" type="submit" class="text-white w-full justify-center inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Submit
                      </button>
                    </form>
                  </div>
                </div>
              </div>

            </div>



            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
              <thead class="text-xs text-gray-700 uppercase bg-[#151c2b]  dark:text-gray-400 ">
                <tr>
                  </th>
                  <th scope="col" class="px-6 py-3 rounded-tl-lg ">
                    ID KARYAWAN
                  </th>
                  <th scope="col" class="px-6 py-3">
                    NAMA
                  </th>
                  <th scope="col" class="px-6 py-3">
                    JAM MASUK
                  </th>
                  <th scope="col" class="px-6 py-3">
                    STATUS
                  </th>
                  <th scope="col" class="px-6 py-3">
                    JABATAN
                  </th>
                  <th scope="col" class="px-6 py-3">
                    FOTO
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($karyawan as $karyawan) : ?>
                  <tr class=" border-b bg-[#151c2b] dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap dark:text-white ">
                      Hanya Admin
                    </th>
                    <td class="px-6 py-4">
                      <?= $karyawan["name"] ?>
                    </td>
                    <td class="px-6 py-4">
                      <?= $karyawan["jam_masuk"] ?>
                    </td>
                    <td class="px-6 py-4">
                      <?= $karyawan["status1_name"] ?>
                    </td>
                    <td class="px-6 py-4">
                      <?= $karyawan["jabatan_name"] ?>
                    </td>
                    <td class="px-6 py-4">
                      <img class="w-1/2 text-center rounded" src="/img/<?= $karyawan["foto"] ?>" />

                    </td>
                  </tr>

                <?php endforeach ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>


      <div class="z-10 justify-between text-blue-gray-600  ">
        <footer class=" ">
          <div class="flex w-full flex-wrap items-center justify-center gap-6 px-2 md:justify-between">
            <p class="block antialiased font-sans text-sm leading-normal font-normal text-inherit">© 2024, Dibuat dengan <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="-mt-0.5 inline-block h-3.5 w-3.5">
                <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z"></path>
              </svg> oleh <a href="https://www.creative-tim.com" target="_blank" class="transition-colors hover:text-blue-500">Athallah</a> untuk project. </p>
            <ul class="flex items-center gap-4">
              <li>
                <a href="https://www.creative-tim.com" target="_blank" class="block antialiased font-sans text-sm leading-normal py-0.5 px-1 font-normal text-inherit transition-colors hover:text-blue-500">Project</a>
              </li>
              <li>
                <a href="https://www.creative-tim.com/presentation" target="_blank" class="block antialiased font-sans text-sm leading-normal py-0.5 px-1 font-normal text-inherit transition-colors hover:text-blue-500">Back</a>
              </li>
              <li>
                <a href="https://www.creative-tim.com/blog" target="_blank" class="block antialiased font-sans text-sm leading-normal py-0.5 px-1 font-normal text-inherit transition-colors hover:text-blue-500">End</a>
              </li>
              <li>
                <a href="https://www.creative-tim.com/license" target="_blank" class="block antialiased font-sans text-sm leading-normal py-0.5 px-1 font-normal text-inherit transition-colors hover:text-blue-500">Athallah</a>
              </li>
            </ul>
          </div>
        </footer>
      </div>
    </div>
  </div>

  <!-- Script -->
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>