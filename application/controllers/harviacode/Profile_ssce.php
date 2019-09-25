<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile_ssce extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_ssce_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'profile_ssce/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'profile_ssce/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'profile_ssce/index.html';
            $config['first_url'] = base_url() . 'profile_ssce/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Profile_ssce_model->total_rows($q);
        $profile_ssce = $this->Profile_ssce_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'profile_ssce_data' => $profile_ssce,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('profile_ssce/profile_ssce_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Profile_ssce_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'school_name' => $row->school_name,
		'school_address' => $row->school_address,
		'school_id' => $row->school_id,
		'date_of_grad' => $row->date_of_grad,
		'olevel_type_id' => $row->olevel_type_id,
		'olevel_result_id' => $row->olevel_result_id,
	    );
            $this->load->view('profile_ssce/profile_ssce_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profile_ssce'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('profile_ssce/create_action'),
	    'id' => set_value('id'),
	    'school_name' => set_value('school_name'),
	    'school_address' => set_value('school_address'),
	    'school_id' => set_value('school_id'),
	    'date_of_grad' => set_value('date_of_grad'),
	    'olevel_type_id' => set_value('olevel_type_id'),
	    'olevel_result_id' => set_value('olevel_result_id'),
	);
        $this->load->view('profile_ssce/profile_ssce_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'school_name' => $this->input->post('school_name',TRUE),
		'school_address' => $this->input->post('school_address',TRUE),
		'school_id' => $this->input->post('school_id',TRUE),
		'date_of_grad' => $this->input->post('date_of_grad',TRUE),
		'olevel_type_id' => $this->input->post('olevel_type_id',TRUE),
		'olevel_result_id' => $this->input->post('olevel_result_id',TRUE),
	    );

            $this->Profile_ssce_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('profile_ssce'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Profile_ssce_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('profile_ssce/update_action'),
		'id' => set_value('id', $row->id),
		'school_name' => set_value('school_name', $row->school_name),
		'school_address' => set_value('school_address', $row->school_address),
		'school_id' => set_value('school_id', $row->school_id),
		'date_of_grad' => set_value('date_of_grad', $row->date_of_grad),
		'olevel_type_id' => set_value('olevel_type_id', $row->olevel_type_id),
		'olevel_result_id' => set_value('olevel_result_id', $row->olevel_result_id),
	    );
            $this->load->view('profile_ssce/profile_ssce_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profile_ssce'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'school_name' => $this->input->post('school_name',TRUE),
		'school_address' => $this->input->post('school_address',TRUE),
		'school_id' => $this->input->post('school_id',TRUE),
		'date_of_grad' => $this->input->post('date_of_grad',TRUE),
		'olevel_type_id' => $this->input->post('olevel_type_id',TRUE),
		'olevel_result_id' => $this->input->post('olevel_result_id',TRUE),
	    );

            $this->Profile_ssce_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('profile_ssce'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Profile_ssce_model->get_by_id($id);

        if ($row) {
            $this->Profile_ssce_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('profile_ssce'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profile_ssce'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('school_name', 'school name', 'trim|required');
	$this->form_validation->set_rules('school_address', 'school address', 'trim|required');
	$this->form_validation->set_rules('school_id', 'school id', 'trim|required');
	$this->form_validation->set_rules('date_of_grad', 'date of grad', 'trim|required');
	$this->form_validation->set_rules('olevel_type_id', 'olevel type id', 'trim|required');
	$this->form_validation->set_rules('olevel_result_id', 'olevel result id', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Profile_ssce.php */
/* Location: ./application/controllers/Profile_ssce.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-04-08 13:30:05 */
/* http://harviacode.com */