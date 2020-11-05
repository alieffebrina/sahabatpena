

      <div class="row">
        <div class="col-md-6">
          <!-- Bar chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Karya Tulis</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div id="bar-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->

        <div class="col-md-6">

          <!-- Donut chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Anggota Per Wilayah</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
             <div id="pie-chart" style="height: 300px;" style="list-style-type: pie"></div>
             <!-- <div class="sparkline" data-type="pie" data-offset="300" data-width="100px" data-height="300px">
                6,4,8
              </div> -->
            </div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
<!-- FLOT CHARTS -->
<script src="<?php echo base_url() ?>assets/bower_components/Flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?php echo base_url() ?>assets/bower_components/Flot/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?php echo base_url() ?>assets/bower_components/Flot/jquery.flot.pie.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="<?php echo base_url() ?>assets/bower_components/Flot/jquery.flot.categories.js"></script>

<script src="<?php echo base_url() ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- Page script -->
<script>

   $(".sparkline").each(function () {
      var $this = $(this);
      $this.sparkline('html', $this.data());
    });


  $(function () {
  

    /*
     * BAR CHART
     * ---------
     */

    <?php 
    $date = date('m');

      $ve = date('m')-5; 
      $ye = date('Y');
      if ($date < 6){
        $ye = date('Y')-1;
      }
      $e = $this->db->query("select CONCAT(YEAR(tglpublish),'/',MONTH(tglpublish)) AS bulan, COUNT(id_karyatulis) AS jumlah_bulanan
            FROM tb_karyatulis where YEAR(tglpublish) = $ye and MONTH(tglpublish) = $ve
            GROUP BY MONTH(tglpublish)");

      $vd = date('m')-4; 
      $yd = date('Y');
      if ($date < 6){
        $yd = date('Y')-1;
      }
      $d = $this->db->query("select CONCAT(YEAR(tglpublish),'/',MONTH(tglpublish)) AS bulan, COUNT(id_karyatulis) AS jumlah_bulanan
            FROM tb_karyatulis where YEAR(tglpublish) = $yd and MONTH(tglpublish) = $vd
            GROUP BY MONTH(tglpublish)");

      $vc = date('m')-3; 
      $yc = date('Y');
      if ($date < 6){
        $yc = date('Y')-1;
      }
      $c = $this->db->query("select CONCAT(YEAR(tglpublish),'/',MONTH(tglpublish)) AS bulan, COUNT(id_karyatulis) AS jumlah_bulanan
            FROM tb_karyatulis where YEAR(tglpublish) =  $yc and MONTH(tglpublish) = $vc
            GROUP BY MONTH(tglpublish)");

      $vb = date('m')-2; 
      $yb = date('Y');
      if ($date < 6){
        $yb = date('Y')-1;
      }
      $b = $this->db->query("select CONCAT(YEAR(tglpublish),'/',MONTH(tglpublish)) AS bulan, COUNT(id_karyatulis) AS jumlah_bulanan
            FROM tb_karyatulis where YEAR(tglpublish) = $yb and MONTH(tglpublish) = $vb
            GROUP BY MONTH(tglpublish)");

      $va = date('m')-1; 
      $ya = date('Y');
      if ($date < 6){
        $ya = date('Y')-1;
      }
      $a = $this->db->query("select CONCAT(YEAR(tglpublish),'/',MONTH(tglpublish)) AS bulan, COUNT(id_karyatulis) AS jumlah_bulanan
            FROM tb_karyatulis where YEAR(tglpublish) = $ya and MONTH(tglpublish) = $va
            GROUP BY MONTH(tglpublish)"); 

      $v = date('m'); 
      $ynow = date('Y');
      if ($date < 6){
        $ynow = date('Y')-1;
      }
      $now = $this->db->query("select CONCAT(YEAR(tglpublish),'/',MONTH(tglpublish)) AS bulan,COUNT(id_karyatulis) AS jumlah_bulanan
            FROM tb_karyatulis where YEAR(tglpublish) = $ynow and MONTH(tglpublish) = $v
            GROUP BY MONTH(tglpublish)");
      ?>

    var bar_data = {
      data : [
      ['<?php echo date('F Y', strtotime(date('Y-m') . '- 5 month')); ?>', 
      <?php foreach ($e->result() as $e) { echo $e->jumlah_bulanan; } ?>], 
      ['<?php echo date('F Y', strtotime(date('Y-m') . '- 4 month')); ?>', 
      <?php foreach ($d->result() as $d) { echo $d->jumlah_bulanan; } ?>], 
      ['<?php echo date('F Y', strtotime(date('Y-m') . '- 3 month')); ?>', 
      <?php foreach ($c->result() as $c) { echo $c->jumlah_bulanan; } ?>],
      ['<?php echo date('F Y', strtotime(date('Y-m') . '- 2 month')); ?>', 
      <?php foreach ($b->result() as $b) { echo $b->jumlah_bulanan; } ?>], 
      ['<?php echo date('F Y', strtotime(date('Y-m') . '- 1 month')); ?>', 
      <?php foreach ($a->result() as $a) { echo $a->jumlah_bulanan; } ?>], 
      ['<?php echo date('F Y') ?>', 
      <?php foreach ($now->result() as $now) { echo $now->jumlah_bulanan; } ?>] ],
      color: '#3c8dbc'
    }
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
        bars: {
          show    : true,
          barWidth: 0.5,
          align   : 'center'
        }
      },
      xaxis : {
        mode      : 'categories',
        tickLength: 0
      }
    })
    /* END BAR CHART */

    /*
     * DONUT CHART
     * -----------
     */
     <?php 
     $color = array('#3c8dbc','#A52A2A', '#5F9EA0', '#008B8B', '#8B0000', '#483D8B', '#1E90FF');
     $totalall = $this->db->query("select count(id_anggota) as totalalla from tb_anggota where statusanggota = 'anggota'")->result();
     foreach ($totalall as $totalall) {
     $totalang = $totalall->totalalla;
     }
     $total = $this->db->query("select tb_korwil.namakorwil as namakorwil, tb_anggota.id_korwil, count(id_anggota) as jumlah_anggota from tb_anggota INNER JOIN tb_korwil on tb_korwil.id_korwil = tb_anggota.id_korwil where statusanggota = 'anggota'  or statusanggota= 'korwil' or statusanggota='administrator' GROUP BY tb_anggota.id_korwil " )->result();
     ?>
    var donutData = [ <?php 
      $no = 0;
      foreach ($total as $key) { 
      ?>
      { label: '<?php  echo $key->namakorwil ; ?>', data: <?php 
       $hasil = $key->jumlah_anggota/$totalang; 
       echo $hasil ?>, color: '<?php echo $color[$no++]; ?>' },
    <?php } ?>
    ]
    $.plot('#pie-chart', donutData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0,
          label      : {
            show     : true,
            radius   : 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }

        }
      },
      legend: {
        show: true
      }
    })
    /*
     * END DONUT CHART
     */

  })

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
</script>
