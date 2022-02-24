<html>
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

if (isset($_GET['id_meja'])) {
    $no_meja = $_GET['id_meja'];
    $_SESSION['no_meja']  = $no_meja;
}
?>

<head>
    <title>Admin detail pesanan</title>
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
        </ul>
    </div>
    <center>
        <div class="title">
            <h1>
                Data Konfirmasi Meja No <?= $_SESSION['no_meja']; ?>
            </h1>
        </div>
    </center>
    <?php

    $query1 = "select * from tbl_detail_pesanan where id_meja='$_SESSION[no_meja]'";
    $hasil = mysqli_query($koneksi, $query1);
    ?>
    <table>
        <tr>
            <th>
                <center>ID </center>
            </th>
            <th>
                <center>Nama Pesanan </center>
            </th>
            <th>
                <center>Tanggal </center>
            </th>
            <th>
                <center>Harga </center>
            </th>
            <th>
                <center>Jumlah </center>
            </th>
            <th>
                <center>Sub Total Harga </center>
            </th>
        </tr>
        <?php
        while ($data = mysqli_fetch_array($hasil)) { ?>
            <tr>
                <td>
                    <center><?php echo $data['id']; ?></center>
                </td>
                <td>
                    <center><?php echo $data['nama']; ?></center>
                </td>
                <td>
                    <center><?php echo $data['tanggal']; ?></center>
                </td>
                <td>
                    <center><?php echo $data['harga']; ?></center>
                </td>
                <td>
                    <center><?php echo $data['qty']; ?></center>
                </td>
                <td>
                    <center>Rp. <?php echo number_format($data['total'], 2, ",", "."); ?></center>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <hr style="margin: 10px 0px;color:white">
    <?php
    $sqli = mysqli_query($koneksi, "SELECT SUM(total) AS total FROM tbl_detail_pesanan WHERE id_meja='$_SESSION[no_meja]'");
    $datamu = mysqli_fetch_array($sqli);
    $total = $datamu['total'];
    echo '<b>TOTAL : ' . number_format($total, 2, ",", ".") . '</b>'; ?>
    <a title="Konfirmasi Pembayaran" href="proses_pembayaran.php?id=<?= $_SESSION['no_meja'] ?>" class="button-success">Konfirmasi Pembayaran</a><a title="Balek" href="halaman_admin_pembayaran.php" class="button-warning">Kembali</a>
</body>

</html>