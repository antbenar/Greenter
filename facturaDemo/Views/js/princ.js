// Call the dataTables jQuery plugin
$(document).ready(function() {
 //alert("a");
	$('table.dataTable').DataTable(
		{
			"order": [[ 0, "desc" ]],
			"language": {
				"previous": "Anterior",
				"search": "Buscar:",
	            "lengthMenu": "Mostrando _MENU_ filas por pagina",
	            "zeroRecords": "No se encontraron coincidencias",
	            "info": "Mostrando pagina _PAGE_ de un total de _PAGES_ pagina(s)",
	            "infoEmpty": "No hay filas disponibles",
	            "infoFiltered": "(De un total de _MAX_ filas)",
	            "emptyTable": "No se encontraron datos disponibles para la tabla",

			    "loadingRecords": "Cargando...",
			    "processing":     "Procesando...",
			    "paginate": {
			        "first":      "Primero",
			        "last":       "Ultimo",
			        "next":       "Siguiente",
			        "previous":   "Anterior"
			    },
			    "aria": {
			        "sortAscending":  ": Activar para ordenar ascendentemente segun la columna",
			        "sortDescending": ":  Activar para ordenar descendentemente segun la columna"
			    }
			}
	    }
    );

   

	//ceder el scroll al modal padre
	$('#VentaBoletaSeleccionarClienteModal').on('hidden.bs.modal', function (e) {
		$('body').addClass('modal-open');
	});

	$('#VentaBoletaModalSeleccionarProducto').on('hidden.bs.modal', function (e) {
		$('body').addClass('modal-open');
	});

	$('#VentaSeleccionarFacturaClienteModal').on('hidden.bs.modal', function (e) {
		$('body').addClass('modal-open');
	});

	$('#VentaFacturaModalSeleccionarProducto').on('hidden.bs.modal', function (e) {
		$('body').addClass('modal-open');
	});

	$('#NotaCreditoSeleccionarFacturaModal').on('hidden.bs.modal', function (e) {
		$('body').addClass('modal-open');
	});

	$('#NotaDebitoSeleccionarFacturaModal').on('hidden.bs.modal', function (e) {
		$('body').addClass('modal-open');
	});

});
