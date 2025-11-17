var tabla; // (Declaración de variable que probablemente contendrá la instancia de DataTables)

// function que se ejecuta al inicio
function init() {
    mostrarform(false);

    listar();

    $("#formulario").on("submit", function (e){
        guardaryeditar(e);
    })

    
}

function limpiar() {
    $("#nombre").val("");
    $("#apellidos").val("");
    $("#email").val("");
    $("#login").val("");
    $("#clave").val("");
    $("#imagenmuestra").attr("src", "");
    $("#imagenactual").val("");
    $("#idusuario").val("");
}

// funcion mostrar formulario
function mostrarform(flag) {
    limpiar();
    if (flag) {
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled", false);
        $("#btnAgregar").hide();
    } else {
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnAgregar").show();
    }
}
// cancelar form
function cancelarform() {
    limpiar();
    mostrarform(false);
}

// funcion listar
function listar() {
    tabla = $('#tbllistado').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf'
        ],
        "ajax": {
            url: '../controlador/Usuario.php?op=listar',
            type: "get",
            datatype: "json",
            error: function (e) {
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });
}


// funcion para guardaryeditar
function guardaryeditar(e) {
    e.preventDefault(); // no se activara la accion predeterminada
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

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
    $.post("../controlador/Usuario.php?op=mostrar", {idusuario: idusuario}, 
        function (data, status) {
        data = JSON.parse(data);
        mostrarform(true);

        $("#nombre").val(data.nombre);
        $("#apellidos").val(data.apellidos);
        $("#email").val(data.email);
        $("#login").val(data.login);
        $("#imagenmuestra").show();
        $("#imagenmuestra").attr("src", "../files/usuarios/" + data.imagen);
        $("#imagenactual").val(data.imagen);
        $("#idusuario").val(data.id);

        });
}

// funcion para desactivar
function desactivar(idusuario) {
    bootbox.confirm("¿Está seguro de desactivar este dato?", function (result) {
        if (result) {
            $.post("../controlador/Usuario.php?op=desactivar", {
                idusuario: idusuario
            }, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    });
}

function activar(idusuario) {
    bootbox.confirm("¿Está seguro de activar este dato?", function (result) {
        if (result) {
            $.post("../controlador/Usuario.php?op=activar", {
                idusuario: idusuario
            }, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

init();