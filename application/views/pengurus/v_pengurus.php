<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pengurus
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('pengurus'); ?>">Data Pengurus</a></li>
        <li class="active">Data Pengurus</li>
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
              <h3 class="box-title">Data Pengurus</h3>
            </div>

            <div class="box-header">
              <a href="<?php echo site_url('pengurus-add'); ?>"><button type="button" class="btn btn-warning" >Tambah Data</button></a>
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Aktif</th>
                  <th>Nama Pengurus</th>
                  <th>Jabatan</th>
                  <th>No SK</th>
                  <th>Tanggal Non Aktif</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($pengurus as $pengurus) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $pengurus->tglaktif; ?></td>
                  <td><?php echo $pengurus->nama; ?></td>
                  <td><?php echo $pengurus->jabatan ?></td>
                  <td><?php echo $pengurus->nosk; ?></td>
                  <td><?php if($pengurus->tglakhir == '0000-00-00' ){ echo 'sampai saat ini'; } else { echo $pengurus->tglakhir; }?></td>
                  <td> 
                    <div class="btn-group">
                      <a href="<?php echo site_url('pengurus-view/'.$pengurus->id_pengurus); ?>"><button type="button" class="btn-xs btn-success" data-toggle="tooltip" data-placement="bottom" title="View Korwil!"><i class="fa fa-fw fa-search"></i></button></a>
                      <?php if($pengurus->tglakhir == '0000-00-00' ){ ?>
                      <?php if($aksesedit == 'aktif'){?>
                      <a href="<?php echo site_url('pengurus-edit/'.$pengurus->id_pengurus); ?>"><button type="button" class="btn-xs btn-info" data-toggle="tooltip" data-placement="bottom" title="View Edit!"><i class="fa fa-fw fa-pencil-square-o"></i></button></a>
                      <?php } ?>
                      <?php if($akseshapus == 'aktif'){?>
                      <a href="<?php echo site_url('C_Pengurus/hapus/'.$pengurus->id_pengurus.'/'.$pengurus->id_anggota); ?>" onclick="return confirm('Yakin Di Non Aktifkan ?') "><button type="button" class="btn-xs btn-danger" data-toggle="tooltip" data-placement="bottom" title="Tidak Aktif!"><i class="fa fa-fw fa-close"></i></button></a>
                      <?php } }?>
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