<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Informasispk extends CI_Model {

	function getall(){
        $this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_informasi.id_user');
        $this->db->order_by('tb_informasi.tglupdate', 'DESC');
        $query = $this->db->get('tb_informasi');
    	return $query->result();
    }

     function tambah(){
        $user = array(
            'id_user' => $this->session->userdata('id_user'),
            'judulinformasi' => $this->input->post('judul'),
            'informasi' => $this->input->post('editor1'),
            'tglupdate' => date('Y-m-d h:i:s')
        );
        
        $this->db->insert('tb_informasi', $user);
    }

    function update(){
        $where = array(
            'id_informasi' =>  $this->input->post('id')
        );

        $view = array(
            'id_user' => $this->session->userdata('id_user'),
            'judulinformasi' => $this->input->post('judul'),
            'informasi' => $this->input->post('editor1'),
            'tglupdate' => date('Y-m-d h:i:s')
        );

        $this->db->where($where);
        $this->db->update('tb_informasi',$view);         
    }

    function getspek($a){
        $this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_informasi.id_user');
        $this->db->order_by('tb_informasi.tglupdate', 'DESC');
        $this->db->where('id_informasi', $a);
        $query = $this->db->get('tb_informasi');
    	return $query->result();
    }
} 