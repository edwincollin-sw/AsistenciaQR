var tabla;

//funcion que se ejecuta al inicio
function init() {
    listar();

    //cargamos los items al select cliente
    $.post("../controlador/Empleado.php?op=select_empleado", function (r) {
        $("#empleado_id").html(r);
        $('#empleado_id').selectpicker('refresh');
    });
}

function listar() {
    var fecha_inicio = $("#fecha_inicio").val();
    var fecha_fin = $("#fecha_fin").val();
    var empleado_id = $("#empleado_id").val();

    tabla = $('#tbllistado').dataTable({
        "aProcessing": true, //activamos el procedimiento del datatable
        "aServerSide": true, //paginacion y filtrado realizados por el server
        dom: 'Bfrtip', //definimos los elementos del control de la tabla
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf'
        ],
        "ajax":
{
            url: '../controlador/Asistencia.php?op=listar_asistencia',
            data: { fecha_inicio: fecha_inicio, fecha_fin: fecha_fin, empleado_id: empleado_id },
            type: "get",
            dataType: "json",
            error: function (e) {
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "iDisplayLength": 10, //paginacion
        "order": [[0, "desc"]] //ordenar (columna, orden)
    }).DataTable();
}



init();
        