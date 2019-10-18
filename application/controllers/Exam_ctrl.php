<?php 
class Exam_ctrl extends CI_controller{
    public function __construct(){
        parent::__construct();
        $user_id = $this->session->userdata('user_id');
        if(empty($user_id)){
            redirect(base_url('login_ctrl'));
        }
    }

    public function exam(){
        if($this->input->method() == 'post'){
            $this->form_validation->set_rules('name','Exam Title','required');
            $this->form_validation->set_rules('start_date','Start Date','required');
            $this->form_validation->set_rules('category_id','Category','required');
            $this->form_validation->set_rules('class_id','Class','required');
            if($this->form_validation->run() == false){
                echo "Something went wrong!!!";

            }else{
                $data['name'] = $this->input->post('name');
                $data['start_date'] = $this->input->post('start_date');
                $data['category_id'] = $this->input->post('category_id');
                $data['class_id'] = $this->input->post('class_id');
                $this->db->insert('exams',$data);
                echo "true";
                
            }
        }else{
            $data['categories'] = $this->CM->select_data('categories','*',['status'=>1]);
            $data['classes'] = $this->CM->select_data('classes','*',['status'=>1]);
            $data['exams'] = $this->CM->select_exam();
            $data['page_title'] = "Add Exam";
            $this->load->view('layouts/header');
            $this->load->view('exam/index',$data);
            $this->load->view('layouts/footer');
        }
    }



    public function edit_exam($id){
        if($this->input->method() == 'post'){
            $this->form_validation->set_rules('name','Exam Title','required');
            $this->form_validation->set_rules('start_date','Start Date','required');
            $this->form_validation->set_rules('category_id','Category','required');
            $this->form_validation->set_rules('class_id','Class','required');
            if($this->form_validation->run() == false){
                echo "Something went wrong!!!";

            }else{
                $data['name'] = $this->input->post('name');
                $data['start_date'] = $this->input->post('start_date');
                $data['category_id'] = $this->input->post('category_id');
                $data['class_id'] = $this->input->post('class_id');
                $result = $this->db->where('id',$id)->update('exams',$data);
                if($result){
                    echo 1;
                }else{
                    echo 0;
                }
                
            }
        }else{
            $data['categories'] = $this->CM->select_data('categories','*',['status'=>1]);
            $data['classes'] = $this->CM->select_data('classes','*',['status'=>1]);
            $data['exam'] = $this->CM->select_data('exams','*',['id'=>$id]);
            $data['page_title'] = "Edit Exam";
            $this->load->view('layouts/header');
            $this->load->view('exam/edit',$data);
            $this->load->view('layouts/footer');
        }
    }

    public function delete_exam($id){
        $this->db->where('id',$id)->delete('exams');
        redirect(base_url('exam_ctrl/exam'));
    }

    public function time_table(){
        if($this->input->method() == 'post'){
            if(isset($_FILES['time_table_file']['name'])){
                $config['upload_path']="./assets/images";
                $config['allowed_types']='gif|jpg|png';
                $config['encrypt_name'] = TRUE;
                 
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload("time_table_file")){
                    echo $this->upload->display_errors();
                }else{
                    $data = array('upload_data' => $this->upload->data());
                    $result['exam_id']= $this->input->post('exam_id');
                    $result['time_table_file']= $data['upload_data']['file_name']; 
                    $output = $this->db->insert('time_tables',$result);
                    redirect(base_url('exam_ctrl/time_table'));
                }
                }
        }else{
            $data['exams'] = $this->CM->select_data('exams','*',['status'=>1]);
            $data['time_tables'] = $this->CM->select_time_tables('time_tables','*',['status' => 1]);
            $data['page_title'] = "Exam Time Table";
            $this->load->view('layouts/header');
            $this->load->view('exam/time_table',$data);
            $this->load->view('layouts/footer');
        }
        
    }

    public function edit_time_table($id){
        if($this->input->method() == 'post'){
            $this->form_validation->set_rules('exam_id','Exam','required');
            
            if($this->form_validation->run() == false){
                echo "Something went wrong!!!";
            }else{
                if(isset($_FILES['time_table_file']['name'])){
                    
                    $config['upload_path']="./assets/images";
                    $config['allowed_types']='gif|jpg|png';
                    $config['encrypt_name'] = TRUE;
                     
                    $this->load->library('upload',$config);
                    if(!$this->upload->do_upload("time_table_file")){
                        echo $this->upload->display_errors();
                    }else{
                        $data = array('upload_data' => $this->upload->data());
                        $result['exam_id']= $this->input->post('exam_id');
                        $result['time_table_file']= $data['upload_data']['file_name']; 
                        $old_data = $this->CM->select_data('time_tables','*',['id' => $id]);
                        if($old_data[0]['time_table_file']){
                            unlink("assets/images/".$old_data[0]['time_table_file']);
                        };
                        $output = $this->db->where('id',$id)->update('time_tables',$result);
                        redirect(base_url('exam_ctrl/time_table'));
                    }
                }else{
                    $result['exam_id']= $this->input->post('exam_id');
                    $output = $this->db->where('id',$id)->update('time_tables',$result);
                    // redirect(base_url('exam_ctrl/time_table'));
                    echo 'test';;
                }
                
            }
        }
        $data['page_title'] = "Edit Exam";
        $data['time_table'] = $this->CM->select_data('time_tables','*',['id' => $id]);
        $data['exams'] = $this->CM->select_data('exams','*',['status'=>1]);
        $this->load->view('layouts/header');
        $this->load->view('exam/edit_time_table',$data);
        $this->load->view('layouts/footer');

    }

    public function delete_time_table($id){
        $old_data = $this->CM->select_data('time_tables','*',['id' => $id]);
        unlink("assets/images/".$old_data[0]['time_table_file']);
        $this->db->where('id',$id)->delete('time_tables');
        redirect(base_url('exam_ctrl/time_table'));
    }


}


?>
