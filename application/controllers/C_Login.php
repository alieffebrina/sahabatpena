<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('M_login');
		$this->load->library('session');
	}

	function index()
	{
		$this->load->view('v_login');
		
	}

	function cekanggota()
	{
        // Data untuk page index
        $data['scan']=$this->scan_model->read();

        // $data['scan'] = $this->scan_model->get()->result();

        $data['sumData']=$this->scan_model->sumData();

        $data['show_table']=$this->view_table();

        $this->load->view('scan/scanList', $data);


		$this->load->view('template/cek');
		
	}

	function cek_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		// echo $username.$password;
		$user = $this->M_login->get($username);
		if(empty($user)){
			$this->session->set_flashdata('pesan','salah');
			$this->load->view('v_login');
		} else {
		    if($password == $user->password){ // Jika password yang diinput sama dengan password yang didatabase
        		$session = array(
		          'authenticated'=>true, // Buat session authenticated dengan value true
		          'username'=>$user->username,  // Buat session nip
		          'nama'=>$user->nama,
		          'id_user'=>$user->id_anggota, // Buat session authenticated
		          'statusanggota' => $user->statusanggota,
		          'foto' => $user->foto,
		          'korwil' => $user->id_korwil
		        );
		       	// echo "ok";
		        $this->session->set_userdata($session); // Buat session sesuai $session
		        redirect('Welcome'); // Redirect ke halaman welcome
		    }else{
		        $this->session->set_flashdata('message', 'Password salah'); // Buat session flashdata
		        redirect('login'); // Redirect ke halaman login
		    }
   		}
   	}

	public function logout(){
    $this->session->sess_destroy(); // Hapus semua session
    redirect('login'); // Redirect ke halaman login
	}

	function login($id)
	{
		$data['username'] = $id;
		$this->load->view('v_login', $data);
		
	}
}
