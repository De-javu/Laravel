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

/***********************************************DICCIONARIOS DE ETEERMINOS UTILIZADOS EN EL PROYECTO**************************************/
/*
var url = 'http://localhost:8080/proyecto-laravel/public'; //?url del proyecto
var //? Se uriliza para declara variables 
window.addEventListener('load', function () { //? se utiliza para cargar la pagina

    $('.btn-like').css('cursor', 'pointer'); //? Se utiliza para brindar estilo y diseño a los botones de like
    $('.btn-deslike').css('cursor', 'pointer'); //? Se utiliza para brindar estilo y diseño a los botones de dislike.

     function like() { //? Se utiliza para dar like a una publicación
        $('.btn-like').unbind('click').click(function () { //? Se utiliza para desactivar el evento click
            var $this = $(this); //? Se utiliza para declarar una variable
            $this.addClass('btn-deslike').removeClass('btn-like'); //? Se utiliza para agregar una clase y quitar otra
            $this.attr('src', url+'/imagenes/heart-red.png'); //? Se utiliza para agregar un atributo 
            
            $.ajax({ //? Se utiliza para hacer una solicitud ajax
                url: url + '/like/' + $this.data('id'),  //? Se utiliza para agregar una url
                type: 'GET', //? Se utiliza para agregar un tipo de solicitud
                success: function (response) {  //? Se utiliza para agregar una funcion de exito
                    if (response.like) { //? Se utiliza para agregar una condicion
                        console.log('Has dado like a la publicación'); //? Se utiliza para imprimir un mensaje en consola
                    } else {    //? Se utiliza para agregar una condicion
                        console.log('Error al dar like');   //? Se utiliza para imprimir un mensaje en consola
                    }
                },
                error: function (xhr, status, error) {  //? Se utiliza para agregar una funcion de error
                    console.error('Error en la solicitud AJAX:', error); //? Se utiliza para imprimir un mensaje en consola
                }
            });
            
            deslike();  //? Se utiliza para dar dislike
        });
    }

     function deslike() { //? Se utiliza para dar dislike a una publicación
        $('.btn-deslike').unbind('click').click(function () { //? Se utiliza para desactivar el evento click
            var $this = $(this); //? Se utiliza para declarar una variable
            console.log('deslike'); //? Se utiliza para imprimir un mensaje en consola
            $this.addClass('btn-like').removeClass('btn-deslike'); //? Se utiliza para agregar una clase y quitar otra
            $this.attr('src', url+'/imagenes/black-heart.png'); //? Se utiliza para agregar un atributo

            $.ajax({ //? Se utiliza para hacer una solicitud ajax
                url: url + '/deslike/' + $this.data('id'), //? Se utiliza para agregar una url 
                type: 'GET',    //? Se utiliza para agregar un tipo de solicitud
                success: function (response) { //? Se utiliza para agregar una funcion de exito
                    if (!response.like) { //? Se utiliza para agregar una condicion
                        console.log('Has dado deslike a la publicación'); //? Se utiliza para imprimir un mensaje en consola
                    } else {   //? Se utiliza para agregar una condicion
                        console.log('Error al dar deslike');    //? Se utiliza para imprimir un mensaje en consola
                    }
                },
                error: function (xhr, status, error) { //? Se utiliza para agregar una funcion de error
                    console.error('Error en la solicitud AJAX:', error); //? Se utiliza para imprimir un mensaje en consola
                }   
            });

            like();  //? Se utiliza para dar like
        });
    }

    like(); //? Se utiliza para dar like
    deslike(); //? Se utiliza para dar dislike
}
*/
