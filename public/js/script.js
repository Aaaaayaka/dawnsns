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
    $('.sub-menu').hide();
    $('.main-menu').click(function(){
     $('ul.sub-menu').slideUp();
     $('.main-menu').removeClass('open');
     if($('+ul.sub-menu',this).css('display') == 'none'){
      $('+ul.sub-menu',this).slideDown();
      $(this).addClass('open');
     }
    });
});

$(function (){
    $('.arrow-btn').click(function (){
        $(this).toggleClass('active');
        if ($(this).hasClass('active')){
            $('.sub-menu').addClass('active');
        } else {
            $('.sub-menu').removeClass('active');
        }
    });
});

// $(function(){
//     $(".trash-image").hover(
//     function(){
//         $(".trash-image").fadeOut('slow');
//         $(".trash-hidden").fadeIn('slow');
//     },
//     function() {
//         $(".trash-hidden").fadeOut('slow');
//         $(".trash-image").fadeIn('slow');
//     });
// });