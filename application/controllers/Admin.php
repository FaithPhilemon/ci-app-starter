<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Admin_Controller {

	function __construct(){
		parent::__construct();
		
		$this->admin_not_logged_in();
	}

	public function index(){
		$adminuser = $this->Adminuser_model->get_by_id($this->session->userdata('admin_id'));

		$data['username'] = $adminuser->username;
		$data['title'] = "Admin dashboard";
		$data['main_content'] = 'admin/dashboard_view';
		$this->load->view('layouts/mainview_admin', $data);
	}

	
	
}

/* End of file Admin.php */


?>
