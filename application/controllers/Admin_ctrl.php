<?php 
class Admin_ctrl extends CI_controller{
    public function __construct(){
        parent::__construct();
        $user_id = $this->session->userdata('user_id');
        if(empty($user_id)){
            redirect(base_url('login_ctrl'));
        }
    }

    public function index(){
        $data['all_course'] = count($this->db->get('courses')->result_array());
        $data['page_title'] = "Student Management System";
        $this->load->view('layouts/header');
        $this->load->view('home');
        $this->load->view('layouts/footer');
    }

    public function login(){
        $this->load->view('login');
    }





    function logout()
{
    $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
    $this->session->sess_destroy();
    redirect('login_ctrl');
}
}

?>