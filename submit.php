<?php
include 'koneksi.php';
if($valid > 21){
    $select = mysqli_query($koneksi, "SELECT * FROM PESERTA WHERE NIK = '$nik'");
    $cek = mysqli_fetch_array($select);
    $uji = $cek['NIK'];
    if($nik == $uji){
        header('location:index.php?alert=gagal'); 
    }else{
        $hasil = mysqli_query($koneksi, "INSERT INTO PESERTA SET ID_SESI = '$jam', NAMA_PESERTA = '$nama', NIK = '$nik', NOHP = '$nohp', T = '$t', TL = '$tl', KTP = '$ktp', KEL = '$kel', KEC = '$kec', KOTAKAB = '$kotakab',PROV = '$prov', DOM = '$dom',JK = '$jk', COVID = '$covid', HIPERTENSI= '$hipertensi', DIABETES= '$diabetes', JANTUNG = '$jantung', PARU = '$paru', KANKER = '$kanker',HAMIL ='$hamil', MENYUSUI = '$menyusui', LAIN = '$lain', TGL = '$tgl', HADIR = 0");
        if(!$hasil){
            die("Query error:".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
        }else{
        header('location:index.php?alert=success');
        }
    }

}
?>