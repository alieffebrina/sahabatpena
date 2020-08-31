<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_User extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_User');
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
            'id_menu' => '1'
        );
        $hasiledit = $this->M_Setting->cekakses($tabel, $edit);
        if(count($hasiledit)!=0){ 
            $tomboledit = 'aktif';
        }

        $hapus = array(
            'tipeuser' => $id,
            'delete' => '1',
            'id_menu' => '1'
        );
        $hasilhapus = $this->M_Setting->cekakses($tabel, $hapus);
        if(count($hasilhapus)!=0){ 
            $tombolhapus = 'aktif';
        }
        $data['akseshapus'] = $tombolhapus;
        $data['aksesedit'] = $tomboledit;
        $data['user'] = $this->M_User->getuser();   
        $data['header'] = 'Anggota';
        $this->load->view('user/v_user',$data); 
        $this->load->view('template/footer');
    }

    function karyatulis($noanggota)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->getspek($noanggota);
        $data['karyatulis'] = $this->M_User->getkaryatulis($noanggota);      
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
        redirect('C_User/karyatulis/'.$noanggota);
    }

     function registrasi()
    { 
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $this->load->view('user/v_registrasi', $data);
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
            
            redirect('C_Login');    
        } else {
            'upload gagal';
        }
    }

     public function tambahkaryatulis()
    {   
        $noanggota = $this->input->post('noanggota');
        $this->M_User->tambahkaryatulis();
        $this->session->set_flashdata('Sukses', "Record Added Successfully!!");
        redirect('C_User/karyatulis/'.$noanggota);  
    }


    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->getspek($ida);
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
        $this->load->view('user/v_euser',$data); 
        $this->load->view('template/footer');
    }

    function edituser()
    {   
        $this->M_User->edit();
        $this->session->set_flashdata('Sukses', "Update Data Successfully!!");
        if($this->input->post('statusanggota') == 'menunggu konfirmasi admin' || $this->input->post('statusanggota') == 'menunggu konfirmasi upline' ){
            redirect('C_User');
        } else {
            redirect('C_User/all');
        }
    }

    function hapus($id){
        $where = array('id_anggota' => $id);
        $this->M_Setting->delete($where,'tb_anggota');
        $this->session->set_flashdata('Sukses', "Delete Data Successfully!!");
        redirect('C_User/all');
    }

    function konfirm($iduser)
    {   
        $id = $this->session->userdata('statusanggota');
        $data = $this->M_User->getnama($iduser);
        foreach ($data as $data) {
            $bayar = $data->statusbayar;
            $anggota = $data->statusanggota;
            $username = $data->nik;
        }
        $this->M_User->konfirm($iduser,$bayar,$anggota,$id,$username);
        $this->session->set_flashdata('Sukses', "Konfirm Data Successfully!!");

        if($anggota == 'menunggu konfirmasi admin' || $anggota == 'menunggu konfirmasi upline' ){
            redirect('C_User');
        } else {
            redirect('C_User/all');
        }
    }

    function laporan()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        if ($id == 'upline' || $id == 'downline'){
            $data['user'] = $this->M_User->getallspek($iduser);
        } else {
            $data['user'] = $this->M_User->getall();            
        }
        $data['header'] = 'Anggota';
        $this->load->view('user/v_laporanuser',$data); 
        $this->load->view('template/footer');
    }

    public function excel()
    {   
        $id = $this->session->userdata('statusanggota');
        if ($id == 'upline' || $id == 'downline'){
            $user = $this->M_User->getallspek($iduser);
        } else {
            $user = $this->M_User->getall();            
        }
        $data = array('title' => 'Laporan Anggota',
                'excel' => $user);
        $this->load->view('user/v_exceluser', $data);
    }


    function hapuskt($noanggota,$idkt){
        $where = array('id_karyatulis' => $idkt);
        $this->M_Setting->delete($where,'tb_karyatulis');
        $this->session->set_flashdata('Sukses', "Data Berhasil Dihapus.");
        redirect('C_User/karyatulis/'.$noanggota);  
    }

}