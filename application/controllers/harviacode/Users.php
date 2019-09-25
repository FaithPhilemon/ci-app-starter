<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'users/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'users/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'users/index.html';
            $config['first_url'] = base_url() . 'users/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Users_model->total_rows($q);
        $users = $this->Users_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'users_data' => $users,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('users/users_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Users_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'surname' => $row->surname,
		'first_name' => $row->first_name,
		'other_name' => $row->other_name,
		'dob' => $row->dob,
		'gender' => $row->gender,
		'marital_status' => $row->marital_status,
		'country_of_birth' => $row->country_of_birth,
		'nationality' => $row->nationality,
		'uwi_staff' => $row->uwi_staff,
		'uwi_dep_staff' => $row->uwi_dep_staff,
		'glomode_staff' => $row->glomode_staff,
		'glomode_dep_staff' => $row->glomode_dep_staff,
		'disability' => $row->disability,
		'permanent_address' => $row->permanent_address,
		'city' => $row->city,
		'country' => $row->country,
		'email' => $row->email,
		'phone1' => $row->phone1,
		'phone2' => $row->phone2,
		'username' => $row->username,
		'password' => $row->password,
	    );
            $this->load->view('users/users_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('users/create_action'),
			'id' => set_value('id'),
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
		);
        $this->load->view('users/users_form', $data);
    }
    
    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
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

            $this->Users_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('users'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('users/update_action'),
				'id' => set_value('id', $row->id),
				'surname' => set_value('surname', $row->surname),
				'first_name' => set_value('first_name', $row->first_name),
				'other_name' => set_value('other_name', $row->other_name),
				'dob' => set_value('dob', $row->dob),
				'gender' => set_value('gender', $row->gender),
				'marital_status' => set_value('marital_status', $row->marital_status),
				'country_of_birth' => set_value('country_of_birth', $row->country_of_birth),
				'nationality' => set_value('nationality', $row->nationality),
				'uwi_staff' => set_value('uwi_staff', $row->uwi_staff),
				'uwi_dep_staff' => set_value('uwi_dep_staff', $row->uwi_dep_staff),
				'glomode_staff' => set_value('glomode_staff', $row->glomode_staff),
				'glomode_dep_staff' => set_value('glomode_dep_staff', $row->glomode_dep_staff),
				'disability' => set_value('disability', $row->disability),
				'permanent_address' => set_value('permanent_address', $row->permanent_address),
				'city' => set_value('city', $row->city),
				'country' => set_value('country', $row->country),
				'email' => set_value('email', $row->email),
				'phone1' => set_value('phone1', $row->phone1),
				'phone2' => set_value('phone2', $row->phone2),
				'username' => set_value('username', $row->username),
				'password' => set_value('password', $row->password),
			);
            $this->load->view('users/users_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
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

            $this->Users_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('users'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $this->Users_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('users'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function _rules() {
		$this->form_validation->set_rules('surname', 'surname', 'trim|required');
		$this->form_validation->set_rules('first_name', 'first name', 'trim|required');
		$this->form_validation->set_rules('other_name', 'other name', 'trim|required');
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
		$this->form_validation->set_rules('phone2', 'phone2', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-04-08 13:30:09 */
/* http://harviacode.com */
