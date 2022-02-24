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
    <title>Admin tambah menu</title>
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
    <form action="proses_tambah_menu.php" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>ID Menu</td>
                <td><input type="number" name="id_menu"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Jenis</td>
                <td>
                    <input type="radio" name="jenis" value="Makanan"> Makanan<br>
                    <input type="radio" name="jenis" value="Minuman"> Minuman
                </td>
            <tr>
                <td>Stok</td>
                <td><input type="text" name="stok"></td>
            </tr>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga"></td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td><input type="file" name="gambar"></td>
            </tr>
            <tr>
                <td><input class="button-success" type="submit" value="Simpan"><a class="button-error" href="halaman_admin_daftar_menu.php">Batal</a></td>
            </tr>
        </table>

    </form>

</body>