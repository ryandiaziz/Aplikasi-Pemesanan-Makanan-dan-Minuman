<?php
session_start();
include "../koneksi.php";
if (isset($_GET['total'])) {
    $sqli = mysqli_query($koneksi, "SELECT SUM(total) AS total1 FROM tbl_detail_pesanan WHERE id_meja='$_SESSION[no_meja]'");
    $datamu = mysqli_fetch_array($sqli);
    $total1 = $datamu['total1'];
    $total2 = $_GET['total'];
    $total = $total1 + $total2;
    $meja = $_SESSION['no_meja'];
}

$a = "Belum";
$c = date("Y-m-d H:i:s");

$sqli = mysqli_query($koneksi, "SELECT * FROM tbl_konfirmasi WHERE id_meja='$_SESSION[no_meja]'");
$dataa = mysqli_fetch_array($sqli);
if ($dataa['id_meja'] == $_SESSION['no_meja']) {
    $sql = mysqli_query($koneksi, "UPDATE tbl_konfirmasi SET id_meja='$_SESSION[no_meja]', tanggal='$c', jumlah='$total', status='$a' WHERE id_meja='$_SESSION[no_meja]'");
} else {
    $query1 = mysqli_query($koneksi, "INSERT INTO tbl_konfirmasi (id_meja, tanggal, jumlah, status) VALUES ('$_SESSION[no_meja]', '$c', '$total', '$a')");
}

$input = mysqli_query($koneksi, "INSERT INTO tbl_detail_pesanan (id_meja, nama, tanggal, harga, qty, total) SELECT id_meja, nama, tanggal, harga, qty, jumlah FROM tbl_cart WHERE id_meja='$_SESSION[no_meja]'");


if ($input) {
    $delete = mysqli_query($koneksi, "DELETE FROM tbl_cart WHERE id_meja='$_SESSION[no_meja]'");
    echo "<script>
    alert('Pesanan Sukses');
    window.location = 'halaman_pesanan.php?konfirmasi=tampil'
</script>";
} else {
    echo "<script>
    alert('Pesanan Gagal !');
    window.location = 'halaman_pesanan.php'
</script>";
}
