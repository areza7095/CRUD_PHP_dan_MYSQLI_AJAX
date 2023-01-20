<?php

include('../koneksi.php');

$nisn           = $_POST['nisn'];
$nama_lengkap = $_POST['nama_lengkap'];
$alamat       = $_POST['alamat'];
$filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
$folder = "../assets/images_upload/" . $filename;

//query insert data ke dalam database
$query = "INSERT INTO tbl_siswa (nisn, nama_lengkap, alamat, namafile) VALUES ('$nisn', '$nama_lengkap', '$alamat', '$filename')";

// Now let's move the uploaded image into the folder: image
if (move_uploaded_file($tempname, $folder)) {
    echo "<h3> Image uploaded successfully!</h3>";
} else {
    echo "<h3> Failed to upload image!</h3>";
}
mysqli_query($connection, $query);
header("Location: http://localhost/CRUD_PHP_dan_MYSQLI_AJAX/");



if($connection->query($query)) {
    
    echo "success";

} else {
    
    echo "error";

}