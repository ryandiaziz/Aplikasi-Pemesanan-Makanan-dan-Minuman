<html>
<?php
include '../koneksi.php';
session_start();
if (isset($_GET['konfirmasi'])) {
    $konfir = $_GET['konfirmasi'];
    $_SESSION['konfirmasi'] = $konfir;
}
?>

<head>
    <title>Pesanan</title>
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
    <div id="wrapper">
        <div class="container">
            <?php
            if (isset($_GET['aksi']) == 'delete') {
                $id = $_GET['kd'];
                $cek = mysqli_query($koneksi, "SELECT * FROM tbl_cart WHERE id_menu='$id' AND id_meja='$_SESSION[no_meja]'");
                $data = mysqli_fetch_array($cek);
                $moq = $data['qty'];
                if (mysqli_num_rows($cek) == 0) {
                    echo '<div class="alert">Data tidak ditemukan.</div>';
                } else {
                    $delete = mysqli_query($koneksi, "DELETE FROM tbl_cart WHERE id_menu='$id' AND id_meja='$_SESSION[no_meja]'");
                    if ($delete) {
                        $less_produk = mysqli_query($koneksi, "UPDATE produk SET stok=(stok+'$moq') WHERE id_menu='$id'");
                        echo '<div class="alert>Data berhasil dihapus.</div>';
                    } else {
                        echo '<div class="alert">Data gagal dihapus.</div>';
                    }
                }
            }
            ?>

            <?php
            if (isset($_GET['add']) == 'add') {
                $id_add = $_GET['kd1'];
                $qty = 1;
                $cek1 = mysqli_query($koneksi, "SELECT * FROM tbl_cart WHERE id_menu='$id_add' AND id_meja='$_SESSION[no_meja]'");
                $test = mysqli_fetch_array($cek1);
                $harga = $test['harga'];
                $quan = $test['qty'];
                $qtot = $qty + $quan;
                $jum = $harga * $qtot;
                if (mysqli_num_rows($cek1) == 0) {
                    echo '<div class="alert">Data tidak ditemukan.</div>';
                } else {
                    $add = mysqli_query($koneksi, "UPDATE tbl_cart SET qty=(qty+'$qty'), jumlah='$jum' WHERE id_menu='$id_add' AND id_meja='$_SESSION[no_meja]'");
                    if ($add) {
                        $add_produk = mysqli_query($koneksi, "UPDATE produk SET stok=(stok-'$qty') WHERE id_menu='$id_add'");
                        echo '<div class="alert">Produk berhasil ditambah</div>';
                    } else {
                        echo '<div class="alert">produk gagal ditambah !</div>';
                    }
                }
            }
            ?>

            <?php
            if (isset($_GET['less']) == 'less') {
                $id_less = $_GET['kd2'];
                $qty1 = 1;
                $cek2 = mysqli_query($koneksi, "SELECT * FROM tbl_cart WHERE id_menu='$id_less' AND id_meja='$_SESSION[no_meja]'");
                $test1 = mysqli_fetch_array($cek2);
                $harga1 = $test1['harga'];
                $quan1 = $test1['qty'];
                $qtot1 = $quan1 - $qty1;
                $jum1 = $harga1 * $qtot1;
                if (mysqli_num_rows($cek2) == 0) {
                    echo '<div class="alert">Data tidak ditemukan.</div>';
                } else {
                    $less = mysqli_query($koneksi, "UPDATE tbl_cart SET qty=(qty-'$qty1'), jumlah='$jum1' WHERE id_menu='$id_less' AND id_meja='$_SESSION[no_meja]'");
                    if ($less) {
                        $less_produk = mysqli_query($koneksi, "UPDATE produk SET stok=(stok+'$qty1') WHERE id_menu='$id_less'");
                        echo '<div class="alert">Produk berhasil dikurangi.</div>';
                    } else {
                        echo '<div class="alert">Produk gagal dikurangi !</div>';
                    }
                }
            }
            ?>

            <div class="title">
                <center>
                    <h3>PESANAN MEJA NO <?= $_SESSION['no_meja']; ?></h3>
                </center>
            </div>
            <table>
                <tr>
                    <th>
                        <center>Nomor PO</center>
                    </th>
                    <th>
                        <center>ID Menu</center>
                    </th>
                    <th>
                        <center>Nama Makanan</center>
                    </th>
                    <th>
                        <center>Harga</center>
                    </th>
                    <th>
                        <center>jumlah</center>
                    </th>
                    <th>
                        <center>Sub Total</center>
                    </th>
                    <th>
                        <center>Atur Jumlah</center>
                    </th>
                </tr>

                <?php
                $no_meja = $_SESSION['no_meja'];
                $sql = mysqli_query($koneksi, "SELECT * FROM tbl_cart WHERE id_meja='$no_meja'");
                $no = 0;
                while ($data = mysqli_fetch_array($sql)) {
                    $no++;
                ?>
                    <tr>
                        <td>
                            <center><?php echo $no; ?></center>
                        </td>
                        <td>
                            <center><?php echo $data['id_menu']; ?></center>
                        </td>
                        <td>
                            <center><?php echo $data['nama']; ?></center>
                        </td>
                        <td>
                            <center>Rp. <?php echo number_format($data['harga']); ?></center>
                        </td>
                        <td>
                            <center><?php echo number_format($data['qty']); ?></center>
                        </td>
                        <td>
                            <center>Rp. <?php echo number_format($data['jumlah']); ?></center>
                        </td>
                        <td>
                            <center>
                                <a href="halaman_pesanan.php?add=add&kd1=<?php echo $data['id_menu']; ?>" class="button-secondary">Tambah</a>
                                <a href="halaman_pesanan.php?less=less&kd2=<?php echo $data['id_menu']; ?>" class="button-warning">Kurangi</a>
                                <a href="halaman_pesanan.php?aksi=delete&kd=<?php echo $data['id_menu']; ?>" class="button-error">Hapus</a>
                            </center>
                        </td>
                    </tr>
                <?php
                }
                $sqlku = mysqli_query($koneksi, "SELECT SUM(jumlah) AS total FROM tbl_cart WHERE id_meja='$no_meja'");
                $dataku = mysqli_fetch_array($sqlku);
                $total = $dataku['total'];
                if ($total == 0) {
                    echo '<tr><td colspan="5" align="center">Pesanan Kosong!</td></tr></table>';
                    echo '
                        <p><div align="right">
                        <a href="halaman_pelanggan_daftar_menu.php" class="button-success">Lihat Menu</a>
                        </div></p>';
                } else {
                    echo '
                        <tr style="background-color: #DDD;"><td colspan="6" align="right"><b>Total : Rp. ' . number_format($total, 2, ",", ".") . '</b></td><td align="right"><b></b></td></td></td></tr></table>
                        <p><div align="right">
                        <hr style="margin:10px 0px;color:white">
                        <a href="halaman_pelanggan_daftar_menu.php?lihat" class="button-success">Lihat Menu</a>
                        <a href="konfirmasi.php?total=' . $total . '&konfirmasi" class="button-success"> Konfirmasi Pesanan</a>
                        </div></p>';
                }
                ?>
            </table>
            <hr style="margin:10px 0px;color:white">

            <?php if (isset($_SESSION['konfirmasi']) == 'tampil') {
                $kon = mysqli_query($koneksi, "SELECT * FROM tbl_detail_pesanan WHERE id_meja='$_SESSION[no_meja]'"); ?>
                <table>
                    <tr>
                        <th class="lain">Nama Pesanan</th>
                        <th class="lain">Tanggal</th>
                        <th class="lain">Harga</th>
                        <th class="lain">Jumlah</th>
                        <th class="lain">Sub Total</th>
                    </tr>
                    <?php while ($file = mysqli_fetch_array($kon)) {
                    ?>
                        <tr>
                            <td><?= $file['nama']; ?></td>
                            <td><?= $file['tanggal']; ?></td>
                            <td><?= number_format($file['harga']); ?></td>
                            <td><?= $file['qty']; ?></td>
                            <td><?= number_format($file['total']); ?></td>
                        </tr>
                    <?php } ?>
                </table>
                <hr style="color: white">
            <?php
                $sqli = mysqli_query($koneksi, "SELECT SUM(total) AS total FROM tbl_detail_pesanan WHERE id_meja='$_SESSION[no_meja]'");
                $datamu = mysqli_fetch_array($sqli);
                $total = $datamu['total'];
                echo '<b> TOTAL :  ' . number_format($total, 2, ",", ".") . '</b>';
            } ?>
</body>

</html>