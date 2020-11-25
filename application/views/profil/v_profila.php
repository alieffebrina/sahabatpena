<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sahabat Pena Kita</title>
  <link rel="icon" type="image/png" href="<?php echo base_url() ?>favicon/favicon.ico"/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">


  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <h1><b></b><center> <font color="white">ANGGOTA SAHABAT PENA KITA</font></center></h2>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Anggota
        <small></small>
      </h1>
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
        <div class="col-xs-12">

            <?php foreach ($user as $user) { ?>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pribadi</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <tbody>
                <tr><td width="170px" rowspan="4"><img src="<?php echo base_url() ?>images/<?php echo $user->foto ?>" alt="User Image" width="150px" height="200px"></td>
                  
                  <td width="180px"> NO ANGGOTA </td>
                  <td width="10px"> : </td>
                  <td><?php echo $user->noanggota ?></td>
                </tr>
                <tr>
                  <td width="180px"> NAMA LENGKAP </td>
                  <td width="10px"> : </td>
                  <td><?php echo $user->nama ?></td>
                </tr>
                <tr>
                  <td width="180px"> STATUS ANGGOTA </td>
                  <td width="10px"> : </td>
                  <td><?php echo $user->statusanggota ?></td>
                </tr>
                <tr>
                  <td width="180px"> CABANG / WILAYAH </td>
                  <td width="10px"> : </td>
                  <td><?php echo $user->namakorwil ?></td>
                </tr>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Sosial Media</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <tbody>
                  <tr>
                  <td width="180px"> INSTAGRAM </td>
                  <td width="10px"> : </td>
                  <td><?php echo $user->instagram ?></td>
                </tr>
                <tr>
                  <td> FACEBOOK </td>
                  <td width="10px"> : </td>
                  <td><?php echo $user->facebook ?></td>
                </tr>
                <tr>
                  <td> TWITTER </td>
                  <td width="10px"> : </td>
                  <td><?php echo $user->twitter ?></td>
                </tr>
                <tr>
                  <td> YOUTUBE </td>
                  <td width="10px"> : </td>
                  <td><?php echo $user->youtube ?></td>
                </tr>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Latar Belakang Pendidikan </h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <tbody>
                  <tr>
                  <td width="180px"> INSTITUSI </td>
                  <td width="10px"> : </td>
                  <td><?php echo $user->institusi ?></td>
                </tr>
                <tr>
                <?php $lt = explode("/", $user->latarbelakang)?>
                  <td> LATAR BELAKANG S1 </td>
                  <td width="10px"> : </td>
                  <td><?php echo $lt[0] ?></td>
                </tr>
                <tr>
                  <td> LATAR BELAKANG S2 </td>
                  <td width="10px"> : </td>
                  <td><?php echo $lt[1] ?></td>
                </tr>
                <tr>
                  <td> LATAR BELAKANG S3 </td>
                  <td width="10px"> : </td>
                  <td><?php echo $lt[2] ?></td>
                </tr>
                </tbody>
              </table>
            </div>

              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('cekanggota'); ?>" class="btn btn-default">Kembali</a>
                  </div>
                </div> 
            <!-- /.box-body -->
          </div>

        <?php } ?>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
