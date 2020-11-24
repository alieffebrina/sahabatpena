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
                                            <h5 class="text-primary">Profil Anggota Sahabat Pena Kita</h5>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                       <img src="<?php echo base_url() ?>assets/login/assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 

                                <?php

                                $this->db->select('tb_korwil.namakorwil, tb_anggota.*, tb_provinsi.*, tb_kota.*, tb_kecamatan.*');
                                $this->db->join('tb_korwil', 'tb_korwil.id_korwil = tb_anggota.id_korwil');
                                $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_anggota.id_provinsi');
                                $this->db->join('tb_kota', 'tb_kota.id_kota = tb_anggota.id_kota');
                                $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_anggota.id_kecamatan');
                                 $where = array(
                                        'nik' => $this->input->post('noijazah')
                                    );

                                 $query = $this->db->get_where('tb_anggota', $where);

                                if($query->num_rows() < 1){
                                    ?>
                                    <div class="alert alert-danger">
                                        <center>
                                        <strong>Maaf, Data tidak ditemukan..!</strong><br>
                                        <i>Silahkan menghubungi Admin Sahabat Pena Kita terkait untuk menanyakan masalah ini</i>
                                        </center>
                                    </div>
                                    <?php
                                }else{
                                    foreach ($query->result() as $key) {
                                ?>
                                <div>
                                    <a href="index.html">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                               <img src="<?php echo base_url() ?>images/<?php echo $key->foto ?>" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>

                                <div class="p-2">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th>NIK</th>
                                        <td><?php echo $key->nik ?></td>
                                    </tr>
                                    <tr>
                                        <th>No Anggota</th>
                                        <td><?php echo $key->noanggota ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <td><?php echo $key->nama ?></td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td><?php echo $key->alamat ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><?php echo $key->email ?></td>
                                    </tr>
                                    <tr>
                                        <th>Cabang / Wilayah</th>
                                        <td><?php echo $key->namakorwil ?></td>
                                    </tr>
                                </table>
                                <?php } }  ?>
                                </div>
            
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p><a href="<?php echo site_url('login'); ?>" class="font-weight-medium text-primary"> Login </a> </p>
                            <p>Belum menjadi anggota ?<a href="<?php echo site_url('registrasi'); ?>" class="font-weight-medium text-primary"> Registrasi </a> </p>
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
