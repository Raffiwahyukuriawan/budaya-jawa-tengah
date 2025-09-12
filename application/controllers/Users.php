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
        $data['users'] = $this->User_model->get_all();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('user', $data); // kirim data ke view
        $this->load->view('template/footer');
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
            if ($this->User_model->insert($data)) {
                $this->session->set_flashdata('success', 'User berhasil ditambahkan!');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan user.');
            }
            redirect('users');
        }
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
            if ($this->User_model->update($id, $updateData)) {
                $this->session->set_flashdata('success', 'User berhasil diupdate!');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengupdate user.');
            }
            redirect('users');
        }
    }

    public function delete($id)
    {
        if ($this->User_model->delete($id)) {
            $this->session->set_flashdata('success', 'User berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus user.');
        }
        redirect('users');
    }
}
