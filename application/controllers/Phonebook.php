<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phonebook extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Phonebook_model'); 
        $this->load->library('pagination');
    }

    public function dashboard()
    {
        if ($this->session->userdata('UserLoginSession')) {
            $data['udata'] = $this->session->userdata('UserLoginSession');
    
            // Pagination configuration
            $config['base_url'] = base_url('phonebook/dashboard');
            $config['total_rows'] = $this->Phonebook_model->get_total_records(); // Method to get total records count
            $config['per_page'] = 5;
            $config['uri_segment'] = 3;
            
            // Custom pagination configuration
            $config['first_link'] = '« First';
            $config['last_link'] = 'Last »';
            $config['prev_link'] = '<';
            $config['next_link'] = '>';
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
            $config['cur_tag_close'] = '</span></li>';
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';
            
            $this->pagination->initialize($config);
    
            $data['pagination'] = $this->pagination->create_links();
            $data['records'] = $this->Phonebook_model->get_paginated_records($config['per_page'], $this->uri->segment(3));
    
            $this->load->view('dashboard', $data);
        } else {
            redirect(base_url('welcome/login'));
        }
    }
    
    public function add()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('address', 'Address', 'required');
    
            if ($this->form_validation->run() == TRUE) {
                // Set upload configuration
                $config['upload_path'] = './assets/images/'; // Correct upload path
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 2048;
    
                $this->load->library('upload', $config);
    
                // Check if file was uploaded
                if ($this->upload->do_upload('image')) {
                    $upload_data = $this->upload->data();
                    $image = $upload_data['file_name'];
                } else {
                    $image = NULL;
                    // Optional: handle upload errors
                    $error = $this->upload->display_errors();
                    // You can set a flash message for the error if needed
                }
    
                $data = array(
                    'name' => $this->input->post('name'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                    'address' => $this->input->post('address'),
                    'image' => $image
                );
    
                $this->Phonebook_model->insert_record($data);
                $this->session->set_flashdata('success', 'Record added successfully.');
                redirect(base_url('phonebook/dashboard'));
            }
        }
        $this->load->view('add_record');
    }
    

    public function edit($id) {
        // Load the form validation library
        $this->load->library('form_validation');
        
        // Load the model
        $this->load->model('Phonebook_model');
        
        // Fetch the record to be edited
        $data['record'] = $this->Phonebook_model->get_record($id);
        
        // Check if record exists
        if (empty($data['record'])) {
            show_404();
        }
        
        // Form validation rules
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('address', 'Address', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            // Load the view with the form
            $this->load->view('edit_record', $data);
        } else {
            // Update the record in the database
            $this->Phonebook_model->update_record($id);
            
            // Set a success message
            $this->session->set_flashdata('success', 'Record updated successfully.');
            
            // Redirect to the list page
            redirect('phonebook/dashboard');
        }
    }
    

    public function delete($id) {
    // Load the model
    $this->load->model('Phonebook_model');

    // Delete the record
    $this->Phonebook_model->delete_record($id);

    // Set a success message
    $this->session->set_flashdata('success', 'Record deleted successfully.');

    // Redirect to the list page
    redirect('phonebook/dashboard');
}

}
?>
