<?php


class Applicant_ids_model extends CI_Model
{
    /**
     * パスに応じた申し込みIDの取得機能
     */
    public function getApplicantId(int $pass, string $code = NULL)
    {
        //ビシターパス
        if ($pass == 1) {
            $this->db->query("UPDATE applicant_ids SET A = A + 1 WHERE id = 1;");
            $query = $this->db->query("SELECT * FROM applicant_ids WHERE id=1");
            $applicant_id = $query->row();
            return 'A'.$applicant_id->A;
        //アプリプレミアムパス
        } elseif ($pass == 2) {
            $this->db->query("UPDATE applicant_ids SET B = B + 1 WHERE id = 1;");
            $query = $this->db->query("SELECT * FROM applicant_ids WHERE id=1");
            $applicant_id = $query->row();
            return 'B'.$applicant_id->B;
        //アプリ招待コード（初期値P以外）
        } elseif ($pass == 3 && substr($code, 0, 1) !== 'P') {
            $this->db->query("UPDATE applicant_ids SET C = C + 1 WHERE id = 1;");
            $query = $this->db->query("SELECT * FROM applicant_ids WHERE id=1");
            $applicant_id = $query->row();
            return 'C'.$applicant_id->C;
        //アプリパートナー企業の招待コード（初期値P）
        } elseif ($pass == 3 && substr($code, 0, 1) === 'P') {
            $this->db->query("UPDATE applicant_ids SET D = D + 1 WHERE id = 1;");
            $query = $this->db->query("SELECT * FROM applicant_ids WHERE id=1");
            $applicant_id = $query->row();
            return 'D'.$applicant_id->D;
        //その他プレミアムパス
        } elseif ($pass == 4) {
            $this->db->query("UPDATE applicant_ids SET E = E + 1 WHERE id = 1;");
            $query = $this->db->query("SELECT * FROM applicant_ids WHERE id=1");
            $applicant_id = $query->row();
            return 'E'.$applicant_id->E;
        //その他紹介コード
        } elseif ($pass == 5) {
            $this->db->query("UPDATE applicant_ids SET F = F + 1 WHERE id = 1;");
            $query = $this->db->query("SELECT * FROM applicant_ids WHERE id=1");
            $applicant_id = $query->row();
            return 'F'.$applicant_id->F;
        }
    }
}



