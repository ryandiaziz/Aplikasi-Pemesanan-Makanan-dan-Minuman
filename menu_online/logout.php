<?php
session_start();
if (empty($_SESSION['username'])) {
    echo "<script>
    alert('Harap login terlebih dahulu');
    window.location = 'index.php';
</script>";
} else {
    session_destroy();
    header("location: index.php");
}
