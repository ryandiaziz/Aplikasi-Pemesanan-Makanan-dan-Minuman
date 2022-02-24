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
    <title>Admin daftar menu</title>
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
            <a href="../logout.php">Logout</a>
            </label>
        </ul>
    </div>
</body>
<div>

    <div class="container">
        <center><a href="halaman_admin_tambah_menu.php" class="button-secondary">Tambah Menu</a></center>
        <div class="row">
            <?php
            $sql = "SELECT * FROM tbl_menu order by id_menu DESC";
            $query = mysqli_query($koneksi, $sql);
            if (mysqli_num_rows($query) == 0) {
                echo "Tidak ada produk!";
            } else {
                while ($data = mysqli_fetch_array($query)) {
            ?>
                    <div class="span4">
                        <div class="icons-box">
                            <div class="title">
                                <h3><?php echo $data['nama']; ?></h3>
                            </div>
                            <img src="../gambar/<?php echo $data['gambar']; ?>" style="border: 2px solid grey; border-radius: 5px; width: 250px; height: 200px;" />
                            <div>
                                <h3>Rp.<?php echo number_format($data['harga'], 2, ",", "."); ?></h3>
                            </div>
                            <div class="clear">
                                <a class="button-success" href="halaman_admin_edit_menu.php?id=<?= $data['id_menu']; ?>">Edit</a>
                                <a class="button-error" href="proses_hapus_menu.php?id=<?= $data['id_menu']; ?>">Hapus</a>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
</div>


</html>