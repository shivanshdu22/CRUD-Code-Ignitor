<?php
class user extends CI_model
{
    public function insertdata($data)
    {
        $this->db->insert('user', $data);
    }
    public function showData()
    {

        return $user = $this->db->get('user')->result_array();
    }
    public function getUser($id)
    {
        $this->db->where('id', $id);
        return $user = $this->db->get('user')->row_array();
    }
    public function updatedata($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');

    }
    public function login($email)
    {
        $this->db->where('email', $email);
        return $user = $this->db->get('user')->row_array();

    }

}
