<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Korwil extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_Korwil');
        $this->load->model('M_Setting');
        $this->load->model('M_User');
        if(!$this->session->userdata('id_user')){
            redirect('C_Login');
        }
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
        $data['korwil'] = $this->M_Korwil->getkorwil();  
        $this->load->view('korwil/v_korwil',$data); 
        $this->load->view('template/footer');
    }

    function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $this->load->view('korwil/v_addkorwil', $data); 
        $this->load->view('user/v_modal'); 
        $this->load->view('template/footer');
    }

    function pengurus($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['korwil'] = $this->M_Korwil->getkorwilspek($ida); 
        $data['pengurus'] = $this->M_Korwil->getpenguruskorwil($ida); 
        $data['user'] = $this->M_User->getuser(); 
        $this->load->view('korwil/v_pengurus', $data); 
        $this->load->view('user/v_modal'); 
        $this->load->view('template/footer');
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['korwil'] = $this->M_Korwil->getkorwilspek($ida); 
        $data['pengurus'] = $this->M_Korwil->getpenguruskorwil($ida); 
        $data['user'] = $this->M_User->getuser(); 
        $this->load->view('korwil/v_vkorwil', $data); 
        $this->load->view('user/v_modal'); 
        $this->load->view('template/footer');
    }

    public function tambah()
    {   
        $this->M_Korwil->tambah();
        $this->session->set_flashdata('Sukses', "Data Korwil Berhasil Ditambah!!");
        redirect('C_Korwil/tambahpengurus');  
    }

    public function tambahpengurus()
    {   
        $ida = $this->input->post('korwil');
        $this->M_Korwil->editstatususer();
        $this->M_Korwil->tambahpengurus();
        $this->session->set_flashdata('Sukses', "Data Pengurus Berhasil Ditambah!!");
        redirect('C_Korwil/pengurus'.$ida);  
    }
}
