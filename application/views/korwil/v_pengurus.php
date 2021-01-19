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
              <h3 class="box-title">Tambah Data Pengurus  Cabang / Wilayah</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">

            <?php echo form_open("C_Korwil/tambahpengurus", array('enctype'=>'multipart/form-data') ); ?>
                <div class='row'>
                  <div class="col-lg-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">Jabatan</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="Ketua" readonly>
                        <input type="hidden" class="form-control" id="korwil" name="korwil" value="<?php echo $kor ?>" >
                        <span id="pesanjabatan"></span>
                      </div>
                  </div>
                </div>
                <br>
                <div class='row'>
                  <div class="col-lg-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">NO SK Kepengurusan</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="nosk" name="nosk" placeholder="NO SK Kepengurusan" >
                      </div>
                  </div>
                </div> <br>
                <div class='row'>
                  <div class="col-lg-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">SK Kepengurusan</label>
                      <div class="col-sm-9">
                        <input type="file" class="form-control" id="skfile" name="skfile" onchange="Validatefile(this)">
                      </div>
                  </div>
                </div> <br>
                <div class='row'>
                  <div class="col-lg-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                      <div class="col-sm-9">  
                      <select class="form-control select2" id="nama" name="nama" style="width: 100%;" required>
                        <option value="">--Pilih--</option>
                        <?php foreach ($user as $user) { ?>
                        <option value="<?php echo $user->id_anggota ?>"><?php echo $user->nama ?></option>
                        <?php } ?>
                      </select>
                      </div>
                  </div>
                </div> <br>
                <div class='row'>
                  <div class="col-lg-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">Masa Aktif Jabatan</label>
                      <div class="col-sm-9">  
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                            <input type="text" class="tanggalan form-control" id="tgl" name="tgl" value="<?php echo date('d-m-Y')?>">
                      </div></div>
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

            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Jabatan</th>
                  <th>Sk</th>
                  <th>Nama</th>
                  <th>Masa Aktif Jabatan</th>
                  <th>Status</th>
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
                  <td><?php echo $pengurus->tglaktif.' s/d '.$pengurus->tglakhir; ?></td>
                  <td><?php echo $pengurus->status ?></td>
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