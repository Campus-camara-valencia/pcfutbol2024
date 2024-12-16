// Función de validación
function validateForm() {
    const email = document.getElementById("email").value;
    const password = document.getElementById("pass").value;

    // Validación de email
    if (!/\S+@\S+\.\S+/.test(email)) {
        alert("Por favor, introduce un correo electrónico válido.");
        return false;
    }

    // Validación de contraseña
    if (password.trim() === "") {
        alert("La contraseña no puede estar vacía.");
        return false;
    }
    return true;
}

// Redirigir a ...
document.getElementById("inicio").addEventListener("click", function () {
    if (validateForm()) {
        document.getElementById("algunLugar").submit();
    }
});

