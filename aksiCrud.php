<?php
// panggil koneksi database
include "koneksi.php";
// tombol simpan diklik
if(isset($_POST['bsimpan'])){
    // simpan data 
    $simpan = mysqli_query($koneksi, "INSERT INTO karyawan (nik, nama, alamat, jabatan) VALUES ('$_POST[tnik]','$_POST[tnama]', '$_POST[talamat]', '$_POST[tjabatan]')");
    // simpan sukses
    if($simpan){
        echo    "<script>
                alert ('Simpan Data Sukses');
                document.location='index.php';
                </script>";
    }else{
        echo    "<script>
                alert ('Simpan Data Gagal');
                document.location='index.php';
                </script>";
    }
}


// tombol ubah diklik
if(isset($_POST['bubah'])){
    // ubah data 
    $ubah = mysqli_query($koneksi, "UPDATE karyawan SET  
    nik = '$_POST[tnik]', nama = '$_POST[tnama]', alamat = '$_POST[talamat]', jabatan = '$_POST[tjabatan]' WHERE id_karyawan = '$_POST[id_karyawan]' ");
    // ubah sukses dan gagal
    if($ubah){
        echo    "<script>
                alert ('Ubah Data Sukses');
                document.location='index.php';
                </script>";
    }else{
        echo    "<script>
                alert ('Ubah Data Gagal');
                document.location='index.php';
                </script>";
    }
}


// ujicoba tombol hapus diklik
if(isset($_POST['bhapus'])) {
    
    // tombol Hapus diklik
if(isset($_POST['bhapus'])){
    // Hapus data 
    $hapus = mysqli_query($koneksi, "DELETE FROM karyawan WHERE id_karyawan = '$_POST[id_karyawan]'");
    // Hapus sukses dan gagal
    if($hapus){
        echo    "<script>
                alert ('Hapus Data Sukses');
                document.location='index.php';
                </script>";
    }else{
        echo    "<script>
                alert ('Hapus Data Gagal');
                document.location='index.php';
                </script>";
    }
}
}


?>