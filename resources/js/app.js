import './bootstrap';

// Menetapkan mode gelap sesuai preferensi pengguna
function setDarkMode() {
    const isDark = localStorage.theme === 'dark' || 
        (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches);

    document.documentElement.classList.toggle('dark', isDark);
}

// Panggil saat halaman dimuat
setDarkMode();

// Pastikan tetap gelap setelah navigasi di Livewire
document.addEventListener('livewire:navigated', setDarkMode);

// Hapus class nprogress-busy setelah Livewire memproses request
Livewire.hook("message.processed", () => {
    document.documentElement.classList.remove("nprogress-busy");
});


// OPEN MENU SIDEBAR
document.addEventListener('alpine:init', () => {
    Alpine.store('openSide', true);
});




// END OPEN MENU SIDEBAR

// function avatarComponent() {
//  return {
//      previewUrl: 'https://via.placeholder.com/128', // Placeholder image URL
//      updatePreview(event) {
//          const file = event.target.files[0]; // Ambil file yang dipilih
//          if (file) {
//              const reader = new FileReader(); // Buat FileReader baru
//              reader.onload = (e) => {
//                  this.previewUrl = e.target.result; // Update previewUrl dengan URL data
//              };
//              reader.readAsDataURL(file); // Baca file sebagai URL data
//          }
//      }
//  };
// }

// document.addEventListener('alpine:init', () => {
//  Alpine.data('avatarComponent', avatarComponent); // Inisialisasi komponen Alpine.js
// });
