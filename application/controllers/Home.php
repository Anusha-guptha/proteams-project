<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
		$this->load->model("Base_model");
	}
	public function index()
	{
		$this->load->view('home');
	}

	public function register(){
		
		if(!empty($this->input->post())){
			$post_data=$this->input->post();
			$password = $this->encryption->encrypt($post_data['password']);
			// $post_data['password'] = $password;
			// var_dump($password );exit();
			// exit();

			$data = array(
				'email' => $post_data['email'],
				'password' => $password,
				'location'=> $post_data['location'],
				'dob'=> $post_data['dob'],
			);
			
			$this->Base_model->store_data($data);
			$this->session->set_flashdata('success', 'Registration successful!');
			redirect('/login');
		}

		$data['locations']=$this->Base_model->get_locations();

		$this->load->view('registration_form',$data);
	}

	public function check_login(){
		$request = json_decode(file_get_contents('php://input'), true); 
		$response=[];

		$email=$request['email'];
		$res=$this->Base_model->check_login($email);
		
		if(!$res){
			$response['exists'] = true;
		}

		print_r(json_encode($response));	
	}

	public function login(){

		if(!empty($this->input->post())){
			$logindata = $this->input->post();
			$res=$this->Base_model->password_match($logindata['email'],$logindata['password']);

			$decrypted_password = $this->encryption->decrypt($res['password']);

			if($logindata['password'] == $decrypted_password){

				$newdata = array(
					'email' => $logindata['email'],
				  );
				$this->session->set_userdata($newdata);
				redirect('/');
			}else{
				$this->session->set_flashdata('danger', 'Incorrect Password');
				redirect('/login');
			}
			// print_r($decrypted_password);exit();

		}

		$this->load->view('login');
	}

	public function profile_upload(){

		

		if(isset($_FILES['file']) && $_FILES['file']['error'] == 0){

			$file_name = $_FILES['file']['name'];  
			
            $file_tmp = $_FILES['file']['tmp_name'];  
            $upload_path = './uploads/';

			

			if(!is_dir($upload_path)){
				mkdir($upload_path, 0755, true);  
        	} 

			if(move_uploaded_file($file_tmp, $upload_path . $file_name)){
				$full_file_path = base_url().$upload_path .$file_name;
				$email=$this->session->email;
				$res=$this->Base_model->profile_upload($email,$full_file_path);
				echo json_encode(['status' => 'success', 'message' => 'File uploaded successfully!']);  
			}else{
				echo json_encode(['status' => 'error', 'message' => 'Failed to move uploaded file.']);  
			}


		}


	}
}
