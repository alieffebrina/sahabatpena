<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model{
  public function get($username){
  	$where = array('username' => $username, 'statusanggota !=' =>'tidak aktif' );
  	$result = $this->db->get_where('tb_anggota', $where)->row();
  	return $result;
}
}
?>