<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Karya Tulis
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_User/tipeuser'); ?>">Data Karya Tulis</a></li>
        <li class="active">Lihat Data</li>
      </ol>
    </section>
    <div class="box-body">
    <?php if ($this->session->flashdata('Sukses')) { ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fa fa-check"></i> Sukses!</h5>
          <?=$this->session->flashdata('Sukses')?>.
        </div>                 
      <?php } ?>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class='col-lg-12'>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tambah Data</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <form action='<?= site_url("C_User/tambahkaryatulis")?>' method='POST'>
                  <?php foreach ($user as $user) { ?>
                <div class='row'>
                  <div class="col-lg-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">No Anggota</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="" name="" readonly value="<?php echo $user->noanggota ?>">
                        <input type="hidden" class="form-control" id="noanggota" name="noanggota" readonly value="<?php echo $user->id_anggota ?>">
                      </div>
                  </div>
                </div>
                <br>
                <div class='row'>
                  <div class="col-lg-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="namaanggota" name="namaanggota" readonly value="<?php echo $user->nama ?>">
                      </div>
                  </div>
                </div> <br>
                <div class='row'>
                  <div class="col-lg-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Publish</label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control" id="tgl" name="tgl" >
                      </div>
                  </div>
                </div> <br>
                <div class='row'>
                  <div class="col-lg-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">Karya Tulis</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" rows="3" id="karyatulis" name="karyatulis" required></textarea>
                      </div>
                  </div>
                </div> <br>

                <?php  } ?>
                <div class='row'>
                  <div class='col-lg-12'>
                    <label for="inputEmail3" class="col-sm-2 control-label"></label>
                    <div class="col-sm-3">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Karya Tulis</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Publish</th>
                  <th>Karya Tulis</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($karyatulis as $karyatulis) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo date('d-m-Y', strtotime($karyatulis->tglpublish)); ?></td>
                  <td><?php echo $karyatulis->karyatulis; ?></td>
                  <td>
                    <div class="btn-group">
                      <a href="<?php echo site_url('C_User/editkt/'.$karyatulis->id_anggota.'/'.$karyatulis->id_karyatulis); ?>"><button type="button" class="btn btn-info"><i class="fa fa-fw fa-pencil-square-o"></i></button></a>
                      <a href="<?php echo site_url('C_User/hapuskt/'.$karyatulis->id_anggota.'/'.$karyatulis->id_karyatulis); ?>"><button type="button" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button></a>
                    </div>
                  </td>
                </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>