<?php
session_start();
include "../koneksi.php";
if (isset($_GET['id'])) {
    $a = "Bayar";
    $_SESSION['no_meja'] = $_GET['id'];
    $c = date("Y-m-d H:i:s");

    $sql = mysqli_query($koneksi, "UPDATE tbl_konfirmasi SET status='$a' WHERE id_meja='$_SESSION[no_meja]'");
    if ($sql) {
        echo "<script>
    alert('Pembayaran Berhasil');
    window.location = 'halaman_admin_pembayaran.php?konfirmasi=tampil'
</script>";
    } else {
        echo "<script>
    alert('Pesanan Gagal !');
    window.location = 'halaman_pesanan.php'
</script>";
    }
}
