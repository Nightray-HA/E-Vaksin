<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets\bootstrap-4.0.0\dist\css\bootstrap.min.css">
    <script src="assets/js/jquery.js"></script>
    <title>DETAIL PESERTA VAKSINASI</title>
</head>

<body>
    <?php
    session_start();
    if(!isset($_SESSION['nama'])){
        header("location:index.php?alert=invalid");
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
                    <a class="nav-link active text-white" href="peserta.php">Daftar Peserta Vaksinasi</a>
                </li>
            </ul>
            <a href="logout.php" class="btn btn-danger" style="margin-right: 20px">Logout</a>
        </div>
    </nav>
    <?php
        if(isset($_GET['nik'])){
            $nik = $_GET['nik'];
        }else{
            header("location:peserta.php");
        }
        include 'koneksi.php';
        $query = mysqli_query($koneksi, "SELECT * FROM PESERTA WHERE NIK = '$nik'");
        $data = mysqli_fetch_assoc($query);
        
        //DEKLARASI VARIABEL
        $nama = $data['NAMA_PESERTA'];
        $nik = $data['NIK'];
        $jam = $data['ID_SESI'];
        $nohp = $data['NOHP'];
        $t = $data['T'];
        $tl = $data['TL'];
        $ktp = $data['KTP'];
        $kel = $data['KEL'];
        $kec = $data['KEC'];
        $kotakab = $data['KOTAKAB'];
        $prov = $data['PROV'];
        $dom = $data['DOM'];
        $jk = $data['JK'];
        if($data['JK'] == 'L'){
            $jkf =  'Laki-laki';
          }else{
            $jkf = 'Perempuan';
          }
        $covid = $data['COVID'];
        $hipertensi = $data['HIPERTENSI'];
        $diabetes = $data['DIABETES'];
        $jantung = $data['JANTUNG'];
        $paru = $data['PARU'];
        $kanker = $data['KANKER'];
        $hamil = $data['HAMIL'];
        $menyusui = $data['MENYUSUI'];
        $lain = $data['LAIN'];
        $tgl = $data['TGL'];
        $tgl2 = $data['TGL2'];
        $dos1 = $data['DOS1'];
        $dos2 = $data['DOS2'];
        $hader = $data['HADIR'];
          echo $hader;
        $loro = "";
        if($covid=="Ya"){
            $loro = $loro."Terkonfirmasi COVID-19, &ensp;";
        }
        if($hipertensi=="Ya"){
            $loro = $loro."Hipertensi/ Darah Tinggi, &ensp;";
        }
        if($diabetes=="Ya"){
            $loro = $loro."Diabetes/Kencing Manis, &ensp;";
        }
        if($jantung=="Ya"){
            $loro = $loro."Penyakit jantung, &ensp;";
        }
        if($paru=="Ya"){
            $loro = $loro."Penyakit paru, &ensp;";
        }
        if($kanker=="Ya"){
            $loro = $loro."Kanker, &ensp;";
        }
        if($hamil=="Ya"){
            $loro = $loro."Sedang Hamil, &ensp;";
        }
        if($menyusui=="Ya"){
            $loro = $loro."Sedang Menyusui, &ensp;";
        }
        if($lain=="Ya"){
            $loro = $loro."".$lain."";
        }
        $query = mysqli_query($koneksi, "SELECT * FROM SESI WHERE ID_SESI = '$jam'");
        $s = mysqli_fetch_array($query);
        $kets = $s['WAKTU_SESI'];
    ?>
    <div class="card mt-3" style="margin-right: 20%; margin-left: 20%;">
        <div class="card-header bg-primary text-white ">
            Peserta Vaksinasi
        </div>
        <div class="card-body">
            <form class = "form" method = "POST" action = "vaksin.php">
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="nama" value="<?=$nama?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                    <div class="col-sm-9">
                        <input type="text" name = "nik" readonly class="form-control-plaintext" id="nik" value="<?=$nik?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sesi" class="col-sm-3 col-form-label">Sesi Vaksinasi</label>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="sesi" value="<?=$jam?>&nbsp;(<?=$kets?>)">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nohp" class="col-sm-3 col-form-label">No. HP</label>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="nohp" value="<?=$nohp?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ttl" class="col-sm-3 col-form-label">Tempat Tanggal Lahir</label>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="ttl" value="<?= $t.', &nbsp;'.$tl?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ktp" class="col-sm-3 col-form-label">Alamat KTP</label>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="ktp" value="<?=$ktp?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kel" class="col-sm-3 col-form-label">Kelurahan</label>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="kel" value="<?=$kel?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kec" class="col-sm-3 col-form-label">Kecamatan</label>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="kec" value="<?=$kec?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kotakab" class="col-sm-3 col-form-label">Kabupaten/Kota</label>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="kotakab" value="<?=$kotakab?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="prov" class="col-sm-3 col-form-label">Provinsi</label>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="prov" value="<?=$prov?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="dom" class="col-sm-3 col-form-label">Alamat Domisili</label>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="dom" value="<?=$dom?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jk" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="jk" value="<?=$jkf?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="loro" class="col-sm-3 col-form-label">Riwayat Penyakit</label>
                    <div class="col-sm-9">
                        <textarea readonly = "readonly" class="form-control-plaintext" id="loro" rows = "4"><?= $loro;?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="dos1" class="col-sm-3 col-form-label">Vaksinasi Dosis 1</label>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="dos1" value="<?= $tgl."&nbsp;".$dos1;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="dos2" class="col-sm-3 col-form-label">Vaksinasi Dosis 2</label>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="dos2" value="<?= $tgl2."&nbsp;".$dos2;?>">
                    </div>
                    <input type="hidden"  name = "TGL2" value = "<?= $tgl2;?>">
                    <input type="hidden"  name = "TGL" value = "<?= $tgl;?>">
                </div>
                <div class="form-group row">
                    <?php
                    if($hader == 1){
                        echo '<div class = "col-sm-12">
                                <center><button type = "submit" name = "dos1" class = "btn btn-success center-block" >Vaksinasi dosis 1</button></center>
                            </div>';
                    }else if($hader == 2){
                        echo '<div class = "col-sm-12">
                                <center><button type = "submit" name = "dos2" class = "btn btn-success center-block" >Vaksinasi dosis 2</button></center>
                            </div>';
                    }
                    ?>  
                </div>
            </form>
        </div>
    </div>
    <br>
    <div style="padding: 15px;">
    </div>
    <footer class="text-center text-white mt-3 bt-2 pb-2 pt-2 fixed-bottom" style="background-color: #654321;">
        Kejaksaan Tinggi Jawa Timur 2021
    </footer>
</body>

</html>