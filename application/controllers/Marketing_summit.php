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
        $this->form_validation->set_message('required', '※%sをしてください。');
        $this->form_validation->set_rules('pass', 'パスの選択', 'required');
        if ($this->form_validation->run() === true) {
        $applicants['pass'] = $this->input->post('pass');
            if($applicants['pass'] == "プレミアムパス(招待)") {
                $code = $this->input->post('code');
                $applicant_code = $this->Codes_model->checkCode($code);
                if ($applicant_code) {
                    $this->load->view('input', $applicants);
                } else {
                    redirect('/Pass/ticket_a?applicant_code=false');
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
            $application['pass'] = $this->input->post('pass');
            $code = $this->input->post('code');
            echo $code;
            $this->load->view('input', $application);
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
        $this->form_validation->set_rules('company', '会社名', 'required');
        $this->form_validation->set_rules('department', '部署名', 'required');
        $this->form_validation->set_rules('position', '役職名', 'required');
        $this->form_validation->set_rules('first_name', '姓', 'required|callback_kanzi_check');
        $this->form_validation->set_rules('last_name', '名', 'required|callback_kanzi_check');
        $this->form_validation->set_rules('first_name_hiragana', 'せい', 'required|callback_hiragana_check');
        $this->form_validation->set_rules('last_name_hiragana', 'めい', 'required|callback_hiragana_check');
        $this->form_validation->set_rules('email', 'メールアドレス', 'required|valid_email');
        $this->form_validation->set_rules('tel', '電話番号', 'min_length[10]|max_length[11]');
        $this->form_validation->set_rules('attribute', '属性', 'required');
        //バリデーションエラーが無かった時確認画面へ
        if ($this->form_validation->run() === true) {
            
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
}