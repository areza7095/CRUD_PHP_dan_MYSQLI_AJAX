<?php

session_start();

if (!$_SESSION['id_user']) {
  header("location: ./module/login/login.php");
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">


  <title>Dashboard</title>
</head>

<body>
  <div class="container">
    <!-- Modal -->
    <div class="modal fade" id="edit-modal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Siswa</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body edit-modal-body">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!--  -->
    <div class="container" style="margin-top: 50px">
      <div class="row">

        <div class="col-md-3">
          <ul class="list-group">
            <li class="list-group-item active">MAIN MENU</li>
            <a href="dashboard.php" class="list-group-item" style="color: #212529;">Dashboard</a>
            <li class="list-group-item">Profile</li>
            <a href="./module/login//logout.php" class="list-group-item" style="color: #212529;">Logout</a>
          </ul>
        </div>

        <div class="col-md-9">
          <div class="card">
            <div class="card-body">
              <label>DASBOARD</label>
              <hr>

              Selamat Datang <?php echo $_SESSION['nama_lengkap'] ?>
              <div class="container" style="margin-top: 80px">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        DATA SISWA
                      </div>
                      <div class="card-body">
                        <button class="btn btn-md btn-success addSiswa" style="margin-bottom: 10px">TAMBAH DATA</button>
                        <table class="table table-bordered" id="myTable">
                          <thead>
                            <tr>
                              <th scope="col">NO.</th>
                              <th scope="col">NISN</th>
                              <th scope="col">NAMA LENGKAP</th>
                              <th scope="col">ALAMAT</th>
                              <th scope="col">FOTO</th>
                              <!-- <th scope="col">FOTO</th> -->
                              <th scope="col">AKSI</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            include('./module/koneksi.php');
                            $no = 1;
                            $query = mysqli_query($connection, "SELECT * FROM tbl_siswa");
                            while ($row = mysqli_fetch_array($query)) {
                              $id_siswa = $row['id_siswa'];
                              $nisn = $row['nisn'];
                              $nama_lengkap = $row['nama_lengkap'];
                              $alamat = $row['alamat'];
                              $namafile = $row['namafile'];

                              echo "<tr>";
                              echo "<td>" . $no++ . "</td>";
                              echo "<td>" . $nisn . "</td>";
                              echo "<td>" . $nama_lengkap . "</td>";
                              echo "<td>" . $alamat . "</td>";
                              echo "<td>
                              <img style='width: 80px; margin-left: 40px' src='../assets/images_upload . $namafile; ?>'>
                            </td>";
                              echo "<td>
                        <button data-id='" . $id_siswa . "' class='editSiswa btn btn-sm btn-primary'>EDIT</button>
                        <button data-id='" . $id_siswa . "' class='btn btn-sm btn-danger btnDelete'>HAPUS</button>
                        </td>";
                              echo "</tr>";
                            }
                            ?>
                            <!-- while ($row = mysqli_fetch_array($query)) {
                      ?>

                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $row['nisn'] ?></td>
                          <td><?php echo $row['nama_lengkap'] ?></td>
                          <td><?php echo $row['alamat'] ?></td> -->
                            <!-- <td>
                      <img style="width: 80px; margin-left: 40px" src="./image/<?php echo $row['namafile']; ?>">

                    </td> -->
                            <!-- <td class="text-center">
                            <a href="edit-siswa.php?id=<?php echo $row['id_siswa'] ?>" class="btn btn-sm btn-primary">EDIT</a>
                            <a href="hapus-siswa.php?id=<?php echo $row['id_siswa'] ?>" class="btn btn-sm btn-danger">HAPUS</a>
                          </td>
                        </tr> -->

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>


      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>


    <script>
      $(document).ready(function() {

        $('.editSiswa').click(function() {

          var userid = $(this).data('id');

          // AJAX request
          $.ajax({
            url: './module/crud/showEdit.php',
            type: 'post',
            data: {
              userid: userid
            },
            success: function(response) {
              // Add response in Modal body
              $('.edit-modal-body').html(response);

              // Display Modal
              $('#edit-modal').modal('show');
            }
          });
        });

        $('.addSiswa').click(function() {

          // AJAX request
          $.ajax({
            url: './module/crud/showAdd.php',
            type: 'post',
            success: function(response) {
              // Add response in Modal body
              $('.edit-modal-body').html(response);

              // Display Modal
              $('#edit-modal').modal('show');
            }
          });
        });

        $(".btnDelete").click(function() {
          var userid = $(this).data('id');

          $.ajax({

            url: "./module/crud/deleteSiswa.php",
            type: "POST",
            data: {
              userid: userid,
            },

            success: function(response) {

              if (response == "success") {

                Swal.fire({
                  type: 'success',
                  title: 'Hapus Berhasil !',

                })

              } else {

                Swal.fire({
                  type: 'error',
                  title: 'Hapus Gagal!',
                  text: 'silahkan coba lagi!'
                });

              }

              console.log(response);

            },

            error: function(response) {

              Swal.fire({
                type: 'error',
                title: 'Opps!',
                text: 'server error!'
              });

              console.log(response);

            }

          });
        });
      });
    </script>
</body>

</html>