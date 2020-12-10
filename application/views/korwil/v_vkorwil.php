<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php foreach ($korwil as $korwil) {
          echo 'Data Cabang / Wilayah '.$korwil->namakorwil;
          $kor = $korwil->id_korwil;
        } ?>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_Korwil'); ?>">Data  Cabang / Wilayah</a></li>
        <li class="active">Lihat  Cabang / Wilayah</li>
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
              <h3 class="box-title">Lihat Data Cabang / Wilayah</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
               <table id="example5" class="table table-bordered table-striped">
                <tbody>
                <tr>
                  <th style="text-align: right; width: 150px" >Nama  Cabang / Wilayah</th>
                  <td width="10px">:</td>
                  <td style="text-align: left;"><?php echo $korwil->namakorwil; ?></td>
                </tr>
                <tr>
                  <th style="text-align: right; width: 150px" >Tanggal Berdiri</th>
                  <td>:</td>
                  <td><?php echo date("d-m-Y", strtotime($korwil->tglberdiri)); ?></td> 
                </tr>
                <tr>
                  <th style="text-align: right; width: 150px" >Alamat</th>
                  <td>:</td>
                  <td><?php echo $korwil->alamat; ?></td>
                </tr>
                <tr>
                  <th style="text-align: right; width: 150px" >Provinsi</th>
                  <td>:</td>
                  <td><?php echo $korwil->name_prov; ?></td>
                </tr>
                <tr>
                  <th style="text-align: right; width: 150px" >Kota</th>
                  <td>:</td>
                  <td><?php echo $korwil->name_kota; ?></td>
                </tr>
                <tr>
                  <th style="text-align: right; width: 150px" >Kecamatan</th>
                  <td>:</td>
                  <td><?php echo $korwil->kecamatan; ?></td>
                </tr>
                <tr>
                  <th style="text-align: right; width: 150px" >Kode  Cabang / Wilayah</th>
                  <td>:</td>
                  <td><?php echo $korwil->kodeshow; ?></td>
                </tr>
                </tbody>
              </table>
                <div class="box-footer">
                    <div class="col-sm-10">
                      <a href="<?php echo site_url('Korwil'); ?>" class="btn btn-default">Batal</a>
                    </div>
                </div>
            </div>
          </div>
        </div>

        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pengurus  Cabang / Wilayah</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Jabatan</th>
                  <th>Sk</th>
                  <th>Nama</th>
                  <th>Masa Aktif Jabatan</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($pengurus as $pengurus) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $pengurus->jabatan; ?></td>
                  <td><?php echo $pengurus->nosk; ?></td>
                  <td><?php echo $pengurus->nama; ?></td>
                  <td><?php echo date("d-m-Y", strtotime($pengurus->tglaktif)).' s/d '.date("d-m-Y", strtotime($pengurus->tglakhir)); ?></td>
                  <td><?php echo $pengurus->status ?></td>
                </tr>
                  <?php  } ?>
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