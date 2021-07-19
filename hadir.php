<?php
include "koneksi.php";
$nik = $_GET['nik'];
$select = mysqli_query($koneksi, "SELECT * FROM PESERTA WHERE NIK = '$nik'");
$data = mysqli_fetch_array($select);
$hadir = $data['HADIR'];
date_default_timezone_set("Asia/Bangkok");
$tcek = date('Y-m-d');
echo $hadir."".$tcek."".$data['TGL2'];
if($tcek == $data['TGL']){
  if($hadir == 0){
    $hadir=1;
    $ok = mysqli_query($koneksi, "UPDATE PESERTA SET HADIR = '$hadir' WHERE NIK = '$nik'");
    if($ok){
      header("location:presensi.php?alert=hadir");
    }else{ 
      header("location:presensi.php?alert=salah");
    }
  }else{
    header("location:presensi.php?alert=satu");
  }
}else if($tcek == $data['TGL2']){
  if($hadir == 1){
    $hadir=2;
    $query = mysqli_query($koneksi, "UPDATE PESERTA SET HADIR = '$hadir' WHERE NIK = '$nik'");
    if($query){
      header("location:presensi.php?alert=hadir2");
    }else{
      header("location:presensi.php?alert=salah");
    }
  }else{
    header("location:presensi.php?alert=dua");
  }
}else{
  header("location:presensi.php?alert=salah");
}
?>