<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Captcha extends CI_Controller {
  	public function __construct()  {
        parent:: __construct();
		$this->load->helper("url");
		$this->load->helper('form');
		$this->load->helper('captcha');
		$this->load->library('form_validation');
    }
	 public function index() {
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
    $this->form_validation->set_rules('dob', 'Date Of Birth', 'required');
    $this->form_validation->set_rules('about', 'About yourself', 'required');
    $this->form_validation->set_rules('userCaptcha', 'Captcha', 'required|callback_check_captcha');
    $userCaptcha = $this->input->post('userCaptcha');
	
	 if ($this->form_validation->run() == false){
      $random_number = substr(number_format(time() * rand(),0,'',''),0,6);
      $vals = array(
             'word' => $random_number,
             'img_path' => './captcha_images/',
             'img_url' => base_url().'captcha_images/',
             'img_width' => 140,
             'img_height' => 32,
             'expiration' => 7200
            );
      $data['captcha'] = create_captcha($vals);
      $this->session->set_userdata('captchaWord',$data['captcha']['word']);
      $this->load->view('captcha', $data);
    }else {
      echo 'Successfully Submitted';
    }
	}
	 
	 public function check_captcha($str){
    $word = $this->session->userdata('captchaWord');
    if(strcmp(strtoupper($str),strtoupper($word)) == 0){
      return true;
    }
    else{
      $this->form_validation->set_message('check_captcha', 'Please enter correct words!');
      return false;
    }
	}
}	