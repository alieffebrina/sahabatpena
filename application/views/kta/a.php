<!DOCTYPE html>
<html>
<head>
<title>Teknograv - Tutorial CSS</title>
<!-- Start : Style -->
<style type="text/css">
#boxsatu, #boxdua, #boxtiga, #boxempat, #boxlima{
    position: absolute;
    height: 100px;
}
#boxsatu{
    width: 100px;
    left: 0px;
    top: 0px;
    z-index: 1;
}
#boxdua{
    width: 200px;
    left: 50px;
    top: 100px;
    background-color:green;
    z-index: 2;
}
#boxtiga{
    width: 175px;
    left: 75px;
    top: 100px;
    background-color:blue;
    z-index: 3;
}
#boxempat{
    width: 100px;
    left: 200px;
    top: 50px;
    background-color:grey;
    z-index: 2;
}
#boxlima{
    width: 100px;
    left: 250px;
    top: 0px;
    background-color:cyan;
    z-index: 1;
}
</style>
<!-- End : Style -->

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
 <script src="<?php echo base_url() ?>assets/FileSaver/dist/FileSaver.min.js"></script>
 <script src="<?php echo base_url() ?>assets/FileSaver/dist/FileSaver.js"></script>
 <script src="<?php echo base_url() ?>assets/html2canvas/html2canvas.min.js"></script>
 <script src="<?php echo base_url() ?>assets/html2canvas/html2canvas.js"></script>
</head>
<body>
    <!-- Start : Tampilan Semua Box -->
    <div id="allbox">
        <!-- Start : Tampilkan Box -->
        <div id="boxsatu">
          </div>
        <div id="boxdua"><img src="<?php echo base_url() ?>images/administrator.jpg" class="img-circle" alt="User Image"></div></div>
        <div id="boxtiga"><img src="<?php echo base_url() ?>images/KTA.png" class="img-circle" alt="User Image"></div>
        <div id="boxempat">Box Empat</div>
        <div id="boxlima">Box Lima</div>
        <!-- End : Tampilan Box -->
    </div>
        <button type="button" class="btn-xs btn-primary" id="btnSave" onclick="myfunction()">save</button>

     
    <!-- End : Tampilan Semua Box -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

     <script type='text/javascript'>
        function myfunction(){
            html2canvas($("#allbox"), {
                onrendered: function(canvas) {
                    theCanvas = canvas;


                    canvas.toBlob(function(blob) {
                        saveAs(blob, "Dashboard.png"); 
                    });
                }
            });
        }
     </script>
  </body>
</html>
</body>
</html>