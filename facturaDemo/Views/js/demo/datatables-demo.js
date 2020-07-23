// Call the dataTables jQuery plugin
$(document).ready(function() {
	$('table.dataTable').DataTable();

	//ceder el scroll al modal padre
	$('#VentaSeleccionarClienteModal').on('hidden.bs.modal', function (e) {
		$('body').addClass('modal-open');
	});

	$('#VentaModalSeleccionarProducto').on('hidden.bs.modal', function (e) {
		$('body').addClass('modal-open');
	});

});
