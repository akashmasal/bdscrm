<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Master  extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model");
    }

    public function add_departments()
    {

        $data['main_content'] = "main/add_department";
        $data['getAllDepartments'] = $this->model->getData('master_department', array('status' => '1'));
        $this->load->view("includes/template", $data);
    }

    

    

    public function submit_departments()
    {
        // echo "<pre>";
        // print_r($_POST);
        // die;

        $this->form_validation->set_rules("department_name","Department Name","trim|required|min_length[2]|max_length[100]|xss_clean",array("required"=>"%s is required"));
        $this->form_validation->set_rules("sort_name","Sort Name","trim|required|min_length[2]|max_length[100]|xss_clean",array("required"=>"%s is required"));

        if($this->form_validation->run()==true){
            $departmentName = $this->security->xss_clean($this->input->post("department_name"));
            $sortName = $this->security->xss_clean($this->input->post("sort_name"));

            $data = array(
                "department_name" => $departmentName,
                "sort_name" => $sortName
            );

            $addDept = $this->Model->add_departments($data);

        }
        else
        {
            $data = array(
                'error' => validation_errors()
            );
            $this->session->set_flashdata("error",$data['error']);
            redirect(base_url("master/add_departments"));
        }
        
    }
    public function add_users()
    {

        $data['main_content'] = "main/add_users";
        $this->load->view("includes/template", $data);
    }
}
