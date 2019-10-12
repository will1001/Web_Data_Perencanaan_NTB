<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
    }
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('site/login');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {
            // jika user ada
            if ($password === $user['password']) {
                $data = [
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'role_id' => $user['role_id'],
                ];
                $this->session->set_userdata($data);
                redirect('site');
            } else {

                $this->session->set_flashdata(
                    'message',
                    '<div class="card-panel pink lighten-4 pink-text"><b>Wrong password!</b></div>'
                );
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="card-panel pink lighten-4 pink-text"><b>Wrong username and password!</b></div>'
            );
            redirect('auth');
        }
    }
    public function register()
    {
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim|is_unique[user.username]',
            [
                'is_unique' => 'Username has already taken',
            ]
        );
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[6]',
            [
                'min_length' => 'Password too short',
            ]
        );
        $this->form_validation->set_rules(
            'password2',
            'Password',
            'required|trim|matches[password1]',
            [
                'matches' => 'Password doesn\'t match',
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('site/register');
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 1,
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->session->set_flashdata(
                'message',
                '<div class="card-panel teal accent-1 green-text"><b>Congratulation Your Account has been created. Please Login!</b></div>'
            );
            $this->db->insert('user', $data);
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata(
            'message',
            '<div class="card-panel teal accent-1 green-text"><b>You have been logged out!</b></div>'
        );
        redirect('auth');
    }
}
