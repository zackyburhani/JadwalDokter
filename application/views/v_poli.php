  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Data Poli
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Data Poli</a></li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <button class="btn btn-default" data-toggle="modal" href="#" data-target="#ModalEntryPoli"><i class="fa fa-plus"></i></button> Tambah Data Poli
            </div>
            <div class="panel-body">
              <table style="table-layout:fixed" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th width="50px">No. </th>
                    <th><center>Nama Poli</center></th>
                    <th width="500px" align="center;"> <center>Action</center> </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td align="center">1. </td>
                    <td align="center">Dokter Gigi</td>
                    <td align="center"><a href="" class="btn btn-sm btn-warning btn-circle" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> </a>
                    <a href="" class="btn btn-sm btn-danger btn-circle" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> </a></td>
                  </tr>
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
      <form method="POST" action="" enctype="multipart/form-data">
        <div class="modal-body">
          
          <div class="form-group"><label>ID Poli</label>
            <input required class="form-control required" data-placement="top" data-trigger="manual" type="text" name="id_poli">
          </div>
                
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