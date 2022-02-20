<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Personel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Personel</li>
            </ol>
            
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <button type="button" class="btn btn-flat btn-info float-sm-right" data-toggle="modal" data-target="#modal-lg">
            <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data
      </button><br/><br/>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
        
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
          
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Personel</h3>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>PANGKAT</th>
                    <th>NRP</th>
                    <th>JABATAN</th>
                    <th>NO. TELP</th>
                    <th>AKSI</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; foreach($personel as $data){ ?>
                  <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data->nama; ?></td>
                      <td><?php echo $data->pangkat; ?></td>
                      <td><?php echo $data->nrp; ?></td>
                      <td><?php echo $data->jabatan; ?></td>
                      <td><?php echo $data->no_telpon; ?></td>
                      <td>
                          <a href="javascript:void(0);" data-toggle="modal" data-target="#editpersonel<?php echo $data->id_personel; ?>" class="btn btn-flat btn-primary btn-xs">Edit</a>
                          <a href="javascript:void(0);" data-toggle="modal" data-target="#hapuspersonel<?php echo $data->id_personel; ?>" class="btn btn-flat btn-danger btn-xs">Hapus</a>
                      </td>
                  </tr>

                  <div class="modal fade" id="editpersonel<?php echo $data->id_personel; ?>">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <form action="<?php echo base_url(); ?>personel/edit" method="post">
                              <div class="modal-header" style="background-color: #17a2b8; color: white;">
                                <h4 class="modal-title">Ubah Data Personel</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Nama Lengkap</label>
                                      <input type="hidden" name="id" value="<?php echo $data->id_personel; ?>"/>
                                      <input type="text" class="form-control" id="exampleInputEmail1" name="nama" value="<?php echo $data->nama; ?>" placeholder="Ketikan nama lengkap">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Pangkat</label>
                                      <input type="text" class="form-control" id="exampleInputEmail1" name="pangkat" value="<?php echo $data->pangkat; ?>" placeholder="Ketikan Jenis Pangkat">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">NRP</label> *) <font color ="red" style="font-size: 10pt;">NRP digunakan sebagai password default oleh sistem</font>
                                      <input type="text" class="form-control" id="exampleInputEmail1" name="nrp" value="<?php echo $data->nrp; ?>" placeholder="Ketikan NRP">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Jabatan</label>
                                      <input type="text" class="form-control" id="exampleInputEmail1" name="jabatan" value="<?php echo $data->jabatan; ?>" placeholder="Ketikan jabatan">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">No. Telepon</label>
                                      <input type="text" class="form-control" id="exampleInputEmail1" name="telp" value="<?php echo $data->no_telpon; ?>" placeholder="Ketikan no. telepon">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Username</label>
                                      <input type="text" class="form-control" id="exampleInputEmail1" name="username" value="<?php echo $data->username; ?>" placeholder="Ketikan username">
                                    </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-flat btn-default" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-flat btn-info">Simpan Perubahan Data</button>
                              </div>
                            </div>
                            <!-- /.modal-content -->
                            </form>
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->


                        <div class="modal fade" id="hapuspersonel<?php echo $data->id_personel; ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                          <form action="<?php echo base_url(); ?>personel/delete" method="post">
                            <div class="modal-header" style="background-color: #dc3545; color: white;">
                              <h4 class="modal-title">Hapus Personel</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <input type="hidden" name="id" value="<?php echo $data->id_personel; ?>"/>
                              Apakah anda ingin menghapus data personel berikut ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-flat btn-default" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-flat btn-danger">Hapus Data Personel</button>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                          </form>
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->



                  <?php } ?>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          </section>
          <!-- /.Left col -->
          
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <form action="<?php echo base_url(); ?>personel/create" method="post">
            <div class="modal-header" style="background-color: #17a2b8; color: white;">
              <h4 class="modal-title">Tambah Data Personel</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama" placeholder="Ketikan nama lengkap">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Pangkat</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="pangkat" placeholder="Ketikan Jenis Pangkat">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">NRP</label> *) <font color ="red" style="font-size: 10pt;">NRP digunakan sebagai password default oleh sistem</font>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nrp" placeholder="Ketikan NRP">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jabatan</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="jabatan" placeholder="Ketikan jabatan">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">No. Telepon</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="telp" placeholder="Ketikan no. telepon">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="username" placeholder="Ketikan username">
                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-flat btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-flat btn-info">Simpan Data</button>
            </div>
          </div>
          <!-- /.modal-content -->
          </form>
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type='text/javascript'>
<?php if($this->session->flashdata('message') == 'successfull') { ?>
   swal({
        title: "Berhasil",
        text: "Data personel berhasil ditambahkan",
        icon: "success",
        button: "OK",
    });
<?php }else if($this->session->flashdata('message') == 'error') { ?>
  swal({
        title: "Gagal",
        text: "Data personel gagal ditambahkan !",
        icon: "error",
        button: "OK",
    });
<?php } ?>

<?php if($this->session->flashdata('message2') == 'successfull') { ?>
   swal({
        title: "Berhasil",
        text: "Data personel berhasil diubah",
        icon: "success",
        button: "OK",
    });
<?php }else if($this->session->flashdata('message2') == 'error') { ?>
  swal({
        title: "Gagal",
        text: "Data personel gagal diubah !",
        icon: "error",
        button: "OK",
    });
<?php } ?>

<?php if($this->session->flashdata('message3') == 'successfull') { ?>
   swal({
        title: "Berhasil",
        text: "Data personel berhasil dihapus",
        icon: "success",
        button: "OK",
    });
<?php }else if($this->session->flashdata('message3') == 'error') { ?>
  swal({
        title: "Gagal",
        text: "Data personel gagal dihapus !",
        icon: "error",
        button: "OK",
    });
<?php } ?>
</script>