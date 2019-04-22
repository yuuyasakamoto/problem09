<?php


class Sessions_model extends CI_Model
{
    public function getSessions($session01, $session02, $session03)
    {
        $query = $this->db->query("SELECT * FROM sessions WHERE id ='$session01' OR id ='$session02' OR id ='$session03'");
        $sessions = $query->result();
        return $sessions;
    }
}

