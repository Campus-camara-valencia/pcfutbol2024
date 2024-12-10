$(document).ready(function () {

    // Función para validar los campos
    function inputIsset() {
        let alertaInputs = [];

        // Validar cada campo
        if ($("#email").val().trim() === "") {
            alertaInputs.push("Rellene el campo email");
        }

        if ($("#password").val().trim() === "") {
            alertaInputs.push("Rellene el campo contraseña");
        }

        if ($("#name").val().trim() === "") {
            alertaInputs.push("Rellene el campo nombre");
        }

        if (!isNaN($("#name").val().trim())) {
            alertaInputs.push("Rellene el campo nombre con letras");
        }

        if ($("#birthDate").val().trim() === "") {
            alertaInputs.push("Rellene el campo fecha de nacimiento");
        }

        // Si hay campos vacíos, mostrar alerta
        if (alertaInputs.length > 0) {
            alert("Completa los siguientes campos: " + alertaInputs.join("\n"));
            return false; // Detener el flujo si hay errores
        }

        return true; // Indicar que la validación pasó
    }

    // Manejar el evento de clic en el botón de envío
    $("#send").click(function (event) {
        event.preventDefault(); // Prevenir el envío predeterminado del formulario

        // Ejecutar validaciones
        if (!inputIsset()) {
            return; // Detener si hay errores
        }

        // Capturar valores de los campos
        let name = $("#name").val();
        let email = $("#email").val();
        let birthDate = $("#birthDate").val();
        let password = $("#password").val();

        // Enviar datos con AJAX
        $.ajax({
            type: "POST",
            url: "nombrepagina", // Reemplaza con tu URL de destino
            data: {
                name: name,
                email: email,
                birthDate: birthDate,
                password: password
            },
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    alert(response.message);
                } else {
                    alert(response.error);
                }
            },
            error: function (xhr, status, error) {
                alert("Hubo un error en el envío: " + error);
            }
        });
    });

});
