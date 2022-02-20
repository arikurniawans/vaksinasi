<?php

class Stok_model extends CI_Model
{
    public function createStok($data)
    {
        $stok = $this->db->insert('stok',$data);
        return $stok;
    }

    public function showStok()
    {
        $this->db->order_by('id_stok','DESC');
        $query = $this->db->get('stok');        
        return $query;
    }

    public function editStok($id,$data)
    {
        $this->db->where('id_stok',$id);
        $this->db->update('stok',$data);
        return true;
    }

    public function deleteStok($id)
    {
        $this->db->where('id_stok',$id);
        $this->db->delete('stok');
        return true;
    }

}
