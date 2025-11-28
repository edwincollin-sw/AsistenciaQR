$(document).ready(function () {
    $("#frmAcceso").on('submit', function (e) {
        e.preventDefault();

        let logina = $("#logina").val().trim();
        let clavea = $("#clavea").val().trim();

        if (logina === "" || clavea === "") {
            document.activeElement.blur();
            bootbox.alert("Asegúrate de llenar todos los campos");
            return;
        }

        $.post("../controlador/Usuario.php?op=verificar",
            { logina: logina, clavea: clavea },
            function (response) {
                let data;
                try {
                    data = typeof response === "object" ? response : JSON.parse(response);
                } catch (error) {
                    console.error("Respuesta servidor:", response);
                    bootbox.alert("Error inesperado en el servidor.");
                    return;
                }

                if (data.status === "ok") {
                    window.location.href = "escritorio.php";
                } else {
                    document.activeElement.blur();
                    bootbox.alert("Usuario y/o contraseña incorrectos");
                }
            }
        );
    });
});
