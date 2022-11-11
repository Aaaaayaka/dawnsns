$(function (){
    $('.btn-primary').each(function (){
        $(this).on('click', function (){
            var target = $(this).data('target');
            var modal = document.getElementById(target);
            console.log(target);
            $(modal).fadeIn();
            return false;
        });
    });
    $('.btn-primary').on('click', function(){
        $('.js-modal').fadeOut();
        return false;
    });
});


$(function(){
    $('.sub_menu').hide();
    $('.main_menu').click(function(){
     $('ul.sub_menu').slideUp();
     $('.main_menu').removeClass('open');
     if($('+ul.sub_menu',this).css('display') == 'none'){
      $('+ul.sub_menu',this).slideDown();
      $(this).addClass('open');
     }
    });
   });
