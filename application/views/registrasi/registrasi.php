<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sahabat Pena Kita</title>
  <link rel="icon" type="image/png" href="<?php echo base_url() ?>favicon/favicon.ico"/>

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/registrasi/asset/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/registrasi/asset/css/fontawesome-all.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/registrasi/asset/css/bulma.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/registrasi/asset/css/datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/registrasi/asset/css/main.css">
    <link href="<?php echo base_url() ?>assets/registrasi/bootstrap/css/bootstrap.min.css">
</head>
<body>
    
    <div class="master">
        <div class="left_part has-text-centered">
            <div class="text">
                <a href="#" class="logo">
                    <img src="<?php echo base_url() ?>Favicon/apple-icon.png" alt="">
                </a>
                <p>
                    <!-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus quam non imperdiet faucibus. Sed id ligula eget orci dignissim. -->
                </p>
            </div>
        </div>
        <div class="main_part">

            <?php // echo form_open("C_User/tambah", array('enctype'=>'multipart/form-data', 'class'=>'flp', 'id'=>'registrasi') ); ?>
            <form id="registrasi" action="<?= site_url("C_User/tambah")?>" class="flp">
                <h2>Daftar Anggota Baru</h2>
                <div>
                    <h5>Step 1</h5>
                    <section>
                        <div class="container">
                            <div class="columns">
                                <div class="column is-6 inp_group">
                                    <input type="text" name="nika" id="nika" class="required" value="" maxlength="16" minlength="16" onkeypress="return Angkasaja(event)" onkeyup="cek_nik()">
                                    <label for="nik">NIK</label>
                                </div>
                                <div class="column is-6 inp_group">
                                    <input type="text" name="nama" id="" class="required">
                                    <label for="nama">Nama</label>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column is-6 inp_group">
                                    <input type="text" name="tempatLahir" id="" class="required">
                                    <label for="tempatLahir">Tempat Lahir</label>
                                </div>
                                <div class="column is-6 inp_group">
                                    <input type="text" name="tanggalLahir" id="datepicker" class="required form-control docs-date" autocomplete="off" value=" ">
                                    <label for="tanggalLahir">Tanggal Lahir</label>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column is-12 inp_group">
                                    <input type="text" name="alamat" id="" class="required">
                                    <label for="alamat">Alamat</label>
                                </div>
                            </div>
                            <div class="columns">                                
                                <div class="column is-4">
                                    <select name="provinsia" id="provinsia" class="required">
                                        <optgroup>
                                            <option value=""></option>
                                            <?php foreach ($provinsi as $provinsi) { ?>
                                                <option value="<?php echo $provinsi->id_provinsi ?>"><?php echo $provinsi->name_prov ?></option>
                                            <?php } ?>
                                        </optgroup>
                                    </select>
                                    <label for="provinsi">Provinsi</label>
                                </div>
                                <div class="column is-4">
                                    <select name="kaba" id="kaba" class="required">
                                        <optgroup>
                                        </optgroup>
                                    </select>
                                    <label for="kabupaten">Kabupaten/Kota</label>
                                </div>
                                <div class="column is-4">
                                    <select name="keca" id="keca" class="required">
                                        <optgroup>
                                        </optgroup>
                                    </select>
                                    <label for="kecamatan">Kecamatan</label>
                                </div>
                                
                            </div>
                        </div>
                    </section>
                    <h5>Step 2</h5>
                    <section>
                        <div class="container">
                            <div class="columns">
                                <div class="column is-6">
                                    <input type="email" name="email" id="" class="required">
                                    <label for="email">Email</label>
                                </div>
                                <div class="column is-6">
                                    <input type="text" name="telepon" id="" class="required" maxlength="12" onkeypress="return Angkasaja(event)">
                                    <label for="telepon">No. Telepon</label>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column is-12">
                                    <p class="has-text-centered">Sosial Media anda</p>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column is-6">
                                    <span class="icon_label fb"><i class="fab fa-facebook-f"></i></span>
                                    <input type="text" name="fb" id="">
                                </div>
                                <div class="column is-6">
                                    <span class="icon_label ig"><i class="fab fa-instagram"></i></span>
                                    <input type="text" name="ig" id="">
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column is-6">
                                    <span class="icon_label tw"><i class="fab fa-twitter"></i></span>
                                    <input type="text" name="tw" id="">
                                </div>
                                <div class="column is-6">
                                    <span for="yt" class="icon_label yt"><i class="fab fa-youtube"></i></span>
                                    <input type="text" name="yt" id="">
                                </div>
                            </div>
                        </div>
                    </section>
                    <h5>Step 3</h5>
                    <section>
                        <div class="container">
                            <div class="columns">
                                <div class="column is-6">
                                    <input type="text" name="institusi" id="">
                                    <label for="institusi">Institusi</label>
                                </div>
                                <div class="column is-6">
                                    <input type="text" name="latarBelakangPendidikan" id="">
                                    <label for="latarBelakangPendidikan">Latar Belakang Pendidikan</label>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column is-12 inp_group">
                                    <input type="file" name="foto" id="foto" class="required" onchange="ValidateSize(this)">
                                    <label for="foto">Foto</label>
                                </div>
                            </div>
                    <!-- <input type="file" id="foto" class="demoInputBox" name="foto" onchange="ValidateSize(this)"> -->
                            <!-- <div class="columns">
                                <div class="column is-6">
                                    <input type="text" name="karyaTulis" id="">
                                    <label for="karyaTulis">Karya Tulis</label>
                                </div>
                                <div class="column is-6">
                                    <input type="text" name="tanggalRegistrasi" id="datepicker_2" class="required form-control docs-date" autocomplete="off" value="<?php echo date('Y-m-d'); ?>">
                                    <label for="tanggalRegistrasi">Tanggal Registrasi</label>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column is-6">
                                    <select name="statusPendidikan" id="" class="required">
                                        <optgroup>
                                            <option value="" selected disabled></option>
                                            <option value="Aktif">Aktif</option>
                                            <option value="Tidak Aktif">Tidak Aktif</option>
                                        </optgroup>
                                    </select>
                                    <label for="statusPendidikan">Status Pendidikan</label>
                                </div>
                                <div class="column is-6">
                                    <select name="domisili" id="" class="required">
                                        <optgroup>
                                            <option value="" selected disabled></option>
                                            <option value="SPK Pusat">SPK Pusat</option>
                                            <option value="SPK Daerah">SPK Daerah</option>
                                        </optgroup>
                                    </select>
                                    <label for="domisili">Domisili Anggota</label>
                                </div>
                            </div> -->
                        </div>
                    </section>
                    <h5>Step 4</h5>
                    <section>
                        <div class="container">
                            <div class="columns is-centered">
                                <div class="column is-8 has-text-centered">
                                    <figure>
                                        <img src="<?php echo base_url() ?>assets/registrasi/asset/images/success.jpg" alt="">
                                    </figure>
                                    <p>Anda telah melengkapi formulir. <br>Klik <strong>DAFTAR</strong> untuk melanjutkan pendaftaran <br>atau klik KEMBALI untuk memeriksa data anda</p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>


           <?php echo form_close();?>
            
            <p class="copyright">&copy; webhoster @ 2020 | All rights reserved</p>

        </div>
    </div>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/registrasi/bootstrap/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url() ?>assets/registrasi/asset/js/jquery-1.11.0.min.js"></script>
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
            $("#provinsi").change(function(){
                var id_provinsi = $("#provinsi").val();
                document.getElementById('divkota').value = id_provinsi;
            })
        });
</script>
<script>
    $(function(){
        $( "#provinsia" ).change(function(event)
        {
            event.preventDefault();
            var email= $("#provinsia").val();

            $.ajax(
                {
                    type:"post",
                    url: "<?php echo base_url(); ?>index.php/C_Registrasi/getkabupaten",
                    data:{ id_provinsi:email},
                    beforeSend: function(e) {
                      if(e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                      }
                    },
                    success:function(response)
                    {

                     // $("#kab").html(response.list_kab).show();
                        // console.log(response);
                        // $("#kab").html(response);
                        // $('#kab').show();
                        var hasil = document.getElementById("kaba");
                        hasil.innerHTML = response.list_kab;
                    },
                    error: function() 
                    {
                        alert("Invalide!");
                    }
                }
            );
        });
    });
</script>
<script>
    $(function(){
        $( "#kaba" ).change(function(a)
        {
            a.preventDefault();
            var kab= $("#kaba").val();

            $.ajax(
                {
                    type:"post",
                    url: "<?php echo base_url(); ?>index.php/C_Registrasi/getkec",
                    data:{ kabupaten:kab},
                    beforeSend: function(e) {
                      if(e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                      }
                    },
                    success:function(response)
                    {

                        // console.log(response);
                        var k = document.getElementById("keca");
                        k.innerHTML = response.list_kec;
                    },
                    
                    error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
                      alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                    }
                }
            );
        });
    });
</script>
  <script type="text/javascript">
  function Angkasaja(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
    return true;
  }
</script>

<script type='text/javascript'>
    var error = 1; // nilai default untuk error 1
    function cek_nik(){
        $("#pesannik").hide();
        var nik = $("#nika").val();
        if(nik != ""){
            $.ajax({
                url: "<?php echo site_url() . '/C_User/cek_nik'; ?>", //arahkan pada proses_tambah di controller member
                data: 'nik='+nik,
                type: "POST",
                success: function(msg){
                    if(msg==1){
                        $("#pesannik").css("color","#fc5d32");
                        $("#nika").css("border-color","#fc5d32");
                        alert("NIK sudah digunakan !");
 
                        error = 1;
                    }else{
                        $("#pesannik").css("color","#59c113");
                        $("#nika").css("border-color","#59c113");
                        $("#pesannik").html("");
                        error = 0;
                    }
 
                    $("#pesannik").fadeIn(1000);
                }
            });
        }                
    }
     
</script>
</body>
</html>