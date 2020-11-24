<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/skote/layouts/vertical/auth-lock-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Aug 2020 23:54:51 GMT -->
<head>

        <meta charset="utf-8" />
        <title>Sahabat Pena Kita</title>
        <link rel="icon" type="image/png" href="<?php echo base_url() ?>favicon/favicon.ico"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="<?php echo base_url() ?>assets/login/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo base_url() ?>assets/login/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo base_url() ?>assets/login/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    </head>

    <body>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-soft-primary">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Cek Member</h5>
                                            <p>Masukkan Nama, No Anggota atau Scan Kode QR Anda!</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                       <img src="<?php echo base_url() ?>assets/login/assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div>
                                    <a href="index.html">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                               <img src="<?php echo base_url() ?>Favicon/ms-icon-310x310.png" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <div class="form-group">
                                        <label for="userpassword"></label>
                                        <input type="text" class="form-control" id="cekawal" name="cekawal" placeholder="Nama, No Anggota">
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-12 text-right">
                                            <a href="<?php echo site_url('qrcode'); ?>"><button class="btn btn-primary w-md waves-effect waves-light" type="submit">Scan QR</button></a>
                                        </div>
                                    </div>
                                    <div id="hasilcek"></div>
                                </div>
            
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p>Development By &copy; 2020 <a href="https://hosterweb.co.id">HOSTERWEB INDONESIA</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="<?php echo base_url() ?>assets/login/assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/login/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url() ?>assets/login/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url() ?>assets/login/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url() ?>assets/login/assets/libs/node-waves/waves.min.js"></script>
        
        <!-- App js -->
        <script src="<?php echo base_url() ?>assets/login/assets/js/app.js"></script>

<script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya
    $("#cekawal").keypress(function(){ // Ketika user mengganti atau memilih data provinsi
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("index.php/C_User/get_listuser"); ?>", // Isi dengan url/path file php yang dituju
        data: {cek : $("#cekawal").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          // set isi dari combobox kota
          // lalu munculkan kembali combobox kotanya
          $("#hasilcek").html(response.list_user).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });
  });
  </script>
    </body>

<!-- Mirrored from themesbrand.com/skote/layouts/vertical/auth-lock-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Aug 2020 23:54:51 GMT -->
</html>
