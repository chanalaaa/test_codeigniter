<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_student extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('student');
        $this->load->helper('url');
	}
    

	public function index()
	{
		$data['student_all'] = $this->student->get_all_student();
		if(isset($_POST['update_form'])){

			header('Content-Type: application/json');
			$json = array();
				if (isset($_POST['id'])) {
				$data['student_selc'] = $this->student->get_student_by_id($_POST['id']);

				//$json['name']=$data['student_selc'][0]->name;
				$json = array(
					"id" => $data['student_selc'][0]->id,
					"name" => $data['student_selc'][0]->name,
					"lastname" => $data['student_selc'][0]->lastname,
					"class" => $data['student_selc'][0]->class,
				);
				echo json_encode($json);

				}
		}else if(isset($_POST['student_update'])){
			foreach ($_POST as $key => $value) {
				$stu_info_update[$key] = $value;
			}
			array_pop($stu_info_update);
			//print_r($stu_info_update);
			$this->student->update_student($stu_info_update);
			 redirect('/update_student');


		}else{
				
				$this->load->view('update',$data);
			}
	}

}