<?php
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function register()
    {
        $this->load->view('auth/registrasi');
    }

    public function registrasi()
    {
        $this->load->model('User_model');

        // kalau belum submit, tampilkan halaman register
        if ($this->input->method() !== 'post') {
            $this->load->view('auth/registrasi');
            return;
        }

        $email    = $this->input->post('email', true);
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        $role     = $this->input->post('role', true);

        // Validasi input kosong
        if (empty($email) || empty($username) || empty($password) || empty($role)) {
            $this->session->set_flashdata('error', 'Semua field wajib diisi.');
            redirect('auth/registrasi');
            return;
        }

        // Cek email sudah ada atau belum
        if ($this->User_model->getByEmail($email)) {
            $this->session->set_flashdata('error', 'Email sudah terdaftar, silakan gunakan email lain.');
            redirect('auth/registrasi');
            return;
        }

        // Cek username sudah ada atau belum
        if ($this->User_model->getByUsername($username)) {
            $this->session->set_flashdata('error', 'Username sudah dipakai, silakan gunakan yang lain.');
            redirect('auth/registrasi');
            return;
        }

        // Hash password
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        $data = [
            'username' => $username,
            'email'    => $email,
            'password' => $passwordHash,
            'role'     => $role
        ];

        // Simpan ke database
        $this->User_model->insert($data);

        $this->session->set_flashdata('success', 'Registrasi berhasil. Silakan login.');
        redirect('auth/login');
    }


    public function login()
    {
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
                $this->session->set_flashdata('success', 'Login berhasil, selamat datang ' . $user->username . '!');
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error', 'Username atau Password salah');
                redirect('auth/login');
            }
        } else {
            $this->load->view('auth/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
