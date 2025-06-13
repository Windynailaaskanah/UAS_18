<?php
session_start();       // Aktifkan session
session_destroy();     // Hapus semua data session
echo "<script>
    alert('Anda berhasil logout');
    window.location='login.php';
</script>";
?>
