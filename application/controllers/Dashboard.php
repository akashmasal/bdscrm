<?php

class Dashboard extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['main_content'] = "main/dashboard";
        $this->load->view("includes/template",$data);
    }
}

?>