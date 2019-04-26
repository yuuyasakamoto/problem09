<?php
class Marketing_summit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * ランディングページ
     */
    public function index()
    {
        $this->load->view('index');
    }
    /**
     * アプリ関係者申し込み機能
     */
    public function ticket_a()
    {
        //ビジターパス(1)
        //アプリプレミアムパス(2)
        //アプリ招待パス(3)
        //セッションの定員チェック(空席あればTRUE,満席ならFALSE)
        $data['check01'] = $this->Session_applicants_model->capacityCheck01();
        $data['check02'] = $this->Session_applicants_model->capacityCheck02();
        $data['check03'] = $this->Session_applicants_model->capacityCheck03();
        $data['check04'] = $this->Session_applicants_model->capacityCheck04();
        $data['check05'] = $this->Session_applicants_model->capacityCheck05();
        $data['check06'] = $this->Session_applicants_model->capacityCheck06();
        $data['check07'] = $this->Session_applicants_model->capacityCheck07();
        $data['check08'] = $this->Session_applicants_model->capacityCheck08();
        $data['check09'] = $this->Session_applicants_model->capacityCheck09();
        $this->form_validation->set_message('required', '※%sをしてください。');
        $this->form_validation->set_rules('pass', 'パスの選択', 'required');
        $pass = $this->input->post('pass');
        //ビジターもしくはプレミアムパスを選択した場合
        if ($this->form_validation->run() === true && $pass == 1 || $this->form_validation->run() === true && $pass == 2) {
            $this->load->view('input', $data);
        //招待パスを選択した場合
        } elseif ($this->form_validation->run() === true && $pass == 3 ) {
            $code = $this->input->post('code');
            //招待パスのチェック（合っているかと使用済みではないか）
            $applicant_code = $this->Codes_model->checkCode($code);
            //招待パスが合っていれば参加者情報入力、希望セッション選択画面へ
            if ($applicant_code) {
                $this->load->view('input', $data);
            //招待パスが間違っていればパス入力画面へ    
            } else {
                redirect('/Marketing_summit/ticket_a?applicant_code=false');
            }
        //パスを選択していなければパス入力画面へ
        } else {
            $this->load->view('ticket_a');
        }
    }
    /**
     * アプリ以外の申し込み機能
     */
    public function ticket_b()
    {
        $data['check01'] = $this->Session_applicants_model->capacityCheck01();
        $data['check02'] = $this->Session_applicants_model->capacityCheck02();
        $data['check03'] = $this->Session_applicants_model->capacityCheck03();
        $data['check04'] = $this->Session_applicants_model->capacityCheck04();
        $data['check05'] = $this->Session_applicants_model->capacityCheck05();
        $data['check06'] = $this->Session_applicants_model->capacityCheck06();
        $data['check07'] = $this->Session_applicants_model->capacityCheck07();
        $data['check08'] = $this->Session_applicants_model->capacityCheck08();
        $data['check09'] = $this->Session_applicants_model->capacityCheck09();
        //その他プレミアムパス(4)
        //その他招待パス(5)
        $this->form_validation->set_message('required', '※%sをしてください。');
        $this->form_validation->set_rules('pass', 'パスの選択', 'required');
        $pass = $this->input->post('pass');
        //プレミアムパスを選んだ場合
        if ($this->form_validation->run() === true && $pass == 4) {
            $this->load->view('input', $data);
        //招待パスを選択した場合
        } elseif ($this->form_validation->run() === true && $pass == 5 ) {
            $code = $this->input->post('code');
            //招待パスのチェック（合っているかと使用済みではないか）
            $applicant_code = $this->Codes_model->checkCode($code);
            //招待パスが合っていれば参加者情報入力、希望セッション選択画面へ
            if ($applicant_code) {
                $this->load->view('input', $data);
            //招待パスが間違っていればパス入力画面へ    
            } else {
                redirect('/Marketing_summit/ticket_b?applicant_code=false');
            }
        //パスを選択していなければパス入力画面へ
        } else {
            $this->load->view('ticket_b');
        }
    }
    /**
     * 参加者情報、希望セッションチェック機能
     */
    public function check()
    {
        if (!isset($_POST['key'])) {
        echo "エラー発生";
        exit();
        } 
        $data['check01'] = $this->Session_applicants_model->capacityCheck01();
        $data['check02'] = $this->Session_applicants_model->capacityCheck02();
        $data['check03'] = $this->Session_applicants_model->capacityCheck03();
        $data['check04'] = $this->Session_applicants_model->capacityCheck04();
        $data['check05'] = $this->Session_applicants_model->capacityCheck05();
        $data['check06'] = $this->Session_applicants_model->capacityCheck06();
        $data['check07'] = $this->Session_applicants_model->capacityCheck07();
        $data['check08'] = $this->Session_applicants_model->capacityCheck08();
        $data['check09'] = $this->Session_applicants_model->capacityCheck09();
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
        $data['session01'] = $this->input->post('session01');
        $data['session02'] = $this->input->post('session02');
        $data['session03'] = $this->input->post('session03');
        $_POST['session'] = $data['session01'].$data['session02'].$data['session03'];
        $this->form_validation->set_rules('session', 'セッション', 'callback_session_check');
        //バリデーションエラーが無く有料パスの場合支払い画面へ
        if ($this->form_validation->run() === true && $this->input->post('pass') == 2 ||$this->form_validation->run() === true && $this->input->post('pass') == 4) {
            //選択したセッション情報取得
            $sessions = $this->Sessions_model->getSessions($data['session01'], $data['session02'], $data['session03']);
            foreach($sessions as $session) {
            //time_idに紐づいた時間帯を取得
            $session_time = $this->Times_model->findById($session->time_id);
            $session->time_id = $session_time;
        }
            $data['sessions'] = $sessions;
            $this->load->view('check', $data);
        //バリデーションエラーが無く支払い必要の無いパスの場合
        } elseif ($this->form_validation->run() === true && $this->input->post('pass') == 1 ||$this->form_validation->run() === true && $this->input->post('pass') == 3 ||$this->form_validation->run() === true && $this->input->post('pass') == 5) {
            //選択したセッション情報取得
            $sessions = $this->Sessions_model->getSessions($data['session01'], $data['session02'], $data['session03']);
            foreach($sessions as $session) {
            //time_idに紐づいた時間帯を取得
            $session_time = $this->Times_model->findById($session->time_id);
            $session->time_id = $session_time;
            }
            $data['sessions'] = $sessions;
            $this->load->view('check_free', $data);
        //バリデーションエラーの場合もう一度参加者情報入力、希望セッション選択画面へ
        } else {
            $this->load->view('input', $data);
        }
    }
    /**
     * ビジター、招待パス申し込み完了機能
     */
    public function free_complete()
    {
        if (!isset($_POST['key'])) {
        echo "エラー発生";
        exit();
        } 
        //招待コードの場合使用済みフラグ追加
        $code = $this->input->post('code');
        if ($code) {
            //使用済みコードフラグ追加
            $this->Codes_model->usedCode($code);
        }
        $pass = $this->input->post('pass');
        //パスに応じた申し込みIDの取得
        $applicant_id = $this->Applicant_ids_model->getApplicantId($pass, $code);
        $company = $this->input->post('company');
        $department = $this->input->post('department');
        $position = $this->input->post('position');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $first_name_hiragana = $this->input->post('first_name_hiragana');
        $last_name_hiragana = $this->input->post('last_name_hiragana');
        $email = $this->input->post('email');
        $tel = $this->input->post('tel');
        $attribute = $this->input->post('attribute');
        //申込者情報保存し申込者IDを返す
        $id = $this->Applicants_model->insert($pass, $company, $department,
                           $position, $first_name, $last_name, $first_name_hiragana, 
                           $last_name_hiragana, $email, $tel, $attribute, $applicant_id);
        //選択したセッションid取得
        $session01 = $this->input->post('session01');
        $session02 = $this->input->post('session02');
        $session03 = $this->input->post('session03');
        //申込者IDとセッションIDを保存し申し込み完了画面
        $this->Session_applicants_model->insert($id, $session01, $session02, $session03);
        $this->load->view('complete');
    }
    /**
     * プレミアムパス（有料）申し込み完了機能
     */
    public function pay_complete()
    {
        if (!isset($_POST['key'])) {
        echo "エラー発生";
        exit();
        } 
        $this->form_validation->set_message('required', '%s を入力して下さい。');
        $this->form_validation->set_rules('payment', 'お支払い方法', 'required');
        //支払い方法を領収書にした場合
        if ($this->form_validation->run() === true && $this->input->post('payment') == "請求書" ) {
            $this->form_validation->set_message('required', '%s を入力して下さい。');
            $this->form_validation->set_rules('receipt_address', '領収書・請求書宛名', 'required');
            //領収書宛名を記載した場合
            if ($this->form_validation->run() === true) {
                $pass = $this->input->post('pass');
                //パスに応じた申し込みIDの取得
                $applicant_id = $this->Applicant_ids_model->getApplicantId($pass);
                $company = $this->input->post('company');
                $department = $this->input->post('department');
                $position = $this->input->post('position');
                $first_name = $this->input->post('first_name');
                $last_name = $this->input->post('last_name');
                $first_name_hiragana = $this->input->post('first_name_hiragana');
                $last_name_hiragana = $this->input->post('last_name_hiragana');
                $email = $this->input->post('email');
                $tel = $this->input->post('tel');
                $attribute = $this->input->post('attribute');
                $payment = $this->input->post('payment');
                $receipt_address = $this->input->post('receipt_address');
                //申込者情報保存
                $this->Applicants_model->insert($pass, $company, $department,
                           $position, $first_name, $last_name, $first_name_hiragana, 
                           $last_name_hiragana, $email, $tel, $attribute, $applicant_id
                           ,$payment, $receipt_address);
                $this->load->view('complete');
            //領収書支払いを選択し請求書宛名を入力しなかった場合
            } else {
                $data['session01'] = $this->input->post('session01');
                $data['session02'] = $this->input->post('session02');
                $data['session03'] = $this->input->post('session03');
                $sessions = $this->Sessions_model->getSessions($data['session01'], $data['session02'], $data['session03']);
                foreach($sessions as $session) {
                    //time_idに紐づいた時間帯を取得
                    $session_time = $this->Times_model->findById($session->time_id);
                    $session->time_id = $session_time;
                }
            $data['sessions'] = $sessions;
            $this->load->view('check', $data);
            }
        //支払い方法クレジットカードを選択した場合
        } elseif ($this->form_validation->run() === true && $this->input->post('payment') == "クレジットカード") {
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