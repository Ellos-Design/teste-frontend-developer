const btnMobile = document.getElementById('btn-mobile');

//Expandir menu
function toggleMenu() {
  const nav = document.querySelector('.menu-nav')
  nav.classList.toggle('active')
}

btnMobile.addEventListener('click', toggleMenu);
