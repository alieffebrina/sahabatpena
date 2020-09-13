<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Konfrimasi Data Calon Anggota
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('user'); ?>">Data Anggota</a></li>
        <li class="active">Konfirmasi</li>
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
              <h3 class="box-title">Konfrimasi Data Calon Anggota</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
            <?php echo form_open("C_User/konfirmkorwil", array('enctype'=>'multipart/form-data') ); ?>
                <div class='row'>
                  <div class="col-lg-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">Kowil</label>
                      <div class="col-sm-9">
                        <select class="form-control select2" id="korwil" name="korwil" style="width: 100%;" required>
                            <option value="">--Pilih--</option>
                            <?php foreach ($korwil as $korwil) { ?>
                            <option value="<?php echo $korwil->id_korwil ?>"><?php echo $korwil->namakorwil ?></option>
                            <?php } ?>
                          </select>
                          <input type="hidden" class="form-control" id="idanggota" name="idanggota" value="<?php echo $idanggota; ?>">
                      </div>
                  </div>
                </div>
                <br>
                <div class='row'>
                  <div class='col-lg-12'>
                    <label for="inputEmail3" class="col-sm-2 control-label"></label>
                    <div class="col-sm-3">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>