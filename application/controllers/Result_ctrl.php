<?php 
class Result_ctrl extends CI_controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Common_model');
        $user_id = $this->session->userdata('user_id');
        if(empty($user_id)){
            redirect(base_url('login_ctrl'));
        }
    }

    public function result(){
        if($this->input->method() == 'post'){
            $this->form_validation->set_rules('student_id','Select Studetn','required');
            $this->form_validation->set_rules('exam_id','Select Exam','required');
            $this->form_validation->set_rules('grade','Grade Point','required');
            if($this->form_validation->run() == false){
                echo "Something went wrong!!!";

            }else{
                $data['student_id'] = $this->input->post('student_id');
                $data['exam_id'] = $this->input->post('exam_id');
                $data['grade'] = $this->input->post('grade');
                $this->db->insert('results',$data);
                echo "true";
            }
        }
        $data['classes'] = $this->CM->select_data('classes','*',['status' => 1]);
        $data['exams'] = $this->CM->select_data('exams','*',['status' => 1]);
        $data['results'] = $this->CM->select_results('results','*');
        $this->load->view('layouts/header');
            $this->load->view('result/index',$data);
            $this->load->view('layouts/footer');
    }

    public function get_students($id){
        // $data['students'] = $this->CM->select_data('students','*',['class_id' => $id]);
        $data['students'] = $this->db->where('class_id',$id)->get('students')->result_array();
        $data['exams'] = $this->db->where('class_id',$id)->get('exams')->result_array();
        echo json_encode($data);
    }


    public function edit_result($id){
        if($this->input->method() == 'post'){
            $this->form_validation->set_rules('student_id','Select Studetn','required');
            $this->form_validation->set_rules('exam_id','Select Exam','required');
            $this->form_validation->set_rules('grade','Grade Point','required');
            if($this->form_validation->run() == false){
                echo "Something went wrong!!!";

            }else{
                $data['student_id'] = $this->input->post('student_id');
                $data['exam_id'] = $this->input->post('exam_id');
                $data['grade'] = $this->input->post('grade');
                $data['status'] = $this->input->post('status');
                $result = $this->db->where('id',$id)->update('results',$data);
                if($result){
                    echo 1;
                }else{
                    echo 0;
                }
                
            }
        }else{
            $data['result'] = $this->CM->select_data('results','*',['id'=>$id]);
            $data['students'] = $this->CM->select_data('students','*');
            $data['exams'] = $this->CM->select_data('exams','*');
            $data['page_title'] = "Edit Result";
            $this->load->view('layouts/header');
            $this->load->view('result/edit',$data);
            $this->load->view('layouts/footer');
        }
    }



    public function delete_result($id){
        $this->db->where('id',$id)->delete('results');
        redirect(base_url('result_ctrl/result'));
    }

}