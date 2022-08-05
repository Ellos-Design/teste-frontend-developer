// Loader Page
const overlay = document.querySelector('.ring-bg');
const count = document.querySelector('.ring-count');
const target = +count.getAttribute('data-target');
const btnSubmit = document.querySelector('.btn');

function countTo() {
  //transformando count de string para number
  let from = +count.innerText;
  let to = target;
  let step = to > from ? 1 : -1;
  let interval = 15;


  if (from == to) {
    count.textContent = from;
    return;
  }
  
  //Adicionando tempo de carregamento
  let counter = setInterval(() => {
    from += step;
    count.textContent = from + '%';
    if (from === to) {
      clearInterval(counter);
      overlay.style.display = 'none';
    }
  }, interval);
}

//Quando a pagina carregar, o pre loader sera ativado
window.addEventListener('load', () => {
  countTo()
});

