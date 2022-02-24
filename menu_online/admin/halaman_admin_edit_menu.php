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

if (!isset($_GET['id'])) {
    header('Location: halaman_admin_daftar_menu.php');
}

$id = $_GET['id'];
$sql = "SELECT * FROM tbl_menu WHERE id_menu=$id";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($query);

?>

<html>

<head>
    <meta charset="utf-8">
    <title>Admin edit menu</title>
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
    <form action="proses_edit_menu.php" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <input type="hidden" name="id" value="<?php echo $data['id_menu'] ?>" />
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $data['nama'] ?>"></td>
            </tr>
            <tr>
                <td>Jenis</td>
                <td>
                    <?php $jenis = $data['jenis']; ?>
                    <input type="radio" name="jenis" value="Makanan" <?php echo ($jenis == 'Makanan') ? "checked" : "" ?>> Makanan <br>
                    <input type="radio" name="jenis" value="Minuman" <?php echo ($jenis == 'Minuman') ? "checked" : "" ?>> Minuman
                </td>
            </tr>
            <tr>
                <td>Stok</td>
                <td><input type="text" name="stok" value="<?php echo $data['stok'] ?>"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga" value="<?php echo $data['harga'] ?>"></td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td><input type="file" name="gambar" value="<?php echo $data['gambar'] ?>"></td>
            </tr>
            <tr>
                <td>
                    <input class="button-success" type="submit" value="Simpan" name="simpan"> <a class="button-error" href="halaman_admin_daftar_menu.php">Batal</a>
                </td>
                <td></td>
            </tr>
        </table>

    </form>

</body>