<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_KTA extends CI_Controller{


    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_User');
        $this->load->model('M_Korwil');
        $this->load->model('M_Setting');

        $this->load->library('pdf'); 
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
            'id_menu' => '11'
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
            'id_menu' => '11'
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
            'id_menu' => '11'
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
        if($this->session->userdata('statusanggota') == 'administrator'){ 
        $data['user'] = $this->M_User->getall();   
        } else {
        $data['user'] = $this->M_User->getspek($iduser); 
        }
        $data['header'] = 'Anggota';        
        $data['korwil'] = $this->M_Korwil->getkorwil();   
        $this->load->view('kta/v_user',$data); 
        $this->load->view('template/footer');
    }

    function sort($korwil)
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
            'id_menu' => '2'
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
            $tombolhapus = 'tidak';
        }
        $data['aksestambah'] = $tomboladd;
        $data['akseshapus'] = $tombolhapus;
        $data['aksesedit'] = $tomboledit;
        $data['user'] = $this->M_User->getjumlahwilayah($korwil);   
        $data['header'] = 'Anggota';        
        $data['korwil'] = $this->M_Korwil->getkorwil();   
        $this->load->view('kta/v_user',$data); 
        $this->load->view('template/footer');
    }

    function kta($ida){
        $pdf = new FPDF('L','mm',array('87', '54'));
        $pdf->SetMargins(0,0,0);
        $pdf->SetDrawColor(0,0,0);
        // $pdf = new FPDF('L','mm',array('148', '210'));
        // membuat halaman baru
        $pdf->AddPage();
        $pdf->Image('images/IDCARD.png',-2,0,89, 54);
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','',7,'C');
        $pdf->SetTextColor(255,255,255);
        $pdf->SetAutoPageBreak(false);
        // mencetak string 
        // $pdf->Cell(100,13,'',0,1,'L');     

        $user = $this->M_User->getspek($ida);
        foreach ($user as $key ) {
            if($key->foto != NULL){
            $pdf->Image('images/'.$key->foto,5,22,20,26);
            } else{
               $pdf->Image('assets/images/kosong.png',5,22,20,26);
            }
            $pdf->Cell(32,23,'',0,1,'L');
            if($key->bar_code != NULL){
            $pdf->Image('assets/images/'.$key->bar_code,27,34,13,13);
            } else{
               $pdf->Image('assets/images/kosong.png',27,34,13,13);
            }
            $pdf->Cell(44,3,'',0,0,'L');
            $pdf->Cell(50,3,$key->nama,0,1,'L');
            $pdf->Cell(44,4,'',0,0,'L');
            $pdf->Cell(50,4,$key->tempatlahir.'/'.date('d-m-Y', strtotime($key->tgllahir)),0,1,'L');
            $pdf->Cell(44,3,'',0,0,'L');
            $pdf->Cell(35,3,$key->noanggota,0,1,'L');
        }
        $pdf->Output();

    }
}
