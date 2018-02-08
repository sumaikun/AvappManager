 <?php include 'layout/header.view.php'; ?>
  <?php include 'layout/sidebar.view.php'; ?>  
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
                      <th>Id</th>
                      <th>Extensión</th>
                      <th>Conjunto</th>                      
                      <th>Opciones</th>
                    </thead>
                  </tbody></table>                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              <button onclick="nuevo_conjunto()" class="btn btn-primary">Nuevo Cliente</button>
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
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>
function nuevo_cliente()
{

}
</script>
<?php include 'layout/footer.view.php'; ?>  
