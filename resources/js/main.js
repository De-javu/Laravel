var url = 'http://localhost:8080/proyecto-laravel/public';
window.addEventListener('load', function () {
    // Establecer el cursor para los botones de like y dislike
    $('.btn-like').css('cursor', 'pointer');
    $('.btn-deslike').css('cursor', 'pointer');

    function like() {
        $('.btn-like').unbind('click').click(function () {
            var $this = $(this);
            $this.addClass('btn-deslike').removeClass('btn-like');
            $this.attr('src', url+'/imagenes/heart-red.png');
            
            $.ajax({
                url: url + '/like/' + $this.data('id'),
                type: 'GET',
                success: function (response) {
                    if (response.like) {
                        console.log('Has dado like a la publicación');
                    } else {
                        console.log('Error al dar like');
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error en la solicitud AJAX:', error);
                }
            });
            
            deslike();
        });
    }

    function deslike() {
        $('.btn-deslike').unbind('click').click(function () {
            var $this = $(this);
            console.log('deslike');
            $this.addClass('btn-like').removeClass('btn-deslike');
            $this.attr('src', url+'/imagenes/black-heart.png');

            $.ajax({
                url: url + '/deslike/' + $this.data('id'),
                type: 'GET',
                success: function (response) {
                    if (!response.like) {
                        console.log('Has dado deslike a la publicación');
                    } else {
                        console.log('Error al dar deslike');
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error en la solicitud AJAX:', error);
                }
            });

            like();
        });
    }

    // Inicializar las funciones de like y dislike
    like();
    deslike();
});