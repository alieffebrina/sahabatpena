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
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Karya Tulis</h3>
            </div>
            <!-- /.box-header -->
            <?php if($aksesadd == 'aktif') { ?>
            <div class="box-header">
              <a href="<?php echo site_url('user-karyatulis'); ?>"><button type="button" class="btn btn-warning" >Lihat Karya Tulis Pribadi</button></a>
            </div>
          <?php } ?>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama </th>
                  <th>Tanggal Publish</th>
                  <th>Judul Karya Tulis</th>
                  <th>Jenis Karya Tulis</th>
                  <th>Penerbit  / Publisher</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($karyatulis as $karyatulis) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $karyatulis->nama; ?></td>
                  <td><?php echo date('d-m-Y', strtotime($karyatulis->tglpublish)); ?></td>
                  <td><?php echo $karyatulis->karyatulis; ?></td>
                  <td><?php echo $karyatulis->jenis; ?></td>
                  <td><?php echo $karyatulis->penerbit; ?></td>
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