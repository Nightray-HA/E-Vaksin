<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets\bootstrap-4.0.0\dist\css\bootstrap.min.css">
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.js"></script>
  <script src="assets/jquery ui 1.12/jquery-ui.js"></script>
  <script src="assets/datepicker/js/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" href="assets/datepicker/css/datepicker.css">


  <title>PENDAFTARAN VAKSINASI COVID-19</title>
</head>

<body>
  <!-- PHP -->
  <?php
  if(isset($_GET['alert'])){
    if($_GET['alert']=='success'){
      echo "<script>alert('Terima kasih sudah mengisi data Anda')</script>";
    }
    if($_GET['alert']=='gagal'){
      echo "<script>alert('Pendaftaran gagal, NIK sudah terdaftar')</script>";
    }
    if($_GET['alert']=='invalid'){
      echo "<script>alert('Anda harus login untuk mengakses halaman ini')</script>";
    }
  }
  $nama = "";
  $nik = "";
  $nohp = "";
  $t = "";
  $tl = "";
  $ktp = "";
  $kel = "";
  $kec = "";
  $kotakab = "";
  $prov = "";
  $dom = "";
  $jk = "";
  $covid = "";
  $hipertensi = "";
  $diabetes = "";
  $jantung = "";
  $paru = "";
  $kanker = "";
  $hamil = "";
  $menyusui = "";
  $lain = "";
  $tgl = "";
  $jam = "";

  $e_nama = "";
  $e_nik = "";
  $e_nohp = "";
  $e_t = "";
  $e_tl = "";
  $e_ktp = "";
  $e_kel = "";
  $e_kec = "";
  $e_kotakab = "";
  $e_prov = "";
  $e_dom = "";
  $e_jk = "";
  $e_covid = "";
  $e_hipertensi = "";
  $e_diabetes = "";
  $e_jantung = "";
  $e_paru = "";
  $e_kanker = "";
  $e_hamil = "";
  $e_menyusui = "";
  $e_lain = "";
  $e_tgl = "";
  $e_jam = "";

  $valid = 0;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nama"])){
      $e_nama = "Nama harus diisi dengan benar";
    }else{
      $nama = cek_input($_POST["nama"]);
        if(!preg_match("/^[a-zA-Z ]*$/", $nama)){
          $e_nama = "Nama harus diisi dengan benar";
        }else{
          $valid++;
        }
      }
    if (empty($_POST["nik"])){
      $e_nik = "NIK harus diisi dengan benar";
    }else{
      $nik = cek_input($_POST["nik"]);
        if(!is_numeric($nik)){
          $e_nik = "NIK harus diisi dengan benar";
        }else{
          $valid++;
        }
    }
    if (empty($_POST["nohp"])){
      $e_nohp = "No. HP harus diisi dengan benar";
    }else{
      $nohp = cek_input($_POST["nohp"]);
        if(!is_numeric($nohp)){
          $e_nohp = "No. HP harus diisi dengan benar";
        }else{
          $valid++;
        }
    }
    if (empty($_POST["t"])){
      $e_t = "Tempat Lahir harus diisi dengan benar";
    }else{
      $t = cek_input($_POST["t"]);
        if(!preg_match("/^[a-zA-Z]*$/", $t)){
          $e_t = "Tempat Lahir harus diisi dengan benar";
        }else{
          $valid++;
        }
    }
    if (empty($_POST["tl"])){
      $e_tl = "Tanggal Lahir diisi dengan benar";
    }else{
      $tl = cek_input($_POST["tl"]);
      if(cek_tgl($tl)==true){
        if(!preg_match("/^[-0-9]*$/", $tl)){
          $e_tl = "Tanggal Lahir harus diisi dengan benar";
        }else{
          $valid++;
        }
      }else{
        $e_tl = "Tanggal Lahir harus diisi dengan benar";
      }
    }
    if (empty($_POST["ktp"]))
    {
      $e_ktp = "Alamat KTP harus diisi dengan benar";
    }else{
      $ktp= cek_input($_POST["ktp"]);
      $valid++;
    }
    if (empty($_POST["kel"])){
      $e_kel = "Kelurahan harus diisi dengan benar";
    }else{
      $kel = cek_input($_POST["kel"]);
        if(!preg_match("/^[a-zA-Z ]*$/", $kel)){
          $e_kel = "Kelurahan harus diisi dengan benar";
        }else{
          $valid++;
        }
      }
    
    if (empty($_POST["kec"])){
      $e_kec = "Kecamatan harus diisi dengan benar";
    }else{
      $kec = cek_input($_POST["kec"]);
        if(!preg_match("/^[a-zA-Z ]*$/", $kec)){
          $e_kec = "Kecamatan harus diisi dengan benar";
        }else{
          $valid++;
        }
      }
    if (empty($_POST["kotakab"])){
      $e_kotakab = "Kota/Kabupaten harus diisi dengan benar";
    }else{
      $kotakab = cek_input($_POST["kotakab"]);
        if(!preg_match("/^[a-zA-Z ]*$/", $kotakab)){
          $e_kotakab = "Kota/Kabupaten harus diisi dengan benar";
        }else{
          $valid++;
        }
    }
    if (empty($_POST["prov"])){
      $e_prov = "Provinsi harus diisi dengan benar";
    }else{
      $prov = cek_input($_POST["prov"]);
        if(!preg_match("/^[a-zA-Z ]*$/", $prov)){
          $e_prov = "Provinsi harus diisi dengan benar";
        }else{
          $valid++;
        }
    }
    if (empty($_POST["dom"])){
      $e_dom = "Alamat domisili harus diisi dengan benar";
    }else{
      $dom = cek_input($_POST["dom"]);
          $valid++;
    }
    if (empty($_POST["jk"])){
      $e_jk = "Jenis Kelamin harus diisi dengan benar";
    }else{
      $jk = cek_input($_POST["jk"]);
        if(!preg_match("/^[a-zA-Z ]*$/", $jk)){
          $e_jk = "Jenis Kelamin harus diisi dengan benar";
        }else{
          $valid++;
        }
    }
    if (empty($_POST["covid"])){
      $e_covid= "Pilih salah satu";
    }else{
      $covid = cek_input($_POST["covid"]);
        if(!preg_match("/^[a-zA-Z ]*$/", $covid)){
          $e_covid = "Pilih salah satu";
        }else{
          $valid++;
        }
    }
    if (empty($_POST["hipertensi"])){
      $e_hipertensi = "Pilih salah satu";
    }else{
      $hipertensi = cek_input($_POST["hipertensi"]);
        if(!preg_match("/^[a-zA-Z ]*$/", $hipertensi)){
          $e_hipertensi = "Pilih salah satu";
        }else{
          $valid++;
        }
    }
    if (empty($_POST["diabetes"])){
      $e_diabetes = "Pilih salah satu";
    }else{
      $diabetes = cek_input($_POST["diabetes"]);
        if(!preg_match("/^[a-zA-Z ]*$/", $diabetes)){
          $e_diabetes = "Pilih salah satu";
        }else{
          $valid++;
        }
    }
    if (empty($_POST["jantung"])){
      $e_jantung = "Pilih salah satu";
    }else{
      $jantung = cek_input($_POST["jantung"]);
        if(!preg_match("/^[a-zA-Z ]*$/", $jantung)){
          $e_jantung = "Pilih salah satu";
        }else{
          $valid++;
        }
    }
    if (empty($_POST["paru"])){
      $e_paru = "Pilih salah satu";
    }else{
      $paru = cek_input($_POST["paru"]);
        if(!preg_match("/^[a-zA-Z ]*$/", $paru)){
          $e_paru = "Pilih salah satu";
        }else{
          $valid++;
        }
    }
    if (empty($_POST["kanker"])){
      $e_kanker = "Pilih salah satu";
    }else{
      $kanker = cek_input($_POST["kanker"]);
        if(!preg_match("/^[a-zA-Z ]*$/", $kanker)){
          $e_kanker = "Pilih salah satu";
        }else{
          $valid++;
        }
    }
    if (empty($_POST["hamil"])){
      $e_hamil = "Pilih salah satu";
    }else{
      $hamil = cek_input($_POST["hamil"]);
        if(!preg_match("/^[a-zA-Z ]*$/", $hamil)){
          $e_hamil = "Pilih salah satu";
        }else{
          $valid++;
        }
    }
    if (empty($_POST["menyusui"])){
      $e_menyusui = "Pilih salah satu";
    }else{
      $menyusui= cek_input($_POST["menyusui"]);
        if(!preg_match("/^[a-zA-Z ]*$/", $menyusui)){
          $e_menyusui = "Pilih salah satu";
        }else{
          $valid++;
        }
    }
    if (empty($_POST["tgl"])){
      $e_tgl = "Tanggal harus diisi dengan benar";
    }else{
      $tgl = cek_input($_POST["tgl"]);
      if(cek_tgl($tgl)==true){
        if(!preg_match("/^[-0-9]*$/", $tgl)){
          $e_tgl = "Tanggal harus diisi dengan benar";
        }else{
          $valid++;
        }
      }else{
        $e_tgl = "Tanggal harus diisi dengan benar";
      }
    }
    if (empty($_POST["jam"])){
      $e_jam = "Sesi harus dipilih";
    }else{
      $jam = cek_input($_POST["jam"]);
      if(!preg_match("/^[0-9]*$/", $jam)){
        $e_jam = "Sesi harus dipilih";
      }else{
        $valid++;        
      }
    }
  }  
    //function cek tanggal
    function cek_tgl($date){
      $data = explode("-", $date);
      
        if(strlen($data[0])<4){
          return false;
        }else if($data[1]>12){
          return false;
        }else
        return true;
    }
    //function cek data
    function cek_input($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    include 'submit.php';
  ?>
  <!-- END PHP -->
  <!-- navbar -->
  <nav class="navbar" style="background-color: #654321; padding: 0px;">
    <a href="index.php">
      <img src="img/banner.png" style="width = 130px; height: 110px;">
    </a>
  </nav>
  <!-- akhir navbar -->
  <!-- jumbotron -->
  <div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
      <h1 class="display-4">Pendaftaran Vaksinasi</h1>
      <p class="lead">Kejaksaan Tinggi Jawa Timur</p>
    </div>
  </div>
  <!-- form -->

  <div class="card" style="margin-right: 200px; margin-left: 200px;">
    <div class="card-header bg-primary text-white">
      Identitas Peserta
    </div>
    <div class="card-body">
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group">
          <label for="nama">Nama Lengkap</label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?=$nama;?>"
            placeholder="Isikan Nama Lengkap">
          </select><span class="text-danger"><?php echo $e_nama;?></span>
        </div>
        <div class="form-group">
          <label for="nik">NIK</label>
          <input type="text" class="form-control" id="nik" name="nik" value="<?=$nik;?>" maxlength="16" placeholder="Isikan NIK">
          <span class="text-danger"><?php echo $e_nik;?></span>
        </div>
        <div class="form-group">
          <label for="nohp">Nomor HP Aktif</label>
          <input type="text" class="form-control" id="nohp" name="nohp" maxlength="14" value="<?=$nohp;?>"
            placeholder="Isikan No HP">
          <span class="text-danger"><?php echo $e_nohp;?></span>
        </div>
        <div class="form-group">
          <label for="t">Tempat Lahir</label>
          <input type="text" class="form-control" id="t" name="t" value="<?=$t;?>" placeholder="Isikan Tempat Lahir">
          <span class="text-danger"><?php echo $e_t;?></span>
        </div>
        <div class="form-group">
          <label for="tl">Tanggal Lahir</label>
          <input type="text" id="tl" name="tl" class="form-control datepicker" value="<?=$tl;?>"
            placeholder="Isikan Tanggal Lahir(YYYY-MM-DD)">
          <span class="text-danger"><?php echo $e_tl;?></span>
        </div>
        <div class="form-group">
          <label for="ktp">Alamat KTP</label>
          <input type="text" class="form-control" id="ktp" name="ktp" value="<?=$ktp;?>" placeholder="Isikan Alamat">
          <span class="text-danger"><?php echo $e_ktp;?></span>
        </div>
        <div class="form-group">
          <label for="kel">Kelurahan</label>
          <input type="text" class="form-control" id="kel" name="kel" value="<?=$kel;?>"
            placeholder="Isikan Nama Kelurahan">
          <span class="text-danger"><?php echo $e_kel;?></span>
        </div>
        <div class="form-group">
          <label for="kec">Kecamatan</label>
          <input type="text" class="form-control" id="kec" name="kec" value="<?=$kec;?>"
            placeholder="Isikan Nama Kecamatan">
          <span class="text-danger"><?php echo $e_kec;?></span>
        </div>
        <div class="form-group">
          <label for="kotakab">Kota/Kabupaten</label>
          <input type="text" class="form-control" id="kotakab" name="kotakab" value="<?=$kotakab;?>"
            placeholder="Isikan Nama Kota/Kabupaten">
          <span class="text-danger"><?php echo $e_kotakab;?></span>
        </div>
        <div class="form-group">
          <label for="prov">Provinsi</label>
          <input type="text" class="form-control" id="prov" name="prov" value="<?=$prov;?>"
            placeholder="Isikan Nama Provinsi">
          <span class="text-danger"><?php echo $e_prov;?></span>
        </div>
        <div class="form-group">
          <label for="dom">Alamat Domisili</label>
          <input type="text" class="form-control" id="dom" name="dom" value="<?=$dom;?>"
            placeholder="Isikan Alamat Domisili">
          <span class="text-danger"><?php echo $e_dom;?></span>
        </div>
        <div class="form-group-lg">
          <label for="jk">Jenis Kelamin</label>
          <div class="radio">
            <input type="radio" name="jk" id="laki-laki" value="L">Laki-Laki
          </div>
          <div class="radio">
            <input type="radio" name="jk" id="perempuan" value="P">Perempuan
          </div>
          <span class="text-danger"><?php echo $e_jk;?></span>
        </div>
    </div>
  </div>


  <div class="card mt-3" style="margin-right: 200px; margin-left: 200px;">
    <div class="card-header bg-primary text-white ">
      Riwayat Kesehatan Peserta
    </div>
    <div class="card-body">
      <table class="table table-borderd table-hovered table-striped">
        <tr>
          <th>No</th>
          <th>Pernyataan</th>
          <th>Keterangan</th>
        </tr>
        <tr>
          <td>1</td>
          <td>Pernah Tekonfirmasi Covid-19</td>
          <td><input type="radio" name="covid" id="covid" value="Ya">Ya
            <input type="radio" name="covid" id="covid" value="Tidak">Tidak
            <span class="text-danger"><?php echo $e_covid;?></span>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>Hipertensi/Darah Tinggi</td>
          <td><input type="radio" name="hipertensi" id="hipertensi" value="Ya">Ya
            <input type="radio" name="hipertensi" id="hipertensi" value="Tidak">Tidak
            <span class="text-danger"><?php echo $e_hipertensi;?></span></td>
        </tr>
        <tr>
          <td>3</td>
          <td>Diabetes/Kencing Manis</td>
          <td><input type="radio" name="diabetes" id="diabetes" value="Ya">Ya
            <input type="radio" name="diabetes" id="diabetes" value="Tidak">Tidak
            <span class="text-danger"><?php echo $e_diabetes;?></span></td>
        </tr>
        <tr>
          <td>4</td>
          <td>Penyakit Jantung</td>
          <td><input type="radio" name="jantung" id="jantung" value="Ya">Ya
            <input type="radio" name="jantung" id="jantung" value="Tidak">Tidak
            <span class="text-danger"><?php echo $e_jantung;?></span></td>
        </tr>
        <tr>
          <td>5</td>
          <td>Penyakit Paru (ASMA, PPOK, TBC, dll.)</td>
          <td><input type="radio" name="paru" id="paru" value="Ya">Ya
            <input type="radio" name="paru" id="paru" value="Tidak">Tidak
            <span class="text-danger"><?php echo $e_paru;?></span></td>
        </tr>
        <tr>
          <td>6</td>
          <td>Kanker</td>
          <td><input type="radio" name="kanker" id="kanker" value="Ya">Ya
            <input type="radio" name="kanker" id="kanker" value="Tidak">Tidak
            <span class="text-danger"><?php echo $e_kanker;?></span></td>
        </tr>
        <tr>
          <td>7</td>
          <td>Sedang Hamil</td>
          <td><input type="radio" name="hamil" id="hamil" value="Ya">Ya
            <input type="radio" name="hamil" id="hamil" value="Tidak">Tidak
            <span class="text-danger"><?php echo $e_hamil;?></span></td>
        </tr>
        <tr>
          <td>8</td>
          <td>Sedang menyusui</td>
          <td><input type="radio" name="menyusui" id="menyusui" value="Ya">Ya
            <input type="radio" name="menyusui" id="menyusui" value="Tidak">Tidak
            <span class="text-danger"><?php echo $e_menyusui;?></span></td>
        </tr>
        <tr>
          <td>9</td>
          <td>Lainnya (bila ada)</td>
          <td><input type="text" class="form-control" id="lain" name="lain"
              placeholder="Isikan Riwayat Penyakit Lainnya"></td>
        </tr>
      </table>
    </div>
  </div>


  <div class="card mt-3" style="margin-right: 200px; margin-left: 200px;">
    <div class="card-header bg-primary">
      Waktu Vaksinasi
    </div>
    <div class="card-body">
      <div class="form-group">
        <label for="tgl">Pilih Tanggal Vaksinasi</label>
        <input type="text" id="tgl" name="tgl" onchange="sesi()" class="form-control datepicker" value="<?=$tgl;?>"
          placeholder="Isikan Tanggal Vaksinasi(YYYY-MM-DD)">
        <span class="text-danger"><?php echo $e_tgl;?></span>
      </div>
      <div class="form-group-lg">
        <label for="jam">Pilih Waktu Vaksinasi</label>
        <div class="radio">
          <input type="radio" name="jam" id="sesi1" value="1">08.00 - 09.59
        </div>
        <div class="radio">
          <input type="radio" name="jam" id="sesi2" value="2">10.00 - 11.59
        </div>
        <div class="radio">
          <input type="radio" name="jam" id="sesi3" value="3">12.00 - 13.59
        </div>
        <span class="text-danger"><?php echo $e_jam;?></span>
      </div>

      <button type="submit" class="btn btn-success btn-xl btn-block btn-submit-vaksin mt-3">
        Kirim
      </button>
      </form>
    </div>
  </div>

  <!-- akhir form -->

  <footer class="text-center text-white mt-3 bt-2 pb-2 pt-2" style="background-color: #654321;">
    Kejaksaan Tinggi Jawa Timur 2021
  </footer>
  <script>
    function sesi() {
      <?php
      $query = mysqli_query($koneksi, "SELECT * FROM PESERTA WHERE TGL = '$tgl' && ID_SESI = 1");
      $cek = mysqli_num_rows($query);
      if ($cek == 0) {
        $s1 = 0;
      } else {
        $s1 = $cek;
      }
      $query = mysqli_query($koneksi, "SELECT * FROM PESERTA WHERE TGL = '$tgl' && ID_SESI = 2");
      $cek = mysqli_num_rows($query);
      if ($cek == 0) {
        $s2 = 0;
      } else {
        $s2 = $cek;
      }
      $query = mysqli_query($koneksi, "SELECT * FROM PESERTA WHERE TGL = '$tgl' && ID_SESI = 3");
      $cek = mysqli_num_rows($query);
      if ($cek == 0) {
        $s3 = 0;
      } else {
        $s3 = $cek;
      }?>
      var sesi1 = <?= $s1; ?> ;
      var sesi2 = <?= $s2; ?> ;
      var sesi3 = <?= $s3; ?> ;
      if (sesi1 >= 50) {
        document.getElementById("sesi1").disabled = true;
      }
      if (sesi2 >= 50) {
        document.getElementById("sesi2").disabled = true;
      }
      if (sesi3 >= 50) {
        document.getElementById("sesi2").disabled = true;
      }
    }
  </script>

  <script type="text/javascript">
    $(function () {
      $("#tl").datepicker({
        locale: 'id',
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
      });
    });

    //DISABLE TANGGAL
    $("#tgl").datepicker({
      daysOfWeekDisabled: [0,6],
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
      startDate: "2021-07-12",
      endDate: "2021-07-25",
     
    });
  </script>
</body>

</html>