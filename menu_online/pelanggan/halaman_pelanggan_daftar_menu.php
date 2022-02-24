<html>
<?php
session_start();
include '../koneksi.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = mysqli_query($koneksi, "SELECT * from tbl_meja WHERE id_meja = $id");
    $d = mysqli_fetch_array($data);
    $_SESSION['no_meja'] = $d['id_meja'];
}
?>

<head>
    <title>Daftar menu</title>
    <link rel="stylesheet" href="../css/tampilan_halaman_admin.css">
    <link rel="stylesheet" href="../css/tampilan.css">
    <link rel="stylesheet" href="../css/tombol.css">
</head>

<body>
    <div class="header">
        <h2 class="logo">Light Coffee</h2>
        <ul class="menu">
            <a href="halaman_pelanggan_daftar_menu.php">Daftar Menu</a>
            <a href="halaman_pesanan.php">Pesanan</a>
        </ul>
    </div>

    <center>
        <h1>Meja <?= $_SESSION['no_meja'] ?></h1>
    </center>
    <div id="wrapper">
        <div class="container">
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
                                <div> <a href="addtocart.php?kd=<?php echo $data['id_menu']; ?>" class="button-success">Beli</a></div>

                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </div>
</body>

</html>