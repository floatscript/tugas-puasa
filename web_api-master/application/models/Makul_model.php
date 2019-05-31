<?php 
class Makul_model extends CI_Model{
    public function getMakul($id = null) {
        if($id != ''){
            return $this->db->get_where('Makul', array('id' => $id))->result();
        }else{
            return $this->db->get('Makul')->result();
        }
    }
}