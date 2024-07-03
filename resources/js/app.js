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
