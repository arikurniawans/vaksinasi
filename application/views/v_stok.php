<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Stok</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Stok</li>
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
                <h3 class="card-title">Data Stok Vaksin</h3>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>JENIS VAKSIN (Kode Batch)</th>
                    <th>JUMLAH</th>
                    <th>KADALUARSA</th>
                    <th>KETERANGAN</th>
                    <th>STATUS VAKSIN</th>
                    <th>AKSI</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php date_default_timezone_set('Asia/Jakarta');
                        $tgl = date('Y-m-d');
                        $no=1; foreach($stok as $data){ 
                        $expire = strtotime($data->kadaluarsa);
                        $today = strtotime($tgl);
                        if($expire <= $today) { $hari = "Aktif"; $badge = "badge-success"; }else{ echo $hari="Expired"; $badge="badge-danger"; }

                        if($data->jumlah == "0"){ $badestok="badge-danger"; }else{ $badestok=""; }
                  ?>
                  <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data->jenis_vaksin; ?></td>
                      <td><span class="<?php echo $badestok; ?>"><?php echo $data->jumlah; ?> Dosis</span></td>
                      <td><?php echo $data->kadaluarsa; ?></td>
                      <td><?php echo $data->keterangan; ?></td>
                      <td><span class="<?php echo $badge; ?>"><?php echo $hari; ?></span></td>
                      <td>
                          <a href="javascript:void(0);" data-toggle="modal" data-target="#editpersonel<?php echo $data->id_stok; ?>" class="btn btn-flat btn-primary btn-xs">Edit</a>
                          <a href="javascript:void(0);" data-toggle="modal" data-target="#hapuspersonel<?php echo $data->id_stok; ?>" class="btn btn-flat btn-danger btn-xs">Hapus</a>
                      </td>
                  </tr>

                  <div class="modal fade" id="editpersonel<?php echo $data->id_stok; ?>">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <form action="<?php echo base_url(); ?>stok/edit" method="post">
                              <div class="modal-header" style="background-color: #17a2b8; color: white;">
                                <h4 class="modal-title">Ubah Data Stok Vaksin</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                  
                                  <div class="form-group">
                                  <label for="exampleInputEmail1">Jenis Vaksin</label>
                                  <input type="hidden" name="id" value="<?php echo $data->id_stok; ?>"/>
                                  <input type="text" class="form-control" id="exampleInputEmail1" name="jenis_vaksin" required value="<?php echo $data->jenis_vaksin; ?>" placeholder="Ketikan jenis vaksin">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Jumlah Vaksin (Dosis)</label>
                                  <input type="number" class="form-control" id="exampleInputEmail1" name="jumlah_vaksin" placeholder="Ketikan jumlah vaksin" required value="<?php echo $data->jumlah; ?>">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Kadaluarsa</label>
                                  <input type="date" class="form-control" id="exampleInputEmail1" name="kadaluarsa_vaksin" value="<?php echo $data->kadaluarsa; ?>" required>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Keterangan Vaksin</label>
                                  <input type="text" class="form-control" id="exampleInputEmail1" name="keterangan_vaksin" placeholder="Ketikan keterangan vaksin" value="<?php echo $data->keterangan; ?>">
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


                        <div class="modal fade" id="hapuspersonel<?php echo $data->id_stok; ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                          <form action="<?php echo base_url(); ?>stok/delete" method="post">
                            <div class="modal-header" style="background-color: #dc3545; color: white;">
                              <h4 class="modal-title">Hapus Stok Vaksin</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <input type="hidden" name="id" value="<?php echo $data->id_stok; ?>"/>
                              Apakah anda ingin menghapus data stok vaksin berikut ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-flat btn-default" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-flat btn-danger">Hapus Data Stok Vaksin</button>
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
          <form action="<?php echo base_url(); ?>stok/create" method="post">
            <div class="modal-header" style="background-color: #17a2b8; color: white;">
              <h4 class="modal-title">Tambah Data Rencana Vaksin</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Vaksin</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="jenis_vaksin" required placeholder="Ketikan jenis vaksin">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah Vaksin (Dosis)</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" name="jumlah_vaksin" placeholder="Ketikan jumlah vaksin" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kadaluarsa</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" name="kadaluarsa_vaksin" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan Vaksin</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="keterangan_vaksin" placeholder="Ketikan keterangan vaksin">
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
        text: "Data stok vaksin berhasil ditambahkan",
        icon: "success",
        button: "OK",
    });
<?php }else if($this->session->flashdata('message') == 'error') { ?>
  swal({
        title: "Gagal",
        text: "Data stok vaksin gagal ditambahkan !",
        icon: "error",
        button: "OK",
    });
<?php } ?>

<?php if($this->session->flashdata('message2') == 'successfull') { ?>
   swal({
        title: "Berhasil",
        text: "Data stok vaksin berhasil diubah",
        icon: "success",
        button: "OK",
    });
<?php }else if($this->session->flashdata('message2') == 'error') { ?>
  swal({
        title: "Gagal",
        text: "Data stok vaksin gagal diubah !",
        icon: "error",
        button: "OK",
    });
<?php } ?>

<?php if($this->session->flashdata('message3') == 'successfull') { ?>
   swal({
        title: "Berhasil",
        text: "Data stok berhasil dihapus",
        icon: "success",
        button: "OK",
    });
<?php }else if($this->session->flashdata('message3') == 'error') { ?>
  swal({
        title: "Gagal",
        text: "Data stok gagal dihapus !",
        icon: "error",
        button: "OK",
    });
<?php } ?>
</script>