<html>

<head>
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="css/tampilan_login.css">
</head>

<body>
    <div class="kotak_login">
        <center>
            <img class="gambar" src="gambar/logo_login.png" alt="" style="margin: 25px" width="250px" height="250px">
        </center>
        <form action="cek.php" method="post">
            <input type="text" name="username" class="form_login" placeholder="username atau email">
            <input type="password" name="password" class="form_login" placeholder="password">
            <input type="submit" class="tombol_login" value="LOGIN">
        </form>
    </div>
</body>

</html>