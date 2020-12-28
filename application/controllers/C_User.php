<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class C_User extends CI_Controller{


    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_User');
        $this->load->model('M_Korwil');
        $this->load->model('M_Setting');

        require APPPATH.'libraries/PHPMailer/src/Exception.php';
        require APPPATH.'libraries/PHPMailer/src/PHPMailer.php';
        require APPPATH.'libraries/PHPMailer/src/SMTP.php';
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
        if($this->session->userdata('statusanggota') == 'administrator'){ 
        $data['user'] = $this->M_User->getall();   
        } else {
        $data['user'] = $this->M_User->getjumlahwilayah($this->session->userdata('korwil')); 
        }
        $data['header'] = 'Anggota';        
        $data['korwil'] = $this->M_Korwil->getkorwil();   
        $this->load->view('user/v_user',$data); 
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
        $this->load->view('user/v_user',$data); 
        $this->load->view('template/footer');
    }

    public function get_listuser(){
            $id = $this->input->post('cek');
            $kec = $this->M_User->get_listuser($id);
            $lists = "<br>";  

            if($kec->num_rows() == 1){
            foreach($kec->result() as $tunggal){
                $lists .= '<div class="box box-primary">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="text-primary p-4">
                                        </div>
                                    </div>
                                    <div class="col-4 align-self-center">
                                       <img src="'.base_url()."/images/".$tunggal->foto.'" alt="" class="rounded-circle" height="104">
                                    </div>
                                    <div class="col-4">
                                        <div class="text-primary p-4">
                                        </div>
                                    </div>
                            </div>
                            <div class="p-2">
                                <div class="form-group">
                                    <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                      <b>Nama</b> <a class="pull-right">'.$tunggal->nama.'</a>
                                    </li>
                                    <li class="list-group-item">
                                      <b>No Anggota</b> <a class="pull-right">'.$tunggal->noanggota.'</a>
                                    </li>
                                    <li class="list-group-item">
                                      <b>Cabang / Wilayah</b> <a class="pull-right">'.$tunggal->namakorwil.'</a>
                                    </li>
                                    </ul>
                                </div>
                            </div>';
                }
            } else {

                $lists = '<div class="tab-content py-4">
                                        <div class="tab-pane show active" id="chat">
                                            <ul>';
            foreach($kec->result() as $data){
                  $lists .= "<a href = ".site_url('Profil/'.$data->id_anggota)."><li><div class='media'>
                                <div class='align-self-center mr-3'>
                                    <img src='".base_url()."/images/".$data->foto."' class='rounded-circle avatar-xs' alt=''>
                                </div>
                                
                                <div class='media-body overflow-hidden'>
                                    <h5 class='text-truncate font-size-14 mb-1'>".$data->noanggota."</h5>
                                    <p class='text-truncate mb-0'>".$data->nama."</p>
                                </div>
                            </div></li></a><br>"; // Tambahkan tag option ke variabel $lists
                                // <div class='font-size-11'><a href=".site_url('C_Login/login/'.$data->username).">Login</a></div>
            }   
            $lists .='
                                                <div id="hasilcek"></div>
                                            </ul>
                                        </div>
                                    </div>';

            }                         
            
            
            $callback = array('list_user'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
            echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

    function getkorwilmutasi(){
            $id = $this->input->post('cekanggotamutaasi');
            $kec = $this->M_User->getkorwilmutasi($id);                           
            foreach($kec as $data){
              $listkorwil = "<input type='hidden' name='korwilawal' value='".$data->id_korwil."'>".$data->namakorwil;
            }
            
            $callback = array('korwilawalmutasi'=> $listkorwil);
            echo json_encode($callback);
    }

    function karyatulis()
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->getspek($iduser);
        $data['karyatulis'] = $this->M_User->getkaryatulis($iduser);      
        $this->load->view('user/v_karyatulis',$data); 
        $this->load->view('template/footer');
    }

    function viewkaryatulis()
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
            'id_menu' => '9'
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
            'id_menu' => '9'
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
            'id_menu' => '9'
        );
        $hasilhapus = $this->M_Setting->cekakses($tabel, $hapus);
        if(count($hasilhapus)!=0){ 
            $tombolhapus = 'aktif';
        } else {
            $tombolhapus = 'tidak';
        }
        $data['akseshapus'] = $tombolhapus;
        $data['aksesedit'] = $tomboledit;
        $data['aksesadd'] = $tomboladd;
            $data['karyatulis'] = $this->M_User->getvkaryatulis(); 
        $this->load->view('karyatulis/v_karyatulis',$data); 
        $this->load->view('template/footer');
    }

    function editkt($noanggota,$idkt)
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->getspek($noanggota);
        $data['kt'] = $this->M_User->geteditkt($idkt);  
        $data['karyatulis'] = $this->M_User->getkaryatulis($noanggota);      
        $this->load->view('user/v_editkt',$data); 
        $this->load->view('template/footer');
    }

    function editkaryatulis()
    {   
        $noanggota = $this->input->post('noanggota');
        $this->M_User->editkt();
        $this->session->set_flashdata('Sukses', "Karya tulis telah diperbaharui!!");
        redirect('user-karyatulis');
    }

     function registrasi()
    { 
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $this->load->view('registrasi/registrasi', $data);
    }

    function add()
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        if ($id != NULL){
        $this->load->view('template/sidebar.php', $data);
        }
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $this->load->view('user/v_adduser', $data); 
        $this->load->view('template/footer');
    }

    function daftarulang()
    {
        $data['korwil'] = $this->M_Korwil->getkorwil();
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $this->load->view('user/v_daftarulang', $data); 
        // $this->load->view('user/v_tes', $data); 
        $this->load->view('template/footer');
    }

    function daftarulangcek($a)
    {

        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['korwil'] = $this->M_Korwil->getkorwil();
        $data['user'] = $this->M_User->getspek($a);
        $data['karyatulis'] = $this->M_User->getkaryatulis($a);

        $this->load->view('user/v_tes', $data);
        // $this->load->view('user/v_daftarulangcek', $data); 
        // $this->load->view('template/show');
        $this->load->view('template/footer');
    }

     function cek_nik(){
        $tabel = 'tb_anggota';
        $cek = 'nik';
        $kode = $this->input->post('nik');
        $hasil_kode = $this->M_Setting->cek($cek,$kode,$tabel);
        if(count($hasil_kode)!=0){ 
            echo '1';
        }else{
            echo '2';
        }
         
    }

    function cek_email(){
        $tabel = 'tb_anggota';
        $cek = 'email';
        $kode = $this->input->post('email');
        $hasil_kode = $this->M_Setting->cek($cek,$kode,$tabel);
        if(count($hasil_kode)!=0){ 
            echo '1';
        }else{
            echo '2';
        }
         
    }

    function cek_anggota(){
        $tabel = 'tb_anggota';
        $cek = 'id_anggota';
        $kode = $this->input->post('noanggota');
        $hasil_kode = $this->M_Setting->cek($cek,$kode,$tabel);
        if(count($hasil_kode)!=0){ 
            echo '1';
        }else{
            echo '2';
        }
         
    }

    function cek_username(){
        $tabel = 'tb_anggota';
        $cek = 'username';
        $kode = $this->input->post('namapanggilan');
        $hasil_kode = $this->M_Setting->cek($cek,$kode,$tabel);
        if(count($hasil_kode)!=0){ 
            echo '1';
        }else{
            echo '2';
        }
         
    }
    
    public function tambah()
    {   
        // echo "tes"; 
        $upload = $this->M_User->upload();
        if ($upload['result'] == "success"){
            
            $this->M_User->tambahdata($upload);
            // $this->load->library('mailer');
            // $email_penerima = 'alief.febrina@gmail.com';
            // $subjek = $this->input->post('subjek');
            // $pesan = 'php mail sukses'; // $this->input->post('pesan');
            // // $attachment = $_FILES['attachment']; 
            // $content = 'data berhasil dikirim'; // $this->load->view('content', array('pesan'=>$pesan), true) Ambil isi file content.php dan masukan ke variabel $content
            // $sendmail = array(
            //   'email_penerima'=>$email_penerima,
            //   'subjek'=>$subjek,
            //   'content'=>$content,
            //   //'attachment'=>$attachment//
            // );
            // if(empty($attachment['name'])){ // Jika tanpa attachment
            //   $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
            // }else{ // Jika dengan attachment
            //   $send = $this->mailer->send_with_attachment($sendmail); // Panggil fungsi send_with_attachment yang ada di librari Mailer
            // }
            $nik = $this->input->post('nik');
            $this->qrcode($nik);
            $this->session->set_flashdata('Sukses', "Data Telah Disimpan!!");
            redirect('user');    
        } else {
            echo 'upload gagal';
        }
    }

     public function adddu()
    {   
        $karyatulis = $this->input->post('juduldu');
        $thnterbit=$this->input->post('thnterbitdu');
        $jenis=$this->input->post('jenisdu');
        $penerbit=$this->input->post('penerbitdu');
        // print_r($karyatulis);
       // echo $karyatulis;
            $index = 0;
            foreach ((array)$karyatulis as $key) {
                $data = array('id_anggota' => $a,
                    'karyatulis' => $key,
                    'tglpublish' => $thnterbit[$index],
                    'jenis' => $jenis[$index],
                    'penerbit' => $penerbit[$index]);

                $this->db->insert('tb_karyatulis', $data);
            }

        // echo "tes"; 
        $upload = $this->M_User->upload();
        if ($upload['result'] == "success"){
            $this->M_User->tambahregis($upload);
            
            // $thnterbit = $this->input->post('kar'); 
        // echo $thnterbit;
            $selectmax = $this->M_User->selectmax();
            foreach ($selectmax as $key) {
                $idanggota = $key->id_anggota;
                $this->M_User->save($idanggota);
            }
            $korwil = $this->input->post('korwil');

            $kode = $this->M_Korwil->cekkode($korwil);
            foreach ($kode as $modul) {
                $a = $modul->kodekorwil;            
                $pecah = explode('.', $a);
                $pecahkorwil = $pecah[0].'.'.$pecah[1];
                date_default_timezone_set('Asia/Jakarta');
                $tgl = date('dmY');
                $a = str_replace("tanggal", $tgl, $a);
                $data = $this->M_User->getkode($pecahkorwil);
                foreach ($data as $data) {
                    $kodemax = $this->M_User->getspek($data->id_anggota);
                    foreach ($kodemax as $kodemax) {
                        $pecahkodemax = explode('.', $kodemax->noanggota);
                        $ida = $pecahkodemax[2]+1;
                        if(strlen($id)<2){
                            $id = '0'.$ida;
                        } else {
                            $id = $ida;
                        }
                        $a = str_replace("no", $id, $a);
                    }
                }
            }
            $kode = $a;
            $this->M_User->noanggota($kode);
            
        //     $this->session->set_flashdata('Sukses', "Data Berhasil Silakan Login!!");
            redirect('daftarulang-cek/'.$idanggota); 
            // echo "bener";
        } else {
            echo $upload['error'];
            // echo 'upload gagal';
        }
    }

    function cek($ida)
    {
        
        $this->session->set_flashdata('Sukses', "Data Berhasil Dihapus.");
        $this->load->view('user/v_tes');
    }


     public function tambahkaryatulis()
    {   
        $noanggota = $this->input->post('noanggota');
        $this->M_User->tambahkaryatulis();
        $this->session->set_flashdata('Sukses', "Record Added Successfully!!");
        redirect('user-karyatulis');  
    }

    function savedu(){
        $this->M_User->savedu();
        $nama = $this->input->post('nama');
        $username =  $this->input->post('namapanggilan');
        $password = $this->input->post('namapanggilan').date('Y', strtotime($this->input->post('tgllahir')));
        $email_penerima = $this->input->post('email');
        $mail             = new PHPMailer();
        $body             = "Terima kasih Bapak/Ibu ".$nama." telah mengisi database SPK, berikut kami sertakan username dan password Bapak/Ibu untuk login di database SPK yang tercantum dibawah ini :<br>

1. Username : ".$username.".<br>
2. Password : ".$password.".<br><br>

Link Url login www.anggota.sahabatpenakita.id<br><br>

Setelah login, bapak ibu bisa melakukan edit data atau update data terkini<br><br>

Salam<br>
Ketua SPK ( Sahabat Pena Kita)

";//isi dari email
        $mail->IsSMTP(); // mengirimkan sinyal ke class PHPMail untuk menggunakan SMTP
        $mail->SMTPDebug  = 0;                     // mengaktifkan debug mode (untuk ujicoba)
                                                   // 1 = Error dan pesan
                                                   // 2 = Pesan saja
        $mail->SMTPAuth   = true;                  // aktifkan autentikasi SMTP
        $mail->SMTPSecure = "ssl";                 // jenis kemananan
        $mail->Host       = "smtp.gmail.com";      // masukkan GMAIL sebagai smtp server
        $mail->Port       = "465";                   // masukkan port yang digunakan oleh SMTP Gmail
        $mail->Username   = "info.sahabatpenakita@gmail.com";  // GMAIL username info.sahabatpenakita@gmail.com - xxslesqdaashbskh
        $mail->Password   = "xxslesqdaashbskh";            // GMAIL password info@sahabatpenakita.id - Pastisukses2020 - sahabatpenakita.id
        $mail->SetFrom('info.sahabatpenakita@gmail.com', 'Sahabat Pena Kita'); // masukkan alamat pengririm dan nama pengirim jika alamat email tidak sama, maka yang digunakan alamat email untuk username
        $mail->Subject    = "Terima Kasih Telah Bergabung !";//masukkan subject
        $mail->MsgHTML($body);//masukkan isi dari email
        
        $address = "alief.febrina@gmail.com"; //masukkan penerima
        $mail->AddAddress($email_penerima, $nama); //masukkan penerima
        
        $mail->AddCC('info.sahabatpenakita@gmail.com', 'Sahabat Pena Kita');
        
        $mail->Send();
           echo $mail->ErrorInfo;
        $nik = $this->input->post('nik');
        $id = $this->input->post('id');
        $this->qrcode($nik, $id);


        $wherecalon = array('statusanggota' => 'calonanggota');
        $this->M_Setting->delete($wherecalon,'tb_anggota');

        $this->session->set_flashdata('Sukses', "Username dan Password telah dikirim ke Email anda!!");
        redirect('login'); 
    }


    function view($ida)
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->getspek($ida);
        $data['karyatulis'] = $this->M_User->getkaryatulis($ida);
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['korwil'] = $this->M_Korwil->getkorwil();
        $this->load->view('user/v_vuser',$data); 
        $this->load->view('template/footer');
    }

    function edit($iduser)
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['korwil'] = $this->M_Korwil->getkorwil();
        $data['user'] = $this->M_User->getspek($iduser);
        $data['karyatulis'] = $this->M_User->getkaryatulis($iduser);
        $this->load->view('user/v_euser',$data); 
        $this->load->view('template/footer');
    }

    function edituser()
    {   
        $korwilawal = $this->input->post('korwilawal');
        $korwilskrg = $this->input->post('korwil');
        
        $this->M_User->edit();
        $status = $this->input->post('aktivasi');
        if ($status == 'tidak') {
            $this->M_User->nonaktif();
        } else if($status == 'resign') {
            $this->M_User->mengundurkandiri();
        } else {
            $this->M_User->aktif();   
        }
        $this->session->set_flashdata('Sukses', "Data Berhasil Dirubah!!");
        redirect('user');
    }

    function hapus($id){
        $where = array('id_anggota' => $id);
        $this->M_Setting->delete($where,'tb_anggota');
        $this->session->set_flashdata('Sukses', "Data Berhasil Di Hapus!!");
        redirect('user');
    }

    function konfirm($iduser)
    {   
        $id = $this->session->userdata('statusanggota');
        $this->M_User->konfirm($iduser,$id);
        $this->session->set_flashdata('Sukses', "Data Berhasil Di Anggota!!");
            redirect('user');
    }

    function konfirmkorwil()
    {   
        $korwil = $this->input->post('korwil');

        $kode = $this->M_Korwil->cekkode($korwil);
        
            // foreach ($kode as $modul) {
            //     $a = $modul->kodekorwil;            
            //     $pecah = explode('.', $a);
            //     $pecahkorwil = $pecah[0].'.'.$pecah[1];
            //     date_default_timezone_set('Asia/Jakarta');
            //     $tgl = date('dmY');
            //     $a = str_replace("tanggal", $tgl, $a);
            //     $data = $this->M_User->getkode($pecahkorwil);
            //     foreach ($data as $data) {
            //         $kodemax = $this->M_User->getspek($data->id_anggota);
            //         foreach ($kodemax as $kodemax) {
            //             $pecahkodemax = explode('.', $kodemax->noanggota);
            //             $ida = $pecahkodemax[2]+1;
            //             if(strlen($id)<2){
            //                 $id = '0'.$ida;
            //             } else {
            //                 $id = $ida;
            //             }
            //             $a = str_replace("no", $id, $a);
            //         }
            //     }
            // }

        foreach ($kode as $kode) {
            $a = $kode->kodekorwil;
            $kodekorwil = $kode->kodeshow;
            date_default_timezone_set('Asia/Jakarta');
            $tgl = date('dmY'); 
            $a = str_replace("tanggal", $tgl, $a);
            $jumlah = $this->M_User->jumlahkode($kodekorwil);
            $kodenow = $jumlah+1;
            if(strlen($kodenow)<2){
                $id = '0'.$kodenow;
            } else {
                $id = $kodenow;
            }
            $a = str_replace("no", $id, $a);
        }

            // echo $a;
            $namako = $modul->kodekorwil;

        // echo $a.'/'.$kodemax.'/'.$pecahkodemax[2].'/'.$id;
        $kodeko = $a;
        // echo $kode;
        $id = $this->session->userdata('statusanggota');
        $this->M_User->konfirm($id, $kodeko);

        $idanggota = $this->input->post('idanggota');
        $spek = $this->M_User->getspek($idanggota);
        foreach ($spek as $spek) {
            $nama = $spek->nama;
            $username = $spek->username;
            $password = $spek->password;
            $email_penerima = $spek->email;
        }
         date_default_timezone_set('Asia/Jakarta'); // setting time zone;

        $mail             = new PHPMailer();
        $body             = "Selamat, Bapak/Ibu ".$nama." dinyatakan diterima menjadi anggota SPK Cabang ".$namako." dengan No ID ".$kode." <br>
Silahkan melengkapi biodata di database SPK dengan mengklik mengakses url dan akses login anda :<br>
1. Username : ".$username."<br>
2. Passoword : ".$password."<br>
Link URL Login www.sahabatpenakita.id <br>
Admin akan segera menghubungi Anda untuk dimasukkan di Grup Sahabat Pena Kita Cabang ".$namako."<br>

Salam <br>
Ketua SPK ( Sahabat Pena Kita ) <br>
Dr. M. Arfan Mu’ammar, M.Pd.I<br>

";//isi dari email
        $mail->IsSMTP(); // mengirimkan sinyal ke class PHPMail untuk menggunakan SMTP
        $mail->SMTPDebug  = 0;                     // mengaktifkan debug mode (untuk ujicoba)
                                                   // 1 = Error dan pesan
                                                   // 2 = Pesan saja
        $mail->SMTPAuth   = true;                  // aktifkan autentikasi SMTP
        $mail->SMTPSecure = "ssl";                 // jenis kemananan
        $mail->Host       = "smtp.gmail.com";      // masukkan GMAIL sebagai smtp server
        $mail->Port       = "465";                   // masukkan port yang digunakan oleh SMTP Gmail
        $mail->Username   = "info.sahabatpenakita@gmail.com";  // GMAIL username info.sahabatpenakita@gmail.com - xxslesqdaashbskh
        $mail->Password   = "xxslesqdaashbskh";            // GMAIL password info@sahabatpenakita.id - Pastisukses2020 - sahabatpenakita.id
        $mail->SetFrom('info.sahabatpenakita@gmail.com', 'Sahabat Pena Kita'); // masukkan alamat pengririm dan nama pengirim jika alamat email tidak sama, maka yang digunakan alamat email untuk username
        $mail->Subject    = "Terima Kasih Telah Bergabung !";//masukkan subject
        $mail->MsgHTML($body);//masukkan isi dari email
        
        $address = "alief.febrina@gmail.com"; //masukkan penerima
        $mail->AddAddress($email_penerima, $nama); //masukkan penerima
        
        $mail->AddCC('info.sahabatpenakita@gmail.com', 'Sahabat Pena Kita');
        
        $mail->Send();
           echo $mail->ErrorInfo;

        $this->session->set_flashdata('Sukses', "Data Berhasil Di Konfirmasi dan Email Berhasil Dikirim!!");
            redirect('user');
    }

     function konfirmasi($ida)
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['idanggota'] = $ida;
        $data['korwil'] = $this->M_Korwil->getkorwil(); 
        $this->load->view('user/v_pilihkorwil',$data); 
        $this->load->view('template/footer');
    }

    function laporan()
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $korwil = $this->session->userdata('korwil');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        if($id == "administrator"){
            $data['user'] = $this->M_User->getall();   
        } else { 
            $data['user'] = $this->M_User->getjumlahwilayah($korwil);    
        }
        $this->load->view('user/v_laporanuser',$data); 
        $this->load->view('template/footer');
    }


    function setting()
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $korwil = $this->session->userdata('korwil');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        if($id == "administrator"){
            $data['user'] = $this->M_User->getall();   
        } else { 
            $data['user'] = $this->M_User->getjumlahwilayah($korwil);    
        } 
        $this->load->view('setting/v_setting',$data); 
        $this->load->view('template/footer');
    }

    function user_kt()
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->getaktif();        
        $this->load->view('user/v_userkaryatulis',$data); 
        $this->load->view('template/footer');
    }


    function nonaktif($id)
    {
        $this->M_User->nonaktif($id);

        $spek = $this->M_User->getspek($id);
        foreach ($spek as $spek) {
            $nama = $spek->nama;
            $username = $spek->username;
            $password = $spek->password;
            $email_penerima = $spek->email;
        }
        date_default_timezone_set('Asia/Jakarta'); // setting time zone;

        $mail             = new PHPMailer();
        $body             = "Berdasarkan rapat pengurus SPK dan berbagai pertimbangan, kami belum dapat menerima Bapak/Ibu ".$nama." sebagai anggota SPK.<br>
Semoga di lain waktu dan kesempatan, kita bisa saling bersinergi dan belajar literasi bersama.<br>

Salam<br>
Ketua SPK (Sahabat Pena Kita)<br>
Dr. M. Arfan Mu’ammar, M.Pd.I<br>
";//isi dari email
         $mail->IsSMTP(); // mengirimkan sinyal ke class PHPMail untuk menggunakan SMTP
        $mail->SMTPDebug  = 0;                     // mengaktifkan debug mode (untuk ujicoba)
                                                   // 1 = Error dan pesan
                                                   // 2 = Pesan saja
        $mail->SMTPAuth   = true;                  // aktifkan autentikasi SMTP
        $mail->SMTPSecure = "ssl";                 // jenis kemananan
        $mail->Host       = "smtp.gmail.com";      // masukkan GMAIL sebagai smtp server
        $mail->Port       = "465";                   // masukkan port yang digunakan oleh SMTP Gmail
        $mail->Username   = "info.sahabatpenakita@gmail.com";  // GMAIL username info.sahabatpenakita@gmail.com - xxslesqdaashbskh
        $mail->Password   = "xxslesqdaashbskh";            // GMAIL password info@sahabatpenakita.id - Pastisukses2020 - sahabatpenakita.id
        $mail->SetFrom('info.sahabatpenakita@gmail.com', 'Sahabat Pena Kita'); // masukkan alamat pengririm dan nama pengirim jika alamat email tidak sama, maka yang digunakan alamat email untuk username
        $mail->Subject    = "Terima Kasih Telah Bergabung !";//masukkan subject
        $mail->MsgHTML($body);//masukkan isi dari email
        
        $address = "alief.febrina@gmail.com"; //masukkan penerima
        $mail->AddAddress($email_penerima, $nama); //masukkan penerima
        
        $mail->AddCC('info.sahabatpenakita@gmail.com', 'Sahabat Pena Kita');
        
        $mail->Send();
           echo $mail->ErrorInfo;

        $this->session->set_flashdata('Sukses', "Data Berhasil Di Non Aktifkan!!");
        redirect('user-setting');
    }

     function aktif($id)
    {
        $this->M_User->aktifsetting($id);

        $spek = $this->M_User->getspek($id);
        foreach ($spek as $spek) {
            $nama = $spek->nama;
            $username = $spek->username;
            $password = $spek->password;
            $email_penerima = $spek->email;
        }
        date_default_timezone_set('Asia/Jakarta'); // setting time zone;

        $mail             = new PHPMailer();
        $body             = "Selamat, Bapak/Ibu ".$nama." dinyatakan diterima menjadi anggota SPK Cabang ".$namako." dengan No ID ".$kode." <br>
Silahkan melengkapi biodata di database SPK dengan mengklik mengakses url dan akses login anda :<br>
1. Username : ".$username."<br>
2. Passoword : ".$password."<br>
Link URL Login www.sahabatpenakita.id <br>
Admin akan segera menghubungi Anda untuk dimasukkan di Grup Sahabat Pena Kita Cabang ".$namako."<br>

Salam <br>
Ketua SPK ( Sahabat Pena Kita ) <br>
Dr. M. Arfan Mu’ammar, M.Pd.I<br>

";//isi dari email
        $mail->IsSMTP(); // mengirimkan sinyal ke class PHPMail untuk menggunakan SMTP
        $mail->SMTPDebug  = 0;                     // mengaktifkan debug mode (untuk ujicoba)
                                                   // 1 = Error dan pesan
                                                   // 2 = Pesan saja
        $mail->SMTPAuth   = true;                  // aktifkan autentikasi SMTP
        $mail->SMTPSecure = "ssl";                 // jenis kemananan
        $mail->Host       = "smtp.gmail.com";      // masukkan GMAIL sebagai smtp server
        $mail->Port       = "465";                   // masukkan port yang digunakan oleh SMTP Gmail
        $mail->Username   = "info.sahabatpenakita@gmail.com";  // GMAIL username info.sahabatpenakita@gmail.com - xxslesqdaashbskh
        $mail->Password   = "xxslesqdaashbskh";            // GMAIL password info@sahabatpenakita.id - Pastisukses2020 - sahabatpenakita.id
        $mail->SetFrom('info.sahabatpenakita@gmail.com', 'Sahabat Pena Kita'); // masukkan alamat pengririm dan nama pengirim jika alamat email tidak sama, maka yang digunakan alamat email untuk username
        $mail->Subject    = "Terima Kasih Telah Bergabung !";//masukkan subject
        $mail->MsgHTML($body);//masukkan isi dari email
        
        $address = "alief.febrina@gmail.com"; //masukkan penerima
        $mail->AddAddress($email_penerima, $nama); //masukkan penerima
        
        $mail->AddCC('info.sahabatpenakita@gmail.com', 'Sahabat Pena Kita');
        
        $mail->Send();
           echo $mail->ErrorInfo;

        $this->session->set_flashdata('Sukses', "Data Berhasil Di Aktifkan!!");
        redirect('user-setting');
    }


    function resign($ida)
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['userspek'] = $this->M_User->getspek($ida); 
        $data['user'] = $this->M_User->getall();        
        $this->load->view('setting/v_settingresign',$data); 
        $this->load->view('template/footer');
    }

    public function excel()
    {   
        $id = $this->session->userdata('statusanggota');

        $korwil = $this->session->userdata('korwil');
        if($id == "administrator"){
        $user = $this->M_User->getall();   
        } else { 
        $user = $this->M_User->getjumlahwilayah($korwil);    
        }
        $data = array('title' => 'Laporan Anggota',
                'excel' => $user);
        $this->load->view('user/v_exceluser', $data);
    }

    function mengundurkandiri()
    {   
        $this->M_User->mengundurkandiri();
        $this->session->set_flashdata('Sukses', "Data Berhasil Di Non Aktifkan!!");
        redirect('user-setting');
    }

    function hapuskt($noanggota,$idkt){
        $where = array('id_karyatulis' => $idkt);
        $this->M_Setting->delete($where,'tb_karyatulis');
        $this->session->set_flashdata('Sukses', "Data Berhasil Dihapus.");
        redirect('user-karyatulis');  
    }


    function send($ida){
        $spek = $this->M_User->getspek($ida);
        foreach ($spek as $spek) {
            $nama = $spek->nama;
            $username = $spek->username;
            $password = $spek->password;
            $email_penerima = $spek->email;
        }
         date_default_timezone_set('Asia/Jakarta'); // setting time zone;
        
        $mail             = new PHPMailer();
        $body             = "Terima kasih Bapak/Ibu <b>".$nama."</b> telah mengisi database SPK, berikut kami sertakan username dan password Bapak/Ibu untuk login di database SPK yang tercantum di bawah ini:<br>

1. Username: ".$username."<br>
2. Password: ".$password."<br><br>

Link Url login www.anggota.sahabatpenakita.id<br><br>

Setelah login, bapak ibu bisa melakukan edit data atau update data terkini<br><br>

Salam<br>
Ketua SPK (Sahabat Pena Kita)<br>
Dr. M. Arfan Mu’ammar, M.Pd.I
"; //isi dari email
        $mail->IsSMTP(); // mengirimkan sinyal ke class PHPMail untuk menggunakan SMTP
        $mail->SMTPDebug  = 0;                     // mengaktifkan debug mode (untuk ujicoba)
                                                   // 1 = Error dan pesan
                                                   // 2 = Pesan saja
        $mail->SMTPAuth   = true;                  // aktifkan autentikasi SMTP
        $mail->SMTPSecure = "ssl";                 // jenis kemananan
        $mail->Host       = "smtp.gmail.com";      // masukkan GMAIL sebagai smtp server
        $mail->Port       = "465";                   // masukkan port yang digunakan oleh SMTP Gmail
        $mail->Username   = "info.sahabatpenakita@gmail.com";  // GMAIL username info.sahabatpenakita@gmail.com - xxslesqdaashbskh
        $mail->Password   = "xxslesqdaashbskh";            // GMAIL password info@sahabatpenakita.id - Pastisukses2020 - sahabatpenakita.id
        $mail->SetFrom('info.sahabatpenakita@gmail.com', 'Sahabat Pena Kita'); // masukkan alamat pengririm dan nama pengirim jika alamat email tidak sama, maka yang digunakan alamat email untuk username
        $mail->Subject    = "Terima Kasih Telah Bergabung !";//masukkan subject
        $mail->MsgHTML($body);//masukkan isi dari email
        
        $address = "alief.febrina@gmail.com"; //masukkan penerima
        $mail->AddAddress($email_penerima, $nama); //masukkan penerima
        
        $mail->AddCC('info.sahabatpenakita@gmail.com', 'Sahabat Pena Kita');
        
        $mail->Send();
           echo $mail->ErrorInfo;
        $this->session->set_flashdata('Sukses', "Data Berhasil Di Kirim!!");
        redirect('user');
       
    }

    function qrcode($nik, $ids){
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 
        $image_name=$nik.'.png'; //buat name dari qr code sesuai dengan nim
 
        $params['data'] = 'https://anggota.sahabatpenakita.id/Profil/'.$ids; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

        $this->M_User->simpan_barcode($nik, $image_name); //simpan ke database
        // redirect('user'); //redirect ke product usai simpan data
    }

    function qrcode1($nik, $ids){
        $this->qrcode($nik,$ids);
        $this->session->set_flashdata('Sukses', "Data Telah Disimpan!!");
        redirect('user');    
    }
}