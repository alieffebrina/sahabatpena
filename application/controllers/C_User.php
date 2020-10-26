<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class C_User extends CI_Controller{


    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_User');
        $this->load->model('M_Korwil');
        $this->load->model('M_Setting');

        require APPPATH.'libraries/phpmailer/src/Exception.php';
        require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
        require APPPATH.'libraries/phpmailer/src/SMTP.php';
    }

    function index()
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $tabel = 'tb_akses';
        $edit = array(
            'tipeuser' => $id,
            'edit' => '1',
            'id_menu' => '9'
        );
        $hasiledit = $this->M_Setting->cekakses($tabel, $edit);
        if(count($hasiledit)!=0){ 
            $tomboledit = 'aktif';
        } else {
            $tomboledit = 'tidak';
        }

        $hapus = array(
            'tipeuser' => $id,
            'delete' => '1',
            'id_menu' => '9'
        );
        $hasilhapus = $this->M_Setting->cekakses($tabel, $hapus);
        if(count($hasilhapus)!=0){ 
            $tombolhapus = 'aktif';
        } else {
            $tomboledit = 'tidak';
        }
        $data['akseshapus'] = $tombolhapus;
        $data['aksesedit'] = $tomboledit;
        $data['user'] = $this->M_User->getall();   
        $data['header'] = 'Anggota';        
        $data['korwil'] = $this->M_Korwil->getkorwil();   
        $this->load->view('user/v_user',$data); 
        $this->load->view('template/footer');
    }

    function sort($korwil)
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $tabel = 'tb_akses';
        $edit = array(
            'tipeuser' => $id,
            'edit' => '1',
            'id_menu' => '9'
        );
        $hasiledit = $this->M_Setting->cekakses($tabel, $edit);
        if(count($hasiledit)!=0){ 
            $tomboledit = 'aktif';
        } else {
            $tomboledit = 'tidak';
        }

        $hapus = array(
            'tipeuser' => $id,
            'delete' => '1',
            'id_menu' => '9'
        );
        $hasilhapus = $this->M_Setting->cekakses($tabel, $hapus);
        if(count($hasilhapus)!=0){ 
            $tombolhapus = 'aktif';
        } else {
            $tomboledit = 'tidak';
        }
        $data['akseshapus'] = $tombolhapus;
        $data['aksesedit'] = $tomboledit;
        $data['user'] = $this->M_User->getjumlahwilayah($korwil);   
        $data['header'] = 'Anggota';        
        $data['korwil'] = $this->M_Korwil->getkorwil();   
        $this->load->view('user/v_user',$data); 
        $this->load->view('template/footer');
    }

    public function get_listuser(){
            $id = $this->input->post('cek');
            $kec = $this->M_User->get_listuser($id);
            $lists = "<div class='form-group'> </div>";                                   
            foreach($kec as $data){
              $lists .= "<li><div class='media'>
                            <div class='align-self-center mr-3'>
                                <img src='".base_url()."/images/".$data->foto."' class='rounded-circle avatar-xs' alt=''>
                            </div>
                            
                            <div class='media-body overflow-hidden'>
                                <h5 class='text-truncate font-size-14 mb-1'>".$data->noanggota."</h5>
                                <p class='text-truncate mb-0'>".$data->nama."</p>
                            </div>
                        </div></li><br>"; // Tambahkan tag option ke variabel $lists
                            // <div class='font-size-11'><a href=".site_url('C_Login/login/'.$data->username).">Login</a></div>
            }
            
            $callback = array('list_user'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
            echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

    function getkorwilmutasi(){
            $id = $this->input->post('cekanggotamutaasi');
            $kec = $this->M_User->getkorwilmutasi($id);                           
            foreach($kec as $data){
              $listkorwil = "<input type='hidden' name='korwilawal' value='".$data->id_korwil."'>".$data->namakorwil;
            }
            
            $callback = array('korwilawalmutasi'=> $listkorwil);
            echo json_encode($callback);
    }

    function karyatulis()
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->getspek($iduser);
        $data['karyatulis'] = $this->M_User->getkaryatulis($iduser);      
        $this->load->view('user/v_karyatulis',$data); 
        $this->load->view('template/footer');
    }

    function viewkaryatulis()
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);

        $tabel = 'tb_akses';
         $add = array(
            'tipeuser' => $id,
            'add' => '1',
            'id_menu' => '9'
        );
        $hasiladd = $this->M_Setting->cekakses($tabel, $add);
        if(count($hasiladd)!=0){ 
            $tomboladd = 'aktif';
        } else {
            $tomboladd = 'tidak';
        }


        $edit = array(
            'tipeuser' => $id,
            'edit' => '1',
            'id_menu' => '9'
        );
        $hasiledit = $this->M_Setting->cekakses($tabel, $edit);
        if(count($hasiledit)!=0){ 
            $tomboledit = 'aktif';
        } else {
            $tomboledit = 'tidak';
        }

        $hapus = array(
            'tipeuser' => $id,
            'delete' => '1',
            'id_menu' => '9'
        );
        $hasilhapus = $this->M_Setting->cekakses($tabel, $hapus);
        if(count($hasilhapus)!=0){ 
            $tombolhapus = 'aktif';
        } else {
            $tomboledit = 'tidak';
        }
        $data['akseshapus'] = $tombolhapus;
        $data['aksesedit'] = $tomboledit;
        $data['aksesadd'] = $tomboladd;
            $data['karyatulis'] = $this->M_User->getvkaryatulis(); 
        $this->load->view('karyatulis/v_karyatulis',$data); 
        $this->load->view('template/footer');
    }

    function editkt($noanggota,$idkt)
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->getspek($noanggota);
        $data['kt'] = $this->M_User->geteditkt($idkt);  
        $data['karyatulis'] = $this->M_User->getkaryatulis($noanggota);      
        $this->load->view('user/v_editkt',$data); 
        $this->load->view('template/footer');
    }

    function editkaryatulis()
    {   
        $noanggota = $this->input->post('noanggota');
        $this->M_User->editkt();
        $this->session->set_flashdata('Sukses', "Karya tulis telah diperbaharui!!");
        redirect('user-karyatulis');
    }

     function registrasi()
    { 
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $this->load->view('registrasi/registrasi', $data);
    }

    function add()
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        if ($id != NULL){
        $this->load->view('template/sidebar.php', $data);
        }
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $this->load->view('user/v_adduser', $data); 
        $this->load->view('template/footer');
    }

    function daftarulang()
    {
        $data['korwil'] = $this->M_Korwil->getkorwil();
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $this->load->view('user/v_daftarulang', $data); 
        // $this->load->view('user/v_tes', $data); 
        $this->load->view('template/footer');
    }

    function daftarulangcek($a)
    {

        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['korwil'] = $this->M_Korwil->getkorwil();
        $data['user'] = $this->M_User->getspek($a);
        $data['karyatulis'] = $this->M_User->getkaryatulis($a);

        $this->load->view('user/v_tes', $data);
        // $this->load->view('user/v_daftarulangcek', $data); 
        // $this->load->view('template/show');
        $this->load->view('template/footer');
    }

     function cek_nik(){
        $tabel = 'tb_anggota';
        $cek = 'nik';
        $kode = $this->input->post('nik');
        $hasil_kode = $this->M_Setting->cek($cek,$kode,$tabel);
        if(count($hasil_kode)!=0){ 
            echo '1';
        }else{
            echo '2';
        }
         
    }

    function cek_anggota(){
        $tabel = 'tb_anggota';
        $cek = 'id_anggota';
        $kode = $this->input->post('noanggota');
        $hasil_kode = $this->M_Setting->cek($cek,$kode,$tabel);
        if(count($hasil_kode)!=0){ 
            echo '1';
        }else{
            echo '2';
        }
         
    }
    
    public function tambah()
    {   
        // echo "tes"; 
        $upload = $this->M_User->upload();
        if ($upload['result'] == "success"){
            $this->M_User->tambahdata($upload);
            $this->load->library('mailer');
            $email_penerima = 'alief.febrina@gmail.com';
            $subjek = $this->input->post('subjek');
            $pesan = 'php mail sukses'; // $this->input->post('pesan');
            // $attachment = $_FILES['attachment']; 
            $content = 'data berhasil dikirim'; // $this->load->view('content', array('pesan'=>$pesan), true) Ambil isi file content.php dan masukan ke variabel $content
            $sendmail = array(
              'email_penerima'=>$email_penerima,
              'subjek'=>$subjek,
              'content'=>$content,
              //'attachment'=>$attachment//
            );
            if(empty($attachment['name'])){ // Jika tanpa attachment
              $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
            }else{ // Jika dengan attachment
              $send = $this->mailer->send_with_attachment($sendmail); // Panggil fungsi send_with_attachment yang ada di librari Mailer
            }
            
            $this->session->set_flashdata('Sukses', "Data Telah Disimpan!!");
            redirect('user');    
        } else {
            'upload gagal';
        }
    }

     public function adddu()
    {   
        $karyatulis = $this->input->post('juduldu');
        $thnterbit=$this->input->post('thnterbitdu');
        $jenis=$this->input->post('jenisdu');
        $penerbit=$this->input->post('penerbitdu');
        // print_r($karyatulis);
        echo $karyatulis;
            $index = 0;
            foreach ((array)$karyatulis as $key) {
                $data = array('id_anggota' => $a,
                    'karyatulis' => $key,
                    'tglpublish' => $thnterbit[$index],
                    'jenis' => $jenis[$index],
                    'penerbit' => $penerbit[$index]);

                $this->db->insert('tb_karyatulis', $data);
            }

        echo "tes"; 
        $upload = $this->M_User->upload();
        if ($upload['result'] == "success"){
            $this->M_User->tambahregis($upload);
            
        $thnterbit = $this->input->post('kar'); 
        // echo $thnterbit;
            $selectmax = $this->M_User->selectmax();
            foreach ($selectmax as $key) {
                $idanggota = $key->id_anggota;
                $this->M_User->save($idanggota);
            }
            $korwil = $this->input->post('korwil');

            $kode = $this->M_Korwil->cekkode($korwil);
            foreach ($kode as $modul) {
                $a = $modul->kodekorwil;
                date_default_timezone_set('Asia/Jakarta');
                $tgl = date('dmY');
                $a = str_replace("tanggal", $tgl, $a);
                $data = $this->M_User->getjumlahwilayah($korwil);
                $id = count($data)+1;
                $a = str_replace("no", $id, $a);
            }
            $kode = $a;
            $this->M_User->noanggota($kode);
            
        //     $this->session->set_flashdata('Sukses', "Data Berhasil Silakan Login!!");
            redirect('daftarulang-cek/'.$idanggota); 

        } else {
            'upload gagal';
        }
    }

    function cek($ida)
    {
        
        $this->session->set_flashdata('Sukses', "Data Berhasil Dihapus.");
        $this->load->view('user/v_tes');
    }


     public function tambahkaryatulis()
    {   
        $noanggota = $this->input->post('noanggota');
        $this->M_User->tambahkaryatulis();
        $this->session->set_flashdata('Sukses', "Record Added Successfully!!");
        redirect('user-karyatulis');  
    }

    function savedu(){
        $this->M_User->savedu();
            $this->session->set_flashdata('Sukses', "Terima kasih data berhasil disimpan!!");
            redirect('login'); 
    }


    function view($ida)
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->getspek($ida);
        $data['karyatulis'] = $this->M_User->getkaryatulis($ida);
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['korwil'] = $this->M_Korwil->getkorwil();
        $this->load->view('user/v_vuser',$data); 
        $this->load->view('template/footer');
    }

    function edit($iduser)
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['korwil'] = $this->M_Korwil->getkorwil();
        $data['user'] = $this->M_User->getspek($iduser);
        $data['karyatulis'] = $this->M_User->getkaryatulis($iduser);
        $this->load->view('user/v_euser',$data); 
        $this->load->view('template/footer');
    }

    function edituser()
    {   
        $korwilawal = $this->input->post('korwilawal');
        $korwilskrg = $this->input->post('korwil');
        if($korwilawal == $korwilskrg){
            $kode = $this->input->post('noanggota');
        } else {
            $kode = $this->M_Korwil->cekkode($korwilskrg);
            foreach ($kode as $modul) {
                $a = $modul->kodekorwil;
                date_default_timezone_set('Asia/Jakarta');
                $tgl = date('dmY');
                $a = str_replace("tanggal", $tgl, $a);
                $data = $this->M_User->getjumlahwilayah($korwilskrg);
                $id = count($data)+1;
                $a = str_replace("no", $id, $a);
            }
            $kode = $a;
        }
        $this->M_User->edit($kode);
        $status = $this->input->post('aktivasi');
        if ($status == 'tidak') {
            $this->M_User->nonaktif();
        } else if($status == 'resign') {
            $this->M_User->mengundurkandiri();
        } else {
            $this->M_User->aktif();   
        }
        $this->session->set_flashdata('Sukses', "Data Berhasil Dirubah!!");
        redirect('user');
    }

    function hapus($id){
        $where = array('id_anggota' => $id);
        $this->M_Setting->delete($where,'tb_anggota');
        $this->session->set_flashdata('Sukses', "Data Berhasil Di Hapus!!");
        redirect('user');
    }

    function konfirm($iduser)
    {   
        $id = $this->session->userdata('statusanggota');
        $this->M_User->konfirm($iduser,$id);
        $this->session->set_flashdata('Sukses', "Data Berhasil Di Anggota!!");
            redirect('user');
    }

    function konfirmkorwil()
    {   
        $korwil = $this->input->post('korwil');

        $kode = $this->M_Korwil->cekkode($korwil);
        foreach ($kode as $modul) {
            $a = $modul->kodekorwil;
            date_default_timezone_set('Asia/Jakarta');
            $tgl = date('dmY');
            $a = str_replace("tanggal", $tgl, $a);
            $data = $this->M_User->getjumlahwilayah($korwil);
            $id = count($data)+1;
            $a = str_replace("no", $id, $a);
        }
        $kode = $a;
        // echo $kode;
        $id = $this->session->userdata('statusanggota');
        $this->M_User->konfirm($id, $kode);
        $this->session->set_flashdata('Sukses', "Data Berhasil Di Anggota!!");
            redirect('user');
    }

     function konfirmasi($ida)
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['idanggota'] = $ida;
        $data['korwil'] = $this->M_Korwil->getkorwil(); 
        $this->load->view('user/v_pilihkorwil',$data); 
        $this->load->view('template/footer');

    }

    function laporan()
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $korwil = $this->session->userdata('korwil');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        if($korwil == NULL){
        $data['user'] = $this->M_User->getall();   
        } else { 
        $data['user'] = $this->M_User->getjumlahwilayah($korwil);    
        }
        $this->load->view('user/v_laporanuser',$data); 
        $this->load->view('template/footer');
    }


    function setting()
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->getall();        
        $this->load->view('setting/v_setting',$data); 
        $this->load->view('template/footer');
    }

    function user_kt()
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->getaktif();        
        $this->load->view('user/v_userkaryatulis',$data); 
        $this->load->view('template/footer');
    }


    function nonaktif($id)
    {
        $this->M_User->nonaktif($id);
        $this->session->set_flashdata('Sukses', "Data Berhasil Di Non Aktifkan!!");
        redirect('user-setting');
    }

     function aktif($id)
    {
        $this->M_User->aktifsetting($id);
        $this->session->set_flashdata('Sukses', "Data Berhasil Di Aktifkan!!");
        redirect('user-setting');
    }


    function resign($ida)
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['userspek'] = $this->M_User->getspek($ida); 
        $data['user'] = $this->M_User->getall();        
        $this->load->view('setting/v_settingresign',$data); 
        $this->load->view('template/footer');
    }

    public function excel()
    {   
        $id = $this->session->userdata('statusanggota');

        $korwil = $this->session->userdata('korwil');
        if($korwil == NULL){
        $user = $this->M_User->getall();   
        } else { 
        $user = $this->M_User->getjumlahwilayah($korwil);    
        }
        $data = array('title' => 'Laporan Anggota',
                'excel' => $user);
        $this->load->view('user/v_exceluser', $data);
    }

    function mengundurkandiri()
    {   
        $this->M_User->mengundurkandiri();
        $this->session->set_flashdata('Sukses', "Data Berhasil Di Non Aktifkan!!");
        redirect('user-setting');
    }

    function hapuskt($noanggota,$idkt){
        $where = array('id_karyatulis' => $idkt);
        $this->M_Setting->delete($where,'tb_karyatulis');
        $this->session->set_flashdata('Sukses', "Data Berhasil Dihapus.");
        redirect('user-karyatulis');  
    }

    function send2($ida){
        //echo $ida;
        $spek = $this->M_User->getspek($ida);
        foreach ($spek as $spek) {
            $nama = $spek->nama;
            $username = $spek->username;
            $password = $spek->password;
            $email_penerima = $spek->email;
        }

        $this->load->library('mailer');
        // $email_penerima = $this->input->post('email');
        $subjek = 'Terima kasih telah mendaftar';

        $pesan = 'Terima kasih Bapak/Ibu '.$nama.' telah mengisi database SPK, berikut kami sertakan username dan password Bapak/Ibu untuk login di database SPK yang tercantum dibawah ini:
1. Username : '.$username.'
2. Password : '.$password.'
Link Url Login www.anggota.sahabatpenakita.id 
Setelah login, bapak ibu bisa melakukan edit data atau update data terkini

Salam
Ketua SPK (Sahabat Pena Kita)'; // $this->input->post('pesan');
        // $attachment = $_FILES['attachment']; 
        $content = 'test'; // $this->load->view('content', array('pesan'=>$pesan), true) Ambil isi file content.php dan masukan ke variabel $content
        $sendmail = array(
          'email_penerima'=>'alief.febrina@gmail.com',
          'subjek'=>$subjek,
          'content'=>$content,
          //'attachment'=>$attachment//
        );
        // if(empty($attachment['name'])){ // Jika tanpa attachment
          $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
        // }else{ // Jika dengan attachment
        //   $send = $this->mailer->send_with_attachment($sendmail); // Panggil fungsi send_with_attachment yang ada di librari Mailer
        // }

        // // $this->load->library('mailer');
        // $emailadmin = 'rizkyfebry09@gmail.com';
        // $subjekadmin = 'Pendaftar Baru';
        // $pesanadmin = 'pendaftaran baru atas nama : '.$this->input->post('nama').'silahkan kunjungi link dibawah ini'; // $this->input->post('pesan');
        // // $attachment = $_FILES['attachment']; 
        // $contentadmin = $pesanadmin; // $this->load->view('content', array('pesan'=>$pesan), true) Ambil isi file content.php dan masukan ke variabel $content
        // $sendmailadmin = array(
        //   'email_penerima'=>$emailadmin,
        //   'subjek'=>$subjekadmin,
        //   'content'=>$contentadmin,
        //   //'attachment'=>$attachment//
        // );
        // if(empty($attachment['name'])){ // Jika tanpa attachment
        //   $send = $this->mailer->send($sendmailadmin); // Panggil fungsi send yang ada di librari Mailer
        // }else{ // Jika dengan attachment
        //   $send = $this->mailer->send_with_attachment($sendmailadmin); // Panggil fungsi send_with_attachment yang ada di librari Mailer
        // }

        // $this->session->set_flashdata('Sukses', "Data Berhasil Di Kirim!!");
        // redirect('user');  
    }

    function send($ida){
        $spek = $this->M_User->getspek($ida);
        foreach ($spek as $spek) {
            $nama = $spek->nama;
            $username = $spek->username;
            $password = $spek->password;
            $email_penerima = $spek->email;
        }
        // $email_penerima = $this->input->post('email');
        $response = false;
        $mail = new PHPMailer();       

        // SMTP configuration
        $mail->IsSMTP(); // mengirimkan sinyal ke class PHPMail untuk menggunakan SMTP
        $mail->SMTPDebug  = 0;                     // mengaktifkan debug mode (untuk ujicoba)
                                                   // 1 = Error dan pesan
                                                   // 2 = Pesan saja
        $mail->SMTPAuth   = true;                  // aktifkan autentikasi SMTP
        $mail->SMTPSecure = "ssl";                 // jenis kemananan
        $mail->Host       = "smtp.gmail.com";      // masukkan GMAIL sebagai smtp server
        $mail->Port       = 465;                   // masukkan port yang digunakan oleh SMTP Gmail
        $mail->Username   = "tes.hosterweb@gmail.com";  // GMAIL username
        $mail->Password   = "veryaprzdoexroew";  

        $mail->SetFrom('sahabatpenakita24318@gmail.com', 'Admin Konferwil Jatim INI'); // masukkan alamat pengririm dan nama pengirim jika alamat email tidak sama, maka yang digunakan alamat email untuk username
        //$mail->addReplyTo('xxx@hostdomain.com', ''); //user email

        // Add a recipient
        $mail->addAddress($email_penerima); //email tujuan pengiriman email

        // Email subject
        $mail->Subject = 'pendaftaran email'; //subject email

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent = 'Terima kasih Bapak/Ibu '.$nama.'. telah mendaftar sebagai calon anggota Sahabat Pena Kita (SPK). Seleksi penerimaan anggota baru akan dilakukan di setiap bulan Januari dan Juli oleh pengurus SPK. Pengumuman penerimaan seleksi akan dikirim melalui notifikasi email masing-masing calon anggota SPK. Tetap berkarya.

Salam Literasi
Ketua SPK (Sahabat Pena Kita)
Dr. M. Arfan Mu’ammar, M.Pd.I
';  // isi email
        $mail->Body = $mailContent;

        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo 'Message has been sent';
        }
    }
}