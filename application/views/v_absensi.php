  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Data Absensi
        <small></small>
      </h1>
    </section>

    <section class="content">

      <?php if ($this->session->flashdata('pesan') == TRUE) { ?>
          <script>
            setTimeout(function() {
              swal({
                      title:"",
                      text: "<?php echo $this->session->flashdata('pesan') ?>",
                      type: "success"
                    });
                  }, 600);
          </script>
        <?php } ?>

        <?php if ($this->session->flashdata('pesanGagal') == TRUE) { ?>
           <script>
            setTimeout(function() {
              swal({
                      title: "<?php echo $this->session->flashdata('pesanGagal') ?>",
                      type: "error"
                    });
                  }, 600);
          </script>
        <?php } ?>

      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="row">
                <div class="col-md-6">
                  <button class="btn btn-success" data-toggle="modal" href="#" data-target="#ModalEntryJadwal"><i class="fa fa-users"></i> Abensi Dokter</button>
                  <button class="btn btn-danger" onclick="reset()"><i class="fa fa-refresh"></i> Reset Absensi</button>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <table style="table-layout:fixed" class="table table-striped table-bordered table-hover" id="datatableJadwal">
                <thead>
                  <tr>
                    <th width="20px"><center>No.</center> </th>
                    <th width="200"><center>Nama POLI</center></th>
                    <th width="250px"><center>Nama Dokter</center></th>
                    <th width="100px"><center>Keterangan</center></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  <?php foreach($absen as $data){ ?>
                  <tr>
                    <td align="center"><?php echo $no++."." ?></td>
                    <td align=""><?php echo strtoupper($data->nm_poli) ?></td>
                    <td align=""><?php echo $data->nm_dokter ?></td>

                     <?php if($data->status_hadir == 0){ ?>
                        <td align="center"><a href="#status_hadir<?php echo $data->id ?>" data-toggle="modal"><span class="label label-danger">Tidak Hadir</span></a></td>
                      <?php } else if($data->status_hadir == 1){ ?>
                        <td align="center"><a href="#status_hadir<?php echo $data->id ?>" data-toggle="modal"><span class="label label-success">Hadir</span></a></td>
                      <?php } else if($data->status_hadir == 2){ ?>
                        <td align="center"><a href="#status_hadir<?php echo $data->id ?>" data-toggle="modal"><span class="label label-primary">Izin</span></a></td>
                      <?php } else if($data->status_hadir == 3){ ?>
                        <td align="center"><a href="#status_hadir<?php echo $data->id ?>" data-toggle="modal"><span class="label label-warning">Sakit</span></a></td>
                      <?php } ?>

                   </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
           </div>
          </div>
        </div>
    </section>
  </div>
  
  <!-- modal tambah data absensi -->
<div class="modal fade" id="ModalEntryJadwal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-users"></i> Absensi Dokter - <?php echo shortdate_indo(date("Y-m-d")) ?></h4>
      </div>
      <form method="POST" action="<?php echo site_url('absensi/simpan') ?>" enctype="multipart/form-data">
        <div class="modal-body">
          <?php $no=1; ?>
          <?php $th=1; $h=1; $i=1; $s=1; $d=1;?>
          <table class="table table-bordered">
          <?php foreach($absen as $absensi){ ?>
            <input type="hidden" name="id_dokter<?php  echo $d++; ?>" value="<?php echo $absensi->id_dokter ?>">
            <tr>
              <td width="30px"><b><?php echo $no++."." ?></b></td>
              <td><b><?php echo $absensi->nm_dokter ?></b></td>
            </tr>
            <tr>
              <td></td>
              <td>
                <label class="radio-inline"><input type="radio" required value="0" checked name="b<?php echo $th++ ?>">Tidak Hadir</label>
                <label class="radio-inline"><input type="radio" required value="1" name="b<?php echo $h++ ?>">Hadir</label>
                <label class="radio-inline"><input type="radio" required value="2" name="b<?php echo $i++ ?>">Izin</label>
                <label class="radio-inline"><input type="radio" required value="3" name="b<?php echo $s++ ?>">Sakit</label>
              </td>
            </tr>
          <?php } ?>
          </table>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--/ modal tambah data absensi -->

<!-- modal ubah status hadir -->
<?php foreach($absen as $jad) { ?>
<div class="modal fade" id="status_hadir<?php echo $jad->id ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-users"></i> Ubah Status Kehadiran</h4>
      </div>
      <form method="POST" action="<?php echo site_url('absensi/kehadiran') ?>" enctype="multipart/form-data">
        <div class="modal-body">
        
          <div class="form-group">
            <label>Hari</label>
            <select name="status_hadir" class="form-control" style="width: 100%;">
              <option <?php if( $jad->status_hadir=='0'){echo "selected"; } ?>  value="0">Tidak Hadir</option>
              <option <?php if( $jad->status_hadir=='1'){echo "selected"; } ?> value="1">Hadir</option>
              <option <?php if( $jad->status_hadir=='2'){echo "selected"; } ?> value="2">Izin</option>
              <option <?php if( $jad->status_hadir=='3'){echo "selected"; } ?> value="3">Sakit</option>
            </select>
          </div>

          <input type="hidden" name="id" value="<?php echo $jad->id ?>">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>
<!--/ modal ubah status hadir -->

<script>
function reset()
{
    swal({
            title: "",
            text: "Anda Yakin ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes !",
            closeOnConfirm: false }, function()
        {
            $(location).attr('href','<?php echo base_url('absensi/reset/')?>');
        }
    );
}
 </script>