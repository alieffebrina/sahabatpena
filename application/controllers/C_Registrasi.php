 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Registrasi extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));    
        $this->load->model('M_Setting');
        $this->load->model('M_User');
    }

    function getkabupaten(){
            $id = $this->input->post('id_provinsi');
            
            $kota = $this->M_Setting->getkota($id);
            $list = "<option></option>";
            
            foreach($kota as $data){
              $list .= "<option value='".$data->id_kota."'>".$data->name_kota."</option>"; // Tambahkan tag option ke variabel $lists
            }
            
            $a = array('list_kab'=>$list); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
            echo json_encode($a); // konversi varibael $callback menjadi JSON
    }


    function getkec(){
            // Ambil data ID Provinsi yang dikirim via ajax post
            $id = $this->input->post('kabupaten');
            
            $kota = $this->M_Setting->getkec($id);
            
            // Buat variabel untuk menampung tag-tag option nya
            // Set defaultnya dengan tag option Pilih
            $lists = "<option value=''></option>";
            
            foreach($kota as $data){
              $lists .= "<option value='".$data->id_kecamatan."'>".$data->kecamatan."</option>"; // Tambahkan tag option ke variabel $lists
            }
            
            $callback = array('list_kec'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
            echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

    public function tambah()
    {   
        $upload = $this->M_User->upload();
        if ($upload['result'] == "success"){
            $uploadfile = $this->M_User->uploadfile();
            $this->M_User->tambahregis($upload, $uploadfile);
            $selectmax = $this->M_User->selectmax();
            foreach ($selectmax as $key) {
                $a = $key->id_anggota;
                echo $a;
               $this->M_User->karyatulisregistrasi($uploadfile, $a);
            }

            // $this->load->library('mailer');
            // $email_penerima = $this->input->post('email');
            // $subjek = 'Terima kasih telah mendaftar';
            // $pesan = 'pendaftaran sukses mohon tunggu konfirmasi via email'; // $this->input->post('pesan');
            // // $attachment = $_FILES['attachment']; 
            // $content = $pesan; // $this->load->view('content', array('pesan'=>$pesan), true) Ambil isi file content.php dan masukan ke variabel $content
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

            // // $this->load->library('mailer');
            // $emailadmin = 'rizkyfebry09@gmail.com';
            // $subjekadmin = 'Pendaftar Baru';
            // $pesanadmin = 'pendaftaran baru atas nama : '.$this->input->post('nama').'silahkan kunjungi link dibawah ini'; // $this->input->post('pesan');
            // // $attachment = $_FILES['attachment']; 
            // $contentadmin = $pesanadmin; // $this->load->view('content', array('pesan'=>$pesan), true) Ambil isi file content.php dan masukan ke variabel $content
            // $sendmailadmin = array(
            //   'email_penerima'=>$emailadmin,
            //   'subjek'=>$subjekadmin,
            //   'content'=>$contentadmin,
            //   //'attachment'=>$attachment//
            // );
            // if(empty($attachment['name'])){ // Jika tanpa attachment
            //   $send = $this->mailer->send($sendmailadmin); // Panggil fungsi send yang ada di librari Mailer
            // }else{ // Jika dengan attachment
            //   $send = $this->mailer->send_with_attachment($sendmailadmin); // Panggil fungsi send_with_attachment yang ada di librari Mailer
            // }
            
            header("location: https://www.sahabatpenakita.id");
            // redirect('login');
        } else {
            'upload gagal';
        }
    }



}