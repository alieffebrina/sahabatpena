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

    </head>

    <body>
        <div class="home-btn d-none d-sm-block">
            <a href="index.html" class="text-dark"><i class="fas fa-home h2"></i></a>
        </div>
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
                                        <input type="text" class="form-control" id="cek" name="cek" placeholder="Nama, No Anggota">
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-12 text-right">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Scan QR</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div id="hasilcek"></div>
                                    </div>
                                </div>
            
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p>Belum menjadi anggota ?<a href="<?php echo site_url('C_User/registrasi'); ?>" class="font-weight-medium text-primary"> Registrasi </a> </p>
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

    </body>

<!-- Mirrored from themesbrand.com/skote/layouts/vertical/auth-lock-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Aug 2020 23:54:51 GMT -->
</html>
