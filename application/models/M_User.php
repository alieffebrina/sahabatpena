<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_User extends CI_Model {

	function getuser(){
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_anggota.id_provinsi');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_anggota.id_kota');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_anggota.id_kecamatan');
        // $anggota = array('downline', 'upline', 'administrator', 'admin');
        // $this->db->where_not_in('tb_anggota.statusanggota', $anggota);
        $query = $this->db->get('tb_anggota');
    	return $query->result();
    }

    function get_listuser($id){
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_anggota.id_provinsi');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_anggota.id_kota');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_anggota.id_kecamatan');
        // $anggota = array('downline', 'upline', 'administrator', 'admin');
        $this->db->where("statusanggota != 'menunggu konfirmasi'");
        $this->db->group_start();
        $this->db->like('nama', $id);
        $this->db->or_like('noanggota', $id);
        $this->db->group_end();
        $query = $this->db->get('tb_anggota');
        return $query->result();
    }

    function getall(){
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_anggota.id_provinsi');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_anggota.id_kota');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_anggota.id_kecamatan');
        // $anggota = array('menunggu konfirmasi admin', 'menunggu konfirmasi upline');
        // $this->db->where_not_in('tb_anggota.statusanggota', $anggota);
        $query = $this->db->get('tb_anggota');
        return $query->result();
    }

    function getnama($ida){
        $where = array(
            'id_anggota' => $ida
        );
        return $this->db->get_where('tb_anggota',$where)->result();
    }

    function cek_user($kode){
        $this->db->select('*');
        $where = array(
            'username' => $kode
        );
        $query = $this->db->get_where('tb_anggota', $where);
        return $query->result();
    }

     public function upload(){
        $file_name = $this->input->post('foto');
        $path= FCPATH.'images';
        //echo $path;
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['remove_space'] = TRUE;
        $config['width']= '3000';
        $config['height']= '4000';
        $this->load->library('upload', $config); // Load konfigurasi uploadnya
        $this->upload->initialize($config);
        if($this->upload->do_upload('foto')){ // Lakukan upload dan Cek jika proses upload berhasil
           $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else{
            $return = array('result' => 'failed', 'error' => $this->upload->display_errors());
            return $return; 
        }
    
    }

    function tambahdata($upload){
        $user = array(
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'id_kota' => $this->input->post('kota'),
            'id_provinsi' => $this->input->post('prov'),
            'id_kecamatan' => $this->input->post('kecamatan'),
            'email' => $this->input->post('email'),
            'tlp' => $this->input->post('tlp'),
            'tempatlahir' => $this->input->post('tempatlahir'),
            'tgllahir' => $this->input->post('tgllahir'),
            'facebook' => $this->input->post('facebook'),
            'instagram' => $this->input->post('instagram'),
            'twitter' => $this->input->post('twitter'),
            'youtube' => $this->input->post('youtube'),
            'foto' => $upload['file']['file_name'],
            'tglupdate' => date('Y-m-d h:i:s'),
            'tglregistrasi' => $this->input->post('tglregistrasi'),
            'latarbelakang' => $this->input->post('latarbelakang'),
            'institusi' => $this->input->post('institusi')
        );
        
        $this->db->insert('tb_anggota', $user);
    }

    function tambahkaryatulis(){
        $user = array(
            'id_anggota' => $this->input->post('noanggota'),
            'karyatulis' => $this->input->post('karyatulis'),
        );
        
        $this->db->insert('tb_karyatulis', $user);
    }

    function editkt(){
        $user = array(
            'karyatulis' => $this->input->post('karyatulis'),
        );
        $where = array(
            'id_anggota' =>  $this->input->post('noanggota'),
        );
        
        $this->db->where($where);
        $this->db->update('tb_karyatulis',$user);
    }


    function getspek($iduser){
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_anggota.id_provinsi');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_anggota.id_kota');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_anggota.id_kecamatan');
        $where = array(
            'tb_anggota.id_anggota' => $iduser
        );
        $query = $this->db->get_where('tb_anggota', $where);
    	return $query->result();
    }

    function getkaryatulis($iduser){
        $where = array(
            'id_anggota' => $iduser
        );
        $query = $this->db->get_where('tb_karyatulis', $where);
        return $query->result();
    }

    function geteditkt($iduser){

        $this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_karyatulis.id_anggota');
        $where = array(
            'id_karyatulis' => $iduser
        );
        $query = $this->db->get_where('tb_karyatulis', $where);
        return $query->result();
    }

    function edit(){
        $user = array(
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'id_kota' => $this->input->post('kota'),
            'id_provinsi' => $this->input->post('prov'),
            'id_kecamatan' => $this->input->post('kecamatan'),
            'email' => $this->input->post('email'),
            'tlp' => $this->input->post('tlp'),
            'bank' => $this->input->post('bank'),
            'norek' => $this->input->post('norek'),
            'pemilik' => $this->input->post('pemilik'),
            'jumlahhu' => $this->input->post('jumlahhu'),
            'namasponsor' => $this->input->post('namasponsor'),
            'id_upline' => $this->input->post('upline'),
            'id_user' => $this->session->userdata('id_user'),
            'tglupdate' => date('Y-m-d h:i:s'),
        );

        $where = array(
            'id_anggota' =>  $this->input->post('id'),
        );
        
        $this->db->where($where);
        $this->db->update('tb_anggota',$user);
    }

    // function konfirm($iduser,$bayar,$anggota,$id,$username){
    //     $huruf = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';//buat karakter yang akan digunakan sebagai password
    //     $st = '';
    //     for($i=0; $i<8; $i++){
    //         $p = rand(0, strlen($huruf)-1);
    //         $st .=$huruf{$p};
    //     }

    //     $password = $st;

    //     if($id == 'administrator' || $id =='admin'){
    //         $statusanggota = 'downline';
    //         $username = $username;
    //         $password = $password;
    //     } else {
    //         $statusanggota = 'menunggu konfirmasi admin';
    //         $username = '';
    //         $password = '';
    //     }
    //     $user = array(
    //         'statusanggota' => $statusanggota,
    //         'statusbayar' => 'sudah bayar',
    //         'id_user' => $id,
    //         'username' => $username,
    //         'password' => $password,
    //         'id_user' => $this->session->userdata('id_user'),
    //         'tglupdate' => date('Y-m-d h:i:s'),
    //     );

    //     $where = array(
    //         'id_anggota' =>  $iduser,
    //     );
        
    //     $this->db->where($where);
    //     $this->db->update('tb_anggota',$user);
    // }    
}