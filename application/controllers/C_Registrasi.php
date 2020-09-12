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

    function tambahregis()
    {   
        // echo "tes"; 
        // $upload = $this->M_User->upload();
        // if ($upload['result'] == "success"){
        //     $this->M_User->tambahdata($upload);
        //     $this->load->library('mailer');
        //     $email_penerima = 'alief.febrina@gmail.com';
        //     $subjek = 'asa';
        //     $pesan = 'php mail sukses'; // $this->input->post('pesan');
        //     // $attachment = $_FILES['attachment']; 
        //     $content = 'data berhasil dikirim'; // $this->load->view('content', array('pesan'=>$pesan), true) Ambil isi file content.php dan masukan ke variabel $content
        //     $sendmail = array(
        //       'email_penerima'=>$email_penerima,
        //       'subjek'=>$subjek,
        //       'content'=>$content,
        //       //'attachment'=>$attachment//
        //     );
        //     if(empty($attachment['name'])){ // Jika tanpa attachment
        //       $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
        //     }else{ // Jika dengan attachment
        //       $send = $this->mailer->send_with_attachment($sendmail); // Panggil fungsi send_with_attachment yang ada di librari Mailer
        //     }
        //     // $callback = $this->input->post('nik');
        //     // $callback = array('ok'=>'ok'); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        //     //echo json_encode($callback); // konversi varibael $callback menjadi JSON
        // } else {

            // $nik = $this->input->post('nik');
           

              // $this->M_User->tambahtanpafoto();
          // $nama = $this->input->post('nama');
           // $alamat = $this->input->post('alamat');
           // $kota = $this->input->post('kota');
           // $prov = $this->input->post('prov');
           // $kecamatan = $this->input->post('kecamatan');
           // $email = $this->input->post('email');
           // $tlp = $this->input->post('tlp');
          // $tempatlahir = $this->input->post('tempatlahir');
           // $tgllahir = $this->input->post('tgllahir');
           // $facebook = $this->input->post('facebook');
           // $instagram = $this->input->post('instagram');
           // $twitter = $this->input->post('twitter');
           // $youtube = $this->input->post('youtube');
           // $latarbelakang = $this->input->post('latarbelakang');
           // $institusi = $this->input->post('institusi');
            // $asd = $this->M_User->tambahtanpafoto($nik, $nama,$alamat,$kota,$prov,$kecamatan,$email,$tlp, $tempatlahir, $tgllahir, $facebook, $instagram, $twitter, $youtube, $latarbelakang, $institusi);
            //$asd = $this->M_User->tambahtanpafoto($nik, $nama, $tempatlahir);
        //     // redirect('C_Login');    
        // }
        // // } else {
        // //     'upload gagal';
        // // }
            $this->M_User->tambahtanpafoto();
            // $regis = array('ok'=>'ok'); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
            // echo json_encode($regis); // konversi varibael $callback menjadi JSON
    }


}