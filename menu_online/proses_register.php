<?php
	$koneksi=mysqli_connect ("localhost","root","",)
	or die ("koneksi gagal");
	mysqli_select_db($koneksi,"db_menu_online");
	if (isset($_POST['register']))
	{		
		$nama = $_POST['nama1'];
		$username = $_POST['username1'];	
		$password = md5($_POST['password1']);
		$password2 = md5($_POST['password21']);
		$email = $_POST['email1'];
		$level = $_POST['level1'];
		$jenis_kelamin = $_POST['jenis_kelamin1'];
		$alamat = $_POST['alamat1'];
		$no_telp = $_POST['no_telp1'];

		$ambil = mysqli_query($koneksi,"SELECT * FROM tbl_user WHERE username='$username'");
		if ($password !== $password2) {
			echo "<script>alert('Password Yang Anda Masukkan Tidak Sesuai');</script>";
			echo "<script>location='register.php';</script>";
			return false;
		}else if (mysqli_fetch_assoc($ambil)){
               	echo "<script>alert('Pendaftaran Gagal, Email Sudah Digunakan');</script>";
            	echo "<script>location='register.php';</script>";
                return false;
            }else{
				mysqli_query($koneksi,"INSERT INTO tbl_user(nama,username,password,email,level,jenis_kelamin,alamat,no_telp) VALUES ('$nama','$username','$password','$email','$level','$jenis_kelamin','$alamat','$no_telp')");
				echo "<script>alert('Pendaftaran Sukses, Silahkan Login');</script>";
				echo "<script>location='index.php';</script>";
			}
	}
