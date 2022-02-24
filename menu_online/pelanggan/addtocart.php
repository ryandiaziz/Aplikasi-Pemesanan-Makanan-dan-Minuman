 <?php
  session_start();
  include "../koneksi.php";

  if (isset($_GET['kd'])) {
    $kd = $_GET['kd'];
    $sql = mysqli_query($koneksi, "SELECT * FROM tbl_menu WHERE id_menu='$kd'");
    if (mysqli_num_rows($sql) == 0) {
      echo "<script>window.location = 'javascript:history.back()'</script>";
    } else {
      $row = mysqli_fetch_assoc($sql);
    }
    $kode        = $row['id_menu'];
    $nama        = $row['nama'];
    $harga       = $row['harga'];
    $stock       = $row['stok'];
    $qty         = 1;
    $jumlah      = $harga * $qty;
    $no_meja     = $_SESSION['no_meja'];
    $tanggal     = date("Y-m-d H:i:s");
    $nomor = date("YmdHis");

    if ($stock == 0) {
      echo "<script>alert('Stock Habis, silahkan pilih produk lain!'); window.location = 'javascript:history.back()'</script>";
    } else {

      $insert = mysqli_query($koneksi, "INSERT INTO tbl_cart(id_cart, tanggal, id_menu, nama, harga, qty, jumlah, id_meja)VALUES('$nomor', '$tanggal', '$kode', '$nama', '$harga', '$qty', '$jumlah', '$no_meja');");

      if ($insert) {
        $qu = mysqli_query($koneksi, "UPDATE tbl_menu SET stok=(stok-'$qty') WHERE id_menu='$kode'");

        echo "<script>alert('Produk ditambahkan ke keranjang!'); window.location = 'javascript:history.back()'</script>";
      } else {
        echo "<script>alert('Gagal Input!'); window.location = 'javascript:history.back()'</script>";
      }
    }
  }
  ?>