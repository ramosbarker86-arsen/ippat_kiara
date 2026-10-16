<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function login()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }

        $error = null;

        if ($this->input->post('username') !== null) {
            $username = trim($this->input->post('username'));
            $password = (string) $this->input->post('password');

            $user = $this->User_model->getByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                $this->session->set_userdata([
                    'logged_in' => true,
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'nama' => $user['nama'],
                ]);
                redirect('dashboard');
            } else {
                $error = 'Username atau password salah.';
            }
        }

        $this->load->view('auth/login', ['error' => $error]);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
