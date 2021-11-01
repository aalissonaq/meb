<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <!-- <div class="image">
      <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
     <div class="info">
            <a href="#" class="d-block">Olá, </a>
        </div> -->
    <div class="info">
      <a href="#" class="d-block col-11 text-uppercase">
        <?= $_SESSION['USUARIO']; ?>
      </a>
    </div>
    <div class="info">
      <!--<a href="?acao=sair" class="d-block text-danger" title="Sair do Sistema">
        <i class="fas fa-sign-out-alt fa-lg fa-fw"></i>
         <i class="fa fa-power-off" aria-hidden="true"></i>
      </a>-->
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">



      <!-- ATENDIMENTO
      <li class="nav-header text-uppercase">
        <i class="mdi mdi-format-list-checks mdi-24px text-yellow"> </i>
        <i class="mdi mdi-list-status mdi-24px text-yellow"> </i>
        ATENDIMENTOS
      </li>-->

      <li class="nav-item " id="">
        <a href="?page=listarClientes" class="nav-link" id="menuClientes">
          <i class="nav-icon mdi mdi-account mdi-24px"></i>
          <p>
            Clientes
            <!-- <span class="badge badge-info right">2</span> -->
          </p>
        </a>
      </li>
      <li class="nav-item " id="">
        <a href="?page=listarAdvs" class="nav-link" id="menuPacientes">
          <i class="nav-icon mdi mdi-account-tie mdi-24px"></i>
          <p>
            Advogados
            <!-- <span class="badge badge-info right">2</span> -->
          </p>
        </a>
      </li>

    </ul>

    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

      <!-- <li class="nav-header text-uppercase">
        <i class="mdi mdi-cogs mdi-24px text-orange"> </i>
        <i class="fas fa-cogs nav-icon fa-fw fa-lg text-orange"> </i>
        GESTÃO
      </li>-->

      <!--  <li class="nav-item">
        <a href="?page=listarusuarios" class="nav-link" id="userSystem">
          <i class="nav-icon mdi mdi-account-group mdi-24px"></i>
         <i class="nav-icon fas fa-user"></i>
          <p>Usuários do Sistema

          </p>
        </a>
      </li> -->


    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>