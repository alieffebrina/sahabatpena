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

            <?php echo form_open("C_Informasi/update", array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal') ); ?>
            <?php foreach ($informasi as $informasi) { ?>
            <div class='row'>
                  <div class="col-lg-12">
                    <label for="inputEmail3" class="col-sm-1 control-label">Judul</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $informasi->judulinformasi; ?>">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $informasi->id_informasi; ?>">
                        <!-- <span id="pesanjabatan"></span> -->
                      </div>
                  </div>
                </div>
                <br>
            <div class="box-body pad">
                    <textarea id="editor1" name="editor1" rows="10" cols="80">
                      <?php echo $informasi->informasi; ?>    
                    </textarea>
            </div>
          <?php } ?>
                <div class='row'>
                  <div class='col-lg-12'>
                    <label for="inputEmail3" class="col-sm- control-label"></label>
                    <div class="col-sm-3">
                    <a href="<?php echo site_url('informasi'); ?>" class="btn btn-default">Batal</a>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    <br>
                  </div>
                </div>
                <br><br>
          </div>
            <?php echo form_close(); ?>
          <!-- /.box -->
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
                
