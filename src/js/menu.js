$(document).ready(function () {
    var currentId = $('div.hidden').data('currentid');
    $('li').removeClass('active');
    $('li').find('a').removeClass('text-white');
    $('li').find('a').addClass('text-secondary');
    $('[data-li=' + currentId + ']').addClass('active');
    $('[data-li=' + currentId + ']').find('a').addClass('text-white');
    $('[data-li=' + currentId + ']').find('a').removeClass('text-secondary');
});

