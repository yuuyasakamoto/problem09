<?php


class Session_applicants_model extends CI_Model
{
    public function insert(int $id, string $session01 = NULL, string $session02 = NULL, string $session03 = NULL)
    {
        if ($session01) {
            $data = ['applicant_id' => $id, 'session_id' => $session01];
            $this->db->insert('session_applicants', $data);
        }
        if ($session02) {
            $data = ['applicant_id' => $id, 'session_id' => $session02];
            $this->db->insert('session_applicants', $data);
        }
        if ($session03) {
            $data = ['applicant_id' => $id, 'session_id' => $session03];
            $this->db->insert('session_applicants', $data);
        }
    }
}

