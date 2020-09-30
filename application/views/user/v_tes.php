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
 
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>            
			<div class="box-header with-border">
              <h3 class="box-title">Daftar Ulang</h3>
            </div>
   		</div>

      <div class="modal-body">
      <div class="box box-primary">
        <?php echo form_open("C_User/savedu", array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal') ); ?>
              <div class="box-body">
                <?php foreach ($user as $user) { ?>

                 <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $user->id_anggota ?>">
                <div class="form-group">
                  <label for="exampleInputPassword1">NIK (*)</label>
                    <input type="text" class="form-control" id="nik" name="nik" maxlength="16" minlength="16" onkeypress="return Angkasaja(event)" onkeyup="cek_nik()" required value="<?php echo $user->nik ?>">
                  <span id="pesannik"></span>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama (*)</label>
                    <input type="text" class="form-control" id="nama" name="nama" required value="<?php echo $user->nama ?>" >
                  </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Panggilan (*)</label>
                    <input type="text" class="form-control" id="namapanggilan" name="namapanggilan" required value="<?php echo $user->namapanggilan ?>"></div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Provinsi (*)</label>
                    <select class="form-control select2" id="prov" name="prov" style="width: 100%;" required>
                      <option value="">--Pilih--</option>
                      <?php foreach ($provinsi as $provinsi) { ?>
                     <option value="<?php echo $provinsi->id_provinsi ?>" <?php if($provinsi->id_provinsi == $user->id_provinsi){echo "selected";} ?>><?php echo $provinsi->name_prov ?></option>
                      <?php } ?>
                    </select></div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kota/Kabupaten (*)</label>
                  <select class="form-control select2" id="kota" required name="kota" style="width: 100%;">
                     <option value="<?php echo $user->id_kota ?>"><?php echo $user->name_kota ?></option>
                    </select></div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kecamatan (*)</label>
                  <select class="form-control select2" id="kecamatan" required name="kecamatan" style="width: 100%;">
                     <option value="<?php echo $user->id_kecamatan ?>"><?php echo $user->kecamatan ?></option>
                    </select></div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat (*)</label>
                    <textarea class="form-control" rows="3" id="alamat" name="alamat" required ><?php echo $user->alamat; ?></textarea>
                  </div> 
                <div class="form-group">
                  <label for="exampleInputPassword1">Tempat Lahir(*)</label>
                    <input type="text" class="form-control" id="tempatlahir" required name="tempatlahir" value="<?php echo $user->tempatlahir ?>" >
                  </div>    
                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal Lahir (*)</label>
                    <input type="date" class="form-control" id="tgllahir" required name="tgllahir" value="<?php echo $user->tgllahir ?>" >
                  </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">No HP (*)</label>
                    <input type="text" class="form-control" id="tlp" name="tlp" required maxlength="12" minlength="6" value="<?php echo $user->tlp ?>" onkeypress="return Angkasaja(event)" ></div>
                <div class="form-group">
                  <label for="exampleInputPassword1">E-Mail (*)</label> 
                    <input type="email" class="form-control" id="email" name="email"required value="<?php echo $user->email; ?>" >
                  </div> 
                <div class="form-group">
                  <label for="exampleInputPassword1">Foto (*)</label>
                      <img class="img-responsive" src="<?php echo base_url() ?>images/<?php echo $user->foto ?>" alt="Photo" width="197px" height="350px">
                    <!-- <input type="file" id="foto" required class="demoInputBox" name="foto" onchange="ValidateSize(this)">
                  <p><span class="text-danger">Maksimal 2Mb </span></p> -->
                  </div>
              </div>
          </div>
      <div class="box box-primary">
      	<div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
              <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                  <label for="exampleInputPassword1">Institusi / Profesi (*)</label>
                    <input type="text" class="form-control" id="institusi" required name="institusi" value="<?php echo $user->institusi ?>" >
                </div>
                <?php $lt = explode('/', $user->latarbelakang); ?>
                <div class="form-group">
                  <label for="exampleInputPassword1">Pendidikan S1</label>
                    <input type="text" class="form-control" id="latarbelakang1" name="latarbelakang1" value="<?php echo $lt[0] ?>"  >
                 </div>    
                <div class="form-group">
                  <label for="exampleInputPassword1">Pendidikan S2</label>
                    <input type="text" class="form-control" id="latarbelakang2" name="latarbelakang2" value="<?php echo $lt[1] ?>"  >
                 </div> 
                <div class="form-group">
                  <label for="exampleInputPassword1">Pendidikan S3</label>
                    <input type="text" class="form-control" id="latarbelakang3" name="latarbelakang3" value="<?php echo $lt[2] ?>" >
                </div> 
      	</div>
              <!-- /.form group -->
		<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Sosial Media</h3>
            </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Instagram</label>
                    <input type="text" class="form-control" id="ig" name="ig" value="<?php echo $user->instagram ?>"  >
                </div>       
                <div class="form-group">
                  <label for="exampleInputPassword1">Facebook</label>
                    <input type="text" class="form-control" id="fb" name="fb" value="<?php echo $user->facebook ?>">
                  </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Twitter</label>
                    <input type="text" class="form-control" id="tw" name="tw"value="<?php echo $user->twitter ?>">
                </div>       
                <div class="form-group">
                  <label for="exampleInputPassword1">Youtube Channel</label>
                    <input type="text" class="form-control" id="yt" name="yt" value="<?php echo $user->youtube ?>">
                </div>
        </div>
              <!-- /.form group -->
		<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Status Keanggotaan</h3>
            </div>
              <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                  <label for="exampleInputPassword1">Cabang / Wilayah (*)</label>
                    <select class="form-control select2" id="korwil" name="Cabang / Wilayah" required style="width: 100%;">
                      <option value="">--Pilih--</option>
                      <?php foreach ($korwil as $korwil) { ?>
                      <option value="<?php echo $korwil->id_korwil ?>" <?php if($korwil->id_korwil == $user->id_korwil ){echo "selected";} ?>><?php echo $korwil->namakorwil ?></option>
                      <?php } ?>
                    </select>
                  </div>
           
        </div>
          <!-- /.box -->
          <!-- /.box -->
        <?php } ?>
              <!-- /.box-footer -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Karya Tulis / Karya Ilmiah</h3>
            </div>
              <!-- Date dd/mm/yyyy -->
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
                  <?php foreach ($karyatulis as $key) { ?>
                    <tr>
                      <td><?php echo $key->tglpublish ?></td>
                      <td><?php echo $key->karyatulis ?></td>
                      <td><?php echo $key->jenis ?></td>
                      <td><?php echo $key->penerbit ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('Welcome'); ?>" class="btn btn-default">Kembali</a>
                    <button type="submit" class="btn btn-info">Konfirmasi</button>
                  </div>
                </div> 
              <!-- /.form group -->

           <?php echo form_close();?>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
	// $('#myModal').on('shown.bs.modal', function () {
	//   $('#myInput').focus()
	// })
	$('#myModal').modal('show')
</script>
</body>
</html>