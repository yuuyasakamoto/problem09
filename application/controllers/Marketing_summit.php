<?php
class  Marketing_summit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function ticket_a()
    {
        $this->form_validation->set_message('required', '※%sをしてください。');
        $this->form_validation->set_rules('pass', 'パスの選択', 'required');
        if ($this->form_validation->run() === true) {
            $pass = $this->input->post('pass');
            if($pass == "プレミアムパス(招待)") {
                $code = $this->input->post('code');
                $this->Codes_model->checkCode($code);
            } 
            $this->load->view('input', $application);
        } else {
            $this->load->view('ticket_a');
        }
    }
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
        
    }
}