var tabla;

// Función que se ejecuta al inicio
function init() {
    mostrarform(false);
    listar();

    $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    })
}

// Función limpiar
function limpiar() {
    $("#empleado_id").val("");
    $("#nombre").val("");
    $("#apellidos").val("");
    $("#documento_numero").val("");
    $("#telefono").val("");
    $("#codigo").val("");
}

// Función mostrar formulario
function mostrarform(flag) {
    limpiar();
    if (flag) {
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled", false);
        $("#btnagregar").hide();
    } else {
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();
    }
}

// Cancelar form
function cancelarform() {
    limpiar();
    mostrarform(false);
}

// Función listar
function listar() {
    tabla = $('#tbllistado').dataTable({
        "aProcessing": true, // activamos el procedimiento del datatable
        "aServerSide": true, // paginacion y filtrado realizados por el server
        dom: 'Bfrtip', // definimos los elementos del control de la tabla
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf'
        ],
        "ajax": {
            url: '../controlador/Empleado.php?op=listar',
            type: "get",
            dataType: "json",
            error: function (e) {
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "iDisplayLength": 10, // paginacion
        "order": [[0, "desc"]] // ordenar (columna, orden)
    }).DataTable();
}

// Función para guardaryeditar
function guardaryeditar(e) {
    e.preventDefault(); // no se activara la accion predeterminada
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "../controlador/Empleado.php?op=guardaryeditar", // Ajusté la ruta para que coincida con las otras
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

function mostrar(empleado_id) {
    $.post("../controlador/Empleado.php?op=mostrar", { empleado_id: empleado_id },
        function (data, status) {
            data = JSON.parse(data);
            mostrarform(true);

            $("#nombre").val(data.nombre);
            $("#apellidos").val(data.apellidos);
            $("#documento_numero").val(data.documento_numero);
            $("#telefono").val(data.telefono);
            $("#codigo").val(data.codigo);
            $("#empleado_id").val(data.id);
        })
}

init();