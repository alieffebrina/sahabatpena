<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_Setting');
        $this->load->model('M_User');
        $this->load->model('M_Korwil');
        if(!$this->session->userdata('id_user')){
            redirect('C_Login');
        }
    }

	public function index()
	{
		$this->load->view('template/header.php');
		$id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
		$this->load->view('template/sidebar.php', $data);
		$data['anggota'] = $this->M_User->dataanggota();
		$data['korwil'] = $this->M_Korwil->datakorwil();
		$data['dataaktif'] = $this->M_User->dataaktif();
		$data['datanonaktif'] = $this->M_User->datanonaktif();
		$data['datawaiting'] = $this->M_User->datawaiting();
		$this->load->view('template/index.php', $data);
		$this->load->view('template/footer.php');
	}
}
