<?php

include('../koneksi.php');

//get id
if (isset($_POST['userid'])) {
    $id_siswa = mysqli_real_escape_string($connection, $_POST['userid']);
}


$query = "DELETE FROM tbl_siswa WHERE id_siswa = $id_siswa";
mysqli_query($connection, $query);
echo "success";


?>