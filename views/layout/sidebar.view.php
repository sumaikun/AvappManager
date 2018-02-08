 <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div style="height:60px;" class="user-panel">
            <div class="pull-left image">
              <!--<img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
            </div>
            <div class="pull-left info">
              <p>Administrador</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>              
            </div>
          </div>

         
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class=" treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Conjuntos residenciales</span>
                <span class="label label-primary pull-right"><i class="fa fa-angle-left pull-right"></i></span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $helper->url("Conjunto","index"); ?>"><i class="fa fa-circle-o"></i> Conjuntos</a></li>
                <li><a href="<?php echo $helper->url("Clientes","index"); ?>"><i class="fa fa-circle-o"></i> Clientes</a></li>
                <li><a href="<?php echo $helper->url("Servicios","index"); ?>"><i class="fa fa-circle-o"></i> Servicios</a></li>
                <li><a href="<?php echo $helper->url("Llaves","index"); ?>"><i class="fa fa-circle-o"></i> Llaves</a></li>
              </ul>
            </li>
            <li>
              <a href="pages/widgets.html">
                <i class="fa fa-th"></i> <span>Consolas</span> <small class="label pull-right bg-green"></small>
              </a>
            </li>
            
            <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentación</span></a></li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>