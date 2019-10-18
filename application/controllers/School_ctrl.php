<?php 
class School_ctrl extends CI_controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Common_model');
        $user_id = $this->session->userdata('user_id');
        if(empty($user_id)){
            redirect(base_url('login_ctrl'));
        }
    }

    public function category(){
        
        if($this->input->method() == 'post'){
            $this->form_validation->set_rules('name','Category name','required');
            if($this->form_validation->run() == false){
                echo 'Something wrong! Please try again!!!';
            }else{
                $data['name'] = $this->input->post('name');
                $data['status'] =  1;
                $data['created_at'] =  date('Y-m-d');
                $this->db->insert('categories',$data);
                // $this->Common_model->category_store($data);
                echo "true";
            }
        }else{
            $data['categories'] = $this->CM->select_data("categories","*");
            $this->load->view('layouts/header');
            $this->load->view('category/index',$data);
            $this->load->view('layouts/footer');
        }
        
    }

    public function delete_category($id){
        $this->db->where('id',$id)->delete('categories');
        redirect(base_url('school_ctrl/category'));
    }

    public function edit_category($id){
        $data['category'] = $this->CM->select_data('categories','*',['id'=>$id]);
        $this->load->view('layouts/header');
            $this->load->view('category/edit',$data);
            $this->load->view('layouts/footer');
    }

    public function update_category($id){
        $data['name'] = $this->input->post('name');
        $data['status'] = $this->input->post('status');
        // echo json_encode($data);
      $result =  $this->CM->update_data('categories',$data,['id' => $id]);
      if($result){
        echo 1;
      }else{
          echo 0;
      }
    }


    public function class(){
        if($this->input->method() == 'post'){
            $this->form_validation->set_rules('name','Class name','required');
            $this->form_validation->set_rules('category_id','Category','required');
            if($this->form_validation->run() == false){
                echo 'Something wrong! Please try again!!!';
            }else{
                $data['name'] = $this->input->post('name');
                $data['category_id'] = $this->input->post('category_id');
                $data['status'] =  1;
                $data['created_at'] =  date('Y-m-d');
                $this->db->insert('classes',$data);
                // $this->Common_model->category_store($data);
                echo "true";
            }
        }else{
            $data['categories'] = $this->CM->select_data("categories","*",['status'=>1]);
            // $data['classes'] = $this->CM->select_data("classes","*");
            $data['classes'] = $this->CM->select_classes();
            $this->load->view('layouts/header');
            $this->load->view('class/index',$data);
            $this->load->view('layouts/footer');
        }
    }


    public function delete_class($id){
        $this->db->where('id',$id)->delete('classes');
        redirect(base_url('school_ctrl/class'));
    }

    public function edit_class($id){
        $data['class'] = $this->CM->select_data('classes','*',['id'=>$id]);
        $data['categories'] = $this->CM->select_data("categories","*",['status'=>1]);
        $this->load->view('layouts/header');
            $this->load->view('class/edit',$data);
            $this->load->view('layouts/footer');
    }

    public function update_class($id){
        $data['name'] = $this->input->post('name');
        $data['status'] = $this->input->post('status');
        $data['category_id'] = $this->input->post('category_id');
        $result = $this->CM->update_data('classes',$data,['id'=>$id]);
        if($result){
            echo 1;
          }else{
              echo 0;
          }
    }

    public function course(){
        if($this->input->method() == 'post'){

            // echo $this->input->post('name');
            $this->form_validation->set_rules('name','Course Name','required');
            $this->form_validation->set_rules('duration','Course Duration','required');
            $this->form_validation->set_rules('fees','Course Fees','required');
            $this->form_validation->set_rules('start_at','Course Start Time','required');
            if($this->form_validation->run() == false){
                echo "Something went wrong!!!";
            }else{
                $data['name'] = $this->input->post('name');
                $data['duration'] = $this->input->post('duration');
                $data['fees'] = $this->input->post('fees');
                $data['start_at'] = $this->input->post('start_at');
                $data['status'] = 1;
                $data['created_at'] = date('Y-m-d');
                $this->db->insert('courses',$data);
                echo "true";
            }
        }else{
            $data['courses'] = $this->CM->select_data('courses','*',['status'=>1]);
            $this->load->view('layouts/header');
            $this->load->view('course/index',$data);
            $this->load->view('layouts/footer');
        }
        
    }

    public function edit_course($id){
        $data['course'] = $this->CM->select_data('courses','*',['id'=>$id]);
        $this->load->view('layouts/header');
            $this->load->view('course/edit',$data);
            $this->load->view('layouts/footer');
    }

    public function update_course($id){
        $data['name'] = $this->input->post('name');
        $data['duration'] = $this->input->post('duration');
        $data['fees'] = $this->input->post('fees');
        $data['start_at'] = $this->input->post('start_at');
        $data['status'] = $this->input->post('status');
        $result = $this->CM->update_data('courses',$data,['id'=>$id]);
        if($result){
            echo 1;
          }else{
              echo 0;
          }
    }


    public function delete_course($id){
        $this->db->where('id',$id)->delete('courses');
        redirect(base_url('school_ctrl/course'));
    }
}

?>