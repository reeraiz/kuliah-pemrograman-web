# Pertemuan 4
folder ini berisi gallery dan kode analisanya

## Bagian Html

### Memasukkan gambar
```html
<ul class="gallery">
  <li class="gallery-item"><img src="img/fian.jpg" alt="image 1" /></li>
  <li class="gallery-item"><img src="img/asaden.jpg" alt="image 2" /></li>
  <li class="gallery-item"><img src="img/rezeye.jpg" alt="image 3" /></li>
  <li class="gallery-item"><img src="img/mh.jpg" alt="image 4" /></li>
  <li class="gallery-item"><img src="img/ae86.jpg" alt="image 5" /></li>
  <li class="gallery-item"><img src="img/anya.jpg" alt="image 6" /></li>
  <li class="gallery-item"><img src="img/r32.jpg" alt="image 7" /></li>
  <li class="gallery-item"><img src="img/yoruu.jpg" alt="image 8" /></li>
  <li class="gallery-item"><img src="img/smartasa.jpg" alt="image 9" /></li>
  <li class="gallery-item"><img src="img/lild.jpg" alt="image 10" /></li>
  <li class="gallery-item"><img src="img/wni.jpg" alt="image 11" /></li>
  <li class="gallery-item"><img src="img/aqudate.jpg" alt="image 12" /></li>
  <li class="gallery-item"><img src="img/irham.jpg" alt="image 13" /></li>
  <li class="gallery-item"><img src="img/kaguya.jpg" alt="image 14" /></li>
  <li class="gallery-item"><img src="img/reze1.jpg" alt="image 15" /></li>
  <li class="gallery-item"><img src="img/casto.jpg" alt="image 16" /></li>
  <li class="gallery-item"><img src="img/ojik.jpg" alt="image 17" /></li>
  <li class="gallery-item"><img src="img/mewing.jpg" alt="image 18" /></li>
  <li class="gallery-item"><img src="img/yuji.jpg" alt="image 19" /></li>
  <li class="gallery-item"><img src="img/cursedskull.jpg" alt="image 20" /></li>
  <li class="gallery-item"><img src="img/dd.jpg" alt="image 21" /></li>
  <li class="gallery-item"><img src="img/licht.jpg" alt="image 22" /></li>
  <li class="gallery-item"><img src="img/rezeup.jpg" alt="image 23" /></li>
  <li class="gallery-item"><img src="img/sybau.jpg" alt="image 24" /></li>
  <li class="gallery-item"><img src="img/yuki.jpg" alt="image 25" /></li>
  <li class="gallery-item"><img src="img/menwho.jpg" alt="image 26" /></li>
</ul>
```
Menggunakan ul atau unordered list dengan class gallery yang didalamnya terdapat li atau list item yang digunakan untuk mengisi gambar sesuai list dengan class bernama gallery item disertai img src yang akan memanggil file gambar yang ditampilkan kemudian mengubah namanya menjadi image 1 untuk dimasukkan ke dalam data.

## Bagian CSS
### Mengatur tampilan gallery
```css
.gallery {
margin: 0;
padding: 20px;
column-count: 4;
column-gap: 1.2rem;
}
```
- margin: 0; = membuat agar tidak ada jarak di luar galeri.
- padding: 20px; = memberi ruang 20px di dalam kontainer galeri.
- column-count: 4; = membagi konten menjadi 4 kolom.
- column-gap: 1.2rem; = memberi jarak antar kolom sebanyak 1.2rem.

### Card/blok untuk isi gallery
```css
.gallery-item {
list-style: none;
margin: 0 0 1.2rem;
break-inside: avoid;
border-radius: 12px;
overflow: hidden;
background: #222;
box-shadow: 0 4px 10px rgba(0,0,0,0.4);
}
```
- list-style: none; = menghilangkan angka (jika ini <li>) agar tampilan lebih bersih.
- margin: 0 0 1.2rem; = menjaga jarak bawah 1.2rem antar item.
- break-inside: avoid; = mencegah item pecah saat pindah kolom.
- border-radius: 12px; = membuat sudut item membulat 12px.
- overflow: hidden; = mengubah agar konten yang melewati batas item dipotong.
- background: #222; = membuat background gelap pada item.
- box-shadow: 0 4px 10px rgba(0,0,0,0.4); = membuat bayangan halus di belakang objek.

### Mengatur gambar
```css
img {
display: block;
width: 100%;
height: auto;
border-radius: 12px;
transition: transform 0.4s, box-shadow 0.4s;
}
```
- display: block; = membuat gambar jadi elemen blok penuh.
- width: 100%; = mengubah gambar agar menyesuaikan lebar container.
- height: auto; = mengatur tinggi otomatis supaya proporsinya tetap.
- border-radius: 12px; = agar sudut gambar membulat.
- transition: transform 0.4s, box-shadow 0.4s; = menampilkan animasi yang halus saat gambar di-hover.

### Efek hover gambar
```css
img:hover {
transform: scale(1.05);
box-shadow: 0 8px 20px rgba(255,255,255,0.4);
}
```
- transform: scale(1.05); = membuat gambar sedikit membesar saat kursor berada di atasnya.
- box-shadow: 0 8px 20px rgba(255,255,255,0.4); = membuat bayangan putih muncul saat di hover.

### Mengatur kolom
```css
@media (max-width: 1200px) {
.gallery {
column-count: 3;
}
}
@media (max-width: 900px) {
.gallery {
column-count: 2;
}
}
@media (max-width: 600px) {
.gallery {
column-count: 1;
}
}
```

mengatur kolom gambar sesuai ukuran layar
- layar ≤1200px → kolom jadi 3.
- layar ≤900px → kolom jadi 2.
- layar ≤600px → kolom jadi 1.
>>>>>>> b4a259fbc625c50cc71eecf934cdee434814baf1
