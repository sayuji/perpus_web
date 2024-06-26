const modalData = document.getElementById('modalData');
const btnTambah = document.getElementById('btnTambah');
const btnBatal = document.getElementById('btnBatal');
const formKategori = document.getElementById('formKategori');
const tbodyData = document.getElementById('tbodyData');

let dataKategori = []; // Simpan data kategori

// Tampilkan modal tambah data
btnTambah.addEventListener('click', () => {
modalData.style.display = 'block';
document.getElementById('modalTitle').textContent = 'Tambah Data Kategori';
formKategori.reset();
});

// Tutup modal ketika tombol Batal ditekan
btnBatal.addEventListener('click', () => {
modalData.style.display = 'none';
});

// Tampilkan data kategori
function tampilkanData() {
tbodyData.innerHTML = '';
dataKategori.forEach((item, index) => {
  const tr = document.createElement('tr');
  tr.innerHTML = `
    <td>${index + 1}</td>
    <td>${item}</td>
    <td>
      <button class="btn btn-primary btnEdit" data-index="${index}">Edit</button>
      <button class="btn btn-danger btnHapus" data-index="${index}">Hapus</button>
    </td>
  `;
  tbodyData.appendChild(tr);
});
}

// Tambah data kategori
formKategori.addEventListener('submit', (e) => {
e.preventDefault();
const kategori = document.getElementById('kategori').value;
if (kategori.trim() !== '') {
  dataKategori.push(kategori);
  tampilkanData();
  modalData.style.display = 'none';
}
});

// Edit data kategori
tbodyData.addEventListener('click', (e) => {
if (e.target.classList.contains('btnEdit')) {
  const index = e.target.getAttribute('data-index');
  const kategori = dataKategori[index];
  document.getElementById('kategori').value = kategori;
  document.getElementById('modalTitle').textContent = 'Edit Data Kategori';
  modalData.style.display = 'block';

  // Hapus data yang lama
  dataKategori.splice(index, 1);
  tampilkanData();
}
});

// Hapus data kategori
tbodyData.addEventListener('click', (e) => {
if (e.target.classList.contains('btnHapus')) {
  const index = e.target.getAttribute('data-index');
  dataKategori.splice(index, 1);
  tampilkanData();
}
});
