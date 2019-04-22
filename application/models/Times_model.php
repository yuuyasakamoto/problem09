<?php


class Times_model extends CI_Model
{
    
    public function findById(int $time_id)
    {
        $query = $this->db->query("SELECT * FROM times WHERE id='$time_id'");
        $time = $query->row();
        return $time->time;
    }
}

