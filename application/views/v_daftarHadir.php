<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Jadwal Praktek Dokter</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo site_url('assets/bootstrap-4.1.3/dist/css/bootstrap.min.css')?>">
  <!-- logo -->
  <link rel="SHORTCUT ICON" href="<?php echo base_url('assets/img/logo.png')?>">

</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body>
  

  <div class="container" style="margin-top: 40px">
    <h2><center><b>Jadwal Praktek Dokter</b></center></h2>
    <h5><center><?php echo longdate_indo(date("Y-m-d")); ?></center></h5>
  </div> 
  
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <hr>
        <table class="table table-sm table-striped table-bordered table-responsive-sm">
        <thead>
          <tr>
            <th width="50px"><center>No.</center> </th>
            <th width="200px"><center>Nama POLI</center></th>
            <th width="250px"><center>Nama Dokter</center></th>
            <th width="90px"><center>Pagi</center></th>
            <th width="90px"><center>Sore</center></th>
            <th width="90px"><center>Status</center></th>
            <th width="90px"><center>Keterangan</center></th>
          </tr>
        </thead>
        <tbody>
        <?php $no=1; ?>
        <?php foreach($jadwal as $jad) { ?>
          <tr>
            <td align="center"><?php echo $no++."."; ?> </td>
            <td><?php echo strtoupper($jad->nm_poli) ?></td>
            <td><?php echo $jad->nm_dokter ?></td>  

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

              <?php if($jad->status_hadir == 0){ ?>
                <td align="center"><span class="label label-danger">Tidak Hadir</span></td>
              <?php } else if($jad->status_hadir == 1){ ?>
                <td align="center"><span class="label label-success">Hadir</span></td>
              <?php } else if($jad->status_hadir == 2){ ?>
                <td align="center"><span class="label label-primary">Izin</span></td>
              <?php } else if($jad->status_hadir == 3){ ?>
                <td align="center"><span class="label label-warning">Sakit</span></td>
              <?php } ?>

              <?php if($jad->perjanjian == null){ ?>
                <td align="center">-</td>
              <?php } else { ?>
                <td align="center"><span style="color: red">*Dengan Perjanjian</span></td>
              <?php } ?>

          </tr>
        <?php } ?>
        </tbody>
        </table>
        <a href="<?php echo site_url('') ?>" class="btn btn-success"><i></i> Kembali</a>
      </div>    
    </div>
  </div>


  
  
<!-- jQuery 3 -->
<script src="<?php echo site_url('assets/AdminLTE/bower_components/jquery/dist/jquery.min.js')?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo site_url('assets/bootstrap-4.1.3/dist/js/bootstrap.min.js')?>"></script>
</body>
</html>

