<template>
    <div class="row">
        <div class="col-lg-12">

<div class="modal fade" id="barrioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#337ab7">
        <h4 id="hTituloModal" class="modal-title" style="color:#ffffff">{{tituloModal}}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color:#ffffff">×</span>
        </button>
      </div>
      <div class="modal-body"> <br>                    
        <form class="form-horizontal" id="formBarrio">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group row">
                <label for="ID_BARRIO" class="col-sm-3 text-right control-label col-form-label">Identificador</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" ref="ID_BARRIO" id="ID_BARRIO" name="ID_BARRIO" v-model="ID_BARRIO" placeholder="Identificador" >
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group row">
                <label for="NOMBRE_BARRIO" class="col-sm-3 text-right control-label col-form-label">Nombre</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="NOMBRE_BARRIO" name="NOMBRE_BARRIO" v-model="NOMBRE_BARRIO" placeholder="Nombre" >
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button v-if="tipoAccion==1" type="button" @click="registrarBarrio()" class="btn btn-danger" ><span class="la la-floppy-o" style="color:#ffffff"></span>&nbsp;&nbsp;<strong>Guardar</strong></button>
        <button v-if="tipoAccion==2" type="button" @click="actualizarBarrio()" class="btn btn-danger" ><span class="la la-floppy-o" style="color:#ffffff"></span>&nbsp;&nbsp;<strong>Guardar A</strong></button>                      
        <button type="button" class="btn btn-dark" data-dismiss="modal"><span class="la la-close" style="color:#ffffff"></span>&nbsp;&nbsp;<strong>Cerrar</strong></button>
      </div>
    </div>
  </div>
</div>

<button type="button" id="agregarBarrio" data-toggle="modal" data-target="#barrioModal" class="btn btn-success btn-min-width mr-1 mb-1"><span class="la la-plus" style="color:#ffffff"></span> Nuevo Barrio</button>


            <div class="table-responsive">
				<table class="table" id="tabla-barrios">
          <thead>
								 <tr>
                        <th v-for="cabecera in cabeceras" :key="cabecera">{{ cabecera }}</th>
                      </tr>	
							</thead>
						
          <!-- <thead>
								<tr>
									<th>#</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Username</th>
								</tr>
							</thead> -->
							<!-- <tbody>
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
							</tbody> -->
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
          tablaBarrios : null,
          NOMBRE_BARRIO: '',
          ID_BARRIO: '',
          titulo: 'LISTADO DE BARRIOS',
          tituloModal : '',
          tipoAccion: 1
        }
    },
   mounted() 
   {
  let me = this;
  me.validarBarrio();

  console.log('ID_BARRIO: '+me.ID_BARRIO);
   $("#pruebaModal").on("show.bs.modal", function() {
      $("#principal").css({ "padding-right": "0px" });
      $("#navegacion").css({ "padding-right": "0px" });
    });
   $("#barrioModal").on("show.bs.modal", function() {
      $("#principal").css({ "padding-right": "0px" });
      $("#navegacion").css({ "padding-right": "0px" });

      $('.table').attr('style','width:100%');

      
     // this.tituloModal = this.ID_BARRIO>0?'Editar información de Barrio':'Agregar nuevo barrio';
    });

    $("#barrioModal").on("hidden.bs.modal", function() {
      console.log("modal closed");
      me.limpiarDatos();
   
    // $('#formBarrio').data('bootstrapValidator').resetForm();
     // this.tituloModal = this.ID_BARRIO>0?'Editar información de Barrio':'Agregar nuevo barrio';
    });
//

     me.iniciarTabla();
      $('.table').attr('style','width:100%');
      //this.iniciarTabla();
      $('#cmp').text(me.titulo);
     
$('#agregarBarrio').click(function(){
    me.tituloModal = 'Agregar nuevo barrio';
    me.NOMBRE_BARRIO = '';
    me.ID_BARRIO = '';
    me.tipoAccion = 1;
    me.limpiarDatos();
    $('#formBarrio').data('bootstrapValidator').resetForm();
});

   },
   methods: 
   {
     registrarBarrio()
    {
        var validator = $('#formBarrio').data('bootstrapValidator');
        validator.validate();
        if(validator.isValid())
        {             
        let me = this;
        console.log('datos válidos');
        axios.post('/barrios/crear',{
        'id': me.ID_BARRIO,
        'nombre': me.NOMBRE_BARRIO
        }).then(function (response){
            if(response.status==200)
            {
                console.log(response.data);
                toastr.options.closeButton = true;
                toastr.success("Barrio registrado correctamente!");
                me.limpiarDatos();
                me.tablaBarrios.ajax.reload();
            }
            else
            {
                toastr.error("No se ha podido registrar el barrio "+me.NOMBRE_BARRIO+"!", 'Error!')
            }           
        })
        .catch(function (error) {
            console.log(error);
        toastr.error('No se ha podido guardar el registro.', 'Error!')
        });

        }
    },
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
    actualizarBarrio()
    {
      var validator = $('#formBarrio').data('bootstrapValidator');
        validator.validate();
        if(validator.isValid())
        {             
        let me = this;
        axios.post('/barrios/actualizar',{
        'id': me.ID_BARRIO,
        'nombre': me.NOMBRE_BARRIO
        }).then(function (response){
            if(response.status==200)
            {
                toastr.options.closeButton = true;
                toastr.success("Barrio actualizado correctamente!");
                me.tablaBarrios.ajax.reload();
            }
            else
            {
                toastr.error("No se ha podido actualizar el barrio "+me.NOMBRE_BARRIO+"!", 'Error!')
            }           
        })
        .catch(function (error) {
            console.log(error);
        toastr.error('No se ha podido guardar el registro.', 'Error!')
        });

        }
    },
    iniciarTabla() {
      this.tablaBarrios = $("#tabla-barrios").DataTable({
        responsive:true,
        
        ajax: {
          type: "GET",
          url: "barrios",
          dataSrc: function(json) {
            var return_data = new Array();
            var buttons = "";
            var btn = "";
            var lblEstado = "";
            for (var i = 0; i < json.data.length; i++) {
               // console.log(json.data[i]);
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
                ACCIONES: '<div class="btn-group btn-group-sm">' +
                '<button type="button" data-toggle="modal" data-target="#barrioModal" class="btn btn-info"><span class="la la-edit" style="color:#ffffff"></span> Editar</button>'+
                '</div>'
              });
            }
            return return_data;
          }
        },

        

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
        
        // order: [[0, "asc"]],
        dom: 'lBfrtip',
        columns: [
          { data: "ID_BARRIO" },
          { data: "NOMBRE_BARRIO" },      
          { data: "ACCIONES"}
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

       let me = this;
       $('#tabla-barrios tbody').on( 'click', 'button', function () {
        var data = me.tablaBarrios.row( $(this).parents('tr') ).data();
        //alert( data[0] +"'s salary is: "+ data);
        me.ID_BARRIO = data.ID_BARRIO;
        me.NOMBRE_BARRIO = data.NOMBRE_BARRIO;
        me.tituloModal = 'Editar información de Barrio';

       
        $("#formBarrio").data("bootstrapValidator").resetForm();
        me.tipoAccion = 2;
        
      //  $('#hTituloModal').text('Editar información de Barrio');
      });

    },
    limpiarDatos()
    {
        $('#formBarrio').data('bootstrapValidator').resetForm();   
        let me = this;
        me.$refs.ID_BARRIO.focus();
        me.ID_BARRIO = '';
        me.NOMBRE_BARRIO = '';
    },
    validarBarrio()
    {
      $("#formBarrio").bootstrapValidator({
        message: "Este valor no es valido",
        feedbackIcons: {
          valid: "la la-check",
          invalid: "la la-times",
          validating: "la la-refresh"
        },
        fields: {
          ID_BARRIO: {
            validators: {
              stringLength: {
                max: 3,
                message: "Por favor ingrese solo 3 caracteres"
              },
              notEmpty: {
                message: "El identificador de barrio es requerido"
              }
            }
          },
          NOMBRE_BARRIO: {
            validators: {
              stringLength: {
                max: 100,
                message: "Por favor ingrese solo 100 caracteres"
              },
              notEmpty: {
                message: "El nombre de barrio es requerido"
              }
            }
          }
        }
      });
    },
   }
}
</script>