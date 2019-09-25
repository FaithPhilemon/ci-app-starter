<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile_undergraduate extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_undergraduate_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'profile_undergraduate/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'profile_undergraduate/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'profile_undergraduate/index.html';
            $config['first_url'] = base_url() . 'profile_undergraduate/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Profile_undergraduate_model->total_rows($q);
        $profile_undergraduate = $this->Profile_undergraduate_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'profile_undergraduate_data' => $profile_undergraduate,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('profile_undergraduate/profile_undergraduate_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Profile_undergraduate_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'university_id' => $row->university_id,
		'campus_address' => $row->campus_address,
		'campus_state_id' => $row->campus_state_id,
		'date_of_grad' => $row->date_of_grad,
		'program_of_study' => $row->program_of_study,
		'present_level' => $row->present_level,
		'enrollment_status' => $row->enrollment_status,
		'cgpa' => $row->cgpa,
	    );
            $this->load->view('profile_undergraduate/profile_undergraduate_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profile_undergraduate'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('profile_undergraduate/create_action'),
	    'id' => set_value('id'),
	    'university_id' => set_value('university_id'),
	    'campus_address' => set_value('campus_address'),
	    'campus_state_id' => set_value('campus_state_id'),
	    'date_of_grad' => set_value('date_of_grad'),
	    'program_of_study' => set_value('program_of_study'),
	    'present_level' => set_value('present_level'),
	    'enrollment_status' => set_value('enrollment_status'),
	    'cgpa' => set_value('cgpa'),
	);
        $this->load->view('profile_undergraduate/profile_undergraduate_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'university_id' => $this->input->post('university_id',TRUE),
		'campus_address' => $this->input->post('campus_address',TRUE),
		'campus_state_id' => $this->input->post('campus_state_id',TRUE),
		'date_of_grad' => $this->input->post('date_of_grad',TRUE),
		'program_of_study' => $this->input->post('program_of_study',TRUE),
		'present_level' => $this->input->post('present_level',TRUE),
		'enrollment_status' => $this->input->post('enrollment_status',TRUE),
		'cgpa' => $this->input->post('cgpa',TRUE),
	    );

            $this->Profile_undergraduate_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('profile_undergraduate'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Profile_undergraduate_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('profile_undergraduate/update_action'),
		'id' => set_value('id', $row->id),
		'university_id' => set_value('university_id', $row->university_id),
		'campus_address' => set_value('campus_address', $row->campus_address),
		'campus_state_id' => set_value('campus_state_id', $row->campus_state_id),
		'date_of_grad' => set_value('date_of_grad', $row->date_of_grad),
		'program_of_study' => set_value('program_of_study', $row->program_of_study),
		'present_level' => set_value('present_level', $row->present_level),
		'enrollment_status' => set_value('enrollment_status', $row->enrollment_status),
		'cgpa' => set_value('cgpa', $row->cgpa),
	    );
            $this->load->view('profile_undergraduate/profile_undergraduate_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profile_undergraduate'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'university_id' => $this->input->post('university_id',TRUE),
		'campus_address' => $this->input->post('campus_address',TRUE),
		'campus_state_id' => $this->input->post('campus_state_id',TRUE),
		'date_of_grad' => $this->input->post('date_of_grad',TRUE),
		'program_of_study' => $this->input->post('program_of_study',TRUE),
		'present_level' => $this->input->post('present_level',TRUE),
		'enrollment_status' => $this->input->post('enrollment_status',TRUE),
		'cgpa' => $this->input->post('cgpa',TRUE),
	    );

            $this->Profile_undergraduate_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('profile_undergraduate'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Profile_undergraduate_model->get_by_id($id);

        if ($row) {
            $this->Profile_undergraduate_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('profile_undergraduate'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profile_undergraduate'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('university_id', 'university id', 'trim|required');
	$this->form_validation->set_rules('campus_address', 'campus address', 'trim|required');
	$this->form_validation->set_rules('campus_state_id', 'campus state id', 'trim|required');
	$this->form_validation->set_rules('date_of_grad', 'date of grad', 'trim|required');
	$this->form_validation->set_rules('program_of_study', 'program of study', 'trim|required');
	$this->form_validation->set_rules('present_level', 'present level', 'trim|required');
	$this->form_validation->set_rules('enrollment_status', 'enrollment status', 'trim|required');
	$this->form_validation->set_rules('cgpa', 'cgpa', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Profile_undergraduate.php */
/* Location: ./application/controllers/Profile_undergraduate.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-04-08 13:30:06 */
/* http://harviacode.com */