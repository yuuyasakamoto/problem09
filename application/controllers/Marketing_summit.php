<?php
class Marketing_summit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * アプリ関係者申し込み機能
     */
    public function ticket_a()
    {
        //ビジターパス(1)
        //アプリプレミアムパス(2)
        //アプリ招待パス(3)
        //その他プレミアムパス(4)
        //その他招待パス(5)
        $this->form_validation->set_message('required', '※%sをしてください。');
        $this->form_validation->set_rules('pass', 'パスの選択', 'required');
        if ($this->form_validation->run() === true) {
            $pass = $this->input->post('pass');
            //招待パスを選んだ場合
            if($pass == 3) {
                $code = $this->input->post('code');
                //招待パスのチェック（合っているかと使用済みではないか）
                $applicant_code = $this->Codes_model->checkCode($code);
                if ($applicant_code) {
                    $this->load->view('input');
                } else {
                    redirect('/Marketing_summit/ticket_a?applicant_code=false');
                }
            } 
            $this->load->view('input');
        } else {
            $this->load->view('ticket_a');
        }
    }
    /**
     * アプリ以外の申し込み機能
     */
    public function ticket_b()
    {
        $this->form_validation->set_message('required', '※%sをしてください。');
        $this->form_validation->set_rules('pass', 'パスの選択', 'required');
        if ($this->form_validation->run() === true) {
            $applicants['pass'] = $this->input->post('pass');
            //招待パスを選んだ場合
            if($applicants['pass'] == 5) {
                $applicants['code'] = $this->input->post('code');
                //招待パスのチェック（合っているかと使用済みではないか）
                $applicant_code = $this->Codes_model->checkCode($applicants['code']);
                if ($applicant_code) {
                    $this->load->view('input', $applicants);
                } else {
                    redirect('/Marketing_summit/ticket_b?applicant_code=false');
                }
            } 
            $this->load->view('input', $applicants);
        } else {
            $this->load->view('ticket_b');
        }
    }
    public function check()
    {
        //入力された値のバリデーションチェック
        $this->form_validation->set_message('required', '%s を入力して下さい。');
        $this->form_validation->set_message('valid_email', '会社のメールアドレスを記入してください');
        $this->form_validation->set_message('min_length', '電話番号を入力してください。※ハイフンなし');
        $this->form_validation->set_message('max_length', '電話番号を入力してください。※ハイフンなし');
        $this->form_validation->set_rules('first_name', '姓', 'required|callback_kanzi_check');
        $this->form_validation->set_rules('last_name', '名', 'required|callback_kanzi_check');
        $this->form_validation->set_rules('first_name_hiragana', 'せい', 'required|callback_hiragana_check');
        $this->form_validation->set_rules('last_name_hiragana', 'めい', 'required|callback_hiragana_check');
        $this->form_validation->set_rules('email', 'メールアドレス', 'required|valid_email');
        $this->form_validation->set_rules('tel', '電話番号', 'required|min_length[10]|max_length[11]');
        $this->form_validation->set_rules('attribute', '属性', 'required');
        //セッションのバリデーション
        $session01 = $this->input->post('session01');
        $session02 = $this->input->post('session02');
        $session03 = $this->input->post('session03');
        $_POST['session'] = $session01.$session02.$session03;
        $this->form_validation->set_rules('session', 'セッション', 'callback_session_check');
        //バリデーションエラーが無く有料パスの場合支払い画面へ
        if ($this->form_validation->run() === true && $this->input->post('pass') == 2 ||$this->input->post('pass') == 4) {
            $this->load->view('check');
        //バリデーションが無く支払い必要の無いパスの場合
        } elseif ($this->form_validation->run() === true && $this->input->post('pass') == 1 ||$this->input->post('pass') == 3 ||$this->input->post('pass') == 5) {
            $this->load->view('check_free');
        //バリデーションエラーの場合もう一度
        } else {
            $this->load->view('input');
        }
    }
    /**
     * ひらがなチェック
     * @param string $hiragana
     * @return boolean
     */
    public function hiragana_check(string $hiragana)
    {
        $check = preg_match("/^[ぁ-ゞ]+$/u", $hiragana);
        if ($check == true) {
            return true;
        } else {
            $this->form_validation->set_message('hiragana_check', 'ひらがなで入力して下さい');
            return false;
        }
    }
    /**
     * 漢字チェック
     * @param string $kanzi
     * @return boolean
     */
    public function kanzi_check(string $kanzi)
    {
        $check = preg_match("/^[一-龠]+$/u", $kanzi);
        if ($check == true) {
            return true;
        } else {
            $this->form_validation->set_message('kanzi_check', '漢字で入力して下さい');
            return false;
        }
    }
    /**
     * セッション選択しているかチェック
     * @param string $session
     * @return boolean
     */
    public function session_check(string $session)
    {
        if ($session == "") {
            $this->form_validation->set_message('session_check', 'セッションを選択してください');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}