 <?php
    session_start();
    $koneksi = mysqli_connect("localhost", "root", "", "db_menu_online");
    if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $login = mysqli_query($koneksi, "select * from tbl_user where username='$username' and password='$password'");
    $cek = mysqli_num_rows($login);
    if ($cek > 0) {

        $data = mysqli_fetch_assoc($login);
        if ($data['level'] == "admin") {
            $_SESSION['username'] = $username;
            $_SESSION['level'] = "admin";
           header("location:admin/halaman_admin_home.php");
        } else {
            header("location:index.php?pesan=gagal");
        }
    } else {
        header("location:index.php?pesan=gagal");
    }
    ?>