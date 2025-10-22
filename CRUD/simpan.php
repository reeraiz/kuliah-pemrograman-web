<?php
require 'koneksi.php';

$title = trim($_POST['title'] ?? '');
$content = trim($_POST['content'] ?? '');

if ($title === '' || $content === '') {
    header('Location: tambah.php');
    exit;
}

$stmt = $mysqli->prepare("INSERT INTO entries (title, content) VALUES (?, ?)");
$stmt->bind_param("ss", $title, $content);
$ok = $stmt->execute();
$stmt->close();

if ($ok) {
    header('Location: index.php');
    exit;
} else {
    echo "Gagal menyimpan: " . $mysqli->error;
}
