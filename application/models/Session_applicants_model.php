<?php


class Session_applicants_model extends CI_Model
{
    /**
     * 申込者が選択したセッション保存機能
     * @param int $id
     * @param string $session01
     * @param string $session02
     * @param string $session03
     */
    public function insert(int $id, string $session01 = NULL, string $session02 = NULL, string $session03 = NULL)
    {
        //申込者が11:00~12:00のセッションに参加している場合参加セッション保存
        if ($session01) {
            $data = ['applicant_id' => $id, 'session_id' => $session01];
            $this->db->insert('session_applicants', $data);
        }
        //申込者が12:30~14:00のセッションに参加している場合参加セッション保存
        if ($session02) {
            $data = ['applicant_id' => $id, 'session_id' => $session02];
            $this->db->insert('session_applicants', $data);
        }
        //申込者が14:30~16:00のセッションに参加している場合参加セッション保存
        if ($session03) {
            $data = ['applicant_id' => $id, 'session_id' => $session03];
            $this->db->insert('session_applicants', $data);
        }
    }
    public function capacityCheck01()
    {
        // 件数を取得
        $count = $this->db->get_where('session_applicants', ['session_id' => 1])->num_rows();
        if ($count <= 50) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function capacityCheck02()
    {
        // 件数を取得
        $count = $this->db->get_where('session_applicants', ['session_id' => 2])->num_rows();
        if ($count <= 30) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function capacityCheck03()
    {
        // 件数を取得
        $count = $this->db->get_where('session_applicants', ['session_id' => 3])->num_rows();
        if ($count <= 15) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function capacityCheck04()
    {
        // 件数を取得
        $count = $this->db->get_where('session_applicants', ['session_id' => 4])->num_rows();
        if ($count <= 50) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function capacityCheck05()
    {
        // 件数を取得
        $count = $this->db->get_where('session_applicants', ['session_id' => 5])->num_rows();
        if ($count <= 30) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function capacityCheck06()
    {
        // 件数を取得
        $count = $this->db->get_where('session_applicants', ['session_id' => 6])->num_rows();
        if ($count <= 15) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function capacityCheck07()
    {
        // 件数を取得
        $count = $this->db->get_where('session_applicants', ['session_id' => 7])->num_rows();
        if ($count <= 50) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function capacityCheck08()
    {
        // 件数を取得
        $count = $this->db->get_where('session_applicants', ['session_id' => 8])->num_rows();
        if ($count <= 30) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function capacityCheck09()
    {
        // 件数を取得
        $count = $this->db->get_where('session_applicants', ['session_id' => 9])->num_rows();
        if ($count <= 15) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

