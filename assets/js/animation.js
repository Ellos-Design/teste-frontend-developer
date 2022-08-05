// Função responsável pelo efeito de Abrir/Fechar as respostas da Sessão Perguntas Frequentes
$(document).ready(function () {
    jQuery(".item-ask").click(function () {

        if($(this).find('.answer').css('display') == 'block') {
            $(this).find('.answer').fadeOut(350);
        } else {
            $('.answer').hide();
            $(this).find('.answer').fadeIn(350);
        }
        s
    })
});

// Função responsável por formatar o número do Telefone
$(document).ready(function() {
    $('#txTel').keyup(function () {
        valueTypedFormatter = $(this).val() // Resgatando valor que está sendo digitado para formatação
        valueTypedFormatter = valueTypedFormatter.replace(/\D/g,""); // Remove qualquer letra do texto
        valueTypedFormatter = valueTypedFormatter.replace(/^(\d{2})(\d)/g,"($1) $2"); // Coloca os ( ) no DDD
        valueTypedFormatter = valueTypedFormatter.replace(/(\d)(\d{4})$/,"$1-$2"); // Coloca o - no telefone

        $(this).val(valueTypedFormatter); // Seta o valor formatado no Input
    }) 
});

const IMAGE_LOOP_LIST = ["loop1.jpg", "loop2.jpg", "loop3.jpg"]

// Função responsavél pela troca de imagens com efeito FadeIn e FadeOut
$(document).ready(function () {
    var i = 0;

    $(".image-about-us").css("background-image", "url(assets/img/" + IMAGE_LOOP_LIST[i] + ")");
    setInterval(function () {
        i++;

        if (i == IMAGE_LOOP_LIST.length) {
            i = 0;
        }

        $(".image-about-us").fadeOut("slow", function () {
            $(this).css("background-image", "url(assets/img/" + IMAGE_LOOP_LIST[i] + ")");
            $(this).fadeIn("slow");
        });
    }, 3000);
});


/*
    Utilizado para otimizar a animação Scroll
    É responsável por disparar as funções definidas com intervalos e não a todo momento
*/
const DEBOUNCE = function(func, wait, immediate) {
    let timeout;

    return function(...args) {
        const CONTEXT = this;
        const LATER = function () {
            timeout = null;

            if(!immediate) func.apply(CONTEXT, args);
        };

        const CALL_NOW = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(LATER, wait);
        if(CALL_NOW) func.apply(CONTEXT, args);
    }
}

const ANIMATION_CLASS_NAME = 'animate';

// Função responsável pela animação do Scroll
function animationScroll() {
    const windowTop = window.pageYOffset + window.innerHeight * 0.9;

    $('[scroll-anim]').each(function(index, element){
        if((windowTop) > element.offsetTop) {
            $(element).addClass(ANIMATION_CLASS_NAME);
        } else {
            $(element).removeClass(ANIMATION_CLASS_NAME);
        }

        console.log(element);
    });
}

$(document).on('scroll', DEBOUNCE(function() {
    animationScroll();
}, 50));

animationScroll();