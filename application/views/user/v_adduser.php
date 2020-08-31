 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Anggota
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_User'); ?>">Data Anggota</a></li>
        <li class="active">Tambah Anggota</li>
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
              <h3 class="box-title">Tambah Data Anggota</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open("C_User/tambah", array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal') ); ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">NIK</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nik" name="nik" required maxlength="16" minlength="16" placeholder="NIK" onkeypress="return Angkasaja(event)" onkeyup="cek_nik()">
                  <span id="pesannik"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                  </div>
                </div>                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tempat Lahir</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" placeholder="Tempat Lahir" required>
                  </div>
                </div>                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Lahir</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="tgllahir" name="tgllahir" placeholder="Tanggal Lahir" required>
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
                  <label for="inputPassword3" class="col-sm-2 control-label">Kota/Kabupaten</label>
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
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="3" id="alamat" name="alamat" required></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No HP</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="tlp" name="tlp" placeholder="Telepon" maxlength="12" minlength="6" onkeypress="return Angkasaja(event)" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">E-Mail</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" placeholder="E-Mail" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Instagram</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Instagram">
                  </div>
                </div>       
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Facebook</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook">
                  </div>
                </div>       
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Twitter</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Twitter">
                  </div>
                </div>       
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Youtube Channel</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="youtube" name="youtube" placeholder="Youtube Channel">
                  </div>
                </div>     
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Institusi</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="institusi" name="institusi" placeholder="Institusi" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Latar Belakang</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="latarbelakang" name="latarbelakang" placeholder="Latar Belakang" required>
                  </div>
                </div>     
                 <!-- <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Karya Tulis</label>
                  <div class="col-sm-9">
                  <div class="input-group input-group-sm">

                    <input type="text" class="form-control" name="karyatulis[]" placeholder="Karya Tulis">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-default" id="btn" name="btn" onclick="tkt();">
                            Tambah
                          </button>
                        </span>
                  </div>
                  </div>
                </div>   -->

                <!-- <div class="form-group">
                        <div id="addtkt"></div>
                      </div> -->
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Registrasi</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="tglregistrasi" name="tglregistrasi" value="<?php echo date('Y-m-d'); ?>">
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Domisili Anggota</label>
                  <div class="col-sm-9">
                    <input type="radio" id="Pusat" name="domisili" value="SPK Pusat">
                    SPK Pusat &nbsp;&nbsp;&nbsp;
                    <input type="radio" id="Daerah" name="domisili" value="SPK Daerah">
                    SPK Daerah
                  </div>
                </div> -->
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Foto</label>
                  <div class="col-sm-9">
                    <input type="file" id="foto" class="demoInputBox" name="foto" onchange="ValidateSize(this)">
                  <p><span class="text-danger">Maksimal 2Mb </span></p>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('C_User/index'); ?>" class="btn btn-default">Batal</a>
                    <button type="submit" class="btn btn-info">Tambah Data</button>
                  </div>
              </div>
              <!-- /.box-footer -->
           <?php echo form_close();?>
          </div>
          <!-- /.box -->
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>