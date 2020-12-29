<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata['userdata']) {
            redirect(base_url() . "index.php/Register/index");
        }

    }
    public function is_logged_in()
    {
        $user = $this->session->userdata('user_data');
        if (!isset($user)) {
            return false;
        } else {
            return true;
        }
    }
    function list() {

        $this->load->model('user');
        $array = $this->user->showData();
        $user = array();
        $user['data'] = $array;
        $this->load->view('list', $user);
    }
    public function edit($userId)
    {
        $this->load->model('user');
        $array = $this->user->getUser($userId);
        $user = array();
        $user['data'] = $array;
        $this->load->view('edit', $user);
    }
    public function update($userId)
    {
        $this->load->model('user');
        $n = $this->input->post();
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() == false) {
            $user['data']['id']=$userId;
            $this->load->view('edit', $user );
        } else {
            $data = array();
            
            $data['email'] = $this->input->post('email');
            $data['name'] = $this->input->post('name');
            $this->user->updatedata($userId, $data);
            $this->session->set_flashdata('success', 'Record updated!');
            redirect(base_url() . "index.php/Admin/Admin/list/.");
        }

    }
    public function logout()
    {
        $this->session->sess_destroy('userdata');
        redirect(base_url() . 'index.php/Register/login');
    }

}
