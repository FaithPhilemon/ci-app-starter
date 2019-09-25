<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Courses extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Courses_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'courses/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'courses/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'courses/index.html';
            $config['first_url'] = base_url() . 'courses/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Courses_model->total_rows($q);
        $courses = $this->Courses_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'courses_data' => $courses,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('courses/courses_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Courses_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'group_id' => $row->group_id,
		'combination_id' => $row->combination_id,
		'name' => $row->name,
	    );
            $this->load->view('courses/courses_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('courses'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('courses/create_action'),
	    'id' => set_value('id'),
	    'group_id' => set_value('group_id'),
	    'combination_id' => set_value('combination_id'),
	    'name' => set_value('name'),
	);
        $this->load->view('courses/courses_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'group_id' => $this->input->post('group_id',TRUE),
		'combination_id' => $this->input->post('combination_id',TRUE),
		'name' => $this->input->post('name',TRUE),
	    );

            $this->Courses_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('courses'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Courses_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('courses/update_action'),
		'id' => set_value('id', $row->id),
		'group_id' => set_value('group_id', $row->group_id),
		'combination_id' => set_value('combination_id', $row->combination_id),
		'name' => set_value('name', $row->name),
	    );
            $this->load->view('courses/courses_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('courses'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'group_id' => $this->input->post('group_id',TRUE),
		'combination_id' => $this->input->post('combination_id',TRUE),
		'name' => $this->input->post('name',TRUE),
	    );

            $this->Courses_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('courses'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Courses_model->get_by_id($id);

        if ($row) {
            $this->Courses_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('courses'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('courses'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('group_id', 'group id', 'trim|required');
	$this->form_validation->set_rules('combination_id', 'combination id', 'trim|required');
	$this->form_validation->set_rules('name', 'name', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Courses.php */
/* Location: ./application/controllers/Courses.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-04-08 13:30:03 */
/* http://harviacode.com */