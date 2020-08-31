<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Korwil extends CI_Model {

	function getkorwil(){
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_korwil.id_provinsi');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_korwil.id_kota');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_korwil.id_kecamatan');
        $this->db->join('tb_anggota', 'tb_korwil.id_anggota = tb_korwil.id_anggota');
        $query = $this->db->get('tb_korwil');
    	return $query->result();
    }
}