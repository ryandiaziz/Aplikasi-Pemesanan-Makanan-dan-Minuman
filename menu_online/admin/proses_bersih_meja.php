<?php
session_start();
include("../koneksi.php");

if (isset($_GET['id_meja'])) {

    // ambil id dari query string
    $id_meja = $_GET['id_meja'];

    // buat query hapus
    $sql = "DELETE FROM tbl_cart WHERE id_meja='$id_meja'";
    $sql1 = "DELETE FROM tbl_detail_pesanan WHERE id_meja='$id_meja'";
    $sql2 = "DELETE FROM tbl_konfirmasi WHERE id_meja='$id_meja'";
    $query = mysqli_query($koneksi, $sql);
    $query1 = mysqli_query($koneksi, $sql1);
    $query2 = mysqli_query($koneksi, $sql2);

    // apakah query hapus berhasil?
    if ($query && $query1 && $query2) {
        session_destroy();
        session_start();
        $_SESSION['username'] = "ada";
        echo "<script>alert('Data Berhasil Di Bersihkan!'); window.location = 'javascript:history.back()'</script>";
    } else {
        die("gagal menghapus...");
    }
} else {
    die("akses dilarang...");
}
