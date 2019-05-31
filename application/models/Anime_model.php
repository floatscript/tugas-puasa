<?php 
class Anime_model extends CI_Model{
    public function getAnime($id = null) {
        if($id != ''){
            return $this->db->get_where('anime', array('id' => $id))->result();
        }else{
            return $this->db->get('anime')->result();
        }
    }

    public function tambahDataanime($data){
        $this->db->insert('anime', $data);
        return $this->db->affected_rows();
    }

    public function hapusDataanime($id){
        $this->db->where("id = $id");
        return $this->db->delete('anime');;
    }

    public function ubahDataanime($data){
        $this->db->where("id = '$data[id]'");
        return $this->db->update('anime', $data);
    }
    
}