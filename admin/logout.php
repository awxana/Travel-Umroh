<?php
session_start();

// Hapus semua session
session_unset();  // ❌ jangan kasih argumen
session_destroy();

// Redirect ke halaman login
header("Location: index.php?pesan=logout");
exit;
?>