  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Data Poli
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
              <button class="btn btn-default" data-toggle="modal" href="#" data-target="#ModalEntryPoli"><i class="fa fa-plus"></i></button> Tambah Data Poli
            </div>
            <div class="panel-body">
			
              <table style="table-layout:fixed" class="table table-striped table-bordered table-hover" id="datatableJadwal">
                <thead>
                  <tr>
                    <th width="50px" align="center">No. </th>
                    <th><center>Nama Poli</center></th>
                    <th width="150px" align="center;"> <center>Action</center> </th>
                  </tr>
                </thead>
                <tbody>				
        				<?php $no=1; ?>
        				<?php foreach($getAllpoli as $pol){ ?>
                  <tr>
                    <td align="center"><?php echo $no++; ?>.</td>
                    <td><?php echo strtoupper($pol->nm_poli)?></td>
                    <td align="center">
        						  <button data-target="#ModalUpdatePoli<?php echo $pol->id_poli ?>" data-toggle="modal" class="btn btn-sm btn-warning btn-circle"><span class="glyphicon glyphicon-edit"></span> </button>
        						  <button onclick="validate(this)" value="<?php echo $pol->id_poli ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
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
  
<!-- modal tambah data poli -->
<div class="modal fade" id="ModalEntryPoli" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus-square"></i> Tambah Data Poli</h4>
      </div>
      <form method="POST" action="<?php echo site_url('poli/simpan')?>" enctype="multipart/form-data">
        <div class="modal-body">
           
          <input required value="<?php echo $id_poli ?>" type="hidden" name="id_poli">
                
          <div class="form-group"><label>Nama Poli</label>
            <input required class="form-control required" placeholder="Input Nama Poli" data-placement="top" data-trigger="manual" type="text" name="nm_poli">
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
<!--/ modal tambah data poli -->

<!-- modal update data poli -->
<?php foreach($getAllpoli as $pol){ ?>
<div class="modal fade" id="ModalUpdatePoli<?php echo $pol->id_poli ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus-square"></i> Ubah Data Poli</h4>
      </div>
      <form method="POST" action="<?php echo site_url('poli/ubah') ?>" enctype="multipart/form-data">
        <div class="modal-body">
          
          <div class="form-group"><label>ID Poli</label>
            <input required class="form-control required" data-placement="top" value="<?php echo $pol->id_poli ?>" data-trigger="manual" type="text" name="id_poli">
          </div>
                
          <div class="form-group"><label>Nama Poli</label>
            <input required class="form-control required" placeholder="Input Nama Poli" value="<?php echo $pol->nm_poli ?>" data-placement="top" data-trigger="manual" type="text" name="nm_poli">
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
<!--/ modal update data poli -->


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
            $(location).attr('href','<?php echo base_url('poli/hapus/')?>'+id);
        }
    );
}
 </script>