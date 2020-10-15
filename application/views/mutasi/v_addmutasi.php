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
        <li class="active">Tambah Mutasi</li>
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
              <h3 class="box-title">Tambah Data Mutasi</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open("C_Mutasi/tambah", array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal') ); ?>
              
                <div class='row'>
                  <div class="col-lg-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                      <div class="col-sm-9">  
                      <select class="form-control select2" id="cekanggotamutaasi" name="anggotamutasi" style="width: 100%;" required>
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
                    <label for="inputEmail3" class="col-sm-2 control-label">Wilayah / Cabang Awal</label>
                      <div class="col-sm-9">
                        <div id="korwilawalmutasi"></div>
                      </div>
                  </div>
                </div>
                <br>
                <div class='row'>
                  <div class="col-lg-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">Wilayah / Cabang Mutasi</label>
                      <div class="col-sm-9">
                        <select class="form-control select2" id="korwilmutasi" name="korwilmutasi" style="width: 100%;" required>
                        <option value="">--Pilih--</option>
                        <?php foreach ($korwil as $korwil) { ?>
                        <option value="<?php echo $korwil->id_korwil ?>"><?php echo $korwil->namakorwil ?></option>
                        <?php } ?>
                      </select>
                      </div>
                  </div>
                </div> <br>
                <div class='row'>
                  <div class='col-lg-12'>
                    <label for="inputEmail3" class="col-sm-2 control-label"></label>
                    <div class="col-sm-3">
                    <a href="<?php echo site_url('mutasi'); ?>" class="btn btn-default">Batal</a>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                </div>
                <br>
               <?php echo form_close();?>
          </div>
          <!-- /.box -->
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
                
