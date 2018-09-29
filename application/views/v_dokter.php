  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Data Dokter
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
                  }, 550);
          </script>
        <?php } ?>

        <?php if ($this->session->flashdata('pesanGagal') == TRUE) { ?>
           <script>
            setTimeout(function() {
              swal({
                      title: "<?php echo $this->session->flashdata('pesanGagal') ?>",
                      type: "error"
                    });
                  }, 550);
          </script>
        <?php } ?>

      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <button class="btn btn-default" data-toggle="modal" href="#" data-target="#ModalEntryDokter"><i class="fa fa-plus"></i></button> Tambah Data Dokter
            </div>
            <div class="panel-body">
			
              <table style="table-layout:fixed" class="table table-striped table-bordered table-hover" id="datatableJadwal">
                <thead>
                  <tr>
                    <th width="50px">No. </th>
                    <th><center>Nama Dokter</center></th>
                    <th><center>Nama Poli</center></th>
                    <th width="200px" align="center;"> <center>Action</center> </th>
                  </tr>
                </thead>
                <tbody>
        				<?php $no=1; ?>
        				<?php foreach($getAllDokter as $dok) { ?>
                  <tr>
                    <td align="center"><?php echo $no++; ?>. </td>
                    <td><?php echo $dok->nm_dokter ?></td>
                    <td align="center"><?php echo strtoupper($dok->nm_poli) ?></td>
                    <td align="center">
          					  <button data-target="#ModalDetailDokter<?php echo $dok->id_dokter ?>" class="btn btn-sm btn-info btn-circle" data-toggle="modal"><span class="fa fa-folder-open"></span> </button>
                      <button data-target="#ModalUpdateDokter<?php echo $dok->id_dokter ?>" class="btn btn-sm btn-warning btn-circle" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> </button>
                      <button onclick="validate(this)" value="<?php echo $dok->id_dokter ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
					          </td>
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
  
<!-- modal tambah data dokter -->
<div class="modal fade" id="ModalEntryDokter" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-users"></i> Tambah Data Dokter</h4>
      </div>
      <form method="POST" action="<?php echo site_url('dokter/simpan') ?>" enctype="multipart/form-data">
        <div class="modal-body">
          
          <input required class="form-control" value="<?php echo $getKode ?>" type="hidden" name="id_dokter">
                
          <div class="form-group"><label>Nama Dokter</label>
            <input required class="form-control required" placeholder="Input Nama Kriteria" data-placement="top" data-trigger="manual" type="text" name="nm_dokter">
          </div>

          <div class="form-group"><label>Tangga Lahir</label>
            <input required class="form-control required" placeholder="Input Nama Kriteria" data-placement="top" data-trigger="manual" type="date" name="tgl_lahir">
          </div>

          <div class="form-group"><label>Alamat</label>
            <textarea name="alamat" class="form-control"></textarea>
          </div>

          <div class="form-group">
            <label>Nama Poli</label>
              <select name="id_poli" class="form-control" style="width: 100%;">
                <?php foreach($getAllpoli as $poli){ ?>
                  <option value="<?php echo $poli->id_poli ?>"><?php echo strtoupper($poli->nm_poli) ?></option>
                <?php } ?>
              </select>
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
<!--/ modal tambah data dokter -->

<!-- modal ubah data dokter -->
<?php foreach($getAllDokter as $dok) { ?>
<div class="modal fade" id="ModalUpdateDokter<?php echo $dok->id_dokter ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-users"></i> Tambah Data Dokter</h4>
      </div>
      <form method="POST" action="<?php echo site_url('dokter/ubah') ?>" enctype="multipart/form-data">
        <div class="modal-body">
          
          <input required class="form-control" value="<?php echo $dok->id_dokter ?>" type="hidden" name="id_dokter">
                
          <div class="form-group"><label>Nama Dokter</label>
            <input required class="form-control required" placeholder="Input Nama Kriteria" data-placement="top" data-trigger="manual" type="text" name="nm_dokter" value="<?php echo $dok->nm_dokter ?>">
          </div>

          <div class="form-group"><label>Tangga Lahir</label>
            <input required class="form-control required" placeholder="Input Nama Kriteria" data-placement="top" data-trigger="manual" type="date" name="tgl_lahir" value="<?php echo $dok->tgl_lahir ?>">
          </div>

          <div class="form-group"><label>Alamat</label>
            <textarea name="alamat" class="form-control"><?php echo $dok->alamat?></textarea>
          </div>

          <div class="form-group">
            <label>Nama Poli</label>
              <select name="id_poli" class="form-control" style="width: 100%;">
                <?php foreach($getAllpoli as $poli){ ?>
                  <option <?php if($poli->id_poli == $dok->id_poli): echo "selected"; endif;?> value="<?php echo $poli->id_poli ?>"><?php echo strtoupper($poli->nm_poli) ?></option>
                <?php } ?>
              </select>
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
<!--/ modal ubah data dokter -->

<!-- modal ubah data dokter -->
<?php foreach($getAllDokter as $data) { ?>
<div class="modal fade" id="ModalDetailDokter<?php echo $data->id_dokter ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-users"></i> Detail Dokter</h4>
      </div>
      <div class="modal-body">
        <table class="table table-responsive" border="0">
          <tbody>
            <tr>
              <td width="200px">Nama Dokter</td>
              <td>:</td>
              <td><?php echo $data->nm_dokter ?></td>
            </tr>
            <tr>
              <td width="200px">Tanggal Lahir</td>
              <td>:</td>
              <td><?php echo shortdate_indo($data->tgl_lahir) ?></td>
            </tr>
            <tr>
              <td width="200px">Nama POLI</td>
              <td>:</td>
              <td><?php echo strtoupper($data->nm_poli) ?></td>
            </tr>
            <tr>
              <td width="200px">Alamat</td>
              <td>:</td>
              <td><?php echo ucwords($data->alamat) ?></td>
            </tr>
          </tbody>
        </table> 
      </div> 
    </div>
  </div>
</div>
<?php } ?>
<!--/ modal ubah data dokter -->

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
            $(location).attr('href','<?php echo base_url('dokter/hapus/')?>'+id);
        }
    );
}
 </script>

 