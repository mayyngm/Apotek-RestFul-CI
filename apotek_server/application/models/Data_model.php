<?php

class Data_model extends CI_Model{
    public function getMember($id = null){
        if ($id === null){
            return $this->db->get ('data')->result_array();
        } else{
            return $this->db->get_where('data', ['id'=>$id])->result_array();
        }
    }
    
    public function deleteMember($id){
        $this->db->delete('data', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createMember($data){
        $this->db->insert('data', $data);
        return $this->db->affected_rows();
    }

    public function updateMember($data, $id){
        $this->db->update('data', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
?>