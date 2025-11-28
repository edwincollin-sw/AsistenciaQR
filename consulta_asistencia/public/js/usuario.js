var tabla;

function init() {
    mostrarform(false);
    listar();

    $("#formulario_usuario").on("submit", function(e){
        guardaryeditar(e);
    });
}

function limpiar() {
    $("#nombre").val("");
    $("#apellidos").val("");
    $("#email").val("");
    $("#login").val("");
    $("#clave").val("");
    $("#idusuario").val("");
}

function mostrarform(flag) {
    limpiar();
    if (flag) {
        $("#listadoregistros").hide();
        $("#formularioregistros_usuario").show();
        $("#btnGuardar_usuario").prop("disabled", false);
        $("#btnAgregar").hide();
    } else {
        $("#listadoregistros").show();
        $("#formularioregistros_usuario").hide();
        $("#btnAgregar").show();
    }
}

function cancelarform_usuario() {
    limpiar();
    mostrarform(false);
}

function listar() {
    tabla = $('#tbllistado_usuario').DataTable({
        "ajax": {
            url: '../controlador/Usuario.php?op=listar',
            type: "get",
            dataType: "json",
            error: function (e) {
                console.log("ERROR listar:", e.responseText);
            }
        },
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });
}

function guardaryeditar(e) {
    e.preventDefault();
    $("#btnGuardar_usuario").prop("disabled", true);

    var formData = new FormData($("#formulario_usuario")[0]);

    $.ajax({
        url: "../controlador/Usuario.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function (datos) {
            bootbox.alert(datos);
            mostrarform(false);
            tabla.ajax.reload();
        }
    });

    limpiar();
}

function mostrar(idusuario) {
    $.post("../controlador/Usuario.php?op=mostrar",
    {idusuario: idusuario},
    function (data) {
        data = JSON.parse(data);

        mostrarform(true);

        $("#nombre").val(data.nombre);
        $("#apellidos").val(data.apellidos);
        $("#email").val(data.email);
        $("#login").val(data.login);
        $("#idusuario").val(data.id);
    });
}

function desactivar(idusuario) {
    bootbox.confirm("¿Desactivar usuario?", function (result) {
        if (result) {
            $.post("../controlador/Usuario.php?op=desactivar",
            {idusuario: idusuario},
            function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    });
}

function activar(idusuario) {
    bootbox.confirm("¿Activar usuario?", function (result) {
        if (result) {
            $.post("../controlador/Usuario.php?op=activar",
            {idusuario: idusuario},
            function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    });
}

init();
