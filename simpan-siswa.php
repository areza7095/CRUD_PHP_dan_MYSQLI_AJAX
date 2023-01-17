<?php

//include koneksi database
include('koneksi.php');





    //get data dari form
    $nisn           = $_POST['nisn'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $alamat       = $_POST['alamat'];
    // $filename = $_FILES["uploadfile"]["name"];
    // $tempname = $_FILES["uploadfile"]["tmp_name"];
    // $folder = "./image/" . $filename;

    $db = mysqli_connect("localhost", "root", "", "db_sekolah");

    // Get all the submitted data from the form
    $sql = "INSERT INTO tbl_siswa (nisn, nama_lengkap, alamat) VALUES ('$nisn', '$nama_lengkap', '$alamat')";

    // Execute query
    mysqli_query($db, $sql);
    echo 'success';

    // Now let's move the uploaded image into the folder: image
    // if (move_uploaded_file($tempname, $folder)) {
    //     echo "<h3> Image uploaded successfully!</h3>";
    //     header("location: index.php");
    // } else {
    //     echo "<h3> Failed to upload image!</h3>";
    // }

