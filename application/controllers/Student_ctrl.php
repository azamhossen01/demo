<?php 
class Student_ctrl extends CI_controller{
    public function __construct(){
        parent::__construct();
        $user_id = $this->session->userdata('user_id');
        if(empty($user_id)){
            redirect(base_url('login_ctrl'));
        }
    }

    public function student(){
        if($this->input->method() == 'post'){
            $this->form_validation->set_rules('name','Student Name','required');
            $this->form_validation->set_rules('email','Student Email','required');
            $this->form_validation->set_rules('phone','Student Phone','required');
            $this->form_validation->set_rules('category_id','Student Category','required');
            $this->form_validation->set_rules('class_id','Student Class','required');
            $this->form_validation->set_rules('dob','Student Date Of Birth','required');
            $this->form_validation->set_rules('join_date','Student Join Date','required');
            if($this->form_validation->run() == false){
                echo "Something went wrong!!!";

            }else{
                $data['name'] = $this->input->post('name');
                $data['email'] = $this->input->post('email');
                $data['phone'] = $this->input->post('phone');
                $data['category_id'] = $this->input->post('category_id');
                $data['class_id'] = $this->input->post('class_id');
                $data['dob'] = $this->input->post('dob');
                $data['join_date'] = $this->input->post('join_date');
                $data['status'] = 1;
                $data['created_at'] = date('Y-m-d');
                $this->db->insert('students',$data);
                echo "true";
                
            }
        }else{
            // $data['students'] = $this->CM->select_data('students','*',['status'=>1]);
            $data['students'] = $this->CM->select_students();
            $data['categories'] = $this->CM->select_data('categories','*',['status'=>1]);
            $data['classes'] = $this->CM->select_data('classes','*',['status'=>1]);
            
                $this->load->view('layouts/header');
                $this->load->view('student/index',$data);
                $this->load->view('layouts/footer');
        }
    }

    public function edit_student($id){
       $data['student'] = $this->CM->select_data('students','*',['id'=>$id]);
       $data['categories'] = $this->CM->select_data('categories','*',['status'=>1]);
       $data['classes'] = $this->CM->select_data('classes','*',['status'=>1]);
        $this->load->view('layouts/header');
        $this->load->view('student/edit',$data);
        $this->load->view('layouts/footer');
    }

    public function update_student($id){
        
        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['phone'] = $this->input->post('phone');
        $data['category_id'] = $this->input->post('category_id');
        $data['class_id'] = $this->input->post('class_id');
        $data['dob'] = $this->input->post('dob');
        $data['join_date'] = $this->input->post('join_date');
        $data['status'] = $this->input->post('status');
        $result = $this->CM->update_data('students',$data,['id'=>$id]);
        if($result){
            echo 1;
        }else{
            echo 0;
        }
    }


    public function delete_student($id){
        $this->db->where('id',$id)->delete('students');
        redirect(base_url('student_ctrl/student'));
    }


}


?>