<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Pengurus extends CI_Model {

	function getpengurus(){
        $this->db->join('tb_pengurus', 'tb_pengurus.id_korwil = tb_korwil.id_korwil');
        $this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_pengurus.id_anggota');
        $this->db->where('status', 'aktif');
        $query = $this->db->get('tb_korwil');
    	return $query->result();
    }

    function editstatususer(){
        $where = array(
            'id_anggota' =>  $this->input->post('nama')
        );

        $view = array(
            'statusanggota' =>  'pengurus'
        );

        $this->db->where($where);
        $this->db->update('tb_anggota',$view);         
    }

    function editsu($a){
        $where = array(
            'id_anggota' =>  $a
        );

        $view = array(
            'statusanggota' =>  'anggota'
        );

        $this->db->where($where);
        $this->db->update('tb_anggota',$view);         
    }

    function tambahpengurus(){
        $user = array(
            'id_user' => $this->session->userdata('id_user'),
            'tglaktif' => $this->input->post('tglaktif'),
            'jenispengurus' => 'pusat',
            'id_anggota' => $this->input->post('nama'),
            'nosk' => $this->input->post('sk'),
            'jabatan' => $this->input->post('jabatan'),
            'tgl_update' => date('Y-m-d h:i:s')
        );
        
        $this->db->insert('tb_pengurus', $user);
    }

    function getpengurusspek($ida){
        $this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_pengurus.id_anggota');
        $this->db->where('id_pengurus', $ida);
        $query = $this->db->get('tb_pengurus');
    	return $query->result();
    }

    function update(){
        $where = array(
            'id_anggota' =>  $this->input->post('id')
        );

        $view = array(
            'id_user' => $this->session->userdata('id_user'),
            'tglaktif' => $this->input->post('tglaktif'),
            'jenispengurus' => 'pusat',
            'id_anggota' => $this->input->post('nama'),
            'nosk' => $this->input->post('sk'),
            'jabatan' => $this->input->post('jabatan'),
            'tgl_update' => date('Y-m-d')
        );

        $this->db->where($where);
        $this->db->update('tb_anggota',$view);         
    }

    function hapus($a){
        $where = array(
            'id_pengurus' =>  $a
        );

        $view = array(
            'tglakhir' =>  date('Y-m-d'),
            'tgl_update' => date('Y-m-d'),
            'id_user' => $this->session->userdata('id_user')
        );

        $this->db->where($where);
        $this->db->update('tb_pengurus',$view);         
    }


}