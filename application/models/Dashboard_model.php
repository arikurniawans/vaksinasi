<?php

class Dashboard_model extends CI_Model
{
    function total_sum($column_name,  $where, $table_name)
    {
        $this->db->select_sum($column_name);
        // If Where is not NULL
        if(!empty($where) && count($where) > 0 )
        {
           $this->db->where($where);
        }

        $this->db->from($table_name);
        // Return Count Column
        return $this->db->get()->row($column_name);//table_name array sub 0
    }

    function total_count($column_name, $table_name)
    {
        $this->db->select($column_name);
        // If Where is not NULL
        $this->db->where_not_in('user_status', array('admin'));

        $q=$this->db->get($table_name);
        $count=$q->result();
        // Return Count Column
        return count($count);//table_name array sub 0
    }

}
