<?php 
class Common_model extends CI_model{
    public function __construct(){
        parent::__construct();
    }

    // public function category_store($data){
    //     return $result = $this->db->insert('categories',$data);
    // }

    public function select_data($table,$field,$where= null,$order_field=null,$orderby=null){
       
        if($where){
            $this->db->where($where);
        }
        if($order_field && $orderby){
            $this->db->order_by($order_field,$orderby);
        }
        $this->db->select($field);
        $this->db->from($table);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function update_data($table,$data,$where){
      $this->db->where($where);
      return $this->db->update($table,$data);

    }

    public function select_classes(){
        $this->db->select('cal.name as cal_name, cat.name as cat_name,cal.status cal_status,cal.id cal_id', false);
        // $this->db->select('*');
        $this->db->from('classes cal');
        // $this->db->join("categories","categories.id = classes.category_id");
        $this->db->join('categories cat', 'cat.id = cal.category_id');
        return $result = $this->db->get()->result_array();
    }

    public function select_students(){
        $this->db->select('cat.name as cat_name,cal.name as cal_name, std.id as id,std.name as name,std.email as email, std.phone as phone, std.dob as dob, std.join_date as join_date, std.status as status, std.created_at as created_at');
        $this->db->from('students std');
        $this->db->join('categories cat','cat.id = std.category_id');
        $this->db->join('classes cal','cal.id = std.class_id');
        return $result = $this->db->get()->result_array();
    }

    public function select_exam(){
        $this->db->select('cat.name as cat_name,cat.id as cat_id,cal.name as cal_name,cal.id as cal_id,exam.*');
        $this->db->from('exams exam');
        $this->db->join('categories cat','cat.id = exam.category_id');
        $this->db->join('classes cal','cal.id = exam.class_id');
       return $this->db->get()->result_array();
    }

    // function save_upload($title,$image){
    //     $data = array(
    //             'exam_id'     => $title,
    //             'time_table_file' => $image
    //         );  
    //     $result= $this->db->insert('time_tables',$data);
    //     return $result;
    // }

    public function select_time_tables($table,$field,$where=null){
        $this->db->select('exam.name as exam_name,tt.*');
        $this->db->from('time_tables as tt');
        $this->db->join('exams as exam','exam.id = tt.exam_id');
    return    $this->db->get()->result_array();
    }

    public function select_results(){
        $this->db->select('cal.name as cal_name,stdnt.id as student_id,stdnt.name as student_name, exa.id as exam_id, exa.name as exam_name, rslt.*');
        $this->db->from('results as rslt');
        $this->db->join('students as stdnt','stdnt.id = rslt.student_id');
        $this->db->join('exams as exa','exa.id = rslt.exam_id');
        $this->db->join('classes as cal','cal.id = stdnt.class_id');
    return    $this->db->get()->result_array();
    }


}


?>