<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adminuser extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Adminuser_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'adminuser/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'adminuser/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'adminuser/index.html';
            $config['first_url'] = base_url() . 'adminuser/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Adminuser_model->total_rows($q);
        $adminuser = $this->Adminuser_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'adminuser_data' => $adminuser,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('adminuser/adminuser_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Adminuser_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'username' => $row->username,
		'email' => $row->email,
		'password' => $row->password,
		'first_name' => $row->first_name,
		'last_name' => $row->last_name,
		'created_at' => $row->created_at,
	    );
            $this->load->view('adminuser/adminuser_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('adminuser'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('adminuser/create_action'),
	    'id' => set_value('id'),
	    'username' => set_value('username'),
	    'email' => set_value('email'),
	    'password' => set_value('password'),
	    'first_name' => set_value('first_name'),
	    'last_name' => set_value('last_name'),
	    'created_at' => set_value('created_at'),
	);
        $this->load->view('adminuser/adminuser_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'email' => $this->input->post('email',TRUE),
		'password' => $this->input->post('password',TRUE),
		'first_name' => $this->input->post('first_name',TRUE),
		'last_name' => $this->input->post('last_name',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
	    );

            $this->Adminuser_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('adminuser'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Adminuser_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('adminuser/update_action'),
		'id' => set_value('id', $row->id),
		'username' => set_value('username', $row->username),
		'email' => set_value('email', $row->email),
		'password' => set_value('password', $row->password),
		'first_name' => set_value('first_name', $row->first_name),
		'last_name' => set_value('last_name', $row->last_name),
		'created_at' => set_value('created_at', $row->created_at),
	    );
            $this->load->view('adminuser/adminuser_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('adminuser'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'email' => $this->input->post('email',TRUE),
		'password' => $this->input->post('password',TRUE),
		'first_name' => $this->input->post('first_name',TRUE),
		'last_name' => $this->input->post('last_name',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
	    );

            $this->Adminuser_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('adminuser'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Adminuser_model->get_by_id($id);

        if ($row) {
            $this->Adminuser_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('adminuser'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('adminuser'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('first_name', 'first name', 'trim|required');
	$this->form_validation->set_rules('last_name', 'last name', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Adminuser.php */
/* Location: ./application/controllers/Adminuser.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-04-08 13:30:02 */
/* http://harviacode.com */