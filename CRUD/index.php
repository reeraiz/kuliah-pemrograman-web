<?php
require 'koneksi.php';
$result = $mysqli->query("SELECT id, title, created_at FROM entries ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Diary — Daftar Catatan</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <header>
      <h1>Diary / Catatan Harian</h1>
      <nav><a class="btn" href="tambah.php">+ Tambah Catatan</a></nav>
    </header>

    <main>
      <?php if ($result && $result->num_rows > 0): ?>
        <ul class="list">
          <?php while($row = $result->fetch_assoc()): ?>
            <li>
              <div class="meta">
                <strong><a href="lihat.php?id=<?=htmlspecialchars($row['id'])?>"><?=htmlspecialchars($row['title'])?></a></strong>
              </div>
              <div class="date"><?=htmlspecialchars($row['created_at'])?></div>
              <div class="actions">
                <a href="lihat.php?id=<?=htmlspecialchars($row['id'])?>">Lihat</a> |
                <a href="edit.php?id=<?=htmlspecialchars($row['id'])?>">Edit</a> |
                <a href="delete.php?id=<?=htmlspecialchars($row['id'])?>" onclick="return confirm('Hapus catatan ini?')">Hapus</a>
              </div>
            </li>
          <?php endwhile; ?>
        </ul>
      <?php else: ?>
        <p>Belum ada catatan.</p>
      <?php endif; ?>
    </main>

    <footer>Simple Diary </footer>
  </div>
</body>
</html>
