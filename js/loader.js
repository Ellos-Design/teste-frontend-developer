// Loader Page
const overlay = document.querySelector('.ring-bg');
const count = document.querySelector('.ring-count');
const target = +count.getAttribute('data-target');

function countTo() {
  let from = +count.innerText;
  let to = target;
  let step = to > from ? 1 : -1;
  let interval = 15;

  if (from == to) {
    count.textContent = from;
    return;
  }

  let counter = setInterval(() => {
    from += step;
    count.textContent = from + '%';
    if (from === to) {
      clearInterval(counter);
      overlay.style.display = 'none';
    }
  }, interval);
}

window.addEventListener('load', () => {
  countTo()
});

// for (i = 0; i <= target; i++) {
//   count.innerText = '0';
//   const updateCounter = () => {
//     //Fazendo com que o type saia de String para Number
//     const c = +count.innerText;

//     const increment = target / 250;

//     if (c < target) {
//       count.innerText = `${Math.ceil(c + increment)}`;
//       setTimeout(updateCounter,2000)
//     } else {
//       window.addEventListener('load', () => {
//         overlay.style.display = 'none';
//       });
//     }
//   };
//   updateCounter();
// }

// count.array.forEach((counter) => {
//   counter.innerText = '0';

//   const updateCounter = () => {
//     const target = count.getAttribute('data-target');
//     const c = c + counter.innerText;
//     const increment = target / 2;

//     if (c < target) {
//       count.innerText = `${Math.ceil(c + increment)}`;
//     }
//   };
//   updateCounter();
// });
//Ao carregar a página, o overlay sera desabilitado
