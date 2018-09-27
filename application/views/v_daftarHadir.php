<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Top Navigation</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo site_url('assets/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo site_url('assets/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo site_url('assets/AdminLTE/bower_components/Ionicons/css/ionicons.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo site_url('assets/AdminLTE/dist/css/AdminLTE.min.css')?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo site_url('assets/AdminLTE/dist/css/skins/_all-skins.min.css')?>">

  <style type="text/css">
    table.table-bordered{
    border:1px solid #696969;

    margin-top:20px;
  }
table.table-bordered > thead > tr > th{
    border:1px solid #696969;
}
table.table-bordered > tbody > tr > td{
  opacity: 0.5;
    border:1px solid #696969;
}
  </style>

</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-green layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="../../index2.html" class="navbar-brand"><b>Admin</b>LTE</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Navbar Right Menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h2><center><b>Jadwal Praktek Dokter</b></center></h2>
        <h4><center><?php echo longdate_indo(date("Y-m-d")); ?></center></h4>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="container-fluid">
            <table style="table-layout:fixed;" class="table table-bordered table-striped table-responsive-sm">
              <thead>
                <tr>
                  <th width="50px"><center>No.</center> </th>
                  <th width="250px"><center>Nama POLI</center></th>
                  <th width="250px"><center>Nama Dokter</center></th>
                  <th width="90px"><center>Pagi</center></th>
                  <th width="90px"><center>Sore</center></th>
                  <th width="90px"><center>Keterangan</center></th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; ?>
                  <?php foreach($jadwal as $jad) { ?>
                    <tr>
                      <td align="center"><?php echo $no++."."; ?> </td>
                      <td><?php echo $jad->nm_dokter ?></td>
                      
                      <?php if($jad->perjanjian == null){ ?>
                        <td align="center"><?php echo $jad->hari?></td>
                      <?php } else { ?>
                        <td align="center"><span style="color: red"><?php echo "*".$jad->hari?></span></td>
                      <?php } ?>

                      <?php if($jad->pagi != null) { ?>
                        <td align="center"><?php echo $jad->pagi?></td>
                      <?php } else { ?>
                        <td align="center">-</td>
                      <?php } ?>
                      <?php if($jad->sore != null) { ?>
                        <td align="center"><?php echo $jad->sore?></td>
                      <?php } else { ?>
                        <td align="center">-</td>
                      <?php } ?>

                      <td align="center"><button data-target="#ModalUpdateJadwal<?php echo $jad->id ?>" class="btn btn-sm btn-warning btn-circle" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> </button>
                      <button onclick="validate(this)" value="<?php echo $jad->id ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>
                   </tr>
                  <?php } ?>
              </tbody>
            </table>
          </div>
        </div>  
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo site_url('assets/AdminLTE/bower_components/jquery/dist/jquery.min.js')?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo site_url('assets/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<!-- SlimScroll -->
<script src="<?php echo site_url('assets/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
<!-- FastClick -->
<script src="<?php echo site_url('assets/AdminLTE/bower_components/fastclick/lib/fastclick.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo site_url('assets/AdminLTE/dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo site_url('assets/AdminLTE/dist/js/demo.js')?>"></script>
</body>
</html>