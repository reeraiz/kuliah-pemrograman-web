<?php
require 'koneksi.php';

$id = intval($_POST['id'] ?? 0);
$title = trim($_POST['title'] ?? '');
$content = trim($_POST['content'] ?? '');

if ($id <= 0 || $title === '' || $content === '') {
    header("Location: edit.php?id=" . ($id > 0 ? $id : ''));
    exit;
}

$stmt = $mysqli->prepare("UPDATE entries SET title = ?, content = ?, updated_at = NOW() WHERE id = ?");
$stmt->bind_param("ssi", $title, $content, $id);
$ok = $stmt->execute();
$stmt->close();

if ($ok) {
    header("Location: lihat.php?id=$id");
    exit;
} else {
    echo "Gagal memperbarui catatan: " . $mysqli->error;
}

