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
        <li><a href="<?php echo site_url('korwil'); ?>">Data Cabang / Wilayah</a></li>
        <li class="active">Tambah Cabang / Wilayah</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Cabang / Wilayah</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open("C_Korwil/tambah", array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal') ); ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama  Cabang / Wilayah</label>
                    <div class="col-sm-9">
                       <input type="text" class="form-control" id="namakorwil" name="namakorwil" placeholder="Nama  Cabang / Wilayah" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Berdiri</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="tglberdiri" name="tglberdiri" placeholder="Tanggal Berdiri" required>
                  </div>
                </div>                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="3" id="alamat" name="alamat" required></textarea>
                  </div>
            
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Provinsi</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="prov" name="prov" style="width: 100%;" required>
                      <option value="">--Pilih--</option>
                      <?php foreach ($provinsi as $provinsi) { ?>
                      <option value="<?php echo $provinsi->id_provinsi ?>"><?php echo $provinsi->name_prov ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kota</label>
                  <div class="col-sm-9">
                  <select class="form-control select2" id="kota" name="kota" style="width: 100%;" required>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kecamatan</label>
                  <div class="col-sm-9">
                  <select class="form-control select2" id="kecamatan" name="kecamatan" style="width: 100%;" required>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kode  Cabang / Wilayah</label>
                  <div class="col-sm-9">
                  <div class="input-group input-group-sm">

                    <input type="text" class="form-control" name="kodekorwil" id="kodekorwil" placeholder="Kode  Cabang / Wilayah" readonly required>
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalkorwil">
                            Tambah
                          </button>
                        </span>
                  </div>
                  </div>
                </div>
<div class='row'>
                  <div class='col-lg-12'>
                    <label for="inputEmail3" class="col-sm-2 control-label"></label>
                    <div class="col-sm-3">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      <a href="<?php echo site_url('Korwil'); ?>" class="btn btn-default">Batal</a>
                    </div>
                  </div>
                </div> 
              </div>
          </div>
         
               <?php echo form_close();?>
          </div>
          <!-- /.box -->
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
                
