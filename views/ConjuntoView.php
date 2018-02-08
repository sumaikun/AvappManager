 <?php include 'layout/header.view.php'; ?>
  <?php include 'layout/sidebar.view.php'; ?> 

  <style>
    th{
      text-align: center;
    }
    td{
      text-align: center;
    }
  </style> 
      <!-- Content Wrapper. Contains page content -->

      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Conjunto
            <small>Administración de conjuntos</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Administración de conjuntos</li>
          </ol>
        </section>
        <section class="content">
            <?php
              $msg->display();

              //print_r($usuarios);
            ?>
          <!-- Small boxes (Stat box) -->
          <div class="row">
		        <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Conjuntos registrados</h3>
                  <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th style="text-align:center;">Id</th>
                        <th style="text-align:center;">Nombre</th>
                        <th style="text-align:center;">Dirección</th>
                        <th style="text-align:center;">Ciudad</th>
                        <th style="text-align:center;">Cantidad de puntos</th>
                        <th style="text-align:center;">Opciones</th>
                      </tr>
                    </thead>
                  <tbody style="text-align:center;">
                    <?php if(isset($conjuntos)){  foreach($conjuntos as $conjunto){  ?>
                    <tr>
                      <td> <?php echo $conjunto->id ?> </td>
                      <td> <?php echo $conjunto->nombre ?> </td>
                      <td> <?php echo $conjunto->direccion ?> </td>
                      <td> <?php echo $conjunto->ciudad ?> </td>
                      <td> <?php echo $conjunto->cantidad_puntos ?> </td>
                      <td> <button onclick="edit_conjunto(<?php echo $conjunto->id ?>)" class="btn btn-xs btn-warning">Editar</button>
                       <a href="<?php echo $helper->url("Conjunto","delete"); ?>&id=<?php echo $conjunto->id; ?>"  onclick="return confirm_click();"><button class="btn btn-xs btn-danger">Eliminar</button></a>
                       <button onclick="puntos(<?php echo $conjunto->id ?>)" class="btn btn-xs btn-primary">Administración de puntos</button>  </td>
                    </tr>
                    <?php }} ?>
                  </tbody>
                </table>                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              <button onclick="nuevo_conjunto()" class="btn btn-primary">Nuevo Conjunto</button>
            </div>
          </div>
         </section> 
      </div><!-- /.content-wrapper -->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form action="<?php echo $helper->url("Conjunto","create"); ?>" method="post">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Datos del nuevo conjunto</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class="form-control">Nombre</label>
            <input class="form-control" name="nombre" type="text" required>
          </div>
          <div class="form-group">
            <label class="form-control">Dirección</label>
            <input class="form-control" name="direccion" type="text" required>
          </div>
          <div class="form-group">
            <label class="form-control">Ciudad</label>
            <input class="form-control" name="ciudad" type="text" required>
          </div>
          <div class="form-group">
            <label class="form-control">Cantidad de puntos</label>
            <input class="form-control" name="cantidad" type="number" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Crear Conjunto</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </form>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form action="<?php echo $helper->url("Conjunto","update"); ?>" method="post">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar conjunto</h4>
        </div>
        <div class="modal-body">
          <input class="form-control" name="id" type="hidden" required>
          <div class="form-group">
            <label class="form-control">Nombre</label>
            <input class="form-control" name="enombre" type="text" required>
          </div>
          <div class="form-group">
            <label class="form-control">Dirección</label>
            <input class="form-control" name="edireccion" type="text" required>
          </div>
          <div class="form-group">
            <label class="form-control">Ciudad</label>
            <input class="form-control" name="eciudad" type="text" required>
          </div>
          <div class="form-group">
            <label class="form-control">Cantidad de puntos</label>
            <input class="form-control" name="ecantidad" type="number" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Editar Conjunto</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </form>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="myModal3" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Administración de puntos</h4>
        </div>
        <div class="modal-body">
          <div id="ajax-content"></div>
        </div>
        <div class="modal-footer">          
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="myModal4" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form action="<?php echo $helper->url("Punto","create"); ?>" method="post">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Crear punto</h4>
        </div>
        <div class="modal-body">
          <input id="conjunto_id" type="hidden" name="conjunto_id">
          <label class="form-control">Referencia de punto</label>
          <input class="form-control" name="referencia">
        </div>
        <div class="modal-footer"> 
          <button type="submit" class="btn btn-success">Guardar</button>         
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </form>
    </div>

  </div>
</div>


<!-- Modal -->
<div id="myModal5" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form action="<?php echo $helper->url("Punto","update"); ?>" method="post">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar punto</h4>
        </div>
        <div class="modal-body">
          <input id="eid" type="hidden" name="id">
          <input id="econjunto_id" type="hidden" name="conjunto_id">
          <label class="form-control">Referencia de punto</label>
          <input class="form-control" name='ereferencia'>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Guardar</button>          
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </form>
    </div>

  </div>
</div>


<script>
function nuevo_conjunto()
{
  $("#myModal").modal('show');
}

function confirm_click(){return confirm("¿Esta seguro?");}

function edit_conjunto(id)
{
  $("input[name='id']").val(id);
  $.post("<?php echo $helper->url('Conjunto','edit'); ?>", {id:id} ,function(data){
    var edata = JSON.parse( data );
    $("input[name='enombre']").val(edata.nombre);
    $("input[name='edireccion']").val(edata.direccion);
    $("input[name='eciudad']").val(edata.ciudad);
    $("input[name='ecantidad']").val(edata.cantidad_puntos);
    $("#myModal2").modal('show');
    console.log(edata.id);
  });
}

function puntos(id)
{
 $.post("<?php echo $helper->url('Punto','index'); ?>", {id:id} ,function(data){
    console.log(data);
    $("#conjunto_id").val(id);
    $("#econjunto_id").val(id);
    $("#ajax-content").empty();
    $("#ajax-content").append(data);
    $("#myModal3").modal('show');
  }); 
}

</script>
<?php include 'layout/footer.view.php'; ?>  
