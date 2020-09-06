

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 
<script src="<?php //echo base_url() ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>-->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  // $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts
<script src="<?php //echo base_url() ?>assets/bower_components/raphael/raphael.min.js"></script>
<script src="<?php //echo base_url() ?>assets/bower_components/morris.js/morris.min.js"></script> -->
<!-- Sparkline
<script src="<?php //echo base_url() ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script> -->
<!-- jvectormap 
<script src="<?php //echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php //echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>-->
<!-- jQuery Knob Chart 
<script src="<?php //echo base_url() ?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>-->

<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url() ?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>

<script src="<?php echo base_url() ?>assets/dist/js/jquery-1.11.2.min.js"></script>
<script src="<?php echo base_url() ?>assets/dist/js/jquery.mask.min.js"></script>
<script src="<?php echo base_url() ?>assets/dist/js/terbilang.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url() ?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- page script -->
<!-- FLOT CHARTS -->
<script src="<?php echo base_url() ?>assets/bower_components/Flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?php echo base_url() ?>assets/bower_components/Flot/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?php echo base_url() ?>assets/bower_components/Flot/jquery.flot.pie.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="<?php echo base_url() ?>assets/bower_components/Flot/jquery.flot.categories.js"></script>
<!-- Page script -->

    <script src="<?php echo base_url() ?>assets/registrasi/asset/js/jquery_ui.js"></script>
    <script src="<?php echo base_url() ?>assets/registrasi/asset/js/validate.js"></script>
    <script src="<?php echo base_url() ?>assets/registrasi/asset/js/step.js"></script>
    <script src="<?php echo base_url() ?>assets/registrasi/asset/js/easing.js"></script>
    <script>
        $(document).ready(function(){

            $( function() {
                $( "#datepicker" ).datepicker({
                    dateFormat: "dd-mm-yy", 
                    duration: "fast",
                    changeMonth: true,
                    changeYear: true
                });
            } );
            $( function() {
                $( "#datepicker_2" ).datepicker({
                    dateFormat: "dd-mm-yy", 
                    duration: "fast"
                });
            } );

            var form = $("#registrasi");
            form.validate({
                errorPlacement: function errorPlacement(error, element) { element.before(error); },
                rules: {
                    confirm: {
                        equalTo: "#password"
                    }
                }
            });
            form.children("div").steps({
                headerTag: "h5",
                bodyTag: "section",
                transitionEffect: "slideLeft",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    form.validate().settings.ignore = ":disabled,:hidden";
                    return form.valid();
                },
                onFinishing: function (event, currentIndex)
                {
                    form.validate().settings.ignore = ":disabled";
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    alert("Submitted!");
                }
            });

            //flp
            //breakdown the labels into single character spans
            $(".flp label").each(function(){
                var sop = '<span class="ch">'; //span opening
                var scl = '</span>'; //span closing
                //split the label into single letters and inject span tags around them
                $(this).html(sop + $(this).html().split("").join(scl+sop) + scl);
                //to prevent space-only spans from collapsing
                $(".ch:contains(' ')").html("&nbsp;");
            })

            var d;
            //animation time
            $(".flp input").focus(function(){
                //calculate movement for .ch = half of input height
                var tm = $(this).outerHeight()/2 *-1 + "px";
                //label = next sibling of input
                //to prevent multiple animation trigger by mistake we will use .stop() before animating any character and clear any animation queued by .delay()
                $(this).next().addClass("focussed").children().stop(true).each(function(i){
                    d = i*50;//delay
                    $(this).delay(d).animate({top: tm}, 200, 'easeOutBack');
                })
            })
            $(".flp input").blur(function(){
                //animate the label down if content of the input is empty
                if($(this).val() == "")
                {
                    $(this).next().removeClass("focussed").children().stop(true).each(function(i){
                        d = i*50;
                        $(this).delay(d).animate({top: 0}, 500, 'easeInOutBack');
                    })
                }
            })

            var e;
            //animation time
            $(".flp select").focus(function(){
                //calculate movement for .ch = half of input height
                var ta = $(this).outerHeight()/2 *-1 + "px";
                //label = next sibling of input
                //to prevent multiple animation trigger by mistake we will use .stop() before animating any character and clear any animation queued by .delay()
                $(this).next().addClass("focussed").children().stop(true).each(function(i){
                    e = i*50;//delay
                    $(this).delay(e).animate({top: ta}, 200, 'easeOutBack');
                })
            })
            $(".flp select").blur(function(){
                //animate the label down if content of the input is empty
                if($(this).val() == "")
                {
                    $(this).next().removeClass("focussed").children().stop(true).each(function(i){
                        e = i*50;
                        $(this).delay(e).animate({top: 0}, 500, 'easeInOutBack');
                    })
                }
            })
        });
</script>
<script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya
    $("#prov").change(function(){ // Ketika user mengganti atau memilih data provinsi
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("index.php/C_Setting/get_kota"); ?>", // Isi dengan url/path file php yang dituju
        data: {id_provinsi : $("#prov").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          // set isi dari combobox kota
          // lalu munculkan kembali combobox kotanya
          $("#kota").html(response.list_kota).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        },
      });
    });
  });
  </script>
<script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya
    $("#kota").change(function(){ // Ketika user mengganti atau memilih data provinsi
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("index.php/C_Setting/get_kecamatan"); ?>", // Isi dengan url/path file php yang dituju
        data: {id_kota : $("#kota").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          // set isi dari combobox kota
          // lalu munculkan kembali combobox kotanya
          $("#kecamatan").html(response.list_kec).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });
  });
  </script>

</body>
</html>