<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_User extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_User');
        $this->load->model('M_Korwil');
        $this->load->model('M_Setting');
    }

    function index()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $tabel = 'tb_akses';
        $edit = array(
            'tipeuser' => $id,
            'edit' => '1',
            'id_menu' => '2'
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
            'id_menu' => '2'
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

    function karyatulis()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->getspek($iduser);
        $data['karyatulis'] = $this->M_User->getkaryatulis($iduser);      
        $this->load->view('user/v_karyatulis',$data); 
        $this->load->view('template/footer');
    }

    function editkt($noanggota,$idkt)
    {
        $this->load->view('template/header');
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

    //  function registrasi()
    // { 
    //     $data['provinsi'] = $this->M_Setting->getprovinsi();
    //     $this->load->view('user/v_registrasi', $data);
    // }

     function registrasi()
    { 
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $this->load->view('registrasi/registrasi', $data);
    }

    function add()
    {
        $this->load->view('template/header');
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
            
            redirect('user');    
        } else {
            'upload gagal';
        }
    }

     public function adddu()
    {   
        // echo "tes"; 
        $upload = $this->M_User->upload();
        if ($upload['result'] == "success"){
            $this->M_User->tambahregis($upload);
            
        // $thnterbit = $this->input->post('kar'); 
        // echo $thnterbit;
            $selectmax = $this->M_User->selectmax();
            foreach ($selectmax as $key) {
                $a = $key->id_anggota;
                $this->M_User->save($a);
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
            // $this->load->library('mailer');
            // $email_penerima = 'alief.febrina@gmail.com';
            // $subjek = $this->input->post('subjek');
            // $pesan = 'php mail sukses'; // $this->input->post('pesan');
            // // $attachment = $_FILES['attachment']; 
            // $content = 'data berhasil dikirim'; // $this->load->view('content', array('pesan'=>$pesan), true) Ambil isi file content.php dan masukan ke variabel $content
            // $sendmail = array(
            //   'email_penerima'=>$email_penerima,
            //   'subjek'=>$subjek,
            //   'content'=>$content,
            //   //'attachment'=>$attachment//
            // );
            // if(empty($attachment['name'])){ // Jika tanpa attachment
            //   $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
            // }else{ // Jika dengan attachment
            //   $send = $this->mailer->send_with_attachment($sendmail); // Panggil fungsi send_with_attachment yang ada di librari Mailer
            // }
            
            $this->session->set_flashdata('Sukses', "Data Berhasil Silakan Login!!");
            redirect('login'); 
        } else {
            'upload gagal';
        }
    }


     public function tambahkaryatulis()
    {   
        $noanggota = $this->input->post('noanggota');
        $this->M_User->tambahkaryatulis();
        $this->session->set_flashdata('Sukses', "Record Added Successfully!!");
        redirect('user-karyatulis');  
    }


    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->getspek($ida);
        $data['karyatulis'] = $this->M_User->getkaryatulis($ida);
        $this->load->view('user/v_vuser',$data); 
        $this->load->view('template/footer');
    }

    function edit($iduser)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['user'] = $this->M_User->getspek($iduser);
        $data['korwil'] = $this->M_Korwil->getkorwil();
        $data['karyatulis'] = $this->M_User->getkaryatulis($iduser);
        $this->load->view('user/v_euser',$data); 
        $this->load->view('template/footer');
    }

    function edituser()
    {   
        $this->M_User->edit();
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
        $this->load->view('template/header');
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
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->getall();        
        $this->load->view('user/v_laporanuser',$data); 
        $this->load->view('template/footer');
    }


    function setting()
    {
        $this->load->view('template/header');
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
        $this->load->view('template/header');
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
        $this->session->set_flashdata('Sukses', "Data Berhasil Dirubah!!");
        redirect('user-setting');
    }


    function resign($ida)
    {
        $this->load->view('template/header');
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
            $user = $this->M_User->getall();       
        $data = array('title' => 'Laporan Anggota',
                'excel' => $user);
        $this->load->view('user/v_exceluser', $data);
    }

    function mengundurkandiri()
    {   
        $this->M_User->mengundurkandiri();
        $this->session->set_flashdata('Sukses', "Data Berhasil Dirubah!!");
        redirect('user-setting');
    }

    function hapuskt($noanggota,$idkt){
        $where = array('id_karyatulis' => $idkt);
        $this->M_Setting->delete($where,'tb_karyatulis');
        $this->session->set_flashdata('Sukses', "Data Berhasil Dihapus.");
        redirect('user-karyatulis');  
    }

}