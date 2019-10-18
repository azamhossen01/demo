<?php 
class Attendence_ctrl extends CI_controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Common_model');
        $user_id = $this->session->userdata('user_id');
        if(empty($user_id)){
            redirect(base_url('login_ctrl'));
        }
    }


    public function attendence($id = null){
        if($this->input->method() == 'post'){
            $this->form_validation->set_rules('status','Status','required');
            $this->form_validation->set_rules('date','Date','required');
            $this->form_validation->set_rules('remark','Remark','required');
            $this->form_validation->set_rules('student_id','Student ID not found','required');
            if($this->form_validation->run() == false){
                echo 'Something wrong! Please try again!!!';
            }else{
                $data['status'] = $this->input->post('status');
                $data['date'] = $this->input->post('date');
                $data['remark'] = $this->input->post('remark');
                $data['student_id'] = $this->input->post('student_id');
                $this->db->insert('attendences',$data);
                // $this->Common_model->category_store($data);
                echo "true";
            }
        }else{
            $data['classes'] = $this->CM->select_data("classes","*");
            $this->load->view('layouts/header');
            $this->load->view('attendence/index',$data);
            $this->load->view('layouts/footer');
        }
        
    }

    public function class_students($id){
        $data['students'] = $this->db->where('class_id',$id)->get('students')->result_array();
        // $data['attendences'] = $this->CM->select_data('attendences','*',['student_id'=>$id]);
        // $data['attendences'] = "";
        // foreach($data['students'] as $student){
        //     $all_attendence[] = $this->db->select('*')->where('student_id',$student['id'])->get('attendences')->result_array();
        //     $all_present[] = $this->db->select()->where(['student_id' => 1 ,'status'=>'present'])->get('attendences')->result_array();
        // }
        // $data['total_attendence'] = count($all_attendence);
        // $data['total_present'] = count($all_present);
        $this->load->view('layouts/header');
        $this->load->view('attendence/all_students',$data);
        $this->load->view('layouts/footer');
    }


    public function show_student($id){
        // $data['attendences'] = $this->CM->select_data('attendences','*',['student_id',$id],'id','desc');
        $data['attendences'] = $this->db->select('*')->where('student_id',$id)->get('attendences')->result_array();
        
        $data['student'] = $this->CM->select_data('students','*',['id'=>$id]);
        $this->load->view('layouts/header');
        $this->load->view('attendence/show_student',$data);
        $this->load->view('layouts/footer');
    }

    public function edit_attendence($id){
        // $data['attendence'] = $this->CM->select_data('attendences','*',['id',$id]);
        $data['attendence'] = $this->db->where('id',$id)->get('attendences')->row_array();
        $this->load->view('layouts/header');
        $this->load->view('attendence/edit',$data);
        $this->load->view('layouts/footer');
    }

    public function update_attendence($id){
        $data['date'] = $this->input->post('date');
        $data['status'] = $this->input->post('status');
        $data['remark'] = $this->input->post('remark');
        $result = $this->CM->update_data('attendences',$data,['id' => $id]);
        if($result){
            echo 1;
        }else{
            echo 0;
        }
    }
}


?>