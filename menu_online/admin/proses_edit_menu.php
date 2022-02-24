<?php
include("../koneksi.php");

if (isset($_POST['simpan'])) {

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];
    $gambar = $_FILES['gambar']['name'];
    $lokasi = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($lokasi, "gambar/" . $gambar);

    $sql = "UPDATE tbl_menu SET id_menu='$id', nama='$nama', jenis='$jenis', stok='$stok',harga='$harga', gambar='$gambar' WHERE id_menu=$id";
    $query = mysqli_query($koneksi, $sql);
    if ($query) {
        header('Location: halaman_admin_daftar_menu.php');
    } else {
        die("Gagal menyimpan perubahan...");
    }
} else {
    die("Akses dilarang...");
}
