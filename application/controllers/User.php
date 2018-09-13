<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		echo 'Login form';
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */