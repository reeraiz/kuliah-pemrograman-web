<?php
require 'koneksi.php';

$id = intval($_GET['id'] ?? 0);
if ($id <= 0) {
    header('Location: index.php');
    exit;
}

$stmt = $mysqli->prepare("SELECT id, title, content FROM entries WHERE id = ?");
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
  <title>Edit: <?=htmlspecialchars($entry['title'])?></title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <header>
      <h1>Edit Catatan</h1>
      <nav><a href="lihat.php?id=<?=$entry['id']?>">← Kembali</a></nav>
    </header>

    <main>
      <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?=htmlspecialchars($entry['id'])?>">
        
        <label>Judul
          <input type="text" name="title" required maxlength="255" 
                 value="<?=htmlspecialchars($entry['title'])?>">
        </label>

        <label>Isi Catatan
          <textarea name="content" rows="8" required><?=htmlspecialchars($entry['content'])?></textarea>
        </label>

        <button type="submit" class="btn">Perbarui</button>
      </form>
    </main>

    <footer>Diary • edit</footer>
  </div>
</body>
</html>
