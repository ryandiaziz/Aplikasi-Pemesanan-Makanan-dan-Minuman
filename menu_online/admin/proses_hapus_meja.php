<?php

include("../koneksi.php");

if (isset($_GET['id'])) {

    // ambil id dari query string
    $id = $_GET['id'];

    // buat query hapus
    $sql = "DELETE FROM tbl_meja WHERE id_meja='$id'";
    $query = mysqli_query($koneksi, $sql);

    // apakah query hapus berhasil?
    if ($query) {
        header('Location: halaman_admin_home.php');
    } else {
        die("gagal menghapus...");
    }
} else {
    die("akses dilarang...");
}
