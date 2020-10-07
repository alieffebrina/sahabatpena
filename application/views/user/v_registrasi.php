<!doctype html>
<html lang="en">

<head>
        
        <meta charset="utf-8" />
        <title>Sahabat Pena Kita</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Halaman login admin sistem informasi database anggota" name="description" />
        <meta content="Sahabat Pena Kita" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url() ?>Favicon/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="<?php echo base_url() ?>assets/login/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo base_url() ?>assets/login/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo base_url() ?>assets/login/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>
        <div class="home-btn d-none d-sm-block">
            <a href="index.html" class="text-dark"><i class="fas fa-home h2"></i></a>
        </div>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-19 col-lg-12 col-xl-10">
                        <div class="card overflow-hidden">
                            <div class="bg-soft-primary">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Hallo, Silahkan Registrasi !</h5>
                                            <p>Sistem Sahabat Pena Kita</p>
                                        </div>
                                    </div>
                                    <div class="col-4 align-self-end">
                                        <img src="<?php echo base_url() ?>assets/login/assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div>
                                    <a href="index.html">
                                        <div class="avatar-md profile-user-wid mb-2">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="<?php echo base_url() ?>Favicon/ms-icon-310x310.png" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <?php echo form_open("C_User/tambah", array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal') ); ?>
                                        <div class="form-group">
                                            <label for="username">NIK</label>
                                            <input type="text" class="form-control" id="nik" name="nik" required maxlength="16" minlength="16" placeholder="NIK" onkeypress="return Angkasaja(event)" onkeyup="cek_nik()"><span id="pesannik"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                                            <input type="hidden" class="form-control" id="registrasi" name="registrasi" value="registrasi">
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Tempat Lahir</label>
                                            <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" placeholder="Tempat Lahir" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="tgllahir" name="tgllahir" placeholder="Tanggal Lahir" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Provinsi</label>
                                            <select class="form-control select2" id="provregis" name="prov" style="width: 100%;" required>
                                              <option value="">--Pilih--</option>
                                              <?php foreach ($provinsi as $provinsi) { ?>
                                              <option value="<?php echo $provinsi->id_provinsi ?>"><?php echo $provinsi->name_prov ?></option>
                                              <?php } ?>
                                            </select>                           
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Kota/Kabupaten</label>
                                            <select class="form-control select2" id="kotaregis" name="kota" style="width: 100%;" required>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Kecamatan</label>
                                            <select class="form-control select2" id="kecamatan" name="kecamatan" style="width: 100%;" required>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Alamat</label>
                                            <textarea class="form-control" rows="3" id="alamat" name="alamat" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">No HP</label>
                                            <input type="text" class="form-control" id="tlp" name="tlp" placeholder="Telepon" maxlength="12" minlength="6" onkeypress="return Angkasaja(event)">
                                        </div>
                                        <div class="form-group">
                                            <label for="username">E-Mail</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="E-Mail" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Instagram</label>
                                            <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Instagram">
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Facebook</label>
                                            <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook">
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Twitter</label>
                                            <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Twitter">
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Youtube Channel</label>
                                            <input type="text" class="form-control" id="youtube" name="youtube" placeholder="Youtube Channel">
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Institusi</label>
                                            <input type="text" class="form-control" id="institusi" name="institusi" placeholder="Institusi" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Latar Belakang</label>
                                            <input type="text" class="form-control" id="latarbelakang" name="latarbelakang" placeholder="Latar Belakang" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Tanggal Registrasi</label>
                                            <input type="date" class="form-control" id="tglregistrasi" name="tglregistrasi" value="<?php echo date('Y-m-d'); ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Foto</label>
                                            <input type="file" id="foto" class="demoInputBox" name="foto" onchange="ValidateSize(this)" required>
                                            <p><span class="text-danger">Maksimal 2Mb </span></p>
                                        </div>
                                        <div class="mt-3">
                                            <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Daftar Sekarang</button>
                                        </div>
                                    <?php echo form_close();?>
                                </div>
            
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            
                            <div>
                                <p>© 2020 Development by HOSTERWEB INDONESIA</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/login/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url() ?>assets/login/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url() ?>assets/login/assets/libs/node-waves/waves.min.js"></script>
        
        <!-- App js -->
        <script src="<?php echo base_url() ?>assets/login/assets/js/app.js"></script>
    </body>
<script type='text/javascript'>
    var error = 1; // nilai default untuk error 1
    function cek_nik(){
        $("#pesannik").hide();
        var nik = $("#nik").val();
        if(nik != ""){
            $.ajax({
                url: "<?php echo site_url() . '/C_User/cek_nik'; ?>", //arahkan pada proses_tambah di controller member
                data: 'nik='+nik,
                type: "POST",
                success: function(msg){
                    if(msg==1){
                        $("#pesannik").css("color","#fc5d32");
                        $("#nik").css("border-color","#fc5d32");
                        $("#pesannik").html("NIK sudah digunakan !");
 
                        error = 1;
                    }else{
                        $("#pesannik").css("color","#59c113");
                        $("#nik").css("border-color","#59c113");
                        $("#pesannik").html("");
                        error = 0;
                    }
 
                    $("#pesannik").fadeIn(1000);
                }
            });
        }                
    }
     
</script>
  <script type="text/javascript">
  function Angkasaja(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
    return true;
  }
</script>

<script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya
    $('#provregis').on('change', function(){
            var load = $('#provregis').val();
            
            $.ajax({
                method  : "POST",
                url     : "<?php echo site_url() . 'C_Setting/get_kota'; ?>",
                data    : {id_provinsi : load},
                success: function (data){
                    $('#kotaregis').html(data.list_kota);
                },
                error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
                  alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                }
            });
        });
});
  </script>
<script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya
    $("#kota").change(function(){ // Ketika user mengganti atau memilih data provinsi
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("index.php/C_Setting/get_kecamatan"); ?>", // Isi dengan url/path file php yang dituju
        data: {id_kota : $("#kota").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          // set isi dari combobox kota
          // lalu munculkan kembali combobox kotanya
          $("#kecamatan").html(response.list_kec).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });
  });
  </script>
  
<script type="text/javascript">
function ValidateSize(file) {
    var FileSize = file.files[0].size / 1024 / 1024; // in MB
    if (FileSize > 2) {
        alert('Maaf File anda terlalu besar');
       $(file).val(''); //for clearing with Jquery
    } else {
      var inputFile = document.getElementById('foto');
      var pathFile = inputFile.value;
      var ekstensiOk = /(\.jpg|\.jpeg|\.png)$/i;
      if(!ekstensiOk.exec(pathFile)){
          alert('Silakan upload file yang memiliki ekstensi .jpeg/.jpg/.png');
          inputFile.value = '';
          return false;
      }
    }
}

</script>

<!-- Mirrored from themesbrand.com/skote/layouts/vertical/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Aug 2020 23:54:22 GMT -->
</html>