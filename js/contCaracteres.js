const msg = document.querySelector('#mensagem');
const limitMsg = document.querySelector('#limitMsg');

//Enquanto o usuário estiver digitando, ira mostra no rodape do textarea
//quantos caracteres faltam para atingir o maximo de caracteres permitido
msg.addEventListener('keypress', function (e) {
  const inputLength = msg.value.length;
  const maxChars = 500;
  let restante = maxChars - inputLength;
  if (inputLength >= maxChars) {
    e.preventDefault();
    console.log(inputLength)
    limitMsg.style.color = 'red'
  }
  limitMsg.innerHTML = restante;
});
