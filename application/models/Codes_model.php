<?php


class Codes_model extends CI_Model
{
    public function checkCode(string $code)
    {
        $query = $this->db->query("SELECT * FROM codes WHERE code ='$code' AND void = 0");
        $applicant_code = $query->row();
        if ($applicant_code) {
            //$this->db->query("UPDATE codes SET void = void + 1 WHERE id = $applicant_code->id;");
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function usedCode(string $code)
    {
            $this->db->query("UPDATE codes SET void = void + 1 WHERE code='$code'");
    }
}

