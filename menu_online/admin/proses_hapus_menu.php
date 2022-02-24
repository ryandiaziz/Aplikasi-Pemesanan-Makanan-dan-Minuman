<?php

include("../koneksi.php");

if (isset($_GET['id'])) {

    // ambil id dari query string
    $id = $_GET['id'];

    // buat query hapus
    $sql = "DELETE FROM tbl_menu WHERE id_menu='$id'";
    $query = mysqli_query($koneksi, $sql);

    // apakah query hapus berhasil?
    if ($query) {
        header('Location: halaman_admin_daftar_menu.php');
    } else {
        die("gagal menghapus...");
    }
} else {
    die("akses dilarang...");
}
