<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php foreach ($korwil as $korwil) {
          echo 'Data  Cabang / Wilayah '.$korwil->namakorwil;
          $kor = $korwil->id_korwil;
        } ?>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_Korwil'); ?>">Data  Cabang / Wilayah</a></li>
        <li class="active">Lihat Pengurus</li>
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
              <h3 class="box-title">Edit Data Pengurus  Cabang / Wilayah</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <form action='<?= site_url("C_Korwil/editpengurus")?>' method='POST'>
                <?php foreach ($pengurus as $key) { ?>
                <div class='row'>
                  <div class="col-lg-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">Jabatan</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="jabatana" name="jabatan" value="<?php echo $key->jabatan ?>" >
                        <input type="hidden" class="form-control" id="pengurus" name="pengurus" value="<?php echo $key->id_pengurus ?>" ><input type="hidden" class="form-control" id="korwil" name="korwil" value="<?php echo $key->id_korwil ?>" >
                      </div>
                  </div>
                </div>
                <br>
                <div class='row'>
                  <div class="col-lg-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">NO SK Kepengurusan</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="sk" name="sk" value="<?php echo $key->nosk ?>" >
                      </div>
                  </div>
                </div> <br>
                <div class='row'>
                  <div class="col-lg-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                      <div class="col-sm-9">  
                      <select class="form-control select2" id="nama" name="nama" style="width: 100%;" readonly>
                        <option value="<?php echo $key->id_anggota ?>"><?php echo $key->nama ?></option>
                        <!-- <?php foreach ($user as $user) { ?>
                        <option value="<?php echo $user->id_anggota ?>"><?php echo $user->nama ?></option>
                        <?php } ?> -->
                      </select>
                      </div>
                  </div>
                </div> <br>
                <div class='row'>
                  <div class="col-lg-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Kepengurusan</label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control" id="tglaktif" name="tglaktif" value="<?php echo $key->tglaktif ?>" >
                      </div>
                  </div>
                </div> <br>
                <div class='row'>
                  <div class='col-lg-12'>
                    <label for="inputEmail3" class="col-sm-2 control-label"></label>
                    <div class="col-sm-3">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      <a href="<?php echo site_url('Korwil'); ?>" class="btn btn-default">Batal</a>
                    </div>
                  </div>
                </div>
              <?php } ?>
              </form>
            </div>
          </div>
        </div>

        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pengurus  Cabang / Wilayah</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Jabatan</th>
                  <th>Sk</th>
                  <th>Nama</th>
                  <th>Tgl Kepengurusan</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($pengurus as $pengurus) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $pengurus->jabatan; ?></td>
                  <td><?php echo $pengurus->nosk; ?></td>
                  <td><?php echo $pengurus->nama; ?></td>
                  <td><?php echo $pengurus->tglaktif; ?></td>
                  <td>
                    <div class="btn-group">
                      <a href="<?php echo site_url('korwil-pe/'.$pengurus->id_pengurus); ?>"><button type="button" class="btn btn-info"><i class="fa fa-fw fa-pencil-square-o"></i></button></a>
                      <a href="<?php echo site_url('korwil-ph/'.$pengurus->id_pengurus.'/'.$pengurus->id_anggota); ?>"><button type="button" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button></a>
                    </div>
                  </td>
                </tr>
                  <?php  } ?>
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