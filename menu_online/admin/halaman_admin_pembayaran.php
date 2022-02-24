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
?>

<head>
    <title>Admin pembayaran</title>
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
    <center>
        <img class="gambar" src="../gambar/logo_login.png" alt="" style="margin: 10px" width="200px" height="200px">
    </center>
    <?php
    $query3 = "select * from tbl_konfirmasi";
    $hasil2 = mysqli_query($koneksi, $query3);
    ?>
    <table>
        <tr>
            <th>
                <center>ID </center>
            </th>
            <th>
                <center>No Meja </center>
            </th>
            <th>
                <center>Tanggal </center>
            </th>
            <th>
                <center>Jumlah </center>
            </th>
            <th>
                <center>Status</center>
            </th>
            <th>
                <center>Tools </center>
            </th>
        </tr>
        <?php
        while ($data2 = mysqli_fetch_array($hasil2)) { ?>
            <td>
                <center><?php echo $data2['id_kon']; ?></center>
            </td>
            <td>
                <center><?php echo $data2['id_meja']; ?></center>
            </td>
            <td>
                <center><?php echo $data2['tanggal']; ?></center>
            </td>
            <td>
                <center>Rp. <?php echo number_format($data2['jumlah'], 2, ",", "."); ?></center>
            </td>
            <td>
                <center><?php
                        if ($data2['status'] == 'Bayar') {
                            echo '<span class="label label-success">Sudah di Bayar</span>';
                        } else if ($data2['status'] == 'Belum') {
                            echo '<span class="label-danger">Belum di Bayar</span>';
                        }

                        ?>

                </center>
            </td>
            <td>
                <center>
                    <div>
                        <a class="button-secondary" title="Detail Pesanan" href="halaman_detail_pesanan.php?hal=detail&kd=<?php echo $data2['id_kon']; ?>&id_meja=<?php echo $data2['id_meja']; ?>">Detail</a>
                        <a class="button-error" title="Bersihkan Meja" href="proses_bersih_meja.php?hal=detail&kd=<?php echo $data2['id_kon']; ?>&id_meja=<?php echo $data2['id_meja']; ?>">Bersihkan Meja</a>
                    </div>
                </center>
            </td>
            </tr>
            </div>
        <?php
        }
        ?>
    </table>
    </div>


</body>

</html>