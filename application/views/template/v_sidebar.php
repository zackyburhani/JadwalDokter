<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img style="background-color: white; padding: 5px 5px 5px 5px;" src="<?php echo base_url('assets/img/logo.png')?>"" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->username ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Administrator</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"></li>
       <!--  <li>
          <a href="<?php echo site_url('ControllerDashboard') ?>">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
          </a>
        </li>
 -->        <li>
          <a href="<?php echo site_url('poli') ?>">
            <i class="fa fa-plus-square"></i>
            <span>Data POLI</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('dokter') ?>">
            <i class="fa fa-users"></i>
            <span>Data Dokter</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('jadwal') ?>">
            <i class="fa fa-calendar"></i>
            <span>Jadwal</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('absensi') ?>">
            <i class="fa fa-file-text"></i>
            <span>Absensi Dokter</span>
          </a>
        </li> 
        <li>
          <a href="<?php echo site_url('user') ?>">
            <i class="fa fa-user"></i>
            <span>User</span>
          </a>
        </li>
        <li class="header"></li>
        <li>
          <a href="<?php echo site_url('login/logout') ?>">
            <i class="fa fa-sign-out"></i>
            <span>Keluar</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>