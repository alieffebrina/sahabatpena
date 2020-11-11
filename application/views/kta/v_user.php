
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kartu Anggota
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_User'); ?>">Data Anggota</a></li>
        <li class="active">Kartu Anggota</li>
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
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Anggota</h3>
            </div>
            <div class="box-header">

                    <?php if($this->session->userdata('statusanggota') == 'administrator'){ ?>
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="korwiluser">Cabang / Wilayah 
                    <span class="fa fa-caret-down"></span></button>
                    <ul class="dropdown-menu">
                      <?php foreach ($korwil as $korwil) { ?>
                      <li><a href="<?php echo site_url('cetak-sort/'.$korwil->id_korwil); ?>"><?php echo $korwil->namakorwil ?></a></li>
                      <?php } ?>
                    </ul>
                  <?php } ?>
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>No Anggota</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Nama</th>
                  <th>Status Anggota</th>
                  <th>Cabang / Wilayah</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($user as $user) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $user->noanggota; ?></td>
                  <td><?php echo $user->username; ?></td>
                  <td><?php echo $user->password; ?></td>
                  <td><?php echo $user->nama; ?></td>
                  <td><?php echo $user->statusanggota; ?></td>
                  <td><?php if($user->id_korwil != NULL){
                    $submenus = $this->db->query("select * from tb_korwil where id_korwil = '$user->id_korwil'"); 
                      foreach ($submenus->result() as $submenu) {
                      echo $submenu->namakorwil;
                      }  
                    } else { echo '-'; } ?></td>
                  <td> 
                    <div class="btn-group">
                      <a href="<?php echo site_url('C_KTA/kta/'.$user->id_anggota); ?>"><button type="button" class="btn-xs btn-primary" data-toggle="tooltip" data-placement="bottom" title="KTA!"><i class="fa fa-fw fa-credit-card"></i></button></a>
                    </div>
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
  <!-- Modal Ubah