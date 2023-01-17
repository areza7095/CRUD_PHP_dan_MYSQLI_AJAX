<?php

include('../koneksi.php');

$nisn           = $_POST['nisn'];
$nama_lengkap = $_POST['nama_lengkap'];
$alamat       = $_POST['alamat'];

//query insert data ke dalam database
$query = "INSERT INTO tbl_siswa (nisn, nama_lengkap, alamat ) VALUES ('$nisn', '$nama_lengkap', '$alamat')";
mysqli_query($connection, $query);
header("Location: ../dashboard.php");



// if($connection->query($query)) {
    
//     echo "success";

// } else {
    
//     echo "error";

// }