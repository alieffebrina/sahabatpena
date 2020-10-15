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
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->profiluser($iduser);   
        $data['korwil'] = $this->M_Korwil->getkorwil();   
        $this->load->view('profil/v_profil',$data); 
        $this->load->view('template/footer');
    }
}