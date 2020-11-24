<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Profil extends CI_Controller{
    
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
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->profiluser($iduser);   
        $data['korwil'] = $this->M_Korwil->getkorwil();   
        $data['karya'] = $this->M_User->getkaryatulis($iduser); 
        $this->load->view('profil/v_profil',$data); 
        $this->load->view('template/footer');
    }

     function anggota($iduser)
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        // $iduser = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        // $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->profiluser($iduser);   
        $data['korwil'] = $this->M_Korwil->getkorwil();   
        $data['karya'] = $this->M_User->getkaryatulis($iduser); 
        $this->load->view('profil/v_profila',$data); 
        $this->load->view('template/footer');
    }
}