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
              <div class="form-horizontal">
              <div class="box-body">
                <?php foreach ($user as $key) { ?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">NIK</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nik" name="nik" maxlength="16" minlength="16" value="<?php echo $key->nik ?>" onkeypress="return Angkasaja(event)" readonly>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $key->id_anggota ?>">
                  <span id="pesannik"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $key->nama ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $key->username ?>" maxlength='16' readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="password" name="password" value="<?php echo $key->password ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tempat Lahir</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="tlp" name="tlp" value="<?php echo $key->tempatlahir; ?>" readonly >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Lahir</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="tlp" name="tlp" value="<?php echo date('d-m-Y', strtotime($key->tgllahir)); ?>" readonly >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Provinsi</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="prov" name="prov" style="width: 100%;" readonly>
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
                  <select class="form-control select2" id="kota" name="kota" style="width: 100%;" readonly>
                    <option value="<?php echo $key->id_kota ?>"><?php echo $key->name_kota ?></option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kecamatan</label>
                  <div class="col-sm-9">
                  <select class="form-control select2" id="kecamatan" name="kecamatan" style="width: 100%;" readonly>
                    <option value="<?php echo $key->id_kecamatan ?>"><?php echo $key->kecamatan ?></option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="3" id="alamat" name="alamat" readonly ><?php echo $key->alamat; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No HP</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="tlp" name="tlp" value="<?php echo $key->tlp; ?>" maxlength="12" minlength="6" onkeypress="return Angkasaja(event)" readonly >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">E-Mail</label>
                  <div class="col-sm-9"> 
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $key->email; ?>"  readonly>
                  </div>
                </div>    
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Institusi</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="institusi" name="institusi" value="<?php echo $key->institusi; ?>" readonly>
                  </div>
                </div>
                <?php $lt = explode("/", $key->latarbelakang)?>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Pendidikan S1</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="latarbelakang1" name="latarbelakang1" value="<?php echo $lt[0]; ?>" readonly >
                  </div>
                </div>    
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Pendidikan S2</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="latarbelakang2" name="latarbelakang2" value="<?php echo $lt[1]; ?>" readonly >
                  </div>
                </div> 
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Pendidikan S3</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="latarbelakang3" name="latarbelakang3" value="<?php echo $lt[2]; ?>" readonly  >
                  </div>
                </div> 

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Foto </label>
                    <div class="col-sm-6">
                      <img class="img-responsive" src="<?php echo base_url() ?>images/<?php echo $key->foto ?>" alt="Photo" width="197px" height="350px">
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
                    <input type="text" class="form-control" id="website" name="website" value="<?php echo $key->website; ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Instagram</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="instagram" name="instagram" value="<?php echo $key->instagram; ?>" readonly>
                  </div>
                </div>       
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Facebook</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="facebook" name="facebook" value="<?php echo $key->facebook; ?>" readonly>
                  </div>
                </div>       
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Twitter</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="twitter" name="twitter" value="<?php echo $key->twitter; ?>"readonly >
                  </div>
                </div>       
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Youtube Channel</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="youtube" name="youtube" value="<?php echo $key->youtube; ?>" readonly>
                  </div>
                </div>
                <br>
              </div>
              <!-- /.form group -->

            </div>
            <!-- /.box-body -->
          </div>
        </div>
        
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
                    <input type="date" class="form-control" id="tglregistrasi" name="tglregistrasi" value="<?php echo $key->tglregistrasi; ?>"readonly>
                  </div>
                </div> 
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Cabang / Wilayah</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="korwil" name="korwil" value="<?php 
                    if($key->id_korwil != NULL){
                      $submenus = $this->db->query("select * from tb_korwil where id_korwil = '$key->id_korwil'"); 
                      foreach ($submenus->result() as $submenu) {
                        echo $submenu->namakorwil;
                      } 
                    } else {
                      echo '-';
                    }
                     ?>" readonly>
                  </div>
                </div>         
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Status Anggota</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="reason" name="reason" value="Belum Aktif" readonly>
                  </div>
                </div>       
                <br>

              </div>
              <!-- /.form group -->

            </div>
            <!-- /.box-body -->
          </div>
        </div>
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Komitmen</h3>
            </div>
              <!-- Date dd/mm/yyyy -->
              <div class="form-horizontal">
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-9 control-label" style="text-align: left;">&nbsp; &nbsp; &nbsp; 1. Jika Anda diterima menjadi anggota Sahabat Pena Kita (SPK), apakah Anda bersedia bersungguh-sungguh untuk belajar menulis ? <?php echo $key->soal1; ?></label>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-9 control-label" style="text-align: left;">&nbsp; &nbsp; &nbsp; 2. Jika Anda diterima menjadi anggota Sahabat Pena Kita (SPK), apakah Anda bersedia untuk mengikuti semua aturan yang ada di komunitas SPK ? <?php echo $key->soal2; ?></label>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-9 control-label" style="text-align: left;">&nbsp; &nbsp; &nbsp; 3. Jika Anda diterima menjadi anggota, apakah Anda bersedia membayar iuran rutin bulanan yang telah ditentukan untuk pengembangan komunitas Sahabat Pena Kita ?  <?php echo $key->soal3; ?></label>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-9 control-label" style="text-align: left;">&nbsp; &nbsp; &nbsp; 4. Apakah Anda bersedia ditempatkan di cabang Sahabat Pena Kita manapun sesuai hasil penilaian dan seleksi pengurus ? <?php echo $key->soal4; ?></label>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-9 control-label" style="text-align: left;">&nbsp; &nbsp; &nbsp; 5. Apakah Anda bersedia dikeluarkan dari komunita Sahabat Pena Kita jika melakukan pelanggaran tata tertib yang sudah disepakati ? <?php echo $key->soal5; ?></label>
                </div>
                <br>
              </div>
              <!-- /.form group -->

            </div>
            <!-- /.box-body -->
          </div>
        </div>
        
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
                  <th>Penerbit / Publiser</th>
                  <th>Aksi</th>
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
                  <!--<a href="#dialog-popup" class="print_kartu" data-toggle="modal" id="format2" onclick="lihatpdf()" value="<?php echo $karyatulis->file ?>"><span class="glyphicon glyphicon-print">lihat</span></a> -->
                  <td><button onclick="lihatpdf()" id="format2" value="<?php echo $karyatulis->file ?>" href="#dialog-popup" class="print_kartu btn-sm btn-info" data-toggle="modal"><i class="fa fa-fw fa-search"></i></button></td>
                </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('calonuser'); ?>" class="btn btn-default">Batal</a>
                  </div>
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

          <!-- /.box -->
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <div class="modal fade" id="dialog-popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Tutup</span></button>
        <h4 class="modal-title" id="myModalLabel"><span class="fa fa-file-pdf-o"></span>&nbsp;Karya Tulis Ilmiah</h4>
      </div>
      <div class="modal-body" id="MyModalBody">
    ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>  X </button>
        </div>
    </div>
  </div>
</div>

  <script type="text/javascript">
    function lihatpdf(){
      var no_daftar= document.getElementById('format2').value;
      $("#MyModalBody").html('<iframe src="<?php echo base_url();?>karyatulis/'+no_daftar+'" frameborder="no" width="570" height="400"></iframe>');
      // }); 
    }
  // $(document).ready(function() {
    // ketika tombol detail ditekan
    // $('.print_kartu').on("click", function(){
    // ambil nilai id dari link print
    
  // });
  
  </script> 