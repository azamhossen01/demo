<?php 
class Login_ctrl extends CI_controller{
    public function __construct(){
        parent::__construct();
        $user_id = $this->session->userdata('user_id');
        if(!empty($user_id)){
            redirect(base_url('admin_ctrl'));
        }
    }

    public function index(){
        $this->load->view('login');
    }

    public function login(){
        $data['email'] = $this->input->post('email');
        $data['password'] = md5($this->input->post('password'));
        if($data){
         $result =  $this->db->where($data)->get('students')->row_array();
         if($result){
            $this->session->set_userdata('user_id', $result['id']);	
            $this->session->set_userdata('role', $result['role']);	
            $this->session->set_userdata('name', $result['name']);	
            redirect('admin_ctrl');
         }else{
             redirect('login_ctrl');
         }
        }
    }
}

?>