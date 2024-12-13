$(document).ready(function () {

    // Función para validar los campos
    function validarCampos() {
        let inputIsset = []; // Array para almacenar mensajes de error

        // Validar campo email
        let email = $("#email").val().trim();
        if (email === "") {
            inputIsset.push("Completa el campo email.");
        }

        // Validar campo contraseña
        let password = $("#password").val().trim();
        if (password === "") {
            inputIsset.push("Completa el campo contraseña.");
        }

        // Mostrar errores si los hay
        if (inputIsset.length > 0) {
            alert(inputIsset.join("\n")); // Muestra todos los errores en una sola alerta
            return false; // Detiene el flujo si hay errores
        }

        return true; // Todo está correcto
    }

    // Manejar evento de clic en el botón de envío
    $("#send").click(function (event) {
        event.preventDefault(); // Prevenir el comportamiento predeterminado del botón

        // Validar campos antes de enviar
        if (!validarCampos()) {
            return; // Detener si hay errores
        }

        // Si pasa la validación, recoger los valores
        let email = $("#email").val().trim();
        let password = $("#pass").val().trim();

        // Enviar datos con AJAX
        $.ajax({
            type: "GET",
            url: "./php/login.php", // Reemplaza con tu URL
            data: {
                email: email,
                pass: password,
            },
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    location.href = "home"; // Redirigir si el servidor confirma éxito
                } else {
                    alert(response.error); // Mostrar error si algo falla en el servidor
                }
            },
            error: function (xhr, status, error) {
                alert("Hubo un error al procesar la solicitud: " + error);
            },
        });
    });
});
