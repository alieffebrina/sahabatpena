 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Informasi
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('Informasi'); ?>">Data Informasi</a></li>
        <li class="active">Tambah Informasi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Informasi Baru
                <!-- <small>Advanced and full of features</small> -->
              </h3>
            </div>
            <br>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <tdead>
                </tdead>
                <tbody>

                  <?php 
                  foreach ($informasi as $informasi) { ?>
                <tr>
                  <td style="width: 300px">Tanggal Publish</td>
                  <td><?php echo $informasi->tglupdate; ?></td>
                </tr>
                <tr>
                  <td>Judul</td>
                  <td><?php echo $informasi->judulinformasi; ?></td>
                </tr>
                <tr>
                  <td>Informasi</td>
                  <td><?php echo $informasi->informasi; ?></td>
                </tr>
              <?php } ?></tbody>
              </table>
                    <a href="<?php echo site_url('informasi'); ?>" class="btn btn-default">Kembali</a>
            </div>

            
          <!-- /.box -->
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
                
