<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="css/tampilan_register.css">
</head>

<body>
    <div class="kotak_login">
        <p class="tulisan_login"><b>Registrasi</b></p>
        <form action="proses_register.php" method="post">
            <input type="text" name="nama1" class="form_login" placeholder="nama" required>
            <input type="text" name="username1" class="form_login" placeholder="username" required>
            <input type="password" name="password1" class="form_login" placeholder="password" required>
            <input type="password" name="password21" class="form_login" placeholder="retype-password" required>
            <input type="email" name="email1" class="form_login" placeholder="e-mail" required>
            <select name="level1" class="form_login" required>
                <option value="admin">Admin</option>
                <option value="kasir">Kasir</option>
                <option value="barista">Barista</option>
                <option value="pelayan">Pelayan</option>
            </select>
            <input type="radio" name="jenis_kelamin1" value="Laki-laki" class="form_radio">&nbsp;&nbsp;<span class="but">Laki-laki</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="jenis_kelamin1" value="Perempuan" class="form_radio">&nbsp;&nbsp;<span class="but">Perempuan</span>
            <input type="text" name="alamat1" class="form_login" placeholder="alamat" required>
            <input type="text" name="no_telp1" class="form_login" placeholder="+62" required>
            <input type="reset" class="tombol_submit" value="Reset"><input type="submit" name="register" class="tombol_submit" value="Create Account">
        </form>
        <a href="admin/halaman_admin_home.php" class="tombol_submit" title="balek" style="padding:12px 148px">Kembali</a>
    </div>
</body>

</html>