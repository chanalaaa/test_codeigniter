<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('student');
        $this->load->helper('url');
	}
    

	public function index()
	{
		$data['hello'] = "hi, ";
		$data['student_all'] = $this->student->get_all_student();
		$stu_info = array();

		if (isset($_POST['student_add'])) {
			foreach ($_POST as $key => $value) {
				$stu_info[$key] = $value;
			}
			array_pop($stu_info);
			$this->student->insert_student($stu_info);
			//$this->student->insert_student($_POST);
			 redirect('/');
		}else if (isset($_POST['student_del'])) {

			$this->student->delete_student($_POST);
		}	
		else if(isset($_POST['student_get'])){
				$data['student_info'] = $this->student->get_student_by_id($_POST['id']);
				print_r($data['student_info']);
				if(isset($data['student_info'][0]->name)){}
					else{
						$data['student_info'] = array();
						$data['student_info'][0]= new StdClass;
						$data['student_info'][0]->name="you";
					}
		}else{
				$data['student_info'] = array();
				$data['student_info'][0]= new StdClass;
				$data['student_info'][0]->name="you";
				$this->load->view('index',$data);
			}

		

	}
}
