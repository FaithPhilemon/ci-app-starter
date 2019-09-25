<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sq_answers extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sq_answers_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'sq_answers/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'sq_answers/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'sq_answers/index.html';
            $config['first_url'] = base_url() . 'sq_answers/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Sq_answers_model->total_rows($q);
        $sq_answers = $this->Sq_answers_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sq_answers_data' => $sq_answers,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('sq_answers/sq_answers_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Sq_answers_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'question_id' => $row->question_id,
		'user_id' => $row->user_id,
		'answer' => $row->answer,
	    );
            $this->load->view('sq_answers/sq_answers_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sq_answers'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sq_answers/create_action'),
	    'id' => set_value('id'),
	    'question_id' => set_value('question_id'),
	    'user_id' => set_value('user_id'),
	    'answer' => set_value('answer'),
	);
        $this->load->view('sq_answers/sq_answers_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'question_id' => $this->input->post('question_id',TRUE),
		'user_id' => $this->input->post('user_id',TRUE),
		'answer' => $this->input->post('answer',TRUE),
	    );

            $this->Sq_answers_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('sq_answers'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Sq_answers_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sq_answers/update_action'),
		'id' => set_value('id', $row->id),
		'question_id' => set_value('question_id', $row->question_id),
		'user_id' => set_value('user_id', $row->user_id),
		'answer' => set_value('answer', $row->answer),
	    );
            $this->load->view('sq_answers/sq_answers_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sq_answers'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'question_id' => $this->input->post('question_id',TRUE),
		'user_id' => $this->input->post('user_id',TRUE),
		'answer' => $this->input->post('answer',TRUE),
	    );

            $this->Sq_answers_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sq_answers'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Sq_answers_model->get_by_id($id);

        if ($row) {
            $this->Sq_answers_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sq_answers'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sq_answers'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('question_id', 'question id', 'trim|required');
	$this->form_validation->set_rules('user_id', 'user id', 'trim|required');
	$this->form_validation->set_rules('answer', 'answer', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Sq_answers.php */
/* Location: ./application/controllers/Sq_answers.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-04-08 13:30:07 */
/* http://harviacode.com */