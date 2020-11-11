<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profil
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('Profil'); ?>">Profil User</a></li>
      </ol>
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
                <tr><td width="180px" rowspan="13"><img src="<?php echo base_url() ?>images/<?php echo $user->foto ?>" alt="User Image" width="180px" height="230px"></td>
                  <td> NIK </td>
                  <td width="10px"> : </td>
                  <td><?php echo $user->nik ?></td>
                </tr>
                <tr>
                  <td> NO ANGGOTA </td>
                  <td width="10px"> : </td>
                  <td><?php echo $user->noanggota ?></td>
                </tr>
                <tr>
                  <td> USERNAME </td>
                  <td width="10px"> : </td>
                  <td><?php echo $user->username ?></td>
                </tr>
                <tr>
                  <td> PASSWORD </td>
                  <td width="10px"> : </td>
                  <td><?php echo $user->password ?></td>
                </tr>
                <tr>
                  <td> NAMA LENGKAP </td>
                  <td width="10px"> : </td>
                  <td><?php echo $user->nama ?></td>
                </tr>
                <tr>
                  <td> NAMA PANGGILAN </td>
                  <td width="10px"> : </td>
                  <td><?php echo $user->namapanggilan ?></td>
                </tr>
                <tr>
                  <td> ALAMAT </td>
                  <td width="10px"> : </td>
                  <td><?php echo $user->alamat.', '.$user->kecamatan.', '.$user->name_kota.', '.$user->name_prov ?></td>
                </tr>
                <tr>
                  <td> EMAIL </td>
                  <td width="10px"> : </td>
                  <td><?php echo $user->email ?></td>
                </tr>
                <tr>
                  <td> TELP </td>
                  <td width="10px"> : </td>
                  <td><?php echo $user->tlp ?></td>
                </tr>
                <tr>
                  <td> Tempat, Tanggal Lahir </td>
                  <td width="10px"> : </td>
                  <td><?php echo $user->tempatlahir.' / '.date('d-m-Y', strtotime($user->tgllahir)) ?></td>
                </tr>
                <tr>
                  <td> STATUS ANGGOTA </td>
                  <td width="10px"> : </td>
                  <td><?php echo $user->statusanggota ?></td>
                </tr>
                <tr>
                  <td> CABANG / WILAYAH </td>
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
            <!-- /.box-body -->
          </div>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Status Keanggotaan</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <tbody>
                  <tr>
                  <td width="180px"> TANNGAL REGISTRASI </td>
                  <td width="10px"> : </td>
                  <td><?php echo date('m-d-Y', strtotime($user->tglregistrasi)) ?></td>
                </tr>
                <tr>
                  <td> CABANG / WILAYAH </td>
                  <td width="10px"> : </td>
                  <td><?php echo $user->namakorwil ?></td>
                </tr>
                <tr>
                  <td> STATUS KEANGGOTAAN </td>
                  <td width="10px"> : </td>
                  <td><?php echo $user->statusanggota ?></td>
                </tr>
                <?PHP if($user->statusanggota == 'tidak aktif') {?>
                <tr>
                  <td> LATAR BELAKANG S3 </td>
                  <td width="10px"> : </td>
                  <td><?php echo $lt[2] ?></td>
                </tr>
              <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

        <?php } ?>
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
                  foreach ($karya as $karyatulis) { ?>
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
                    <a href="<?php echo site_url('Welcome'); ?>" class="btn btn-default">Kembali</a>
                    <a href="<?php echo site_url('user-edit/'.$user->id_anggota); ?>" class="btn btn-info">Ubah Data</a>
                  </div>
                </div> 
              <!-- /.form group -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
