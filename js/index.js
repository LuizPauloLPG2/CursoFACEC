$('.mask_cpf').mask('000.000.000-00', {reverse: true});
$('.mask_dinheiro').mask('000.000.000.000.000,00', {reverse: true});

$('.tabela-datatable').DataTable({
    "iDisplayLength": 4,
    "lengthMenu": [4, 10, 25],
    "pageLength": 4,
    "searching": true,
    "responsive": true,
    "language": {
        "decimal": ",",
        "thousands": ".",
        "info": "",
        "infoEmpty": "",
        "infoPostFix": "",
        "infoFiltered": "(FILTRADO DE UM TOTAL DE _MAX_ REGISTROS!)",
        "loadingRecords": "Carregando...",
        "lengthMenu": "_MENU_",
        "paginate": {
            "first": "PRIMEIRO",
            "last": "ÚLTIMO",
            "next": "SEGUINTE",
            "previous": "ANTERIOR"
        },
        "processing": "Procesando...",
        "search": "<strong>PESQUISAR</strong>",
        "searchPlaceholder": "",
        "zeroRecords": "NENHUM REGISTRO ENCONTRADO!",
        "emptyTable": "NENHUM REGISTRO ENCONTRADO!",
        "aria": {
            "sortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        "buttons": {
            "create": "Novo",
            "edit": "Cambiar",
            "remove": "Apagar",
            "copy": "COPIAR",
            "csv": "CSV",
            "excel": "tabla Excel",
            "pdf": "documento PDF",
            "print": "IMPRIMIR",
            "colvis": "Visibilidad columnas",
            "collection": "Colección",
            "upload": "Selecione fichero...."
        },
        "select": {
            "rows": {
                _: '%d filas seleccionadas',
                0: 'clic fila para seleccionar',
                1: 'uma linha selecionada'
            }
        },
    }
});

// $(document).ready(function() {
//     $('.tabela-datatable').DataTable();
// });

$(document).off('click.delete').on('click.delete', '.button_delete_cliente', function (){
    var id_cliente = this.dataset.id;
    
    $.confirm({
        title: 'Confirmação!',
        content: 'Deseja realmente apagar o cliente?',
        type: 'orange',
        typeAnimated: true,
        buttons: {
            close: {
                text: 'CANCELAR',
                btnClass: 'btn-red',
                function () {

                }
            },
            tryAgain: {
                text: 'CONFIRMAR',
                btnClass: 'btn-green',
                action: function(){
                    $.ajax({
                        url: '../../model/cliente/delete.php',
                        type: 'POST',
                        data: {
                            id_cliente: id_cliente
                        }  
                    }).done( function (response){
                        var r = JSON.parse(response);

                        if(r.erro === 0){
                            location.reload();
                        }else{
                            alert(r.msg);
                            return false;
                        }
                    });
                }
            },
        }
    });
});