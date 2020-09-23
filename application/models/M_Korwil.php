<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Korwil extends CI_Model {

	function getkorwil(){
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_korwil.id_provinsi');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_korwil.id_kota');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_korwil.id_kecamatan');
        $this->db->join('tb_pengurus', 'tb_pengurus.id_korwil = tb_pengurus.id_korwil');
        $this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_pengurus.id_anggota');
        $this->db->where('tb_pengurus.status', 'aktif');
        $query = $this->db->get('tb_korwil');
    	return $query->result();
    }
	
	function getkorwilview(){
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_korwil.id_provinsi');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_korwil.id_kota');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_korwil.id_kecamatan');
        
        $query = $this->db->get('tb_korwil');
    	return $query->result();
    }

    function getkorwilspek($ida){
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_korwil.id_provinsi');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_korwil.id_kota');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_korwil.id_kecamatan');
        $this->db->where('id_korwil', $ida);
        $query = $this->db->get('tb_korwil');
        return $query->result();
    }

    function getall(){
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_korwil.id_provinsi');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_korwil.id_kota');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_korwil.id_kecamatan');
        $query = $this->db->get('tb_korwil');
        return $query->result();
    }

    function getpenguruskorwil($ida){
        $this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_pengurus.id_anggota');
        $where = array('tb_pengurus.id_korwil' => $ida, 
            'tb_pengurus.status' =>'aktif'
        );
        $query = $this->db->get_where('tb_pengurus', $where);
        return $query->result();
    }

    function cek_jabatan($korwil){
        $this->db->where('id_korwil', $korwil);
        $this->db->where('jabatan', $this->input->post('jabatan'));
        $this->db->where('tglakhir', NULL);
        $query = $this->db->get('tb_pengurus');
        return $query->result();
    }

    function getpenguruskorwile($ida){
        $this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_pengurus.id_anggota');
        $this->db->where('id_pengurus', $ida);
        $query = $this->db->get('tb_pengurus');
        return $query->result();
    }

     function getuserkorwil($ida){
        $this->db->where('id_korwil', $ida);
        $query = $this->db->get('tb_anggota');
        return $query->result();
    }


    function tambah(){
        $user = array(
            'id_user' => $this->session->userdata('id_user'),
            'namakorwil' => $this->input->post('namakorwil'),
            'tglberdiri' => $this->input->post('tglberdiri'),
            'id_kota' => $this->input->post('kota'),
            'id_provinsi' => $this->input->post('prov'),
            'id_kecamatan' => $this->input->post('kecamatan'),
            'alamat' => $this->input->post('alamat'),
            'kodekorwil' => $this->input->post('kodekorwil'),
            'tgl_update' => date('Y-m-d h:i:s')
        );
        
        $this->db->insert('tb_korwil', $user);
    }

    function selectmax(){
        $this->db->select_max('id_korwil');
        $result = $this->db->get('tb_korwil');
        return $result->result();
    }

    function uploadfile(){
        $file_name = $this->input->post('skfile');
        $path= FCPATH.'sk';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'pdf|docs|doc';
        $config['max_size'] = '10240';
        $config['remove_space'] = TRUE;
        $this->load->library('upload', $config); // Load konfigurasi uploadnya
        $this->upload->initialize($config);
        if($this->upload->do_upload('skfile')){ // Lakukan upload dan Cek jika proses upload berhasil
           $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else{
            $return = array('result' => 'failed', 'error' => $this->upload->display_errors());
            return $return; 
        }
    
    }

    function tambahpengurus($uploadfile){
        $tgl = $this->input->post('tgl');
        $pisahtgl = explode(' - ', $tgl);
        $tglaktif = explode('.', $pisahtgl[0]);
        $tglakhir = explode('.', $pisahtgl[1]);
        // echo $tgl1[2].'-'.$tgl1[1].'-'.$tgl1[0];

        $where = array(
            'id_korwil' =>   $this->input->post('korwil')
        );

        $view = array(
            'status' =>  'tidak',
        );

        $this->db->where($where);
        $this->db->update('tb_pengurus',$view);

        $user = array(
            'id_user' => $this->session->userdata('id_user'),
            'id_korwil' => $this->input->post('korwil'),
            'tglaktif' => $tglaktif[2].'-'.$tglaktif[1].'-'.$tglaktif[0],
            'tglakhir' => $tglakhir[2].'-'.$tglakhir[1].'-'.$tglakhir[0],
            'jenispengurus' => 'korwil',
            'status' => 'aktif',
            'id_anggota' => $this->input->post('nama'),
            'nosk' => $this->input->post('nosk'),
            'jabatan' => $this->input->post('jabatan'),
            'tgl_update' => date('Y-m-d h:i:s'),
            'sk' =>$uploadfile['file']['file_name']
        );
        
        $this->db->insert('tb_pengurus', $user);
    }

    function editstatususer($ida){
        $wherenonaktif = array(
            'id_korwil' =>  $ida
        );

        $editnonaktif = array(
            'statusanggota' =>  'anggota',
        );

        $this->db->where($wherenonaktif);
        $this->db->update('tb_anggota',$editnonaktif);    

        $where = array(
            'id_anggota' =>  $this->input->post('nama')
        );

        $view = array(
            'statusanggota' =>  'korwil',
            'id_korwil' =>  $ida
        );

        $this->db->where($where);
        $this->db->update('tb_anggota',$view);         
    }

    function hapuskode($a){
        $where = array(
            'id_anggota' =>  $a
        );

        $view = array(
            'id_korwil' =>  '',
            'noanggota' =>  '',
            'statusanggota' => 'anggota'
        );

        $this->db->where($where);
        $this->db->update('tb_anggota',$view);         
    }

     function editp(){
        $where = array(
            'id_pengurus' => $this->input->post('pengurus'),
        );

        $view = array(
            'nosk' =>  $this->input->post('sk'),
            'jabatan' => $this->input->post('jabatan'),
            'tgl_update' => date('Y-m-d'),
            'id_user' => $this->session->userdata('id_user'),
            'tglaktif' => $this->input->post('tglaktif')
        );

        $this->db->where($where);
        $this->db->update('tb_pengurus',$view);         
    }

    function editkorwil(){
        $where = array(
            'id_korwil' => $this->input->post('id'),
        );

        $view = array(
            'namakorwil' =>  $this->input->post('namakorwil'),
            'tglberdiri' => $this->input->post('tglberdiri'),
            'tgl_update' => date('Y-m-d'),
            'id_user' => $this->session->userdata('id_user'),
            'alamat' => $this->input->post('alamat'),
            'id_provinsi' => $this->input->post('prov'),
            'id_kota' => $this->input->post('kota'),
            'id_kecamatan' => $this->input->post('kecamatan'),
        );

        $this->db->where($where);
        $this->db->update('tb_korwil',$view);         
    }

     function hapusstatususer($id, $anggota){
        $where = array(
            'id_anggota' =>  $anggota
        );

        $view = array(
            'statusanggota' =>  'anggota'
        );

        $this->db->where($where);
        $this->db->update('tb_anggota',$view); 

        $a = array(
            'id_pengurus' =>  $id
        );

        $b = array(
            'tglakhir' => date('Y-m-d')
        );
        $this->db->where($a);
        $this->db->update('tb_pengurus',$b);        
    }

    function cekkode($modul){        
        $this->db->select('kodekorwil');
        $where = array(
            'id_korwil' => $modul
        );
        $query = $this->db->get_where('tb_korwil', $where);
        return $query->result();
    }

    function datakorwil(){
        $query = $this->db->get('tb_korwil');
        return $query->num_rows();
    } 

}
