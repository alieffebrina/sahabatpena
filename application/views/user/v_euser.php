 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data Anggota
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_User'); ?>">Data Anggota</a></li>
        <li class="active">Edit Data Anggota</li>
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
              <h3 class="box-title">Data Pribadi</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open("C_User/edituser", array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal') ); ?>
              <div class="box-body">
                <?php foreach ($user as $key) { ?>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">No Anggota</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="noanggota" name="noanggota" value="<?php echo $key->noanggota ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">NIK</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nik" name="nik" maxlength="16" minlength="16" value="<?php echo $key->nik ?>" onkeypress="return Angkasaja(event)" >
                    <input type="hidden" class="form-control" id="idfoto" name="id" value="<?php echo $key->id_anggota ?>">
                  <span id="pesannik"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $key->nama ?>" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $key->username ?>" maxlength='16'>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="password" name="password" value="<?php echo $key->password ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tempat Lahir</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" value="<?php echo $key->tempatlahir; ?>" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Lahir &nbsp;</label>
                  <div class="col-sm-9">
                  <div class="input-group input-group-sm">
                    <div id="hidawak"><input type="text" class="form-control" id="tgllahir1" name="tgllahir1" value="<?php echo date('d-m-Y', strtotime($key->tgllahir)); ?>" readonly></div>
                    <div id="hid"><input type="date" class="form-control" id="tgllahir" name="tgllahir"></div>
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat" onclick="ubahtgllahir()">Ubah</button>
                    </span>
                  </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Provinsi</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="prov" name="prov" style="width: 100%;">
                      <option value="">--Pilih--</option>
                      <?php foreach ($provinsi as $provinsi) { ?>
                      <option value="<?php echo $provinsi->id_provinsi ?>" <?php if($provinsi->id_provinsi == $key->id_provinsi){echo "selected";} ?>><?php echo $provinsi->name_prov ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kota/Kabupaten</label>
                  <div class="col-sm-9">
                  <select class="form-control select2" id="kota" name="kota" style="width: 100%;">
                    <option value="<?php echo $key->id_kota ?>"><?php echo $key->name_kota ?></option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kecamatan</label>
                  <div class="col-sm-9">
                  <select class="form-control select2" id="kecamatan" name="kecamatan" style="width: 100%;">
                    <option value="<?php echo $key->id_kecamatan ?>"><?php echo $key->kecamatan ?></option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="3" id="alamat" name="alamat" ><?php echo $key->alamat; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No HP</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="tlp" name="tlp" value="<?php echo $key->tlp; ?>" maxlength="12" minlength="6" onkeypress="return Angkasaja(event)" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">E-Mail</label>
                  <div class="col-sm-9"> 
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $key->email; ?>" >
                  </div>
                </div>    
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Institusi</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="institusi" name="institusi" value="<?php echo $key->institusi; ?>" >
                  </div>
                </div>  
                <?php $lt = explode("/", $key->latarbelakang)?>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Pendidikan S1</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="latarbelakang1" name="latarbelakang1" value="<?php echo $lt[0]; ?>" >
                  </div>
                </div>    
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Pendidikan S2</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="latarbelakang2" name="latarbelakang2" value="<?php echo $lt[1]; ?>" >
                  </div>
                </div> 
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Pendidikan S3</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="latarbelakang3" name="latarbelakang3" value="<?php echo $lt[2]; ?>"  >
                  </div>
                </div> 
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Foto </label>
                    <div id="fotoganti">    
                    <div class="col-sm-6">
                      <img class="img-responsive" src="<?php echo base_url() ?>images/<?php echo $key->foto ?>" alt="Photo" width="350px" height="197px" >
                    </div>
                    <div class="col-sm-3">
                      <button type="button" onclick="changefoto()">Ganti</button>
                    </div>
                  </div>
                    <div id="showganti" hidden="true">          
                      <div class="col-sm-9">
                        <input type="file" id="foto" class="demoInputBox" name="foto" onchange="ValidateSize(this)">
                        <p><span class="text-danger">Maksimal 2Mb </span></p>
                      </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>   
           <!-- left column -->
        
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Sosial Media</h3>
            </div>
              <!-- Date dd/mm/yyyy -->
              <div class="form-horizontal">

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Website</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="website" name="website" value="<?php echo $key->website; ?>" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Instagram</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="instagram" name="instagram" value="<?php echo $key->instagram; ?>" >
                  </div>
                </div>       
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Facebook</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="facebook" name="facebook" value="<?php echo $key->facebook; ?>" >
                  </div>
                </div>       
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Twitter</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="twitter" name="twitter" value="<?php echo $key->twitter; ?>" >
                  </div>
                </div>       
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Youtube Channel</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="youtube" name="youtube" value="<?php echo $key->youtube; ?>" >
                  </div>
                </div>
                <br>
              </div>
              <!-- /.form group -->

            </div>
            <!-- /.box-body -->
          </div>
        </div>
        
        <?php $id = $this->session->userdata('statusanggota'); ?>
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Status Keanggotaan</h3>
            </div>
              <!-- Date dd/mm/yyyy -->
              <div class="form-horizontal">
                
               <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Registrasi</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="tglregistrasi" name="tglregistrasi" value="<?php echo $key->tglregistrasi; ?>" <?php if($id != "administrator"){ echo "readonly"; } ?> >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Cabang / Wilayah</label>
                  <div class="col-sm-9">
                     <?php if($id != "administrator"){ echo "<input type='text' class='form-control' value= '".$key->namakorwil."' readonly>"; } else { ?> 
                    <select class="form-control select2" id="korwil" name="korwil" style="width: 100%;">
                      <?php foreach ($korwil as $korwil) { ?>
                        <option value="<?php echo $korwil->id_korwil ?>" <?php if($key->id_korwil == $korwil->id_korwil){ echo "selected"; } ?> ><?php echo $korwil->namakorwil ?></option>
                      <?php } ?>
                    </select>
                  <?php } ?>
                  </div>
                </div>         
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kategori Anggota</label>
                  <div class="col-sm-9">
                    <?php if($id != "administrator"){ echo "<input type='text' value= '".$key->statusanggota."' name='aktivasi' class='form-control' readonly>"; } else { ?> 
                    <select class="form-control select2" id="aktivasi" name="aktivasi" style="width: 100%;">
                      <option value="anggota" <?php if($key->statusanggota != 'tidak aktif'){ echo "selected"; } ?>>Aktif</option>
                      <option value="tidak" <?php if($key->statusanggota == 'tidak aktif' && $key->alasan == NULL ){ echo "selected"; } ?> >Tidak Aktif</option>
                      <option value="resign" <?php if($key->statusanggota == 'tidak aktif' && $key->alasan != NULL ){ echo "selected"; } ?>  >Mengundurkan Diri </option>
                    </select>
                  <?php } ?>
                  </div>
                </div>   
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Status Anggota</label>
                  <div class="col-sm-9">
                    <?php if($id != "administrator"){ if($key->statusanggota != 'tidak aktif') { echo "<input type='text' value='Aktif' class='form-control' readonly>"; } else { 
                      echo "<input type='text' value='Tidak Aktif' class='form-control' readonly>"; } } else { ?> 
                    <select class="form-control select2" id="aktivasi2" name="aktivasi2" style="width: 100%;">
                      <option value="anggota" <?php if($key->statusanggota != 'tidak aktif'){ echo "selected"; } ?>>Aktif</option>
                      <option value="tidak" <?php if($key->statusanggota == 'tidak aktif' && $key->alasan == NULL ){ echo "selected"; } ?> >Tidak Aktif</option>
                      <option value="resign" <?php if($key->statusanggota == 'tidak aktif' && $key->alasan != NULL ){ echo "selected"; } ?>  >Mengundurkan Diri </option>
                    </select>
                  <?php } ?>
                  </div>
                </div>       
                <input type="hidden" name="korwilawal" value="<?php echo $key->id_korwil; ?>">
                <div class="form-group">
                  <div id = 'idresign'>
                  <label for="inputPassword3" class="col-sm-2 control-label">Alasan Mengundurkan Diri</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="idresign" name="reason"  value="<?php if( $key->alasan == NULL){ echo '-'; } else { echo $key->alasan; } ?>"  <?php if($id != "administrator"){ echo "readonly"; } ?> >
                  </div>
                </div>
                </div>
                <br>
              </div>
              <!-- /.form group -->

            </div>
            <!-- /.box-body -->
          </div>
        </div>
          <!-- /.box -->
          <!-- /.box -->
            <?php } ?>
        
              <!-- /.box-footer -->
           <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Karya Tulis</h3>
            </div>
              <!-- Date dd/mm/yyyy -->
               <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Publish</th>
                  <th>Judul Karya Tulis</th>
                  <th>Jenis Karya Tulis</th>
                  <th>Penerbit / Publisher</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($karyatulis as $karyatulis) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo date('d-m-Y', strtotime($karyatulis->tglpublish)); ?></td>
                  <td><?php echo $karyatulis->karyatulis; ?></td>
                  <td><?php echo $karyatulis->jenis; ?></td>
                  <td><?php echo $karyatulis->penerbit; ?></td>
                </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('C_User/index'); ?>" class="btn btn-default">Batal</a>
                    <button type="submit" class="btn btn-info">Simpan Data</button>
                  </div>
                </div> 
              <!-- /.form group -->

           <?php echo form_close();?>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
          <!-- /.box -->
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <script type="text/javascript">
    document.getElementById("hid").hidden = true;
    function ubahtgllahir() {
      document.getElementById("hid").hidden = false;
    document.getElementById("hidawak").hidden = true;
    }
  </script>

  <script type="text/javascript">
    function changefoto(){
      
      document.getElementById("fotoganti").hidden = true;
      document.getElementById("showganti").hidden = false;
    }
  // $(document).ready(function() {
    // ketika tombol detail ditekan
    // $('.print_kartu').on("click", function(){
    // ambil nilai id dari link print
    
  // });
  
  </script> 