<?php
class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // if (!$this->session->userdata('logged_in')) {
        //     redirect('auth/login');
        // }
        $this->load->model('User_model');
    }

    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('user');
        $this->load->view('template/footer');
        // $data['users'] = $this->User_model->get_all();
        // $this->load->view('users/index', $data);
    }

    public function create()
    {
        if ($this->input->post()) {
            $data = [
                'username' => $this->input->post('username'),
                'email'    => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'role'     => $this->input->post('role')
            ];
            $this->User_model->insert($data);
            redirect('users');
        }
        $this->load->view('users/create');
    }

    public function edit($id)
    {
        $data['user'] = $this->User_model->get_by_id($id);
        if ($this->input->post()) {
            $updateData = [
                'username' => $this->input->post('username'),
                'email'    => $this->input->post('email'),
                'role'     => $this->input->post('role')
            ];
            if ($this->input->post('password')) {
                $updateData['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
            }
            $this->User_model->update($id, $updateData);
            redirect('users');
        }
        $this->load->view('users/edit', $data);
    }

    public function delete($id)
    {
        $this->User_model->delete($id);
        redirect('users');
    }
}
