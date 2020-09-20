<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $anggota; ?></h3>

              <p>Jumlah Anggota</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Info Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $korwil; ?><sup style="font-size: 20px"></sup></h3>

              <p>Jumlah Cabang / Wilayah</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Info Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <h3><?php echo $dataaktif; ?><sup style="font-size: 20px"></sup></h3>

              <p>Data Anggota Aktif</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Info Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <h3><?php echo $karyatulis; ?><sup style="font-size: 20px"></sup></h3>

              <p>Data Karya Tulis</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Info Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          
          <!-- /.box (chat box) -->
          <?php 
          $id = $this->session->userdata('statusanggota'); 
          if ($id == 'administrator') { ?>
          <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">List Menunggu Konfirmasi</h3>

              <div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
              <ul class="todo-list">
                <?php foreach ($datawaiting as $datawaiting) { ?>
                <li>
                  <!-- drag handle -->
                  <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <!-- checkbox -->
                  <!-- todo text -->
                  <span class="text">  <?php echo $datawaiting->nama; ?></span>
                  <!-- Emphasis label -->
                  <small class="label label-danger"><i class="fa fa-clock-o"></i><?php echo '&nbsp;'.$datawaiting->tglregistrasi; ?></small>
                  <!-- General tools such as edit or delete-->
                  <div class="tools">
                    <a href="<?php echo site_url('user-konfirm/'.$datawaiting->id_anggota); ?>"><i class="fa fa-edit"></i></a>
                  </div>
                </li>

                <?php } ?>
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
              <a href="<?php echo site_url('user'); ?>"><button type="button" class="btn btn-default pull-right"><i class="fa fa-arrow-circle-right"></i>Lihat Selengkapnya</button></a>
            </div>
          </div>
          <!-- /.box -->

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          <!-- Map box -->
          <div class="box box-solid bg-light-blue-gradient">
          <!-- /.box -->

          <!-- Calendar -->
          <div class="box box-solid bg-green-gradient">
            <div class="box-header">
             <i class="ion ion-clipboard"></i>

              <h3 class="box-title">User Log</h3>
            </div>
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
              <ul class="todo-list">
                <?PHP foreach ($userlog as $userlog) { ?>
                 <li>
                  <!-- drag handle -->
                  <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <!-- checkbox -->
                  <!-- todo text -->
                  <span class="text"><?php echo $userlog->nama.' - '.$userlog->ket ?></span>
                  <!-- Emphasis label -->
                  <small class="label label-danger"><i class="fa fa-clock-o"></i><?php echo $userlog->waktu ?></small>
                  <!-- General tools such as edit or delete-->
                  <div class="tools">
                   
                  </div>
                </li> 
                <?php } ?>
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
              <a href="<?php echo site_url('user'); ?>"><button type="button" class="btn btn-default pull-right"><i class="fa fa-arrow-circle-right"></i>Lihat Selengkapnya</button></a>
            </div>
          </div>
        <?php } else { ?>

           <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">List Anggota</h3>
            </div>
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
              <ul class="todo-list">
                <?php 
                $no = 1;
                $submenus = $this->db->query("select * from tb_anggota where id_korwil = '$listanggota' ORDER BY tglregistrasi DESC ");
                      foreach ($submenus->result() as $submenu) { 
                        $no++;
                        if ($no == 12) {
                          break;
                        } ?>
                <li>
                  <!-- drag handle -->
                  <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <!-- checkbox -->
                  <!-- todo text -->
                  <span class="text">  <?php echo $submenu->nama; ?></span>
                  <!-- Emphasis label -->
                  <!-- General tools such as edit or delete-->
                  
                </li>

                <?php } ?>
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
              <a href="<?php echo site_url('user'); ?>"><button type="button" class="btn btn-default pull-right"><i class="fa fa-arrow-circle-right"></i>Lihat Selengkapnya</button></a>
            </div>
          </div>
          <!-- /.box -->

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">
          <!-- Calendar -->
          

           <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">List Karya Tulis</h3>
            </div>
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
              <ul class="todo-list">
                <?PHP foreach ($listkaryatulis as $listkaryatulis) { ?>
                 <li>
                  <!-- drag handle -->
                  <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <!-- checkbox -->
                  <!-- todo text -->
                  <span class="text"><?php echo $listkaryatulis->karyatulis.' - '.$listkaryatulis->tglpublish ?></span>
                  <!-- Emphasis label -->
                  <small class="label label-danger"><i class="fa fa-clock-o"></i></small>
                  <!-- General tools such as edit or delete-->
                  <div class="tools">
                   
                  </div>
                </li> 
                <?php } ?>
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
              <a href="<?php echo site_url('user'); ?>"><button type="button" class="btn btn-default pull-right"><i class="fa fa-arrow-circle-right"></i>Lihat Selengkapnya</button></a>
            </div>
          </div>

          <!-- /.box -->
        <?php } ?> 

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>