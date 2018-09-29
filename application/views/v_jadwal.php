  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Data Jadwal
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
                  <button class="btn btn-success" data-toggle="modal" href="#" data-target="#ModalEntryJadwal"><i class="fa fa-plus"></i> Tambah Data Jadwal</button>
                </div>

              </div>
            </div>
            <div class="panel-body">
              <table style="table-layout:fixed" class="table table-striped table-bordered table-hover" id="datatableJadwal">
                <thead>
                  <tr>
                    <th width="50px"><center>No.</center> </th>
                    <th width="250px"><center>Nama Dokter</center></th>
                    <th width="110px"><center>Hari</center></th>
                    <th width="90px"><center>Pagi</center></th>
                    <th width="90px"><center>Sore</center></th>
                    <th width="100px" align="center;"> <center>Action</center> </th>
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
          </div>
        </div>
    </section>
  </div>
  
<!-- modal tambah data jadwal -->
<div class="modal fade" id="ModalEntryJadwal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-calendar"></i> Tambah Data Jadwal</h4>
      </div>
      <form method="POST" action="<?php echo site_url('jadwal/simpan') ?>" enctype="multipart/form-data">
        <div class="modal-body">
          
          <div class="form-group">
            <label>Nama Dokter</label>
              <select name="id_dokter" class="form-control select2" data-placeholder="Pilih Nama Dokter" style="width: 100%;">
                <option></option>
                <?php foreach($dokter as $data1){ ?>
                  <option value="<?php echo $data1->id_dokter ?>"><?php echo $data1->nm_dokter ?></option>
                <?php } ?>
              </select>
          </div>

          <div class="form-group">
            <label>Hari</label>
            <select name="hari[]" class="form-control select2" multiple="multiple" data-placeholder="Pilih Hari" style="width: 100%;">
              <option value="Senin">Senin</option>
              <option value="Selasa">Selasa</option>
              <option value="Rabu">Rabu</option>
              <option value="Kamis">Kamis</option>
              <option value="Jumat">Jumat</option>
              <option value="Sabtu">Sabtu</option>
              <option value="Minggu">Minggu</option>
            </select>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Jam Praktek</label>
                  <div class="input-group">
                    <input type="text" name="jam_awal" class="form-control timepicker">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Sampai</label>
                  <div class="input-group">
                    <input type="text" name="jam_akhir" class="form-control timepicker">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div style="margin-top: 10px" class="row">
            <div class="col-md-6">
              <div class="form-group">
            <label>
              <input name="hari_janji" value="1" type="checkbox" class="minimal">
                Hari Perjanjian
            </label> <span style="color: red">(*Optional)</span>
          </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--/ modal tambah data jadwal -->

<!-- modal ubah data jadwal -->
<?php foreach($jadwal as $jad) { ?>
<div class="modal fade" id="ModalUpdateJadwal<?php echo $jad->id ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-calendar"></i> ubah Jadwal</h4>
      </div>
      <form method="POST" action="<?php echo site_url('jadwal/ubah') ?>" enctype="multipart/form-data">
        <div class="modal-body">
          
          <input type="hidden" name="id" value="<?php echo $jad->id ?>">

          <div class="form-group">
            <label>Nama Dokter</label>
              <select name="id_dokter" class="form-control select2" data-placeholder="Pilih Nama Dokter" style="width: 100%;">
                <option></option>
                <?php foreach($dokter as $data1){ ?>
                  <option <?php if($jad->id_dokter == $data1->id_dokter): echo "selected"; endif; ?> value="<?php echo $data1->id_dokter ?>"><?php echo $data1->nm_dokter ?></option>
                <?php } ?>
              </select>
          </div>

          <div class="form-group">
            <label>Hari</label>
            <select name="hari" class="form-control" style="width: 100%;">
              <option <?php if( $jad->hari=='Senin'){echo "selected"; } ?> value="Senin">Senin</option>
              <option <?php if( $jad->hari=='Selasa'){echo "selected"; } ?> value="Selasa">Selasa</option>
              <option <?php if( $jad->hari=='Rabu'){echo "selected"; } ?> value="Rabu">Rabu</option>
              <option <?php if( $jad->hari=='Kamis'){echo "selected"; } ?> value="Kamis">Kamis</option>
              <option <?php if( $jad->hari=='Jumat'){echo "selected"; } ?> value="Jumat">Jumat</option>
              <option <?php if( $jad->hari=='Sabtu'){echo "selected"; } ?> value="Sabtu">Sabtu</option>
              <option <?php if( $jad->hari=='Minggu'){echo "selected"; } ?> value="Minggu">Minggu</option>
            </select>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Jam Praktek</label>
                  <div class="input-group">
                    <input type="text" name="jam_awal" class="form-control timepicker">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Sampai</label>
                  <div class="input-group">
                    <input type="text" name="jam_akhir" class="form-control timepicker">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div style="margin-top: 10px" class="row">
            <div class="col-md-6">
              <div class="form-group">
            <label>
              <input name="hari_janji" <?php if($jad->perjanjian=='1'){echo "checked"; } ?> value="1" type="checkbox" class="minimal">
                Hari Perjanjian
            </label> <span style="color: red">(*Optional)</span>
          </div>
            </div>
          </div>

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
<!--/ modal ubah data jadwal -->

<script>
function validate(a)
{
    var id= a.value;
    swal({
            title: "",
            text: "Anda Yakin Ingin menghapus ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes !",
            closeOnConfirm: false }, function()
        {
            $(location).attr('href','<?php echo base_url('jadwal/hapus/')?>'+id);
        }
    );
}
 </script>