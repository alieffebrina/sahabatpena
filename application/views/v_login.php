<!doctype html>
<html lang="en">

<head>
        
        <meta charset="utf-8" />
        <title>Sahabat Pena Kita</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Halaman login admin sistem informasi database anggota" name="description" />
        <meta content="Sahabat Pena Kita" name="author" />
        <!-- App favicon -->
        <link rel="icon" type="image/png" href="<?php echo base_url() ?>favicon/favicon.ico"/>

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
           
    <div class="box-body">
    <?php if ($this->session->flashdata('Sukses')) { ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fa fa-check"></i> Sukses!</h5>
          <?=$this->session->flashdata('Sukses')?>.
        </div>                 
      <?php } ?>
    </div>
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-soft-primary">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Hallo, Silahkan Login !</h5>
                                            <p>Sistem Sahabat Pena Kita</p>
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
                                    <form class="form-horizontal" action="<?php echo site_url('C_Login/cek_login'); ?>" method="post">
        
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder = "Masukkan Username">
                                        </div>
                
                                        <div class="form-group">
                                            <label for="userpassword">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password">
                                        </div>
                                        
                                        <div class="mt-3">
                                            <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Login Sekarang</button>
                                        </div>
                                        <!-- <div class="mt-4 text-center">
                                            <a href="#" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Lupa Password?</a>
                                        </div> -->
                                    </form>
                                </div>
            
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <!--<p>Belum menjadi anggota ?<a href="<?php echo site_url('registrasi'); ?>" class="font-weight-medium text-primary"> Registrasi </a> </p>-->
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

<!-- Mirrored from themesbrand.com/skote/layouts/vertical/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Aug 2020 23:54:22 GMT -->
</html>
