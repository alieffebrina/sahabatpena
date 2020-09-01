<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Korwil extends CI_Model {

	function getkorwil(){
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

    function getpenguruskorwil($ida){
        $this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_pengurus.id_anggota');
        $this->db->where('id_korwil', $ida);
        $query = $this->db->get('tb_pengurus');
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

    function tambahpengurus(){
        $user = array(
            'id_user' => $this->session->userdata('id_user'),
            'id_korwil' => $this->input->post('korwil'),
            'tglaktif' => $this->input->post('tglaktif'),
            'jenispengurus' => 'korwil',
            'id_anggota' => $this->input->post('nama'),
            'nosk' => $this->input->post('sk'),
            'jabatan' => $this->input->post('jabatan'),
            'tgl_update' => date('Y-m-d h:i:s')
        );
        
        $this->db->insert('tb_pengurus', $user);
    }

    function editstatususer(){
        $where = array(
            'id_anggota' =>  $this->input->post('nama')
        );

        $view = array(
            'statusanggota' =>  'korwil'
        );

        $this->db->where($where);
        $this->db->update('tb_anggota',$view);         
    }

}