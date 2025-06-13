const events = [
  {
    nama: "for Revenge – Camden Surabaya presents",
    tanggal: "Jumat, 20 Juni 2025",
    tempat: "Surabaya",
    gambar: "img/camden.jpg"
  },
  {
    nama: "NDX AKA - Grebeg Besar Demak 2025",
    tanggal: "Jumat, 13 Juni 2025",
    tempat: "Demak",
    gambar: "img/ndx.jpg"
  },
  {
    nama: "Last Child 2025",
    tanggal: "Jumat, 22 Juni 2025",
    tempat: "Lampung",
    gambar: "img/LastChild.jpg"
  },
  {
    nama: "Rebellion Rose 2025",
    tanggal: "Minggu, 24 Agustus 2025",
    tempat: "Medan",
    gambar: "img/RR.jpg"
  },
  {
    nama: "Juicy Luicy - Sound Of DownTown 2025",
    tanggal: "1,2,3 Agustus 2025",
    tempat: "Surabaya",
    gambar: "img/JL.jpg"
  },
  {
    nama: "Yovie & Nuno - Veteran Cup Festival 2025",
    tanggal: "Sabtu, 13 September 2025",
    tempat: "Yogyakarta",
    gambar: "img/YN.jpg"
  },
  {
    nama: "The Lantis - Ecophoria 2025",
    tanggal: "Kamis, 3 Juli 2025",
    tempat: "Pekalongan",
    gambar: "img/TheLantis.jpg"
  },
  {
    nama: "Feast - Soundria Feast.2.0",
    tanggal: "Sabtu, 14 Juni 2025",
    tempat: "Batam",
    gambar: "img/feast.jpg"
  }
];

const rowAtas = document.getElementById('row-atas');
const rowBawah = document.getElementById('row-bawah');

events.slice(0, 4).forEach(ev => {
  const col = document.createElement('div');
  col.className = 'col-md-3'; // 4 per baris = 12 / 4 = 3
  col.innerHTML = `
  <div class="card mb-4 shadow-sm h-100">
    <img src="${ev.gambar}" class="card-img-top" alt="${ev.nama}">
    <div class="card-body d-flex flex-column">
      <h5 class="card-title">${ev.nama}</h5>
      <p class="card-text">${ev.tanggal} - ${ev.tempat}</p>
      <div class="mt-auto">
        <a href="beli_tiket.php?event=${encodeURIComponent(ev.nama)}" class="btn btn-konser">Beli Tiket</a>
      </div>
    </div>
  </div>
`;
  rowAtas.appendChild(col);
});

events.slice(4, 8).forEach(ev => {
  const col = document.createElement('div');
  col.className = 'col-md-3';
  col.innerHTML = `
  <div class="card mb-4 shadow-sm h-100">
    <img src="${ev.gambar}" class="card-img-top" alt="${ev.nama}">
    <div class="card-body d-flex flex-column">
      <h5 class="card-title">${ev.nama}</h5>
      <p class="card-text">${ev.tanggal} - ${ev.tempat}</p>
      <div class="mt-auto">
        <a href="beli_tiket.php?event=${encodeURIComponent(ev.nama)}" class="btn btn-konser">Beli Tiket</a>
      </div>
    </div>
  </div>
`;
  rowBawah.appendChild(col);
});