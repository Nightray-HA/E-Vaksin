<?php
$hari = date('Y-m-d');
//Vaksin 1
if(isset($_POST['dos1']) && $hari == $_POST['TGL']){
  include 'koneksi.php';
if(isset($_POST['nik'])){
  $nik = $_POST['nik'];
}else{
  echo"<script>window.location=history.go-1</script>";
}
$tgl2 = date('Y-m-d',strtotime('+14 days',strtotime(date($hari))));
date_default_timezone_set("Asia/Bangkok");
$dos = date('H:i:s');
$update = mysqli_query($koneksi, "UPDATE PESERTA SET DOS1 = '$dos', TGL2 = '$tgl2' WHERE NIK = '$nik' and TGL = '$hari'");
if($update){
  header("location:peserta.php?alert=sukses");
}else{
  header("location:peserta.php?alert=gagal");
} 
}


//Vaksin 2
if(isset($_POST['dos2']) && $hari == $_POST['TGL2']){
  include 'koneksi.php';
  if(isset($_POST['nik'])){
    $nik = $_POST['nik'];
  }else{
    echo"<script>window.location=history.go-1</script>";
  }
  date_default_timezone_set("Asia/Bangkok");
  $dos = date('H:i:s');
  $update = mysqli_query($koneksi, "UPDATE PESERTA SET DOS2 = '$dos', HADIR = 3 WHERE NIK = '$nik'");
  if($update){
    header("location:peserta.php?alert=sukses");
  }else{
    header("location:peserta.php?alert=gagal");
  }
}
?>