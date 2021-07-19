<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets\bootstrap-4.0.0\dist\css\bootstrap.min.css">
  <script src="assets/js/jquery.js"></script>
  <script src="assets/datepicker/js/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" href="assets/datepicker/css/datepicker.css">

  <title>KEHADIRAN VAKSINASI</title>
</head>

<body>
  <?php
    session_start();

    if(!isset($_SESSION['nama'])){
      header("location:index.php?alert=invalid");
    }else{
      echo "<script>alert('Anda Berhasil login, selamat datang')</script>";
    }
    
    if(isset($_GET['alert'])){
      if($_GET['alert']=='hadir'){
        echo "<script>alert('Peserta telah hadir untuk vaksinasi dosis 1')</script>";
      }
      if($_GET['alert']=='hadir2'){
        echo "<script>alert('Peserta telah hadir untuk vaksinasi dosis 2')</script>";
      }
      if($_GET['alert']=='salah'){
        echo "<script>alert('Peserta tidak memiliki jadwal vaksinasi hari ini')</script>";
      }
      if($_GET['alert']=='satu'){
        echo "<script>alert('Peserta sudah mendapatkan vaksinasi dosis pertama')</script>";
      }   
      if($_GET['alert']=='dua'){
        echo "<script>alert('Peserta sudah mendapatkan vaksinasi dosis kedua')</script>";
      }         
    }
  ?>
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #654321; padding: 0px">
    <a href="index.php"><img src="img/banner.png" style="width = 130px; height: 110px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ml-2">
          <a class="nav-link active text-white" href="presensi.php">Kehadiran Peserta Vaksinasi</a>
        </li>
        <li class="nav-item ml-2">
          <a class="nav-link active text-white" href="peserta.php">Antrean Peserta Vaksinasi</a>
        </li>
      </ul>
      <a href="logout.php" class="btn btn-danger" style="margin-right: 20px">Logout</a>
    </div>
  </nav>
  <div class="card mt-3" style="margin-right: 5%; margin-left: 5%;">
    <div class="card-header bg-primary text-white ">
      Peserta Vaksinasi
    </div>
    <div class="card-body">
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group">
          <label for="tgl">Pilih Tanggal Vaksinasi</label>
          <input type="text" name="tgl" class="form-control datepicker"
            placeholder="  Isikan Tanggal Vaksinasi: YYYY-MM-DD">
          <br>
          <select name="sesi" class="custom-select my-1 mr-sm-2" id="sesi">
            <option value = "" selected>Pilih Sesi</option>
            <option value="1">Sesi 1</option>
            <option value="2">Sesi 2</option>
            <option value="3">Sesi 3</option>
          </select>
          <button type="submit" class="btn btn-success btn-xl btn-block btn-submit-vaksin mt-3">
            Lihat
          </button>
        </div>
    </div>
    </form>
    <table class="table table-borderd table-hovered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>NIK</th>
          <th width="15%">Nama</th>
          <th width="20%">Alamat</th>
          <th>Vaksinasi pertama</th>
          <th>Vaksinasi kedua</th>
          <th>Sesi</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <?php 
            include 'koneksi.php';
            if(isset($_POST['tgl'])){
              $d1 = $_POST['tgl'];
            }else{
              $d1 = date('Y-m-d');
            }
				    $batas = 10;
				    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
				    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
 
    				$previous = $halaman - 1;
		    		$next = $halaman + 1;
            if(!empty($_POST['sesi'])){
              $sesi = $_POST['sesi'];
              if(!empty($_POST['tgl'])){
                $data = mysqli_query($koneksi,"SELECT * FROM PESERTA where TGL = '$d1' or TGL2 = '$d1' and ID_SESI = '$sesi'");  
              }else{
                $data = mysqli_query($koneksi,"SELECT * FROM PESERTA where ID_SESI = '$sesi'"); 
              }
            }else{
              $data = mysqli_query($koneksi,"SELECT * FROM PESERTA where TGL = '$d1' or TGL2 = '$d1'");
            }
    				$jumlah_data = mysqli_num_rows($data);
		    		$total_halaman = ceil($jumlah_data / $batas);
            if(!empty($_POST['sesi'])){
              $sesi = $_POST['sesi'];
              if(!empty($_POST['tgl'])){
              $data_peserta = mysqli_query($koneksi,"SELECT * FROM PESERTA where TGL = '$d1' or TGL2 = '$d1' and ID_SESI = '$sesi' limit $halaman_awal, $batas");
              }else{
                $data_peserta = mysqli_query($koneksi,"SELECT * FROM PESERTA where ID_SESI = '$sesi' limit $halaman_awal, $batas");
              }  
            }else{
              $data_peserta = mysqli_query($koneksi,"SELECT * FROM PESERTA where TGL = '$d1' or TGL2 = '$d1' limit $halaman_awal, $batas");
            }
		    		$nomor = $halaman_awal+1;
    				while($d = mysqli_fetch_array($data_peserta)){
					?>
      <tr>
        <td><?php echo $nomor++;?></td>
        <td><?php echo $d['NIK'];?></td>
        <td><?php echo $d['NAMA_PESERTA'];?></td>
        <td><?php echo $d['KTP'];?></td>
        <td><?php echo $d['TGL'];?><br><?php echo $d['DOS1']; ?></td>
        <td><?php echo $d['TGL2'];?><br><?php echo $d['DOS2']; ?></td>
        <td><?php echo $d['ID_SESI'];?></td>
        <td>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#id<?php echo $d['NIK'];?>">
            Hadir
          </button>
          <!-- Modal -->
          <div class="modal fade" id="id<?php echo $d['NIK'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Validasi Presensi Peserta</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body ">
                  <div class = "alert alert-warning text-center">
                    Pastikan identitas peserta sudah benar!
                  </div>
                  <?php
                  if($d['JK'] == 'L'){
                    $JK =  'Laki-laki';
                  }else{
                    $JK = 'Perempuan';
                  }
                    echo"
                    <table style = 'width: 100%;'>
	                    <tr>
		                    <td>Nama</td>
		                    <td>".$d['NAMA_PESERTA']."</td>
                      </tr>
                      <tr>
                        <td>NIK</td>
                        <td>".$d['NIK']."</td>
                      </tr>
                      <tr>
                        <td>No. Telp</td>
                        <td>".$d['NOHP']."</td>
                      </tr>
                      <tr>
                        <td>Jenis Kelamin</td>
                        <td>".$JK."</td>
                      </tr>
                      <tr>
                        <td>Alamat</td>
                        <td>".$d['KTP']."</td>
                      </tr>
                      <tr>
                        <td>Kelurahan</td>
                        <td>".$d['KEL']."</td>
                      </tr>
                      <tr>
                        <td>Kecamatan</td>
                        <td>".$d['KEC']."</td>
                      </tr>
                      <tr>
                        <td>Kabupaten/Kota</td>
                        <td>".$d['KOTAKAB']."</td>
                      </tr>
                      <tr>
                        <td>Provinsi</td>
                        <td>".$d['PROV']."</td>
                      </tr>
                    </table>
                    "
                  ?>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                  <a href="hadir.php?nik=<?= $d['NIK'];?>" type="button" class="btn btn-primary">Benar</a>
                </div>
              </div>
            </div>
          </div>
        </td>
      </tr>
      <?php
				}
			?>
      </tbody>
    </table>
    <nav>
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
        </li>
        <?php 
				for($x=1;$x<=$total_halaman;$x++){
					?>
        <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
        <?php
				}
				?>
        <li class="page-item">
          <a class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
        </li>
      </ul>
    </nav>
  </div>
  </div>
  <br>
  <div style="padding: 15px;">
  </div>
  <footer class="text-center text-white mt-3 bt-2 pb-2 pt-2 fixed-bottom" style="background-color: #654321;">
    Kejaksaan Tinggi Jawa Timur 2021
  </footer>
  <script type="text/javascript">
    $(function () {
      $(".datepicker").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
      });
    });
  </script>
  <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>