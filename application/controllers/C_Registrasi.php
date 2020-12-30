 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class C_Registrasi extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));    
        $this->load->model('M_Setting');
        $this->load->model('M_User');

        require APPPATH.'libraries/PHPMailer/src/Exception.php';
        require APPPATH.'libraries/PHPMailer/src/PHPMailer.php';
        require APPPATH.'libraries/PHPMailer/src/SMTP.php';
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

    public function tambah1()
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

            $email_penerima = $this->input->post('email');
            $nama = $this->input->post('nama');
            
              date_default_timezone_set('Asia/Jakarta'); // setting time zone;

        $mail             = new PHPMailer();
        $body             = "Terima kasih Bapak/Ibu ".$nama.". telah mendaftar sebagai calon anggota Sahabat Pena Kita (SPK). Seleksi penerimaan anggota baru akan dilakukan di setiap bulan Januari dan Juli oleh pengurus SPK. Pengumuman penerimaan seleksi akan dikirim melalui notifikasi email masing-masing calon anggota SPK. Tetap berkarya.

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
            
            header("location: https://www.sahabatpenakita.id");
        } else {
            'upload gagal';
        }
    }
    
    public function alert(){
        
        $this->load->view('registrasi/registrasiok.php');
    }

     public function tambah()
    {   
        $upload = $this->M_User->upload();
        if ($upload['result'] == "success"){
            $uploadfile = $this->M_User->uploadfile();
            echo $uploadfile['error'];
            $this->M_User->tambahregis($upload, $uploadfile);
            $selectmax = $this->M_User->selectmax();
            foreach ($selectmax as $key) {
                $a = $key->id_anggota;
                // echo $a;
               $this->M_User->karyatulisregistrasi($uploadfile, $a);
            }
           
            $email_penerima = $this->input->post('email');
            $nama = $this->input->post('nama');
            
              date_default_timezone_set('Asia/Jakarta'); // setting time zone;

        $mail             = new PHPMailer();
        $body             = "Terima kasih Bapak/Ibu ".$nama.". telah mendaftar sebagai calon anggota Sahabat Pena Kita (SPK). Seleksi penerimaan anggota baru akan dilakukan di setiap bulan Januari dan Juli oleh pengurus SPK. Pengumuman penerimaan seleksi akan dikirim melalui notifikasi email masing-masing calon anggota SPK. Tetap berkarya.<br><br>

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
           // echo $mail->ErrorInfo;
            // $this->session->set_flashdata('Sukses', "Terima Kasih Telah Mendaftar!!");
            

         $mailcpanel            = new PHPMailer();
        
        $mailcpanel->IsSMTP(); // mengirimkan sinyal ke class PHPMail untuk menggunakan SMTP
        $mailcpanel->SMTPDebug  = 0;                     // mengaktifkan debug mode (untuk ujicoba)
                                                   // 1 = Error dan pesan
                                                   // 2 = Pesan saja
        $mailcpanel->SMTPAuth   = true;                  // aktifkan autentikasi SMTP
        $mailcpanel->SMTPSecure = "ssl";                 // jenis kemananan
        $mailcpanel->Host       = "sahabatpenakita.id";      // masukkan GMAIL sebagai smtp server
        $mailcpanel->Port       = "465";                   // masukkan port yang digunakan oleh SMTP Gmail
        $mailcpanel->Username   = "info@sahabatpenakita.id";  // GMAIL username info.sahabatpenakita@gmail.com - xxslesqdaashbskh - smtp.gmail.com -465
        $mailcpanel->Password   = "Pastisukses2020";            // GMAIL password info@sahabatpenakita.id - Pastisukses2020 - sahabatpenakita.id
        $mailcpanel->SetFrom('info@sahabatpenakita.id', 'Sahabat Pena Kita'); // masukkan alamat pengririm dan nama pengirim jika alamat email tidak sama, maka yang digunakan alamat email untuk username
        $mailcpanel->Subject    = "Terima Kasih Telah Bergabung !";//masukkan subject
        $mailcpanel->MsgHTML($body);//masukkan isi dari email
        
        $address = "alief.febrina@gmail.com"; //masukkan penerima
        $mailcpanel->AddAddress($email_penerima, $nama); //masukkan penerima
        
        // $mailcpanel->AddCC('info.sahabatpenakita@gmail.com', 'Sahabat Pena Kita');
        
        $mailcpanel->Send();
           echo $mailcpanel->ErrorInfo;
        // $this->session->set_flashdata('Sukses', "Data Berhasil Di Kirim!!");
        // redirect('user');

         $this->load->view('registrasi/registrasiok.php');
            header("location: https://www.sahabatpenakita.id");
            // redirect('login'); 
        } else {
            echo $upload['error'];
            // $this->session->set_flashdata('Sukses', "Gagal Silahkan Coba Lagi!!");
            // redirect('login'); 
        }
    }


}