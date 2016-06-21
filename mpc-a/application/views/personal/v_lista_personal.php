<style>
            .loader{
                background-image: url(../img/ajax-loader.gif);
                background-repeat: no-repeat;
                background-position: center;
                height: 100px;                
            }
</style>


<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="#"> Personal</a></li>
			<li><a href="#">Buscar personal</a></li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					
					<span>Analisis</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
					<a class="close-link">
						<i class="fa fa-times"></i>
					</a>
				</div>
				<div class="no-move"></div>
			</div>






			<div class="table-responsive box-content no-padding">
                                    <table class="table table-hover table-bordered table-striped table-heading table-datatable" id="datatable-1">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NOMBRE 1 </th>
                                            <th>NOMBRE 2</th>
                                            <th>APELLIDO PATERNO</th>
                                            <th>APELLIDO MATERNO</th>
                                            <th>CIUDAD</th>
                                            <th>C.I.</th>
                                            <th>CELULAR</th>
                                            <th>E-MAIL</th>

                                            <th>USUARIO</th>
                                            <th>CONTRASEÑA</th>
                                            <th>PERFIL</th>
                                            <th>EDITAR</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                            foreach ($personales as $value) {
                                            ?>
                                        <tr>
                                            <td><?=$value->ID_USUARIO?></td>
                                            <td><?=$value->nombre1?></td>
                                            <td><?=$value->nombre2?></td>
                                            <td><?=$value->apellidoP?></td>
                                            <td><?=$value->apellidoM?></td>
                                            <td><?=$value->idCiudad?></td>
                                            <td><?=$value->ci?></td>
                                            <td><?=$value->celular?></td>
                                            <td><?=$value->correo?></td>


                                            <td><?=$value->USUARIO?></td>
                                            <td><?=$value->CONTRASENA?></td>
                                            <td><?=$value->PERFIL?></td>
                                            <td><a href="#" class="edit-record btn btn-primary" data-id="<?php echo $value->ID_USUARIO;?>">EDITAR</a></td></td>
                                        </tr>
                                            <?php
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                            </div>
		</div>
	</div>
</div>


<!-- inicio Modal para mostar resultados--->
<div class="modal fade" id="actualizar" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Mostrar Resultado</h4>
          </div>
          <div class="modal-body"></div>
          
        </div>
      </div>
</div>

<script type="text/javascript">
// Run Datables plugin and create 3 variants of settings
function AllTables(){
	TestTable1();
	TestTable2();
	TestTable3();
	LoadSelect2Script(MakeSelect2);
}
function MakeSelect2(){
	$('select').select2();
	$('.dataTables_filter').each(function(){
		$(this).find('label input[type=text]').attr('placeholder', 'Buscar');
	});
}
$(document).ready(function() {
	// Load Datatables and run plugin on tables 
	LoadDataTablesScripts(AllTables);
	// Add Drag-n-Drop feature
	WinMove();
});
</script>

<script>
$(document).ready(function() {
        $(document).on('click','.edit-record',function (e){
                    e.preventDefault();                    
                    
                    $('#actualizar').modal('show');            
                    $(".modal-body").html('');
                    $(".modal-body").addClass('loader');
                    
                    
                    $.post('c_personal/edidPersonal/',
                            {id: $(this).attr('data-id')},
                            function(html){
                                $(".modal-body").removeClass('loader');
                                $(".modal-body").html(html);                               
                            }
                    ); 
                return false;                                         
                });
            });

</script>
