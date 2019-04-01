$(document).ready(function () {
    $('.col-md-6').hover(
        function () {
            $(this).animate({
                marginTop: "+3%",
            },500);
            $(this).find('img').animate({
                'opacity': '0.8',
                'filter': 'blur(5px)'
            },500)
        }
        ,
        function () {
            $(this).animate({
                marginTop: "0%",
            },200);
            $(this).find('img').animate({
                'opacity': '1',
                'filter': 'blur(0)'
            },200)
        }
    )
});
