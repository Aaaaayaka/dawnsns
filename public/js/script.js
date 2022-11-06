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
