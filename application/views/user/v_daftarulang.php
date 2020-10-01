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
        <div class="navbar-header">
          <a href="../../index2.html" class="navbar-brand"><b>Sahabat </b>Pena Kita</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Daftar Ulang <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Registrasi</a></li>
            <li><a href="#">Login</a></li>
            <li><a href="#">Cek Anggota</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header> 
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Daftar Ulang
          <small>Anggota Sahabat Pena Kita</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Daftar Ulang</a></li>
          <!-- <li class="active">Top Navigation</li> -->
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
            <?php echo form_open("C_User/adddu", array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal') ); ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">NIK (*)</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nik" name="nik" maxlength="16" minlength="16" onkeypress="return Angkasaja(event)" onkeyup="cek_nik()" required >
                  <span id="pesannik"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nama (*)</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="nama" required >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nama Panggilan (*)</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="namapanggilan" name="namapanggilan" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Provinsi (*)</label>
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
                  <label for="inputPassword3" class="col-sm-2 control-label">Kota/Kabupaten (*)</label>
                  <div class="col-sm-9">
                  <select class="form-control select2" id="kota" required name="kota" style="width: 100%;">
                    
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kecamatan (*)</label>
                  <div class="col-sm-9">
                  <select class="form-control select2" id="kecamatan" required name="kecamatan" style="width: 100%;">
                   
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat (*)</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="3" id="alamat" name="alamat" required ></textarea>
                  </div>
                </div>  
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tempat Lahir(*)</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="tempatlahir" required name="tempatlahir"  >
                  </div>
                </div>    
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Lahir (*)</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="tgllahir" required name="tgllahir"  >
                  </div>
                </div>  
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No HP (*)</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="tlp" name="tlp" required maxlength="12" minlength="6" onkeypress="return Angkasaja(event)" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">E-Mail (*)</label>
                  <div class="col-sm-9"> 
                    <input type="email" class="form-control" id="email" name="email"required  >
                  </div>
                </div>   
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Foto (*)</label>
                    <div class="col-sm-9">
                    <input type="file" id="foto" required class="demoInputBox" name="foto" onchange="ValidateSize(this)">
                  <p><span class="text-danger">Maksimal 2Mb </span></p>
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
              <h3 class="box-title">Pendidikan</h3>
            </div>
              <!-- Date dd/mm/yyyy -->
              <div class="form-horizontal"> 
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Institusi / Profesi (*)</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="institusi" required name="institusi"  >
                  </div>
                </div>  
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Pendidikan S1</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="latarbelakang1" name="latarbelakang1"  >
                  </div>
                </div>    
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Pendidikan S2</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="latarbelakang2" name="latarbelakang2"  >
                  </div>
                </div> 
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Pendidikan S3</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="latarbelakang3" name="latarbelakang3"  >
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
              <h3 class="box-title">Data Sosial Media</h3>
            </div>
              <!-- Date dd/mm/yyyy -->
              <div class="form-horizontal">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Instagram</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="ig" name="ig"  >
                  </div>
                </div>       
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Facebook</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="fb" name="fb">
                  </div>
                </div>       
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Twitter</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="tw" name="tw" >
                  </div>
                </div>       
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Youtube Channel</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="yt" name="yt" >
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
                  <label for="inputPassword3" class="col-sm-2 control-label">Cabang / Wilayah (*)</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="korwil" name="korwil" required style="width: 100%;">
                      <option value="">--Pilih--</option>
                      <?php foreach ($korwil as $korwil) { ?>
                      <option value="<?php echo $korwil->id_korwil ?>"><?php echo $korwil->namakorwil ?></option>
                      <?php } ?>
                    </select>
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
        
              <!-- /.box-footer -->
        <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Karya Tulis / Karya Ilmiah</h3>
            </div>
              <!-- Date dd/mm/yyyy -->
               <div class="form-horizontal">
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Publish (*)</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="thnterbit" placeholder="Tanggal Publish"  >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Judul (*)</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="judul"  placeholder="Judul" >
                  </div>
                </div>  
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Jenis (*)</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="jenis" placeholder="Jenis">
                  </div>
                </div> 
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Penerbit / Publisher (*)</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="penerbit" placeholder="Penerbit / Publisher" >
                    <input type="hidden" class="form-control" id="kar" name="kar" >
                  </div>
                </div>    
              </div>

              <div class="box-footer">
                  <div class="col-sm-10">
                    <button type="button" class="btn btn-info" id='tktdu'>Tambah Karya</button>
                  </div>
                </div> 
                 <div class="box-body">
              <table id="karyatulisdu" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tanggal Publish</th>
                  <th>Judul Karya Tulis</th>
                  <th>Jenis Karya Tulis</th>
                  <th>Penerbit / Publiser</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('Welcome'); ?>" class="btn btn-default">Batal</a>
                    <button type="submit" class="btn btn-info">Simpan Data</button>
                  </div>
                </div> 
              <!-- /.form group -->

           <?php echo form_close();?>
              <!-- /.form group -->
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
