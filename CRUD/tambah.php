<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Tambah Catatan — Diary</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <header>
      <h1>Tambah Catatan</h1>
      <nav><a href="index.php">← Kembali</a></nav>
    </header>

    <main>
      <form action="simpan.php" method="post">
        <label>Judul
          <input type="text" name="title" required maxlength="255">
        </label>
        
        <label>Isi Catatan
          <textarea name="content" rows="8" required></textarea>
        </label>

        <button type="submit" class="btn">Simpan</button>
      </form>
    </main>

    <footer>Diary • tambah catatan</footer>
  </div>
</body>
</html>
