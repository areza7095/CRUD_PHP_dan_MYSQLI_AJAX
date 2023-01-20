<?php
include "../koneksi.php";

$userid = 0;
if (isset($_POST['userid'])) {
    $id_siswa = mysqli_real_escape_string($connection, $_POST['userid']);
}
$sql = "select * from tbl_siswa where id_siswa=" . $id_siswa;
$result = mysqli_query($connection, $sql);

$response = "<form action=./module/crud/saveEdit.php method=POST>";
while ($row = mysqli_fetch_array($result)) {
    $id_siswa = $row['id_siswa'];
    $nisn = $row['nisn'];
    $nama_lengkap = $row['nama_lengkap'];
    $alamat = $row['alamat'];

    // $response .= "<tr>";
    // $response .= "<td>Name : </td><td>" . $id_siswa . "</td>";
    // $response .= "</tr>";

    // $response .= "<tr>";
    // $response .= "<td>NISN : </td><td>" . $nisn . "</td>";
    // $response .= "</tr>";

    // $response .= "<tr>";
    // $response .= "<td>Nama Lengkap : </td><td>" . $nama_lengkap . "</td>";
    // $response .= "</tr>";

    // $response .= "<tr>";
    // $response .= "<td>Alamat : </td><td>" . $alamat . "</td>";
    // $response .= "</tr>";


    $response .=                         "<div class=form-group>";
    $response .=                            "<label>NISN</label>";
    $response .=                            "<input type=text name=nisn value='$row[nisn]' placeholder='Masukkan NISN Siswa' class=form-control>";
    $response .=                             "<input type=hidden name=id_siswa value='$row[id_siswa]'>";
    $response .=                      " </div>";

    $response .=                      "<div class=form-group>";
    $response .=                          " <label>Nama Lengkap</label>";
    $response .=                           " <input type=text name=nama_lengkap value='$row[nama_lengkap]' placeholder='Masukkan Nama Siswa' class=form-control>";
    $response .=                        "</div>";

    $response .=                        "<div class=form-group>";
    $response .=                           " <label>Alamat</label>";
    $response .=                            "<textarea class=form-control name=alamat placeholder='Masukkan Alamat Siswa' rows=4>$row[alamat]</textarea>";
    $response .=                       "</div>";


    $response .=                        "<button type=submit class=btn btn-success name=upload>UPDATE</button>";
    $response .=                       "<button type=reset class=btn btn-warning>RESET</button>";
}
$response .= "</form>";

echo $response;


exit;
