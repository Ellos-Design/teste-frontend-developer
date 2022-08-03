const accordion = document.getElementsByClassName('faq-acordion-content');


for (i = 0; i < accordion.length; i++) {

  // não utilizar THIS em arrow function, pois this se tornara WINDOW
  accordion[i].addEventListener('click', function () {
    this.classList.toggle('active');
  });
}
