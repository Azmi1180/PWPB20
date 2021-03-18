<?php
include 'lib/library.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nis = $_POST['nis'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $foto = $_FILES['foto'];

    if (!empty($foto) and $foto['error'] == 0) {
      $path = './assets/images/';
      $upload = move_uploaded_file($foto['tmp_name'], $path . $foto['name']);

      if(!$upload){
        flash('error', "Upload file gagal");
        header('location:index.php');
      }
      $file = $foto['name'];
    }

    $sql = "INSERT INTO siswa (nis,nama_lengkap,jenis_kelamin,kelas,jurusan,file) VALUES ('$nis','$nama_lengkap','$jenis_kelamin','$kelas','$jurusan', '$file')";

    $mysqli->query($sql) or die($mysqli->error);

    header("location:index.php");
}

include 'views/v_tambah.php';
