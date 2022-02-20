<?php

class Personel_model extends CI_Model
{

    public function createPersonel($data)
    {
        $jabatan = $this->db->insert('personel',$data);
        return $jabatan;
    }

    public function showPersonel()
    {
        $this->db->order_by('id_personel','DESC');
        $query = $this->db->get_where('personel', array('user_status' => 'personel'));        
        return $query;
    }

    public function editPersonel($id,$data)
    {
        $this->db->where('id_personel',$id);
        $this->db->update('personel',$data);
        return true;
    }

    public function deletePersonel($id)
    {
        $this->db->where('id_personel',$id);
        $this->db->delete('personel');
        return true;
    }

}
