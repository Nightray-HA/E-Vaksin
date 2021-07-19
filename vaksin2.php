<?php
if(isset($_POST['dos2'])){
  include 'koneksi.php';
  if(isset($_POST['nik'])){
    $nik = $_POST['nik'];
  }else{
    echo"<script>window.location=history.go-1</script>";
  }
  $hari = date('Y-m-d');
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