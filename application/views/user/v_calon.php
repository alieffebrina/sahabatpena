
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $header; ?>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('calonuser'); ?>">Data Calon Anggota</a></li>
        <li class="active"><?php echo $header; ?></li>
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
              <h3 class="box-title">Data <?php echo $header; ?></h3>
            </div>

            <div class="box-header">

                    <?php if($this->session->userdata('statusanggota') == 'administrator'){ ?>
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="korwiluser">Cabang / Wilayah 
                    <span class="fa fa-caret-down"></span></button>
                    <ul class="dropdown-menu">
                      <?php foreach ($korwil as $korwil) { ?>
                      <li><a href="<?php echo site_url('calon-sort/'.$korwil->id_korwil); ?>"><?php echo $korwil->namakorwil ?></a></li>
                      <?php } ?>
                    </ul>
                  <?php } ?>

                      <?php if($akseshapus == 'aktif'){?>
              <a href="<?php echo site_url('user-add'); ?>"><button type="button" class="btn btn-warning" >Tambah Data</button></a>
            <?php } ?>
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>ID</th>
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

                    <?php if($this->session->userdata('statusanggota') == 'administrator'){ ?>
                      <a href="<?php echo site_url('user-konfirm/'.$user->id_anggota); ?>"><button type="button" class="btn-xs btn-warning" data-toggle="tooltip" data-placement="bottom" title="konfirmasi!"><i class="fa fa-fw fa-check"></i></button></a>
                    <?php } ?>
                      <a href="<?php echo site_url('user-vcalon/'.$user->id_anggota); ?>"><button type="button" class="btn-xs btn-success" data-toggle="tooltip" data-placement="bottom" title="Lihat User!"><i class="fa fa-fw fa-search"></i></button></a>
                      <?php if($akseshapus == 'aktif'){?>
                      <a href="<?php echo site_url('C_User/hapus/'.$user->id_anggota); ?>" onclick="javascript:return confirm('Yakin data mau dihapus ?')"><button type="button" class="btn-xs btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus User!"><i class="fa fa-fw fa-trash-o"></i></button></a>
                      <?php } ?>
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