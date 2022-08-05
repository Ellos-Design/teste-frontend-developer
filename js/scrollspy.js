const section = document.querySelectorAll('section');
const link = document.querySelectorAll('.nav-link');
let time = null;

//Verificando e informando ao usuario onde ele esta na tela
function scrollSpy() {
  //Debounce
  clearInterval(time);
  time = setTimeout(() => {
    //Passando por cada secao e verificando a localizacao
    section.forEach((sec) => {
      let top = window.scrollY;
      let offset = sec.offsetTop - 200;
      let height = sec.offsetHeight;
      let id = sec.getAttribute('id');

      if (top > offset && top < offset + height) {
        link.forEach((link) => {
          link.classList.remove('active');
          document
            .querySelector('.nav-link[href*=' + id + ']')
            .classList.add('active');
        });
      }
    });
  }, 300);
}

window.addEventListener('scroll', scrollSpy);
