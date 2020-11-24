<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sahabat Pena Kita</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/validasi/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/validasi/css/bootstrap.min.css">
    <script src="<?php echo base_url() ?>assets/validasi/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/validasi/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>favicon/favicon.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="<?php echo base_url() ?>assets/login/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo base_url() ?>assets/login/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/login/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
</head>
    <body>
        <div class="home-btn d-none d-sm-block">
            <a href="index.html" class="text-dark"><i class="fas fa-home h2"></i></a>
        </div>
        <div class="account-pages my-15 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-soft-primary">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-3">
                                            <h1 class="text-primary">Cek Member</h1>
                                            <p><h3 class="text-primary">Silahkan Scan Kode QR Anda</h3></p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                       <img src="<?php echo base_url() ?>assets/login/assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="p-2">
                                  <div class="panel-body text-center" >
                                    <canvas></canvas>
                                    <hr>
                                    <select></select>
                                  </div>
                                    <div class="form-group row mb-0 text-center">
                                        
                                        <div class="col-12 text-center">
                                            <a href="<?php echo site_url('cekanggota'); ?>"><button class="btn btn-primary w-md waves-effect waves-light" type="submit" style="center">Kembali</button></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-5 text-center">
                            <p>Development By &copy; 2020 <a href="https://hosterweb.co.id">HOSTERWEB INDONESIA</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- JAVASCRIPT -->
        <script src="<?php echo base_url() ?>assets/login/assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/login/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url() ?>assets/login/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url() ?>assets/login/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url() ?>assets/login/assets/libs/node-waves/waves.min.js"></script>
        
        <!-- App js -->
        <script src="<?php echo base_url() ?>assets/login/assets/js/app.js"></script>

<!-- Js Lib -->
<script type="text/javascript" src="<?php echo base_url() ?>assets/validasi/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/validasi/js/qrcodelib.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/validasi/js/webcodecamjquery.js"></script>
<script type="text/javascript">
    var arg = {
        resultFunction: function(result) {
            //$('.hasilscan').append($('<input name="noijazah" value=' + result.code + ' readonly><input type="submit" value="Cek"/>'));
           // $.post("../cek.php", { noijazah: result.code} );
            var redirect = '<?php echo 'hasilqr'; ?>';
            // $.redirectPost(redirect, {noijazah: result.code});
            // $.redirectPost(redirect);
            window.location = result.code;
        }
    };
    
    var decoder = $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery;
    decoder.buildSelectMenu("select");
    decoder.play();
    /*  Without visible select menu
        decoder.buildSelectMenu(document.createElement('select'), 'environment|back').init(arg).play();
    */
    $('select').on('change', function(){
        decoder.stop().play();
    });

    // jquery extend function
    $.extend(
    {
        // redirectPost: function(location, args)
        // {
        //     var form = '';
        //     $.each( args, function( key, value ) {
        //         form += '<input type="hidden" name="'+key+'" value="'+value+'">';
        //     });
        //     $('<form action="'+location+'" method="POST">'+form+'</form>').appendTo('body').submit();
        // }

        redirectPost: function(location)
        {
            
            $('<form action="'+location+'" method="POST"></form>').appendTo('body').submit();
        }
    });

</script>
</body>
</html>