
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
});
//Variables que contienen expresiones regulares
var nomEx = /^[a-zA-ZÀ-ÿ]{3,40}$/;
var apeEx = /^[a-zA-ZÀ-ÿ]{3,40}$/;
var emailEx = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]{1,60}$/;
var telEx = /^\d{9,12}$/;
var nomusEx = /^[a-zA-ZÀ-ÿ]{6,20}$/;
var passEx = /^[a-zA-ZÀ-ÿ]{8,20}$/

$(document).ready(function () {
    $("#btnEnviar").click(function () {
        event.preventDefault() 
        var nombre = $("#nombre").val();
        var apellido = $("#apellido").val();
        var email = $("#email").val();
        var dni = $("#dni").val();
        var telefono = $("#telefono").val();
        var domicilio = $("#domicilio").val();
        var fechaNac = $("#fechaNac").val();
        var nomUsuario = $("#username").val();
        var password = $("#password").val();

        if (nombre == "" || !nomEx.test(nombre)) {
            $('#button-addon1').css('display', 'inline-block');
            $('#nombre').css("border-bottom-color", "#F14B4B");
            var Mensaje = "No se puede dejar el campo vacio o conter numeros";
            $('#error-nombre').attr('title', Mensaje);
            $(function () {
                $('[data-bs-toggle="tooltip"]').tooltip()
            });
        } else {
            $('#button-addon1').css('display', 'none');
            $('#nombre').css("border-bottom", "1px solid #fff");
        };
        if (apellido == "" || !apeEx.test(apellido)) {
            $('#button-addon2').css('display', 'inline-block');
            $('#apellido').css("border-bottom-color", "#F14B4B");
            var Mensaje = "No se puede dejar el campo vacio o conter numeros";
            $('#error-apellido').attr('title', Mensaje);
            $(function () {
                $('[data-bs-toggle="tooltip"]').tooltip()
            });
        } else {
            $('#button-addon2').css('display', 'none');
            $('#apellido').css("border-bottom", "1px solid #fff");
        };
        if (email == "" || !emailEx.test(email)) {
            $('#button-addon3').css('display', 'inline-block');
            $('#email').css("border-bottom-color", "#F14B4B");
            var Mensaje = "Correo invalido";
            $('#error-email').attr('title', Mensaje);
            $(function () {
                $('[data-bs-toggle="tooltip"]').tooltip()
            });
        } else {
            $('#button-addon3').css('display', 'none');
            $('#email').css("border-bottom", "1px solid #fff");
        };
        if (dni == "") {
            $('#button-addon4').css('display', 'inline-block');
            $('#dni').css("border-bottom-color", "#F14B4B");
            var Mensaje = "Ingrese un DNI valido";
            $('#error-dni').attr('title', Mensaje);
            $(function () {
                $('[data-bs-toggle="tooltip"]').tooltip()
            });
        } else {
            $('#button-addon4').css('display', 'none');
            $('#dni').css("border-bottom", "1px solid #fff");
        };
        if (telefono == "" || !telEx.test(telefono)) {
            $('#button-addon5').css('display', 'inline-block');
            $('#telefono').css("border-bottom-color", "#F14B4B");
            var Mensaje = "Ingrese un celular valido";
            $('#error-telefono').attr('title', Mensaje);
            $(function () {
                $('[data-bs-toggle="tooltip"]').tooltip()
            });
        } else {
            $('#button-addon5').css('display', 'none');
            $('#telefono').css("border-bottom", "1px solid #fff");
        };
        if (domicilio == "") {
            $('#button-addon6').css('display', 'inline-block');
            $('#domicilio').css("border-bottom-color", "#F14B4B");
            var Mensaje = "Ingrese un domicilio valido";
            $('#error-domicilio').attr('title', Mensaje);
            $(function () {
                $('[data-bs-toggle="tooltip"]').tooltip()
            });
        } else {
            $('#button-addon6').css('display', 'none');
            $('#domicilio').css("border-bottom", "1px solid #fff");
        };
        if (fechaNac == "") {
            $('#button-addon7').css('display', 'inline-block');
            $('#fechaNac').css("border-bottom-color", "#F14B4B");
            var Mensaje = "Ingrese un Fecha de Nacimiento valido";
            $('#error-fechaNac').attr('title', Mensaje);
            $(function () {
                $('[data-bs-toggle="tooltip"]').tooltip()
            });
        } else {
            $('#button-addon7').css('display', 'none');
            $('#fechaNac').css("border-bottom", "1px solid #fff");
        };
        if (nomUsuario == "" || !nomusEx.test(nomUsuario)) {
            $('#button-addon8').css('display', 'inline-block');
            $('#username').css("border-bottom-color", "#F14B4B");
            var Mensaje = "Ingrese un Usuario";
            $('#error-username').attr('title', Mensaje);
            $(function () {
                $('[data-bs-toggle="tooltip"]').tooltip()
            });
        } else {
            $('#button-addon8').css('display', 'none');
            $('#username').css("border-bottom", "1px solid #fff");
        };
        if (password == "" || !passEx.test(password)) {
            $('#button-addon9').css('display', 'inline-block');
            $('#password').css("border-bottom-color", "#F14B4B");
            var Mensaje = "Ingrese una contraceña valida";
            $('#error-password').attr('title', Mensaje);
            $(function () {
                $('[data-bs-toggle="tooltip"]').tooltip()
            });
        } else {
            $('#button-addon9').css('display', 'none');
            $('#password').css("border-bottom", "1px solid #fff");
        };
    });
});