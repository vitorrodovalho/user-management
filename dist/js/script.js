$('#tbl_users').DataTable({
	"order": [[ 0, "desc" ]],
	"paging": true,
	"pageLength": 20,
	"lengthChange": true,
	"searching": true,
	"ordering": true,
	"info": true,
	"autoWidth": true,
	"responsive": true,
	"language":{
		"sEmptyTable": "Nenhum registro encontrado",
		"sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
		"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
		"sInfoFiltered": "(Filtrados de _MAX_ registros)",
		"sInfoPostFix": "",
		"sInfoThousands": ".",
		"sLengthMenu": "_MENU_ resultados por página",
		"sLoadingRecords": "Carregando...",
		"sProcessing": "Processando...",
		"sZeroRecords": "Nenhum registro encontrado",
		"sSearch": "Pesquisar: ",
		"oPaginate": {
			"sNext": "Próximo",
			"sPrevious": "Anterior",
			"sFirst": "Primeiro",
			"sLast": "Último"
		}
	},
	"drawCallback": function () {
		$('.dataTables_paginate > .pagination').addClass('pagination-sm');
	}
});

 $('#tbl_users').DataTable();