<?php

class Rencana_model extends CI_Model
{
    public function createRencana($data)
    {
        $rencana = $this->db->insert('rencana',$data);
        return $rencana;
    }

    public function showRencana()
    {
        // $this->db->order_by('id_rencana','DESC');
        $query = $this->db->get('v_rencana');        
        return $query;
    }

    public function editRencana($id,$data)
    {
        $this->db->where('id_rencana',$id);
        $this->db->update('rencana',$data);
        return true;
    }

    public function deleteRencana($id)
    {
        $this->db->where('id_rencana',$id);
        $this->db->delete('rencana');
        return true;
    }

}
