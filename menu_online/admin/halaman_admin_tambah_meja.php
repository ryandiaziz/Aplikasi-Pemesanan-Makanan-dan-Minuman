<?php
session_start();
if (empty($_SESSION['username'])) {
    echo "<script>
    alert('Harap login terlebih dahulu');
    window.location = '../index.php';
</script>";
} else {
    include("../koneksi.php");
}
?>
<html>

<head>
    <title>Admin tambah meja</title>
    <link rel="stylesheet" href="../css/tampilan_halaman_admin.css">
    <link rel="stylesheet" href="../css/tampilan.css">
    <link rel="stylesheet" href="../css/tombol.css">
</head>

<body>
    <div class="header">
        <h2 class="logo">Light Coffee</h2>
        <ul class="menu">
            <a href="halaman_admin_home.php">Home</a>
            <a href="halaman_admin_daftar_menu.php">Daftar Menu</a>
            <a href="halaman_admin_pembayaran.php">Pesanan</a>
            <a href=" ../logout.php">Logout</a>
        </ul>
    </div>

    <form action="proses_tambah_meja.php" method="POST">
        <table>
            <tr>
                <td>No Meja</td>
                <td><input type="number" name="id_meja"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Simpan" name="simpan" class="button-success"><a class="button-error" href="halaman_admin_home.php">Batal</a></td>
                <td></td>
            </tr>
        </table>
    </form>