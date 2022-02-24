<?php
include '../koneksi.php';
$id_meja = $_POST['id_meja'];

$sql = "INSERT INTO tbl_meja (id_meja) VALUES ('$id_meja')";
$query = mysqli_query($koneksi, $sql);

if ($query) {
    header('Location: halaman_admin_home.php?status=sukses');
} else {
    header('Location: halaman_admin_home.php?status= gagal');
}
