<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index(){
		$data = array(
            'action' => site_url('register/register_action'),
			'surname' => set_value('surname'),
			'first_name' => set_value('first_name'),
			'other_name' => set_value('other_name'),
			'dob' => set_value('dob'),
			'gender' => set_value('gender'),
			'marital_status' => set_value('marital_status'),
			'country_of_birth' => set_value('country_of_birth'),
			'nationality' => set_value('nationality'),
			'uwi_staff' => set_value('uwi_staff'),
			'uwi_dep_staff' => set_value('uwi_dep_staff'),
			'glomode_staff' => set_value('glomode_staff'),
			'glomode_dep_staff' => set_value('glomode_dep_staff'),
			'disability' => set_value('disability'),
			'permanent_address' => set_value('permanent_address'),
			'city' => set_value('city'),
			'country' => set_value('country'),
			'email' => set_value('email'),
			'phone1' => set_value('phone1'),
			'phone2' => set_value('phone2'),
			'username' => set_value('username'),
			'password' => set_value('password'),

			// dropdown values
			'countries' => $this->Countries_model->get_all(),
			'states'    => $this->States_model->get_all_orderby_capital(),


		);

		$data['title'] = "Applicant Registration";
		$this->load->view('users/registration_form', $data);
	}

    
    public function register_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
				'surname' => $this->input->post('surname',TRUE),
				'first_name' => $this->input->post('first_name',TRUE),
				'other_name' => $this->input->post('other_name',TRUE),
				'dob' => $this->input->post('dob',TRUE),
				'gender' => $this->input->post('gender',TRUE),
				'marital_status' => $this->input->post('marital_status',TRUE),
				'country_of_birth' => $this->input->post('country_of_birth',TRUE),
				'nationality' => $this->input->post('nationality',TRUE),
				'uwi_staff' => $this->input->post('uwi_staff',TRUE),
				'uwi_dep_staff' => $this->input->post('uwi_dep_staff',TRUE),
				'glomode_staff' => $this->input->post('glomode_staff',TRUE),
				'glomode_dep_staff' => $this->input->post('glomode_dep_staff',TRUE),
				'disability' => $this->input->post('disability',TRUE),
				'permanent_address' => $this->input->post('permanent_address',TRUE),
				'city' => $this->input->post('city',TRUE),
				'country' => $this->input->post('country',TRUE),
				'email' => $this->input->post('email',TRUE),
				'phone1' => $this->input->post('phone1',TRUE),
				'phone2' => $this->input->post('phone2',TRUE),
				'username' => $this->input->post('username',TRUE),
				'password' => $this->input->post('password',TRUE),
			);

			$username = $this->input->post('username',TRUE);

            $this->Users_model->insert($data);
            $this->session->set_flashdata('step1success', 'One last step to go!');
            redirect(site_url('register/security_questions/'.$username.''));
        }
	}
	
	public function security_questions($username = ''){
		if($username == ''){
			redirect(site_url('auth/login'));
		}else{
			$data = array(
				'action' => site_url('register/security_questions'),
				'sq1' => set_value('sq1'),
				'sq2' => set_value('sq2'),
				'sq3' => set_value('sq3'),
				'sqs' => $this->Security_question_model->get_all(),
			);
	
			$data['title'] = "Answer security questions";
			$this->load->view('users/securityquestion_form', $data);
		}
	}

	public function security_questions_action(){
		$this->_rules_sq();

        if ($this->form_validation->run() == FALSE) {
            $this->security_questions();
        } else {
            $data = array(
				'sq1' => $this->input->post('sq1',TRUE),
				'sq2' => $this->input->post('sq2',TRUE),
				'sq3' => $this->input->post('sq3',TRUE),
			);

            $this->Sq_answers_model->insert($data);
            $this->session->set_flashdata('sqsucess', 'Your registration was successful!');
            redirect(site_url('auth/login'));
        }
	}

	public function _rules() {
		$this->form_validation->set_rules('surname', 'surname', 'trim|required');
		$this->form_validation->set_rules('first_name', 'first name', 'trim|required');
		$this->form_validation->set_rules('other_name', 'other name', 'trim');
		$this->form_validation->set_rules('dob', 'dob', 'trim|required');
		$this->form_validation->set_rules('gender', 'gender', 'trim|required');
		$this->form_validation->set_rules('marital_status', 'marital status', 'trim|required');
		$this->form_validation->set_rules('country_of_birth', 'country of birth', 'trim|required');
		$this->form_validation->set_rules('nationality', 'nationality', 'trim|required');
		$this->form_validation->set_rules('uwi_staff', 'uwi staff', 'trim|required');
		$this->form_validation->set_rules('uwi_dep_staff', 'uwi dep staff', 'trim|required');
		$this->form_validation->set_rules('glomode_staff', 'glomode staff', 'trim|required');
		$this->form_validation->set_rules('glomode_dep_staff', 'glomode dep staff', 'trim|required');
		$this->form_validation->set_rules('disability', 'disability', 'trim|required');
		$this->form_validation->set_rules('permanent_address', 'permanent address', 'trim|required');
		$this->form_validation->set_rules('city', 'city', 'trim|required');
		$this->form_validation->set_rules('country', 'country', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('phone1', 'phone1', 'trim|required');
		$this->form_validation->set_rules('phone2', 'phone2', 'trim');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
	
	public function _rules_sq() {
		$this->form_validation->set_rules('sq1', 'Sequrity Question #1', 'trim|required');
		$this->form_validation->set_rules('sq2', 'Sequrity Question #2', 'trim|required');
		$this->form_validation->set_rules('sq3', 'Sequrity Question #3', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Register.php */




?>
