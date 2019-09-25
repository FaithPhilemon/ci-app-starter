<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	function __construct(){
		parent::__construct();
		
		$this->not_logged_in();
	}

	public function index(){
		// get weekly pay status
		if($this->week_payment_status($this->session->userdata('username'), 'w') >= 7){

			// Payment is due, clear account back to zero
			$data = array(
				'tamount' => 0
			);

			$this->Affiliateuser_model->update($this->session->userdata('id'), $data);
		}

		// get user info
		$user = $this->Affiliateuser_model->get_by_id($this->session->userdata('id'));
		$data['earnings'] = $user->tamount;
		$data['username'] = $user->username;
		$data['num_downlines'] = $this->get_num_downlines($this->session->userdata('username'));
		$numdl = $this->get_num_downlines($this->session->userdata('username'));
		$data['level_status'] = $this->level_status($this->session->userdata('username'), $numdl);
		$data['level'] = $this->Affiliateuser_model->get_level_byid($user->level);
		$data['package'] = $this->Packages_model->get_by_id($user->package);
		$package = $this->Packages_model->get_by_id($user->package);
		$data['progressbar_value'] = $this->progressbar_value($user->tamount, $package->min_withdraw);
		$data['fullname'] = $user->fname;
		$data['days_from_lastpay'] = $this->week_payment_status($this->session->userdata('username'), 'w');
		$data['title'] = "Dashboard";
		$data['main_content'] = 'dashboard/dashboard_view';
		$this->load->view('layouts/mainview', $data);
	}


	public function read($id) {
		$row = $this->Affiliateuser_model->get_by_id($id);
		
		if ($row) {
			$data = array(
			'Id' => $row->Id,
			'username' => $row->username,
			'password' => $row->password,
			'fname' => $row->fname,
			'address' => $row->address,
			'dob' => $row->dob,
			'state' => $row->state,
			'lga' => $row->lga,
			'shirt_size' => $row->shirt_size,
			'email' => $row->email,
			'level' => $row->level,
			'referedby' => $row->referedby,
			'package' => $row->package,
			'ipaddress' => $row->ipaddress,
			'mobile' => $row->mobile,
			'active' => $row->active,
			'doj' => $row->doj,
			'country' => $row->country,
			'tamount' => $row->tamount,
			'signupcode' => $row->signupcode,
			'access_control' => $row->access_control,
			'launch' => $row->launch,
			'bankname' => $row->bankname,
			'bankcode' => $row->bankcode,
			'accountname' => $row->accountname,
			'accountno' => $row->accountno,
			'accounttype' => $row->accounttype,
			);
			$this->load->view('affiliateuser/affiliateuser_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('affiliateuser'));
		}
	}

	
	public function update($id) {
		$row = $this->Affiliateuser_model->get_by_id($id);

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('affiliateuser/update_action'),
				'Id' => set_value('Id', $row->Id),
				'username' => set_value('username', $row->username),
				'password' => set_value('password', $row->password),
				'fname' => set_value('fname', $row->fname),
				'address' => set_value('address', $row->address),
				'dob' => set_value('dob', $row->dob),
				'state' => set_value('state', $row->state),
				'lga' => set_value('lga', $row->lga),
				'shirt_size' => set_value('shirt_size', $row->shirt_size),
				'email' => set_value('email', $row->email),
				'level' => set_value('level', $row->level),
				'referedby' => set_value('referedby', $row->referedby),
				'package' => set_value('package', $row->package),
				'ipaddress' => set_value('ipaddress', $row->ipaddress),
				'mobile' => set_value('mobile', $row->mobile),
				'active' => set_value('active', $row->active),
				'doj' => set_value('doj', $row->doj),
				'country' => set_value('country', $row->country),
				'tamount' => set_value('tamount', $row->tamount),
				'signupcode' => set_value('signupcode', $row->signupcode),
				'access_control' => set_value('access_control', $row->access_control),
				'launch' => set_value('launch', $row->launch),
				'bankname' => set_value('bankname', $row->bankname),
				'bankcode' => set_value('bankcode', $row->bankcode),
				'accountname' => set_value('accountname', $row->accountname),
				'accountno' => set_value('accountno', $row->accountno),
				'accounttype' => set_value('accounttype', $row->accounttype),
				);
			$this->load->view('affiliateuser/affiliateuser_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('affiliateuser'));
		}
	}
	
	public function update_action() {
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('username', TRUE));
		} else {
			$data = array(
		'Id' => $this->input->post('Id',TRUE),
		'password' => $this->input->post('password',TRUE),
		'fname' => $this->input->post('fname',TRUE),
		'address' => $this->input->post('address',TRUE),
		'dob' => $this->input->post('dob',TRUE),
		'state' => $this->input->post('state',TRUE),
		'lga' => $this->input->post('lga',TRUE),
		'shirt_size' => $this->input->post('shirt_size',TRUE),
		'email' => $this->input->post('email',TRUE),
		'level' => $this->input->post('level',TRUE),
		'referedby' => $this->input->post('referedby',TRUE),
		'package' => $this->input->post('package',TRUE),
		'ipaddress' => $this->input->post('ipaddress',TRUE),
		'mobile' => $this->input->post('mobile',TRUE),
		'active' => $this->input->post('active',TRUE),
		'doj' => $this->input->post('doj',TRUE),
		'country' => $this->input->post('country',TRUE),
		'tamount' => $this->input->post('tamount',TRUE),
		'signupcode' => $this->input->post('signupcode',TRUE),
		'access_control' => $this->input->post('access_control',TRUE),
		'launch' => $this->input->post('launch',TRUE),
		'bankname' => $this->input->post('bankname',TRUE),
		'bankcode' => $this->input->post('bankcode',TRUE),
		'accountname' => $this->input->post('accountname',TRUE),
		'accountno' => $this->input->post('accountno',TRUE),
		'accounttype' => $this->input->post('accounttype',TRUE),
		);

			$this->Affiliateuser_model->update($this->input->post('username', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('affiliateuser'));
		}
	}
	
	public function delete($id) {
		$row = $this->Affiliateuser_model->get_by_id($id);

		if ($row) {
			$this->Affiliateuser_model->delete($id);
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('affiliateuser'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('affiliateuser'));
		}
	}

	public function _rules() {
		$this->form_validation->set_rules('Id', 'id', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_rules('fname', 'fname', 'trim|required');
		$this->form_validation->set_rules('address', 'address', 'trim|required');
		$this->form_validation->set_rules('dob', 'dob', 'trim|required');
		$this->form_validation->set_rules('state', 'state', 'trim|required');
		$this->form_validation->set_rules('lga', 'lga', 'trim|required');
		$this->form_validation->set_rules('shirt_size', 'shirt size', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('level', 'level', 'trim|required');
		$this->form_validation->set_rules('referedby', 'referedby', 'trim|required');
		$this->form_validation->set_rules('package', 'package', 'trim|required');
		$this->form_validation->set_rules('ipaddress', 'ipaddress', 'trim|required');
		$this->form_validation->set_rules('mobile', 'mobile', 'trim|required');
		$this->form_validation->set_rules('active', 'active', 'trim|required');
		$this->form_validation->set_rules('doj', 'doj', 'trim|required');
		$this->form_validation->set_rules('country', 'country', 'trim|required');
		$this->form_validation->set_rules('tamount', 'tamount', 'trim|required|numeric');
		$this->form_validation->set_rules('signupcode', 'signupcode', 'trim|required');
		$this->form_validation->set_rules('access_control', 'access control', 'trim|required');
		$this->form_validation->set_rules('launch', 'launch', 'trim|required');
		$this->form_validation->set_rules('bankname', 'bankname', 'trim|required');
		$this->form_validation->set_rules('bankcode', 'bankcode', 'trim|required');
		$this->form_validation->set_rules('accountname', 'accountname', 'trim|required');
		$this->form_validation->set_rules('accountno', 'accountno', 'trim|required');
		$this->form_validation->set_rules('accounttype', 'accounttype', 'trim|required');

		$this->form_validation->set_rules('username', 'username', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

}

/* End of file Dashboard.php */


?>
