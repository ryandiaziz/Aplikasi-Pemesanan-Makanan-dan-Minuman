<html>
<?php
session_start();
if (empty($_SESSION['username'])) {
    echo "<script>alert('Harap login terlebih dahulu'); window.location = '../index.php'</script>";
} else {
    include("../koneksi.php");
}
?>

<head>
    <title>Admin home</title>
    <link rel="stylesheet" href="../css/tampilan_halaman_admin.css">
    <link rel="stylesheet" href="../css/tampilan.css">
    <link rel="stylesheet" href="../css/tombol.css">
</head>

<body>
    <div class="header">
        <h2 class="logo">Light Coffee</h2>
        </label>

        <ul class="menu">
            <a href="halaman_admin_home.php">Home</a>
            <a href="halaman_admin_daftar_menu.php">Daftar Menu</a>
            <a href="halaman_admin_pembayaran.php">Pesanan</a>
            <a href="../logout.php">Logout</a>
        </ul>
    </div>

    <p><a href="../register.php" class="button-secondary">klik disini untuk membuat akun</a></p>

    <center>
        <img class="gambar" src="../gambar/logo_login.png" alt="" style="margin: 10px" width="200px" height="200px">
    </center>
    <div class="content">
        <center><a class="button-secondary" href="halaman_admin_tambah_meja.php">TAMBAH NO MEJA</a></center>
        <?php
        $data = mysqli_query($koneksi, "SELECT * from tbl_meja"); ?>
        <center>
            <table>
                <tr>
                    <th>
                        <center>No Meja</center>
                    </th>
                    <th>
                        <center>Action</center>
                    </th>
                </tr>
                <?php while ($isi = mysqli_fetch_array($data)) { ?>
                    <tr>
                        <td>
                            <center><?= $isi['id_meja']; ?></center>
                        </td>
                        <td>
                            <center>
                                <a class="button-error" href="proses_hapus_meja.php?id=<?= $isi['id_meja']; ?>">Hapus Meja</a>
                                <a class="button-success" href="../pelanggan/halaman_pelanggan_daftar_menu.php?id=<?= $isi['id_meja']; ?>">Pilih Meja</a></center>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </center>
    </div>
</body>

</html>