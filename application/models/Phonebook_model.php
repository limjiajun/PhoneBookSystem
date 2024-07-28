<?php
class Phonebook_model extends CI_Model {

    public function insert_record($data)
    {
        $this->db->insert('phonebook', $data);
    }

    public function get_all_records()
    {
        $query = $this->db->get('phonebook');
        return $query->result_array();
    }

    public function update_record($id) {
        $data = array(
            'name' => $this->input->post('name'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address'),
        );

        // Check if an image was uploaded
        if (!empty($_FILES['image']['name'])) {
            $upload_data = $this->upload_image();
            $data['image'] = $upload_data['file_name'];
        }

        $this->db->where('id', $id);
        return $this->db->update('phonebook', $data);
    }

    public function delete_record($id) {
        // Ensure you are checking for the existence of the record if needed
        $this->db->where('id', $id);
        return $this->db->delete('phonebook');
    }
    

    // Upload image helper function
    private function upload_image() {
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;
    
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('image')) {
            return $this->upload->data();
        } else {
            return array('error' => $this->upload->display_errors());
        }
    }
    public function get_total_records()
    {
        return $this->db->count_all('phonebook'); // Assuming the table is named 'phonebook'
    }

    // Method to get paginated records
    public function get_paginated_records($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get('phonebook'); // Assuming the table is named 'phonebook'
        return $query->result_array();
    }
    public function get_record($id) {
        $query = $this->db->get_where('phonebook', array('id' => $id));
        return $query->row_array();
    }  
}
?>
