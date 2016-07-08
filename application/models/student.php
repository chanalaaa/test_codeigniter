<?php
class Student extends CI_Model {

        public $title;
        public $content;
        public $date;

        public function __construct()
        {
                parent::__construct();
                $this->load->database();
        }
        public function get_all_student()
        {
                //$query = $this->db->query("SELECT name FROM student WHERE id='".$id."'");
                $this->db->select();
                $query = $this->db->get_where('student');
                return $query->result();  
        }
        public function get_student_by_id($id)
        {
                //$query = $this->db->query("SELECT name FROM student WHERE id='".$id."'");
                $this->db->select();
                $query = $this->db->get_where('student', array('id' => $id));
                return $query->result();  
        }
        public function insert_student($stu_info)
        {

                $this->db->insert('student', $stu_info);
        }
        public function delete_student($stu_info)
        {
                if($stu_info['id'] == ""){
                        $this->db->where('name', $stu_info['name']);    
                }else{
                        $this->db->where('id', $stu_info['id']);
                }

                $this->db->delete('student');
        }
        public function update_student($stu_info)
        {
                $this->db->where('id', $stu_info['id']);
                $this->db->update('student', $stu_info);
        }

}
?>