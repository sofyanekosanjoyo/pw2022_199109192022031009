const tombolCari = document.querySelector('.tombol-cari');
const kataKunci = document.querySelector('.kata-kunci');
const container = document.querySelector('.container');

// Hilangkan tombol cari
tombolCari.style.display = 'none';

// Event ketika kita menuliskan kata kunci
kataKunci.addEventListener('keyup', function(){
  // console.log('Oke!');

//   // TEKNIK PERTAMA (AJAX)
//   // Ajax
//   // XMLHttpRequest
//   const xhr = new XMLHttpRequest();

//   xhr.onreadystatechange = function () {
//     if(xhr.readyState == 4 && xhr.status == 200){
//       // console.log('Oke!');
//       // console.log(xhr.responseText);
//       container.innerHTML = xhr.responseText;

//     }
//   };

// xhr.open('get','ajax/ajax_cari.php?kataKunci=' + kataKunci.value);
// xhr.send();


// Fetch()
fetch('ajax/ajax_cari.php?kataKunci=' + kataKunci.value)
.then((response) => response.text())
.then((response) => (container.innerHTML = response));
});

// Preview Gambar untuk Tambah dan Ubah Data
function previewGambar() 
{
  const gambar = document.querySelector('.gambar');
  const previewGambar = document.querySelector('.preview-gambar');

  const oFReader = new FileReader();
  oFReader.readAsDataURL(gambar.files[0]);

  oFReader.onload = function (oFREvent){
    previewGambar.src = oFREvent.target.result;
  };
}