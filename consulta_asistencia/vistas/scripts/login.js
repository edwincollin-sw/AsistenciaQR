$("#frmAcceso").on('submit', function (e) {
    e.preventDefault();

    let logina = $("#logina").val();
    let clavea = $("#clavea").val();

    // Validar campos vacíos
    if (logina === "" || clavea === "") {
        document.activeElement.blur();  // Evita warning aria-hidden
        bootbox.alert("Asegúrate de llenar todos los campos");
        return;
    }

    // Enviar credenciales al backend
    $.post("../controlador/Usuario.php?op=verificar",
        { logina: logina, clavea: clavea },
        function (response) {

            let data;

            // Intentar leer JSON válido
            try {
                data = JSON.parse(response);
            } catch (error) {
                console.error("Respuesta del servidor:", response);
                document.activeElement.blur();
                bootbox.alert("Error inesperado en el servidor.");
                return;
            }

            // Procesar respuesta del servidor
            if (data.status === "ok") {
                // Login correcto
                window.location.href = "escritorio.php";
            } else {
                // Credenciales incorrectas
                document.activeElement.blur();  // Evita warning aria-hidden
                bootbox.alert("Usuario y/o contraseña incorrectos");
            }
        }
    );
});
