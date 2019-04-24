<?php


class Codes_model extends CI_Model
{
    /**
     * 入力された招待コードが合っているかと使用済みかどうか確認
     * @param string $code
     * @return boolean
     */
    public function checkCode(string $code)
    {
        $query = $this->db->query("SELECT * FROM codes WHERE code ='$code' AND void = 0");
        $applicant_code = $query->row();
        if ($applicant_code) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    /**
     * 使用した招待コードを仕様済みフラグに変更
     * @param string $code
     */
    public function usedCode(string $code)
    {
        $this->db->query("UPDATE codes SET void = void + 1 WHERE code='$code'");
    }
}

