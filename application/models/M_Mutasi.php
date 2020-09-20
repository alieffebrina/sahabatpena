<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Mutasi extends CI_Model {

	function getmutasi(){
        $this->db->select('b.namakorwil korwilawal, a.namakorwil korwilmutasi, tb_mutasi.tglupdate, tb_anggota.nama');
        $this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_mutasi.id_anggota');
        $this->db->join('tb_korwil b', 'b.id_korwil = tb_anggota.id_korwil');
        $this->db->join('tb_korwil a', 'a.id_korwil = tb_mutasi.korwilmutasi');
        $this->db->order_by('tb_mutasi.tglupdate', 'DESC');
        $query = $this->db->get('tb_mutasi');
    	return $query->result();
    }

    function tambah(){
        $user = array(
            'id_user' => $this->session->userdata('id_user'),
            'id_anggota' => $this->input->post('anggotamutasi'),
            'korwilawal' => $this->input->post('korwilawal'),
            'korwilmutasi' => $this->input->post('korwilmutasi'),
            'tglupdate' => date('Y-m-d h:i:s')
        );
        
        $this->db->insert('tb_mutasi', $user);
    }

    function konfirm($id, $a){
        
        $user = array(
            'noanggota' => $a,
            'id_korwil' => $this->input->post('korwilmutasi'),
            'tglupdate' => date('Y-m-d h:i:s'),
        );

        $where = array(
            'id_anggota' =>  $id,
        );
        
        $this->db->where($where);
        $this->db->update('tb_anggota',$user);
    }   
}