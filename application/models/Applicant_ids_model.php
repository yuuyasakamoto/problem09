<?php


class Applicant_ids_model extends CI_Model
{
    public function getApplicantId(int $pass, string $code = NULL)
    {
        //ビシターパス
        if ($pass == 1) {
            $this->db->query("UPDATE applicant_ids SET A = + 1 WHERE id = 1;");
        //アプリプレミアムパス
        } elseif ($pass == 2) {
            $this->db->query("UPDATE applicant_ids SET B = + 1 WHERE id = 1;");
        //アプリ招待コード
        } elseif ($pass == 3 && substr($code, 0, 1) !== 'P') {
            $this->db->query("UPDATE applicant_ids SET C = + 1 WHERE id = 1;");
        //アプリパートナー企業の招待コード
        } elseif ($pass == 3 && substr($code, 0, 1) === 'P') {
            $this->db->query("UPDATE applicant_ids SET D = + 1 WHERE id = 1;");
        //その他プレミアムパス
        } elseif ($pass == 4) {
            $this->db->query("UPDATE applicant_ids SET E = + 1 WHERE id = 1;");
        //その他紹介コード
        } elseif ($pass == 5) {
            $this->db->query("UPDATE applicant_ids SET F = + 1 WHERE id = 1;");
        }
    }
}



