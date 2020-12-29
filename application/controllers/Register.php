<?php
//session_start();
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Register extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/welcome
     *    - or -
     *         http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    

     public function index()
    {

        $this->load->view('register');

    }
    
    
    public function del($userId)
    {
        $this->load->model('user');
        $this->user->delete($userId);
        $this->session->set_flashdata('success', 'Record Deleted Successfully!!!');
        redirect(base_url() . "index.php/Admin/Admin/list");
        
        

    }
    
    public function login()
    {
        $this->load->model('user');
        if(isset($this->session->userdata['userdata'])){
            $this->session->sess_destroy('userdata');
        }
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('login');
        } else {
            $data['email'] = $this->input->post('email');
            $data['password'] = $this->input->post('password');
            $array = $this->user->login($data['email']);
            if (!empty($array)) {
                if ($array['password']==$data['password']) {
                    $this->session->set_userdata('userdata', $array);
                    $_SESSION['userdata']=$array;
                    redirect(base_url() . "index.php/Admin/Admin/list/");
                } else {
                    $this->session->set_flashdata('failure', 'Wrong Password!');
                    //redirect(base_url() . "index.php/Register/login");
                }
            } elseif (empty($array)) {
                $this->session->set_flashdata('failure', 'No Such Account Present!');
                //redirect(base_url() . "index.php/Register/login");
            }
        }
    }
    

    public function reg()
    {
        $this->load->model('user');
        $data = $this->input->post();
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('repassword', 'Password Confirmation', 'required|trim|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
        if ($this->form_validation->run() == false) {
            $this->load->view('register');
        } else {
            $data = array();
            $data['email'] = $this->input->post('email');
            $data['password'] = $this->input->post('password');
            $data['name'] = $this->input->post('name');
            $array = $this->user->login($data['email']);
            if (!empty($array)) {
                $this->session->set_flashdata('failure', 'Similar Email Present');
                $this->load->view('register');
            }else{
                $this->user->insertdata($data);
                $this->session->set_flashdata('success', 'Record Added!');
                redirect(base_url() . "index.php/Register/login");
            }
        }

    }
    
}
