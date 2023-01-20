<?php
// include "../koneksi.php";

// $userid = 0;
// if (isset($_POST['userid'])) {
//     $id_siswa = mysqli_real_escape_string($connection, $_POST['userid']);
// }
// $sql = "select * from tbl_siswa where id_siswa=" . $id_siswa;
// $result = mysqli_query($connection, $sql);

$response = "<form action=./module/crud/saveAdd.php method=POST enctype='multipart/form-data'>";

$response .=                         "<div class=form-group>";
$response .=                            "<label>NISN</label>";
$response .=                            "<input type=text name=nisn  placeholder='Masukkan NISN Siswa' class=form-control>";
$response .=                             "<input type=hidden name=id_siswa ";
$response .=                      " </div>";

$response .=                      "<div class=form-group>";
$response .=                          " <label>Nama Lengkap</label>";
$response .=                           " <input type=text name=nama_lengkap  placeholder='Masukkan Nama Siswa' class=form-control>";
$response .=                        "</div>";

$response .=                        "<div class=form-group>";
$response .=                           " <label>Alamat</label>";
$response .=                            "<textarea class=form-control name=alamat placeholder='Masukkan Alamat' Siswa rows=4> </textarea>";
$response .=                       "</div>";

$response .=                        "<div class=form-group>";
$response .=                           " <label>Foto</label>";
$response .=                            "<input class='form-control' type='file' name='uploadfile' value='' />";
$response .=                       "</div>";


$response .=                        "<button type=submit class=btn btn-success name=upload>SIMPAN</button>";
$response .=                       "<button type=reset class=btn btn-warning>RESET</button>";

$response .= "</form>";

echo $response;


exit;
