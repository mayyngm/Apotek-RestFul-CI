<?php

class Obat_model extends CI_Model{
    public function getObat($id = null){
        if ($id === null){
            return $this->db->get ('obat')->result_array();
        } else{
            return $this->db->get_where('obat', ['id'=>$id])->result_array();
        }
    }
    
    public function deleteObat($id){
        $this->db->delete('obat', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createObat($data){
        $this->db->insert('obat', $data);
        return $this->db->affected_rows();
    }

    public function updateObat($data, $id){
        $this->db->update('obat', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
?>