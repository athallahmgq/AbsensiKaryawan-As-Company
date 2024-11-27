<?php
$hostname = "127.0.0.1";
$username = "root";
$password = "";
$database = "absen";

$connection = mysqli_connect("$hostname", "$username", "$password", "$database");

function query($query)
{
    global $connection;
    $result = mysqli_query($connection, $query);
    $rows = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
    }

    return $rows;
}

function tambah($data)
{

    global $connection;

    $id_karyawan = htmlspecialchars($data["id_karyawan"]);
    $name = htmlspecialchars($data["name"]);
    $status1 = htmlspecialchars($data["status1"]);
    $jabatan = htmlspecialchars($data["jabatan"]);

    $checkIDKARYAWAN = query("SELECT * FROM karyawan WHERE id_karyawan=$id_karyawan");
    if (count($checkIDKARYAWAN) > 0) {
        return -1;
    }

    //upload gambar
    $image = upload();
    if (!$image) {
        return false;
    }

    $query = "INSERT 
    INTO karyawan (id_karyawan, name, status1_id, jabatan_id, foto) VALUES('$id_karyawan', '$name',  '$status1', '$jabatan', '$image')";

    $insert = mysqli_query($connection, $query);
    $result = mysqli_affected_rows(($connection));

    return $result;
}

function upload()
{
 
    $originalName = $_FILES['foto']['name'];
    $filesize = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    if (
        $error === 4
    ) {
        echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
        return false;
    }

    $validExtension = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $originalName);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $validExtension)) {
        echo "<script>
				alert('File bukan gambar');
			  </script>";
        return false;
    }

    if ($filesize > 1000000) {
        echo "<script>
				alert('Ukuran gambar terlalu besar!');
			  </script>";
        return false;
    }

    $imgFolder = $_SERVER['DOCUMENT_ROOT'].'/img/';
    

    if (!is_dir($imgFolder)) {
        mkdir($imgFolder, 0755, true);
    }
    $newFilename = uniqid() . '.' . $ekstensiGambar;
    move_uploaded_file($tmpName, $imgFolder . $newFilename);


    return $newFilename;
}


function tambahAkun($data)
{

    global $connection;

    $name = htmlspecialchars($data["nama"]);
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $password = password_hash($password, PASSWORD_DEFAULT);
   
    

    $query = "INSERT 
    INTO users (username, name, password, role_id) VALUES('$username', '$name',  '$password', '2')";

    $insert = mysqli_query($connection, $query);
    $result = mysqli_affected_rows(($connection));

    return $result;
}