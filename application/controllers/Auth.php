<?php
class Auth extends CI_Controller {

    public function login() {
        if ($this->input->post()) {
            $this->load->model('User_model');
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->User_model->check_login($username, $password);

            if ($user) {
                $this->session->set_userdata([
                    'user_id' => $user->id,
                    'username' => $user->username,
                    'role' => $user->role,
                    'logged_in' => TRUE
                ]);
                redirect('users');
            } else {
                $this->session->set_flashdata('error', 'Username atau Password salah');
                redirect('auth/login');
            }
        } else {
            $this->load->view('login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
