<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gitauths extends CI_Controller {
	function __construct(){
		parent::__construct();
		
		//your config here:
		$code = 0;

		//get response code from github callback
		if(isset($_GET['code'])){
		    $code = $_GET['code'];
		}
		$config = array('app_name' => '', //your application name
		                'client_id' => '', //change to your application client id
		                'client_secreet' => '', //change to your application client secreet
		                'redirect_to' => '/', //redirect to response page after callback
		                'scope' => '', //set scope aplication
		                'code' => $code //this automaticaly fill after authorize from github
		            );

		$this->load->library('gitauth', $config);

	}

	public function index()
	{
		$this->load->view('gitauth');
	}

	public function authorize(){
		
		redirect($this->gitauth->git_authorize_url()); 
	}
}
