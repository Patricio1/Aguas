<template>
    <div class="row">
        <div class="col-lg-12">

<div class="modal fade" id="pruebaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" style="display: none;" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color:#337ab7">
                        <h4
                          class="modal-title"
                          id="exampleModalLabel1"
                          style="color:#ffffff"
                        >Esta es un prueba</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true" style="color:#ffffff">×</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        
                      </div>
                      <div class="modal-footer">
                        
                        <button type="button" class="btn btn-danger" >
                          &nbsp;&nbsp;<strong>Opcion 1</strong>
                        </button>
                        <button type="button" class="btn grey btn-secondary">
                          &nbsp;&nbsp;<strong>Opcion 2</strong>
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                          &nbsp;&nbsp;<strong>Cerrar</strong>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

  <button type="button" id="btnToastr"  @click="toastr()" class="btn btn-primary btn-min-width mr-1 mb-1">Toastr</button>
  <button type="button" id="btnSweet" @click="sweetalert()" class="btn btn-warning btn-min-width mr-1 mb-1">Sweet Alert</button>
  <button type="button" data-toggle="modal" data-target="#pruebaModal" class="btn btn-success btn-min-width mr-1 mb-1">Modal</button>


            <div class="table-responsive">
				<table class="table" id="tabla-barrios">
					 <!-- <tr>
                        <th v-for="cabecera in cabeceras" :key="cabecera">{{ cabecera }}</th>
                      </tr>		 -->
          <thead>
								<tr>
									<th>#</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Username</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="row">1</th>
									<td>Mark</td>
									<td>Otto</td>
									<td>@mdo</td>
								</tr>
								<tr>
									<th scope="row">2</th>
									<td>Jacob</td>
									<td>Thornton</td>
									<td>@fat</td>
								</tr>
								<tr>
									<th scope="row">3</th>
									<td>Larry</td>
									<td>the Bird</td>
									<td>@twitter</td>
								</tr>
							</tbody>
				</table>
			</div>            
        </div>                          
    </div>
</template>
<script>
export default 
{
    data() 
    {
        return {
          cabeceras: ["#","Nombre","Acciones"],
          tablaBarrios : null
        }
    },
   mounted() 
   {
  
   $("#pruebaModal").on("show.bs.modal", function() {
      $("#principal").css({ "padding-right": "0px" });
      $("#navegacion").css({ "padding-right": "0px" });
    });

     this.iniciarTabla2();
      //this.iniciarTabla();
      $('#cmp').text("hola");
     

   },
   methods: 
   {
     toastr()
     {
       toastr.success('Have fun storming the castle!', 'Miracle Max Says');
     },
     sweetalert()
     {
        swal.fire({
  title: 'Are you sure?',
  text: 'You will not be able to recover this imaginary file!',
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, keep it'
}).then((result) => {
  if (result.value) {
    swal.fire(
      'Deleted!',
      'Your imaginary file has been deleted.',
      'success'
    )
  // For more information about handling dismissals please visit
  // https://sweetalert2.github.io/#handling-dismissals
  } else if (result.dismiss === Swal.DismissReason.cancel) {
    swal.fire(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
})

     },
    registrar()
    {

    },
     iniciarTabla2() {
      this.tablaBarrios = $("#tabla-barrios").DataTable({
        responsive:true,
        dom: 'lBfrtip',
                            lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "Todo"]],
        buttons: [
                            {
                                    extend:    'copyHtml5',
                                    text:      '<i class="fa fa-files-o"></i> Copiar',
                                    titleAttr: 'Copiar',
                                    exportOptions: {
                                    columns: 'th:not(:last-child)'
                                }
                                },
                                {
                                    extend:    'excelHtml5',
                                    text:      '<i class="fa fa-file-excel-o"></i> Excel',
                                    titleAttr: 'Excel',
                                    exportOptions: {
                                    columns: 'th:not(:last-child)'
                                }
                                },
                                {
                                    extend:    'csvHtml5',
                                    text:      '<i class="fa fa-file-text-o"></i> CSV',
                                    titleAttr: 'CSV',
                                    exportOptions: {
                                    columns: 'th:not(:last-child)'
                                }
                                },
                                {
                                    extend:    'pdfHtml5',
                                    text:      '<i class="fa fa-file-pdf-o"></i> PDF',
                                    titleAttr: 'PDF',
                                    title: 'Listado de'+$('#titulo').text(),
                                    exportOptions: {
                                    columns: 'th:not(:last-child)'
                                }
                                },
                                {
                                    extend:    'print',
                                    text:      '<i class="fa fa-print"></i> Imprimir',
                                    titleAttr: 'Imprimir',
                                    title: 'Listado de'+$('#titulo').text(),
                                    className: 'btn btn-info btn-xs',
                                    exportOptions: {
                                    columns: 'th:not(:last-child)'
                                }
                                }
                            ],
         language: {
          sProcessing: "Procesando...",
          sLengthMenu: "Mostrar _MENU_ registros",
          sZeroRecords: "No se encontraron resultados",
          sEmptyTable: "Ningún dato disponible en esta tabla",
          sInfo:
            "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          sInfoEmpty:
            "Mostrando registros del 0 al 0 de un total de 0 registros",
          sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
          sInfoPostFix: "",
          sSearch: "Buscar:",
          sUrl: "",
          sInfoThousands: ",",
          sLoadingRecords: "Cargando...",
          oPaginate: {
            sFirst: "Primero",
            sLast: "Último",
            sNext: "Siguiente",
            sPrevious: "Anterior"
          },
          oAria: {
            sSortAscending:
              ": Activar para ordenar la columna de manera ascendente",
            sSortDescending:
              ": Activar para ordenar la columna de manera descendente"
          }
        }
      });
     },
    iniciarTabla() {
      this.tablaBarrios = $("#tabla-barrios").DataTable({
        ajax: {
          type: "GET",
          url: "barrios",
          dataSrc: function(json) {
            var return_data = new Array();
            var buttons = "";
            var btn = "";
            var lblEstado = "";
            for (var i = 0; i < json.data.length; i++) {
                console.log(json.data[i]);
            //   if (json.data[i].ESTADO_EQUIPO > 0) {
            //     btn = '<button id="' +json.data[i].ID_EQUIPO +'" type="button" class="btn btn-danger desactivar-equipo"><span class="fa fa-trash"></span> Desactivar</button>';
            //     lblEstado = '<span class="badge badge-success"><strong>Activo</strong></span>';
            //   } else {
            //     btn = '<button id="' + json.data[i].ID_EQUIPO + '" type="button" class="btn btn-success activar-equipo"><span class="fa fa-check" style="color:#ffffff"></span> Activar</button>';
            //     lblEstado = '<span class="badge badge-danger"><strong>Inactivo</strong></span>';
            //   }

              //buttons = '<div  class="btn-group btn-group-sm">' +'<button id="edit-' +json.data[i].ID_EQUIPO +'" class="btn btn-primary editar-equipo"><span class="fas fa-pencil-alt"></span> Editar</button>' +btn+"</div>";
              return_data.push({
                ID_BARRIO: json.data[i].id,
                NOMBRE_BARRIO: json.data[i].nombre,                            
                ACCIONES: 'nada'
              });
            }
            return return_data;
          }
        },
        order: [[0, "asc"]],
        columns: [
          { data: "ID_BARRIO" },
          { data: "NOMBRE_BARRIO" },      
          { data: "ACCIONES" }
        ],
        lengthMenu: [[5, 10, 20, 50, -1], [5, 10, 20, 50, "Todo"]],
        language: {
          sProcessing: "Procesando...",
          sLengthMenu: "Mostrar _MENU_ registros",
          sZeroRecords: "No se encontraron resultados",
          sEmptyTable: "Ningún dato disponible en esta tabla",
          sInfo:
            "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          sInfoEmpty:
            "Mostrando registros del 0 al 0 de un total de 0 registros",
          sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
          sInfoPostFix: "",
          sSearch: "Buscar:",
          sUrl: "",
          sInfoThousands: ",",
          sLoadingRecords: "Cargando...",
          oPaginate: {
            sFirst: "Primero",
            sLast: "Último",
            sNext: "Siguiente",
            sPrevious: "Anterior"
          },
          oAria: {
            sSortAscending:
              ": Activar para ordenar la columna de manera ascendente",
            sSortDescending:
              ": Activar para ordenar la columna de manera descendente"
          }
        }
      });
    }
   }
}
</script>