AOS.init();

$(document).ready(function(){

    //sticky header
    $(window).scroll(function(){
        if(this.scrollY > 20){
            $('.navbar').addClass('sticky');
        }else{
            $('.navbar').removeClass('sticky')
        }
        if(this.scrollY > 20){
            $('.scroll-up-btn').addClass('show');
        }else{
            $('.scroll-up-btn').removeClass('show');
        }
    });

    // slide-up script
    $('.scroll-up-btn').click(function(){
        $('html').animate({scrollTop: 0});
    });

    //Accordion open/close/next
    $('.accordion-header').click(function(){
        if($(this).next('.accordion-body').hasClass('active')){
            $(this).next('.accordion-body').removeClass('active').slideUp();
            $(this).children('i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
        }else{
            $('.accordion-group .accordion-body').removeClass('active').slideUp();
            $('.accordion-group .accordion-body .accordion-header #icon').removeClass('fa-chevron-up').addClass('fa-chevron-down');
            $(this).next('.accordion-body').addClass('active').slideDown();
            $(this).children('i').removeClass('fa-chevron-down').addClass('fa-chevron-up')
        };

    });

});