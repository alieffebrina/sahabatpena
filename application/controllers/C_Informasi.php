<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Informasi extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_User');
        $this->load->model('M_Informasispk');
        $this->load->model('M_Setting');
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
        
        $add = array(
            'tipeuser' => $id,
            'add' => '1',
            'id_menu' => '8'
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
            'id_menu' => '8'
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
            'id_menu' => '8'
        );
        $hasilhapus = $this->M_Setting->cekakses($tabel, $hapus);
        if(count($hasilhapus)!=0){ 
            $tombolhapus = 'aktif';
        } else {
            $tombolhapus = 'tidak';
        }
        $data['aksestambah'] = $tomboladd;
        $data['akseshapus'] = $tombolhapus;
        $data['aksesedit'] = $tomboledit;
        $data['informasi'] = $this->M_Informasispk->getall();         
        $this->load->view('informasi/v_informasi',$data); 
        $this->load->view('template/footer');
    }

    function add()
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->getall();
        $data['informasi'] = $this->M_Informasispk->getall();
        $this->load->view('informasi/v_addinformasi', $data); 
        $this->load->view('template/footer');
    }

    function edit($a)
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->getall();
        $data['informasi'] = $this->M_Informasispk->getspek($a);
        $this->load->view('informasi/v_editinformasi', $data); 
        $this->load->view('template/footer');
    }

    function view($a)
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->getall();
        $data['informasi'] = $this->M_Informasispk->getspek($a);
        $this->load->view('informasi/v_viewinformasi', $data); 
        $this->load->view('template/footer');
    }

    public function tambah()
    {   
        $this->M_Informasispk->tambah();
        $this->session->set_flashdata('Sukses', "Informasi Baru Berhasil Ditambah!!");
        redirect('informasi');  
    }

    function update()
    {   
        $this->M_Informasispk->update();
        $this->session->set_flashdata('Sukses', "Informasi Berhasil Dirubah!!");
        redirect('informasi');
    }

    function hapus($id){
        $this->M_Informasispk->nonaktif($id);
        $this->session->set_flashdata('Sukses', "Data Berhasil Di Hapus!!");
        redirect('informasi');
    }
}
