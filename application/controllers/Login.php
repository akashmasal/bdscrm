<?php

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Login_model");
    }

    public function index()
    {
        $data['title'] = "Login";
        $this->load->view("main/login", $data);
    }

    public function login()
    {
        if ($this->input->server("REQUEST_METHOD") == "POST") {
            $this->form_validation->set_rules("username", "username", "trim|required|min_length[2]|max_length[100]|xss_clean");
            $this->form_validation->set_rules("password", "password", "trim|required|min_length[2]|max_length[100]|xss_clean");

            if ($this->form_validation->run()) {
                $username  = strtolower($this->security->xss_clean($this->input->post("username")));
                $password = sha1($this->security->xss_clean($this->input->post("password")));

                if ($username == "" && $password == "") {
                    $this->session->set_flashdata("error", "Username or password can't be blank");
                    redirect(base_url("login"));
                } else {
                    $userChk = $this->Login_model->usercheck($username, $password);
                    if ($userChk) {
                        
                        $setUserSession = array(
                            // 'user_name' => $this->encryption->encrypt($userChk[0]['username']),
                            // 'user_id' => $this->encryption->encrypt($userChk[0]['id']),
                            // 'first_name' => $this->encryption->encrypt($userChk[0]['first_name']),
                            // 'last_name' => $this->encryption->encrypt($userChk[0]['last_name']),
                            "id" => $userChk[0]['id'],
                            "user_name" => $userChk[0]['username'],
                            "first_name" => $userChk[0]['first_name'],
                            "last_name" => $userChk[0]['last_name']
                        );

                        // echo "<pre>";
                        // print_r($setUserSession);
                        // die;
                        $session = $this->session->set_userdata($setUserSession);
                        
                        
                        if ($session == true) {
                            $this->session->set_flashdata("success", "Login Successfull..!!");
                            redirect(base_url("dashboard"));
                        } else {
                            $data = array(
                                "error" => "Oops!! Some Error Occurred"
                            );
                            $this->session->set_flashdata("error", $data['error']);
                            redirect(base_url("login"));
                        }
                    } else {
                        $data = array(
                            "error" => "User Does Not Exist, Kindly Register Yourself"
                        );
                        $this->session->set_flashdata("error", $data['error']);
                        redirect(base_url("login"));
                    }
                }
            } else {
                $data = array(
                    "error" => validation_errors()
                );
                $this->session->set_flashdata("error", $data['error']);
                redirect(base_url("login"));
            }
        } else {
            redirect('');
        }
    }
}
