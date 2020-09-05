<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Pengurus extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_Pengurus');
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
            'id_menu' => '4'
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
            'id_menu' => '4'
        );
        $hasilhapus = $this->M_Setting->cekakses($tabel, $hapus);
        if(count($hasilhapus)!=0){ 
            $tombolhapus = 'aktif';
        } else{
            $tombolhapus = 'tidak';
        }
        $data['akseshapus'] = $tombolhapus;
        $data['aksesedit'] = $tomboledit;
        $data['pengurus'] = $this->M_Pengurus->getpengurus();  
        $this->load->view('pengurus/v_pengurus',$data); 
        $this->load->view('template/footer');
    }

    function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->getuser(); 
        $this->load->view('pengurus/v_addpengurus', $data); 
        $this->load->view('template/footer');
    }

    public function tambah()
    {   
        $this->M_Pengurus->editstatususer();
        $this->M_Pengurus->tambahpengurus();
        $this->session->set_flashdata('Sukses', "Data Pengurus Berhasil Ditambah!!");
        redirect('pengurus');  
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['pengurus'] = $this->M_Pengurus->getpengurusspek($ida); 
        $this->load->view('pengurus/v_vpengurus', $data); 
        $this->load->view('template/footer');
    }

    function edit($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['pengurus'] = $this->M_Pengurus->getpengurusspek($ida); 
        $this->load->view('pengurus/v_epengurus', $data); 
        $this->load->view('template/footer');
    }

    function update()
    {   
        $ida = $this->input->post('id');
        $pengurus= $this->M_Pengurus->getpengurusspek($ida); 
        foreach ($pengurus as $key) {
            $a = $key->pengurus;
           if ($a != $ida){
                $this->M_Pengurus->editstatususer();
                $this->M_Pengurus->editsu($a);
           }
        }
        $this->M_Pengurus->update();
        $this->session->set_flashdata('Sukses', "Data Berhasil Dirubah!!");
        redirect('pengurus');
    }

     function hapus($a,$b)
    {   
        $this->M_Pengurus->editsu($b);
        $this->M_Pengurus->hapus($a);
        $this->session->set_flashdata('Sukses', "Data Berhasil Dirubah!!");
        redirect('pengurus');
    }
}