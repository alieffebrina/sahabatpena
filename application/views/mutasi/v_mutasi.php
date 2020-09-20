<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Mutasi
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('mutasi'); ?>">Data Mutasi</a></li>
        <li class="active">Data Mutasi</li>
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
              <h3 class="box-title">Data Mutasi</h3>
            </div>

            <div class="box-header">
              <a href="<?php echo site_url('mutasi-add'); ?>"><button type="button" class="btn btn-warning" >Mutasi</button></a>
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Cabang / Wilayah Awal</th>
                  <th>Tanggal Mutasi</th>
                  <th>Cabang / Wilayah Sekarang</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($mutasi as $mutasi) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $mutasi->nama; ?></td>
                  <td><?php echo $mutasi->korwilawal; ?></td>
                  <td><?php echo $mutasi->tglupdate; ?></td>
                  <td><?php echo $mutasi->korwilmutasi ?></td>
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