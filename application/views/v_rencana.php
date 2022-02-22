<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Rencana</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Rencana</li>
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
                <h3 class="card-title">Data Rencana Vaksin</h3>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>TANGGAL VAKSIN</th>
                    <th>LOKASI VAKSIN</th>
                    <th>RENCANA VAKSIN</th>
                    <th>JENIS VAKSIN</th>
                    <th>ASAL VAKSIN</th>
                    <th>AKSI</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; foreach($rencana as $data){ ?>
                  <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data->tgl_rencana; ?></td>
                      <td><?php echo $data->lokasi_vaksin; ?></td>
                      <td><?php echo $data->rencana_vaksin; ?></td>
                      <td><?php echo $data->jenis_vaksin; ?></td>
                      <td><?php echo $data->asal_vaksin; ?></td>
                      <td>
                          <a href="javascript:void(0);" data-toggle="modal" data-target="#editpersonel<?php echo $data->id_rencana; ?>" class="btn btn-flat btn-primary btn-xs">Edit</a>
                          <a href="javascript:void(0);" data-toggle="modal" data-target="#hapuspersonel<?php echo $data->id_rencana; ?>" class="btn btn-flat btn-danger btn-xs">Hapus</a>
                      </td>
                  </tr>

                  <div class="modal fade" id="editpersonel<?php echo $data->id_rencana; ?>">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <form action="<?php echo base_url(); ?>rencana/edit" method="post">
                              <div class="modal-header" style="background-color: #17a2b8; color: white;">
                                <h4 class="modal-title">Ubah Data Rencana Vaksin</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Vaksin</label>
                                    <input type="hidden" name="id" value="<?php echo $data->id_rencana; ?>"/>
                                    <input type="date" class="form-control" id="exampleInputEmail1" name="tgl_vaksin" required value="<?php echo $data->tgl_rencana; ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Lokasi Vaksin</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="lokasi_vaksin" placeholder="Ketikan lokasi vaksin" required value="<?php echo $data->lokasi_vaksin; ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Rencana Vaksin</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" name="rencana_vaksin" placeholder="Ketikan rencana vaksin" required value="<?php echo $data->rencana_vaksin; ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Jenis Vaksin</label>
                                    <select class="form-control select2" style="width: 100%;" name="jenis_vaksin" required>
                                      <option selected="selected" value="">Pilih Jenis Vaksin</option>
                                      <option value="<?php echo $data->id_stok; ?>" selected><?php echo $data->jenis_vaksin; ?></option>
                                      <?php foreach ($stok as $datastok) { ?>
                                        <option value="<?php echo $datastok->id_stok; ?>"><?php echo $datastok->jenis_vaksin; ?></option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Asal Vaksin</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="asal_vaksin" placeholder="Ketikan asal vaksin" value="<?php echo $data->asal_vaksin; ?>">
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


                        <div class="modal fade" id="hapuspersonel<?php echo $data->id_rencana; ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                          <form action="<?php echo base_url(); ?>rencana/delete" method="post">
                            <div class="modal-header" style="background-color: #dc3545; color: white;">
                              <h4 class="modal-title">Hapus Rencana Vaksin</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <input type="hidden" name="id" value="<?php echo $data->id_rencana; ?>"/>
                            <input type="hidden" name="jenis" value="<?php echo $data->id_stok; ?>"/>
                            <input type="hidden" name="rencana" value="<?php echo $data->rencana_vaksin; ?>"/>
                              Apakah anda ingin menghapus data rencana vaksinasi berikut ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-flat btn-default" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-flat btn-danger">Hapus Data Rencana Vaksin</button>
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
          <form action="<?php echo base_url(); ?>rencana/create" method="post">
            <div class="modal-header" style="background-color: #17a2b8; color: white;">
              <h4 class="modal-title">Tambah Data Rencana Vaksin</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Vaksin</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" name="tgl_vaksin" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Lokasi Vaksin</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="lokasi_vaksin" placeholder="Ketikan lokasi vaksin" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Rencana Vaksin</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" name="rencana_vaksin" placeholder="Ketikan rencana vaksin" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Vaksin</label>
                    <select class="form-control select2" style="width: 100%;" name="jenis_vaksin" required>
                      <option selected="selected">Pilih Jenis Vaksin</option>
                      <?php foreach ($stok as $data) { ?>
                        <option value="<?php echo $data->id_stok; ?>"><?php echo $data->jenis_vaksin; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Asal Vaksin</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="asal_vaksin" placeholder="Ketikan asal vaksin">
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
        text: "Data rencana vaksin berhasil ditambahkan",
        icon: "success",
        button: "OK",
    });
<?php }else if($this->session->flashdata('message') == 'error') { ?>
  swal({
        title: "Gagal",
        text: "Data rencana vaksin gagal ditambahkan !",
        icon: "error",
        button: "OK",
    });
<?php } ?>

<?php if($this->session->flashdata('message2') == 'successfull') { ?>
   swal({
        title: "Berhasil",
        text: "Data rencana vaksin berhasil diubah",
        icon: "success",
        button: "OK",
    });
<?php }else if($this->session->flashdata('message2') == 'error') { ?>
  swal({
        title: "Gagal",
        text: "Data rencana vaksin gagal diubah !",
        icon: "error",
        button: "OK",
    });
<?php } ?>

<?php if($this->session->flashdata('message') == 'warn') { ?>
   swal({
        title: "Perhatian !",
        text: "Data rencana vaksin melebihi jumlah stok vaksin berikut !",
        icon: "warning",
        button: "OK",
    });
<?php } ?>

<?php if($this->session->flashdata('message') == 'expired') { ?>
   swal({
        title: "Perhatian !",
        text: "Vaksin berikut telah memasuki masa expired !",
        icon: "warning",
        button: "OK",
    });
<?php } ?>

<?php if($this->session->flashdata('message3') == 'successfull') { ?>
   swal({
        title: "Berhasil",
        text: "Data capaian berhasil dihapus",
        icon: "success",
        button: "OK",
    });
<?php }else if($this->session->flashdata('message3') == 'error') { ?>
  swal({
        title: "Gagal",
        text: "Data capaian gagal dihapus !",
        icon: "error",
        button: "OK",
    });
<?php } ?>
</script>