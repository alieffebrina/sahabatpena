<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Mutasi extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_User');
        $this->load->model('M_Mutasi');
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
        $data['mutasi'] = $this->M_Mutasi->getmutasi();         
        $this->load->view('mutasi/v_mutasi',$data); 
        $this->load->view('template/footer');
    }

     function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->getall();
        $data['korwil'] = $this->M_Korwil->getall();
        $this->load->view('mutasi/v_addmutasi', $data); 
        $this->load->view('template/footer');
    }

    public function tambah()
    {   
        $korwil = $this->input->post('korwilmutasi');

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
        echo $kode;
        $id = $this->input->post('anggotamutasi');
        $this->M_Mutasi->konfirm($id, $kode);

        $this->M_Mutasi->tambah();
        $this->session->set_flashdata('Sukses', "Anggota berhasil dirubah!!");
            redirect('mutasi');
    }

}