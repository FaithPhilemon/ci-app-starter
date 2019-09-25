<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Olevel_type extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Olevel_type_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'olevel_type/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'olevel_type/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'olevel_type/index.html';
            $config['first_url'] = base_url() . 'olevel_type/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Olevel_type_model->total_rows($q);
        $olevel_type = $this->Olevel_type_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'olevel_type_data' => $olevel_type,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('olevel_type/olevel_type_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Olevel_type_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
	    );
            $this->load->view('olevel_type/olevel_type_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('olevel_type'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('olevel_type/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	);
        $this->load->view('olevel_type/olevel_type_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
	    );

            $this->Olevel_type_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('olevel_type'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Olevel_type_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('olevel_type/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
	    );
            $this->load->view('olevel_type/olevel_type_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('olevel_type'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
	    );

            $this->Olevel_type_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('olevel_type'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Olevel_type_model->get_by_id($id);

        if ($row) {
            $this->Olevel_type_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('olevel_type'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('olevel_type'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Olevel_type.php */
/* Location: ./application/controllers/Olevel_type.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-04-08 13:30:05 */
/* http://harviacode.com */