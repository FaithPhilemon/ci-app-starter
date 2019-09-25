<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Olevel_results extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Olevel_results_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'olevel_results/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'olevel_results/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'olevel_results/index.html';
            $config['first_url'] = base_url() . 'olevel_results/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Olevel_results_model->total_rows($q);
        $olevel_results = $this->Olevel_results_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'olevel_results_data' => $olevel_results,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('olevel_results/olevel_results_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Olevel_results_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'user_id' => $row->user_id,
		'subject_id' => $row->subject_id,
		'grade_id' => $row->grade_id,
		'year' => $row->year,
	    );
            $this->load->view('olevel_results/olevel_results_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('olevel_results'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('olevel_results/create_action'),
	    'id' => set_value('id'),
	    'user_id' => set_value('user_id'),
	    'subject_id' => set_value('subject_id'),
	    'grade_id' => set_value('grade_id'),
	    'year' => set_value('year'),
	);
        $this->load->view('olevel_results/olevel_results_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'user_id' => $this->input->post('user_id',TRUE),
		'subject_id' => $this->input->post('subject_id',TRUE),
		'grade_id' => $this->input->post('grade_id',TRUE),
		'year' => $this->input->post('year',TRUE),
	    );

            $this->Olevel_results_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('olevel_results'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Olevel_results_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('olevel_results/update_action'),
		'id' => set_value('id', $row->id),
		'user_id' => set_value('user_id', $row->user_id),
		'subject_id' => set_value('subject_id', $row->subject_id),
		'grade_id' => set_value('grade_id', $row->grade_id),
		'year' => set_value('year', $row->year),
	    );
            $this->load->view('olevel_results/olevel_results_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('olevel_results'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'user_id' => $this->input->post('user_id',TRUE),
		'subject_id' => $this->input->post('subject_id',TRUE),
		'grade_id' => $this->input->post('grade_id',TRUE),
		'year' => $this->input->post('year',TRUE),
	    );

            $this->Olevel_results_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('olevel_results'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Olevel_results_model->get_by_id($id);

        if ($row) {
            $this->Olevel_results_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('olevel_results'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('olevel_results'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('user_id', 'user id', 'trim|required');
	$this->form_validation->set_rules('subject_id', 'subject id', 'trim|required');
	$this->form_validation->set_rules('grade_id', 'grade id', 'trim|required');
	$this->form_validation->set_rules('year', 'year', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Olevel_results.php */
/* Location: ./application/controllers/Olevel_results.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-04-08 13:30:05 */
/* http://harviacode.com */