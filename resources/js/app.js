import './bootstrap';
        
// DARK MODE TOGGLE BUTTON
(function() {
 const setDarkClass = () => {
  const isDark = localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
   '(prefers-color-scheme: dark)').matches);
  if (isDark) {
   document.documentElement.classList.add('dark');
  } else {
   document.documentElement.classList.remove('dark');
  }
 };
 setDarkClass();
 window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', setDarkClass);
})();
// END DARK MODE TOGGLE BUTTON
// OPEN MENU SIDEBAR
document.addEventListener('alpine:init', () => {
 Alpine.store('openSide', true)
})
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
