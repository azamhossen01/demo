<?php 
class Staff_ctrl extends CI_controller{
    public function __construct(){
        parent::__construct();
        $user_id = $this->session->userdata('user_id');
        if(empty($user_id)){
            redirect(base_url('login_ctrl'));
        }
    }

    public function staff(){
        if($this->input->method() == 'post'){
            $this->form_validation->set_rules('name','Staff Name','required');
            $this->form_validation->set_rules('email','Staff Email','required');
            $this->form_validation->set_rules('phone','Staff Phone','required');
            $this->form_validation->set_rules('dob','Staff Date Of Birth','required');
            $this->form_validation->set_rules('experience','Staff Experience','required');
            $this->form_validation->set_rules('payment','Staff Payment','required');
            $this->form_validation->set_rules('details','Staff Details','required');
            $this->form_validation->set_rules('join_date','Staff Join Date','required');
            if($this->form_validation->run() == false){
                echo "Something went wrong!!!";

            }else{
                $data['name'] = $this->input->post('name');
                $data['email'] = $this->input->post('email');
                $data['phone'] = $this->input->post('phone');
                $data['experience'] = $this->input->post('experience');
                $data['payment'] = $this->input->post('payment');
                $data['details'] = $this->input->post('details');
                $data['dob'] = $this->input->post('dob');
                $data['join_date'] = $this->input->post('join_date');
                $data['status'] = 1;
                $data['created_at'] = date('Y-m-d');
                $this->db->insert('staffs',$data);
                echo "true";
                
            }
        }else{
            $data['staffs'] = $this->CM->select_data('staffs','*',['status'=>1]);
            // $data['students'] = $this->CM->select_students();
            // $data['categories'] = $this->CM->select_data('categories','*',['status'=>1]);
            // $data['classes'] = $this->CM->select_data('classes','*',['status'=>1]);
            
                $this->load->view('layouts/header');
                $this->load->view('staff/index',$data);
                $this->load->view('layouts/footer');
        }
    }


    public function edit_staff($id){
        $data['staff'] = $this->CM->select_data('staffs','*',['id'=>$id]);
         $this->load->view('layouts/header');
         $this->load->view('staff/edit',$data);
         $this->load->view('layouts/footer');
     }


     public function update_staff($id){
        
        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['phone'] = $this->input->post('phone');
        $data['experience'] = $this->input->post('experience');
        $data['payment'] = $this->input->post('payment');
        $data['details'] = $this->input->post('details');
        $data['dob'] = $this->input->post('dob');
        $data['join_date'] = $this->input->post('join_date');
        $data['status'] = $this->input->post('status');
        $result = $this->CM->update_data('staffs',$data,['id'=>$id]);
        if($result){
            echo 1;
        }else{
            echo 0;
        }
    }


    public function delete_staff($id){
        $this->db->where('id',$id)->delete('staffs');
        redirect(base_url('staff_ctrl/staff'));
    }

















}


?>