const accordion = document.getElementsByClassName('faq-acordion-content');

//Ao adicionar a classe active, o acordion ira mostrar seu conteudo
//Quando o usuario clicar no mesmo acordio, ele ira fechar
for (i = 0; i < accordion.length; i++) {

  // não utilizar THIS em arrow function, pois this se tornara WINDOW
  accordion[i].addEventListener('click', function () {
    this.classList.toggle('active');
  });
}
