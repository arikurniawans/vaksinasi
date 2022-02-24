<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $stok; ?> <sup style="font-size: 20px">(Dosis)</sup></h3>

                <p>Jumlah Stok Vaksin</p>
              </div>
              <div class="icon">
                <i class="fa fa-medkit"></i>
              </div>
              <a href="<?php echo base_url(); ?>stok" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $jum_capaian; ?> <sup style="font-size: 20px">(Dosis)</sup></h3>

                <p>Jumlah Capaian Vaksinasi</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo base_url(); ?>capaian" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $pengguna; ?></h3>

                <p>Jumlah Pengguna</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url(); ?>personel" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
        </div>
        <!-- /.row -->
        <!-- Main row -->
          
          <section class="content">
          <div class="container-fluid">
          <div class="row">
          <div class="col-md-6">

          <div class="card card-primary">
          <div class="card-header">
              <h3 class="card-title">Data grafik persentase capaian vaksinasi bulanan</h3>
              <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              </div>
              </div>
              <div class="card-body">
              <div class="chart">
                    <div id ="mygraph"></div>
              </div>
            </div>

          </div>

              </div>

            <div class="col-md-6">

                <div class="card card-info">
                <div class="card-header">
                <h3 class="card-title">Data capaian vaksinasi harian</h3>
                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                </div>
                </div>
                <div class="card-body">
                  <div class="chart">

                  <table border="1" class="table table-bordered">
                      <thead>
                        <tr>      
                          <th>#</th>
                          <th>Jenis Vaksin</th>
                          <th>Total Capaian Vaksinasi</th>
                        </tr>
                      </thead>
                  </table>
                  <div id="contain">  
                    <table border="0" class="table table-striped" id="table_scroll">
                      <tbody>
                        <?php $no=1; foreach($capaian2 as $data){ ?>
                          <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data->jenis_vaksin; ?></td>
                            <td><?php echo $data->capaian_vaksin; ?> Dosis</td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>

                </div>
                </div>

                </div>

              </div>


              <div class="col-md-12">

                <div class="card card-success">
                <div class="card-header">
                <h3 class="card-title">Filter Data capaian vaksinasi per periode</h3>
                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                </div>
                </div>
                <div class="card-body">
                  <div class="chart">

                    <form class="form-inline float-sm-right" method="post" action="<?php echo base_url(); ?>dashboard/tabelcapaian">
                            <label class="sr-only" for="ex-email">Periode 1</label>
                            <input class="form-control mb-2 mr-sm-2 mb-sm-0" id="date_1" type="date" autocomplete="off" name="tgl1" placeholder="Periode 1">
                            <label class="sr-only" for="ex-pass">Periode 2</label>
                            <input class="form-control mb-2 mr-sm-2 mb-sm-0" id="date_2" type="date" autocomplete="off" name="tgl2" placeholder="Periode 2">
                            <button class="btn btn-primary btn-flat" type="submit">Filter Data</button>
                        </form><br/><br/>

                  <table border="1" class="table table-bordered" id="example4">
                      <thead>
                        <tr>      
                          <th>#</th>
                          <th>Tanggal Capaian Vaksinasi</th>
                          <th>Jenis Vaksin</th>
                          <th>Total Capaian Vaksinasi</th>
                          <th>Lokasi Vaksinasi</th>
                          <th>Asal vaksin</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no=1; foreach($tbcapaian as $data){ ?>
                      <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $data->tgl_capaian; ?></td>
                          <td><?php echo $data->lokasi_vaksin; ?></td>
                          <td><?php echo $data->capaian_vaksin; ?> Dosis</td>
                          <td><?php echo $data->jenis_vaksin; ?></td>
                          <td><?php echo $data->asal_vaksin; ?></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                  
                </div>
                </div>

                </div>

              </div>



            </div>
          </div>
            </div>
          </div>

        </section>

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>