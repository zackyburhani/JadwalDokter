  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Data Jadwal
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Data Jadwal</a></li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <button class="btn btn-default" data-toggle="modal" href="#" data-target="#ModalEntryJadwal"><i class="fa fa-plus"></i></button> Tambah Data Jadwal
            </div>
            <div class="panel-body">
              <table style="table-layout:fixed" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th width="50px">No. </th>
                    <th><center>Nama Dokter</center></th>
                    <th><center>Hari</center></th>
                    <th><center>Pagi</center></th>
                    <th><center>Sore</center></th>
                    <th><center>Kehadiran</center></th>
                    <th width="200px" align="center;"> <center>Action</center> </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td align="center">1. </td>
                    <td align="center">Anjay</td>
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
  
<!-- modal tambah data jadwal -->
<div class="modal fade" id="ModalEntryJadwal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-users"></i> Tambah Data Jadwal</h4>
      </div>
      <form method="POST" action="" enctype="multipart/form-data">
        <div class="modal-body">
          
          <div class="form-group"><label>Nama Dokter</label>
            <input required class="form-control required" data-placement="top" data-trigger="manual" type="text" name="id_dokter">
          </div>
                
          <div class="form-group"><label>Hari</label>
            <input required class="form-control required" placeholder="Input Nama Kriteria" data-placement="top" data-trigger="manual" type="text" name="nm_dokter">
          </div>

          <div class="form-group"><label>Pagi</label>
            <input required class="form-control required" placeholder="Input Nama Kriteria" data-placement="top" data-trigger="manual" type="date" name="tgl_lahir">
          </div>

          <div class="form-group"><label>Sore</label>
            <input required class="form-control required" placeholder="Input Nama Kriteria" data-placement="top" data-trigger="manual" type="date" name="tgl_lahir">
          </div>

          <div class="form-group"><label>Nama Poli</label>
            <div class="custom-select my-1 mr-sm-2">
              <select class="form-control" name="kriteria">
                <option value="">poli1</option>
                <option value="">poli2</option>
              </select>
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
<!--/ modal tambah data dokter -->