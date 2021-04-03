<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
		$this->load->view('temp/header');
		$this->load->view('welcome_message');
		$this->load->view('temp/footer');
	}

	public function upload() {
		$count = count($_FILES['file']['name']);
		$data = [];
		for ($i = 0; $i < $count; $i++) {

			$_FILES['f']['name'] = $_FILES['file']['name'][$i];
			$_FILES['f']['type'] = $_FILES['file']['type'][$i];
			$_FILES['f']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
			$_FILES['f']['error'] = $_FILES['file']['error'][$i];
			$_FILES['f']['size'] = $_FILES['file']['size'][$i];
			
			$config['upload_path'] = './files/img/'; 
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size']             = 1000;
            $config['max_width']            = 10240;
            $config['max_height']           = 7680;
			
			$this->load->library('upload',$config); 
			
			$this->upload->do_upload('f');
			$data[$i]['name'] = $_FILES['f']['name'];
			
		}

		echo json_encode($data);
	
	}
}
