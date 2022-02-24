<?php
include '../koneksi.php';
$id_menu = $_POST['id_menu'];
$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
$stok = $_POST['stok'];
$harga = $_POST['harga'];
$gambar = $_FILES['gambar']['name'];
$lokasi = $_FILES['gambar']['tmp_name'];
move_uploaded_file($lokasi, "gambar/" . $gambar);

$sql = "INSERT INTO tbl_menu (id_menu,nama,jenis,stok,harga,gambar) VALUES ('$id_menu','$nama','$jenis','$stok','$harga','$gambar')";
$query = mysqli_query($koneksi, $sql);

// apakah query simpan berhasil?
if ($query) {
    // kalau berhasil alihkan ke halaman index.php dengan status=sukses
    header('Location: halaman_admin_daftar_menu.php?status=sukses');
} else {
    // kalau gagal alihkan ke halaman indek.php dengan status=gagal
    header('Location: halaman_admin_daftar_menu.php?status= gagal');
}
