<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller
{

    function __construct()
    {   
        parent::__construct();
        if(! $this->input->is_cli_request()) {
            show_404();
            exit;
        }   
        $this->load->library('migration');
    }


    function current()
    {
        $this->migration->current();
    }

    function rollback($version)
    {
        $this->migration->version($version);
    }  

    function latest()
    {
        $this->migration->latest();
    }
    
}
