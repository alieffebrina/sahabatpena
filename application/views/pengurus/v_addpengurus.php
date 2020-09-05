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
        <li class="active">Tambah Pengurus</li>
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
              <h3 class="box-title">Tambah Data Pengurus</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open("C_Pengurus/tambah", array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal') ); ?>
              
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
                    <label for="inputEmail3" class="col-sm-2 control-label">Jabatan</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" onkeyup="cek_jabatan()">
                        <span id="pesanjabatan"></span>
                      </div>
                  </div>
                </div>
                <br>
                <div class='row'>
                  <div class="col-lg-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">NO SK Kepengurusan</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="sk" name="sk" placeholder="Sk" >
                      </div>
                  </div>
                </div> <br>
                <div class='row'>
                  <div class="col-lg-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Kepengurusan</label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control" id="tglaktif" name="tglaktif" placeholder="Tanggal Kepengurusan" >
                      </div>
                  </div>
                </div> <br>
                <div class='row'>
                  <div class='col-lg-12'>
                    <label for="inputEmail3" class="col-sm-2 control-label"></label>
                    <div class="col-sm-3">
                    <a href="<?php echo site_url('pengurus'); ?>" class="btn btn-default">Batal</a>
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
                
