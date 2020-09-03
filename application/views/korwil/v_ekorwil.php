<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php foreach ($korwil as $korwil) {
          echo 'Data Korwil '.$korwil->namakorwil;
          $kor = $korwil->id_korwil;
        } ?>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_Korwil'); ?>">Data Korwil</a></li>
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
              <h3 class="box-title">Detail Data Korwil</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
            <?php echo form_open("C_Korwil/editkorwil", array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal') ); ?>

              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Korwil</label>
                    <div class="col-sm-9">
                       <input type="text" class="form-control" id="namakorwil" name="namakorwil" value="<?php echo $korwil->namakorwil; ?>" >

                       <input type="text" class="form-control" id="id" name="id" value="<?php echo $korwil->id_korwil; ?>" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Berdiri</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="tglberdiri" name="tglberdiri" value="<?php echo $korwil->tglberdiri; ?>" >
                  </div>
                </div>                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="3" id="alamat" name="alamat" readonly><?php echo $korwil->alamat ?></textarea>
                  </div>
            
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Provinsi</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="prov" name="prov" style="width: 100%;">
                      <option value="">--Pilih--</option>
                      <?php foreach ($provinsi as $provinsi) { ?>
                      <option value="<?php echo $provinsi->id_provinsi ?>" <?php if($provinsi->id_provinsi == $korwil->id_provinsi){echo "selected";} ?>><?php echo $provinsi->name_prov ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kota/Kabupaten</label>
                  <div class="col-sm-9">
                  <select class="form-control select2" id="kota" name="kota" style="width: 100%;">
                    <option value="<?php echo $korwil->id_kota ?>"><?php echo $korwil->name_kota ?></option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kecamatan</label>
                  <div class="col-sm-9">
                  <select class="form-control select2" id="kecamatan" name="kecamatan" style="width: 100%;">
                    <option value="<?php echo $korwil->id_kecamatan ?>"><?php echo $korwil->kecamatan ?></option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kode Korwil</label>
                  <div class="col-sm-9">
                  <div class="input-group input-group-sm">

                    <input type="text" class="form-control" name="kodekorwil" id="kodekorwil" value="<?php echo $korwil->kodekorwil ?>" readonly>
                  </div>
                  </div>
                </div>  

                <div class="box-footer">
                    <div class="col-sm-10">
                      <a href="<?php echo site_url('Korwil'); ?>" class="btn btn-default">Batal</a>
                    <button type="submit" class="btn btn-info">Tambah Data</button>
                    </div>
                </div>
              </div>
            
               <?php echo form_close();?>
            </div>
          </div>
        </div>

        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pengurus</h3>
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
                  <td><?php echo date('d-m-Y', strtotime($pengurus->tglaktif));?></td>
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