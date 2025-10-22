<?php
require 'koneksi.php';
$id = intval($_GET['id'] ?? 0);
if ($id <= 0) {
    header('Location: index.php');
    exit;
}
$stmt = $mysqli->prepare("SELECT id, title, content, created_at, updated_at FROM entries WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
$entry = $res->fetch_assoc();
$stmt->close();

if (!$entry) {
    echo "Catatan tidak ditemukan.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title><?=htmlspecialchars($entry['title'])?> — Diary</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <header>
      <h1><?=htmlspecialchars($entry['title'])?></h1>
      <nav><a href="index.php">← Kembali</a> | <a href="edit.php?id=<?=$entry['id']?>">Edit</a></nav>
    </header>

    <main>
      <p class="meta">• Dibuat: <?=htmlspecialchars($entry['created_at'])?><?php if ($entry['updated_at']) echo " • Diperbarui: ".htmlspecialchars($entry['updated_at']); ?></p>
      <article class="content"><?=nl2br(htmlspecialchars($entry['content']))?></article>
      <p><a href="delete.php?id=<?=$entry['id']?>" onclick="return confirm('Hapus catatan ini?')">Hapus catatan</a></p>
    </main>

    <footer>Diary • detail</footer>
  </div>
</body>
</html>
