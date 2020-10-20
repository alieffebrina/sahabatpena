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
            redirect('login');
        }
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
            'edit' => '1',
            'id_menu' => '1'
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
            'id_menu' => '1'
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
            'id_menu' => '1'
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
        $data['korwil'] = $this->M_Korwil->getkorwil();  
        $this->load->view('korwil/v_korwil',$data); 
        $this->load->view('template/footer');
    }

    function add()
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['idkorwil'] = $this->M_Korwil->selectmax();
        $this->load->view('korwil/v_addkorwil', $data); 
        $this->load->view('user/v_modal'); 
        $this->load->view('template/footer');
    }

    function pengurus($ida)
    {
        
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
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

    function penguruse($ida)
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['korwil'] = $this->M_Korwil->getkorwilspek($ida); 
        $data['pengurus'] = $this->M_Korwil->getpenguruskorwile($ida); 
        $data['user'] = $this->M_User->getuser(); 
        $this->load->view('korwil/v_epengurus', $data); 
        $this->load->view('user/v_modal'); 
        $this->load->view('template/footer');
    }

    function view($ida)
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
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

     function edit($ida)
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['korwil'] = $this->M_Korwil->getkorwilspek($ida); 
        $data['pengurus'] = $this->M_Korwil->getpenguruskorwil($ida); 
        $data['user'] = $this->M_User->getuser(); 
        $this->load->view('korwil/v_ekorwil', $data); 
        $this->load->view('user/v_modal'); 
        $this->load->view('template/footer');
    }

    public function tambah()
    {   
        $this->M_Korwil->tambah();
        $result = $this->M_Korwil->selectmax();
        foreach ($result as $key) {
            $a = $key->id_korwil;
            // echo $a;
            $this->session->set_flashdata('Sukses', "Data Korwil Berhasil Ditambah!!");
            redirect('korwil-p/'.$a); 
        }
        // echo $result['id_korwil'];
        // $this->session->set_flashdata('Sukses', "Data Korwil Berhasil Ditambah!!");
        // redirect('C_Korwil/pengurus');  
    }

    public function tambahpengurus()
    {   
        $file_name = $this->input->post('skfile');
        $uploadfile = $this->M_Korwil->uploadfile();
        $ida = $this->input->post('korwil');
        $this->M_Korwil->editstatususer($ida);
        $this->M_Korwil->tambahpengurus($uploadfile);
        $this->session->set_flashdata('Sukses', "Data Pengurus Berhasil Ditambah!!");
        redirect('korwil-p/'.$ida);  
    }

    function editpengurus()
    {   
        // echo $this->input->post('pengurus');
        // echo $this->input->post('sk');
        // echo $this->input->post('jabatan');
        // echo $this->input->post('tglaktif');
        // echo $this->session->userdata('id_user');
        $id = $this->input->post('korwil');
        $this->M_Korwil->editp();
        $this->session->set_flashdata('Sukses', "Data Berhasil Dirubah!!");
        redirect('korwil-p/'.$id);
    } 

    function editkorwil()
    {   
        $this->M_Korwil->editkorwil();
        $this->session->set_flashdata('Sukses', "Data Berhasil Dirubah!!");
        redirect('Korwil');
    }

    function pengurush($id, $anggota){
        $this->M_Korwil->hapusstatususer($id, $anggota);
        // // $this->M_Korwil->tglakhir($id);
        $this->session->set_flashdata('Sukses', "Pengurus berhasil di hapus");
        redirect('korwil-p/'.$id);  
    }

    function cek_jabatan(){
        $korwil = $this->input->post('korwil');
        $hasil_kode = $this->M_Korwil->cek_jabatan($korwil);
        if(count($hasil_kode)!=0){ 
            echo '1';
        }else{
            echo '2';
        }
         
    }

     function hapus($id){
        $user = $this->M_Korwil->getuserkorwil($id);
        foreach ($user as $key) {
            $a = $key->id_anggota;
            $this->M_Korwil->hapuskode($a);
        }

        $where = array(
            'id_korwil' => $id,
        );

        $this->M_Setting->delete($where, 'tb_korwil');
        $this->session->set_flashdata('Sukses', "Korwil berhasil di hapus.");
        redirect('Korwil');  
    }


    public function excel()
    {   
        $id = $this->session->userdata('statusanggota');
            $user = $this->M_Korwil->getkorwil();       
        $data = array('title' => 'Laporan Korwil',
                'excel' => $user);
        $this->load->view('korwil/v_excelkorwil', $data);
    }



    function laporan()
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['korwil'] = $this->M_Korwil->getkorwil();           
        $this->load->view('korwil/v_laporankorwil',$data); 
        $this->load->view('template/footer');
    }


}
