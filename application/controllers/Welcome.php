<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Netcarver\Textile;

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->add_package_path(APPPATH.'third_party/ion_auth/');
		$this->load->library(array('ion_auth', 'form_validation'));
		$this->load->helper(array('url', 'language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');

		$this->ion_auth->login('admin@admin.com', 'password');

		if ($this->ion_auth->logged_in() == false) {
			redirect('user/login');
		}
	}
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
		$data = array('subview' => 'homepage');
		$this->load->view('layouts/layout', $data);

		/*$parser = new Textile\Parser();

		$string = 'h1. Welcome' . PHP_EOL . PHP_EOL;
		$string .= '* List item' . PHP_EOL;
		$string .= '* Another list item' . PHP_EOL;

		echo $parser->TextileThis($string);*/
	}
}
