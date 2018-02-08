 <?php include 'layout/header.view.php'; ?>
  <?php include 'layout/sidebar.view.php'; ?>  
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Clientes
            <small>Administración de clientes</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Administración de clientes</li>
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
                  <h3 class="box-title">Clientes registrados</h3>
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
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Cedula</th>
                        <th>Conjunto Asociado</th>
                        <th>Servicio disponible</th>
                        <th>Opciones</th>
                       </tr> 
                    </thead>
                  <tbody>
                    <?php if(isset($clientes)){  foreach($clientes as $cliente){ ?>
                      <tr>
                        <td><?php echo $cliente->id ?></td>
                        <td><?php echo $cliente->nombre ?></td>
                        <td><?php echo $cliente->cedula ?></td>
                        <td><?php echo $conjuntos[$cliente->conjunto] ?></td>
                        <td><?php echo $servicios[$cliente->servicio] ?></td>
                        <td><button onclick="edit_cliente(<?php echo $cliente->id ?>)" class="btn btn-warning btn-xs">Editar</button>&nbsp&nbsp
                          <a href="<?php echo $helper->url("Clientes","delete"); ?>&id=<?php echo $cliente->id; ?>" onclick="return confirm_click();">
                            <button  class="btn btn-danger btn-xs">Eliminar</button>
                          </a> 
                        </td>
                      </tr>
                    <?php }} ?>
                  </tbody>
                </table>                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              <button onclick="nuevo_cliente()" class="btn btn-primary">Nuevo Cliente</button>
            </div>
          </div>
         </section> 
      </div><!-- /.content-wrapper -->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Nuevo cliente</h4>
      </div>
      <form action="<?php echo $helper->url("Clientes","create"); ?>" method="post">
      <div class="modal-body">
        <div class="form-group">
          <label class="form-control">Nombre</label>
          <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="form-group">
          <label class="form-control">Cedula</label>
          <input type="number" name="cedula" class="form-control" required>
        </div>
        <div class="form-group">
          <label class="form-control">Conjunto</label>
          <select id="conjunto_id" name="conjunto_id" class="form-control conjunto_id" required>
            <option value=''>Selecciona</option>
            <?php foreach($conjuntos as $key => $value) { ?>
              <option value="<?php echo $key ?>" > <?php echo $value ?> </option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label class="form-control">Servicio</label>
          <select name="punto_id" id="punto_id" class="form-control punto_id" required>
            <option value=''>Selecciona</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Crear</button>
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
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar cliente</h4>
      </div>
      <form action="<?php echo $helper->url("Clientes","update"); ?>" method="post">
        <input name="id" type="hidden">
      <div class="modal-body">
        <div class="form-group">
          <label class="form-control">Nombre</label>
          <input type="text" name="enombre" class="form-control" required>
        </div>
        <div class="form-group">
          <label class="form-control">Cedula</label>
          <input type="number" name="ecedula" class="form-control" required>
        </div>
        <div class="form-group">
          <label class="form-control">Conjunto</label>
          <select id="conjunto_id" name="econjunto_id" class="form-control conjunto_id" required>
            <option value=''>Selecciona</option>
            <?php foreach($conjuntos as $key => $value) { ?>
              <option value="<?php echo $key ?>" > <?php echo $value ?> </option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label class="form-control">Servicio</label>
          <select name="epunto_id" id="epunto_id" class="form-control punto_id" required>
            <option value=''>Selecciona</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Editar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>



<script>
function nuevo_cliente()
{
  $("#myModal").modal('show');
}

function confirm_click(){return confirm("¿Esta seguro?");}

function edit_cliente(id)
{
  $("input[name='id']").val(id);
  $.post("<?php echo $helper->url('Clientes','edit'); ?>", {id:id} ,function(data){
    var edata = JSON.parse( data );
    $("input[name='enombre']").val(edata.nombre);
    $("input[name='ecedula']").val(edata.cedula);
    $("select[name='econjunto_id']").val(edata.conjunto);
    execute_foreign(edata.conjunto,edata.servicio);           
    $("#myModal2").modal('show');
    console.log(edata.id);
  });
}


$("#conjunto_id").change(function(){

   $("#punto_id").empty();
   $("#punto_id").append("<option value='' selected>Selecciona</option>");  
   execute_foreign(event.target.value,null);   
});

function execute_foreign(code,fixid)
{
   $.post("<?php echo $helper->url('Punto','get_by_conjunto'); ?>", {id:code} ,function(data){
      //console.log(data);
      var parsed = JSON.parse(data);
      var arr = [];
      for(var x in parsed){
        arr.push(parsed[x]);
      }
      arr.forEach(function(element) {
        $(".punto_id").append("<option value="+element.id+">"+element.nombre+"</option>");
    });
      if(fixid!=null)
      { 
        $(".punto_id").val(fixid); 
      }
   });
}

function wait(ms){
   var start = new Date().getTime();
   var end = start;
   while(end < start + ms) {
     end = new Date().getTime();
  }
}

</script>
<?php include 'layout/footer.view.php'; ?>  
