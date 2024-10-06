window.addEventListener('load', function () {
    // boton like
    $('.btn-like').css('cursor', 'pointer');
    $('.btn-dislike').css('cursor', 'pointer');

    function like() {
        $('.btn-like').unbind('click').click(function () {
            $(this).addClass('btn-dislike').removeClass('btn-like');
            $(this).attr('src', 'img/heart-red.png');
            deslike();
        });

    }
    like();


    function dislike() {
        $('.btn-deslike').unbind('click').click(function () {
            console.log('dislike');
            $(this).addClass('btn-like').removeClass('btn-deslike');
            $(this).attr('src', 'img/black-heart.png');
            deslike();
        })

    }
    like();
});