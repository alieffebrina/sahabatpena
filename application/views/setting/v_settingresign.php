<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Setting Anggota
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('user-setting'); ?>">Data Setting Anggota</a></li>
        <li><a href="<?php echo site_url('user-setting'); ?>">Mengundurkan diri </a></li>
      </ol>
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

        <div class='col-lg-12'>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tambah Data</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <form action='<?= site_url("C_User/mengundurkandiri")?>' method='POST'>
                  <?php foreach ($userspek as $userspek) { ?>
                <div class='row'>
                  <div class="col-lg-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">No Anggota</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="nomer" name="nomer" readonly value="<?php echo $userspek->noanggota ?>">
                        <input type="hidden" class="form-control" id="noanggota" name="noanggota" readonly value="<?php echo $userspek->id_anggota ?>">
                      </div>
                  </div>
                </div>
                <br>
                <div class='row'>
                  <div class="col-lg-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="namaanggota" name="namaanggota" readonly value="<?php echo $userspek->nama ?>">
                      </div>
                  </div>
                </div> <br>
                <div class='row'>
                  <div class="col-lg-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">Alasan Mengundurkan Diri </label>
                      <div class="col-sm-9">
                        <textarea class="form-control" rows="3" id="resign" name="resign" required></textarea>
                      </div>
                  </div>
                </div> <br>

                <?php  } ?>
                <div class='row'>
                  <div class='col-lg-12'>
                    <label for="inputEmail3" class="col-sm-2 control-label"></label>
                    <div class="col-sm-3">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Setting Anggota</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>No Anggota</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Status Anggota</th>
                  <th>Korwil</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($user as $user) { ?>
                <tr>
                  <td><?php echo $user->noanggota; ?></td>
                  <td><?php echo $user->nik; ?></td>
                  <td><?php echo $user->nama; ?></td>
                  <td><?php echo $user->alamat.', '.$user->name_kota.', '.$user->name_prov; ?></td>
                  <td><?php if($user->statusanggota!='tidak aktif') { echo $user->statusanggota; } else { if ($user->alasan!=NULL) { echo 'mengundurkan diri '; } else { echo 'tidak aktif'; }}; ?></td>
                  <td><?php if($user->id_korwil != NULL){
                    $submenus = $this->db->query("select * from tb_korwil where id_korwil = '$user->id_korwil'"); 
                      foreach ($submenus->result() as $submenu) {
                      echo $submenu->namakorwil;
                      } 
                    } else { echo '-'; } ?></td>
                  <td><?php if($user->statusanggota!='tidak aktif') { ?>
                    <div class="btn-group">
                      <a href="<?php echo site_url('user-resign/'.$user->id_anggota); ?>"><button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Mengundurkan Diri !"><i class="fa fa-fw fa-user"></i></button></a>
                      <a href="<?php echo site_url('user-nonaktif/'.$user->id_anggota); ?>"><button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Non Aktif User!"><i class="fa fa-fw fa-close"></i></button></a>
                    </div>
                  <?php } ?>
                  </td>
                </tr>
                  <?php } ?>
                </tbody>
              </table>
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
  <!-- Modal Ubah -->