const signUpButton = document.getElementById("signUp");
const signInButton = document.getElementById("signIn");

//Variables que contienen expresiones regulares
var nomEx = /^[a-zA-ZÀ-ÿ]{3,40}$/;
var apeEx = /^[a-zA-ZÀ-ÿ]{3,40}$/;
var emailEx = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]{1,60}$/;
var telEx = /^\d{9,12}$/;
var nomusEx = /^[a-zA-ZÀ-ÿ]{6,20}$/;
var passEx = /^[a-zA-ZÀ-ÿ]{8,20}$/

signUpButton.addEventListener("click", () => {
    container.classList.add("right-panel-active");
});

signInButton.addEventListener("click", () => {
    container.classList.remove("right-panel-active");
});

$(document).ready(function() {
    $("#btnEnviar").click(function () {
        var nombre = $("#nombre").val();
        var apellido = $("#apellido").val();
        var email = $("#email").val();
        var dni = $("#dni").val();
        var telefono = $("#cel").val();
        var domicilio = $("#domicilio").val();
        var fechaNac = $("#fechaNac").val();
        var nomUsuario = $("#username").val();
        var password = $("#password").val();
        
        if (nombre == "" || !nomEx.test(nombre)) {
            $("#mensaje1").fadeIn();
            return false;
        } else {
            $("#mensaje1").fadeOut();
            if (apellido == "" || !apeEx.test(apellido)) {
                $("#mensaje2").fadeIn();
                return false;
            } else {
                $("#mensaje2").fadeOut();
                if (email == "" || !emailEx.test(email)) {
                    $("#mensaje3").fadeIn();
                    return false;
                } else {
                    $("#mensaje3").fadeOut();
                    if (dni == "") {
                        $("#mensaje4").fadeIn();
                        return false;
                    } else {
                        $("#mensaje4").fadeOut();
                        if (telefono == "" || !telEx.test(telefono)) {
                            $("#mensaje5").fadeIn();
                            return false;
                        } else {
                            $("#mensaje5").fadeOut();
                            if (domicilio == "") {
                                $("#mensaje6").fadeIn();
                                return false;
                            } else {
                                $("#mensaje6").fadeOut();
                                if (fechaNac == "") {
                                    $("#mensaje7").fadeIn();
                                    return false;
                                } else {
                                    $("#mensaje7").fadeOut();
                                    if (nomUsuario == "" || !nomusEx.test(nomUsuario)) {
                                        $("#mensaje8").fadeIn();
                                        return false;
                                    } else {
                                        $("#mensaje8").fadeOut();
                                        if (password == "" || !passEx.test(password)) {
                                            $("#mensaje9").fadeIn();
                                            return false;
                                        } else {
                                            $("#mensaje9").fadeOut();
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    });
});
