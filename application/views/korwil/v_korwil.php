<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Cabang / Wilayah
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_User'); ?>">Data Cabang / Wilayah</a></li>
        <li class="active">Data Cabang / Wilayah</li>
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
              <h3 class="box-title">Data Cabang / Wilayah</h3>
            </div>

            <div class="box-header">
              <a href="<?php echo site_url('C_Korwil/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Data</button></a>
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Berdiri</th>
                  <th>Nama Cabang / Wilayah</th>
                  <th>Alamat Kesekretariatan</th>
                  <th>Kode Cabang / Wilayah</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($korwil as $korwil) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $korwil->tglberdiri; ?></td>
                  <td><?php echo $korwil->namakorwil; ?></td>
                  <td><?php echo $korwil->alamat.', '.$korwil->name_kota.', '.$korwil->name_prov; ?></td>
                  <td><?php echo $korwil->kodekorwil; ?></td>
                  <td> 
                    <div class="btn-group">
                      <a href="<?php echo site_url('korwil-p/'.$korwil->id_korwil); ?>"><button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Pengurus!"><i class="fa fa-fw fa-users"></i></button></a>
                      <a href="<?php echo site_url('korwil-view/'.$korwil->id_korwil); ?>"><button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="View Korwil!"><i class="fa fa-fw fa-search"></i></button></a>
                      <?php if($aksesedit == 'aktif'){?>
                      <a href="<?php echo site_url('korwil-edit/'.$korwil->id_korwil); ?>"><button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="View Edit!"><i class="fa fa-fw fa-pencil-square-o"></i></button></a>
                      <?php } ?>
                      <?php if($akseshapus == 'aktif'){?>
                      <a href="<?php echo site_url('C_Korwil/hapus/'.$korwil->id_korwil); ?>" onclick="return confirm('Yakin Dihapus ?') "><button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus!"><i class="fa fa-fw fa-trash-o"></i></button></a>
                      <?php } ?>
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
