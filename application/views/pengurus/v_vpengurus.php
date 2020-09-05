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
        <li class="active">Lihat Data Pengurus</li>
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
              <h3 class="box-title">Lihat Data Pengurus</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="form-horizontal">
              <?php foreach ($pengurus as $key) { ?>
                <div class='row'>
                  <div class="col-lg-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                      <div class="col-sm-9">  
                      
                        <input type="text" class="form-control" id="sk" name="sk" value="<?php echo $key->nama; ?>" readonly >
                      </div>
                  </div>
                </div> <br>
                <div class='row'>
                  <div class="col-lg-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">Jabatan</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $key->jabatan; ?>" readonly >
                      </div>
                  </div>
                </div>
                <br>
                <div class='row'>
                  <div class="col-lg-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">NO SK Kepengurusan</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="sk" name="sk" value="<?php echo $key->nosk; ?>" readonly  >
                      </div>
                  </div>
                </div> <br>
                <div class='row'>
                  <div class="col-lg-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Kepengurusan</label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control" id="tglaktif" name="tglaktif"  value="<?php echo $key->tglaktif; ?>" readonly  >
                      </div>
                  </div>
                </div> <br>
                <div class='row'>
                  <div class='col-lg-12'>
                    <label for="inputEmail3" class="col-sm-2 control-label"></label>
                    <div class="col-sm-3">
                    <a href="<?php echo site_url('pengurus'); ?>" class="btn btn-default">Batal</a>
                    </div>
                  </div>
                </div>
                <br>
              <?php } ?>
              </div>
          </div>
          <!-- /.box -->
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
                
