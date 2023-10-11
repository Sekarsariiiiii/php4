<?php 
//mengaktifkan session pada php
session_start();

//menghubungkan php dengan koneksi database
include 'koneksi.php';

//menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
 

//menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
//menghitung jumlah data yang di temukan
$cek = mysqli_num_rows($login);

//cek apakah username dan password di temukan pada database
if($cek > 0){

    $data = mysqli_fetch_assoc($login);

    //cek jika user login sebagai admin
    if($data['level']=="admin"){

    //buat session login dan username
    $_SESSION['username'] = $username;
    $_SESSION['level'] = "admin";
    //alihkan ke halaman dashboard admin
    header("location:halaman_admin.php");

  //cek jika user login sebagai operator
  }else if($data['level']=="operator"){

    //buat session login dan username
    $_SESSION['username'] = $username;
    $_SESSION['level'] = "operator";
    //alihkan ke halaman dashboard operator
    header("location:halaman_operator.php");

  //cek jika user login sebagai siswa
  }else if($data['level']=="siswa"){

    //buat session login dan username
    $_SESSION['username'] = $username;
    $_SESSION['level'] = "siswa";
    //alihkan ke halaman dashboard siswa
    header("location:halaman_siswa.php");

  //cek jika user login sebagai kepsek
  }else if($data['level']=="kepsek"){

    //buat session login dan username
    $_SESSION['username'] = $username;
    $_SESSION['level'] = "kepsek";
    //alihkan ke halaman dashboard siswa
    header("location:halaman_kepsek.php");

  //cek jika user login sebagai wali murid
  }else if($data['level']=="wali murid"){

    //buat session login dan username
    $_SESSION['username'] = $username;
    $_SESSION['level'] = "wali murid";
    //alihkan ke halaman dashboard siswa
    header("location:halaman_wali murid.php");

 //cek jika user login sebagai wali guru
  }else if($data['level']=="guru"){

    //buat session login dan username
    $_SESSION['username'] = $username;
    $_SESSION['level'] = "guru";
    //alihkan ke halaman dashboard siswa
    header("location:halaman_guru.php");


  }else{
 
    //alihkan ke halaman login kembali
    header("location:index.php?pesan=gagal");
  }


}else{
    header("location:index.php?pesan=gagal");
}
?>
