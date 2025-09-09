<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Quiz_model');
        $this->load->library('session');
    }

    public function index() {
        $data['quiz'] = $this->Quiz_model->getAll();
        $this->load->view('quiz/index', $data);
    }

    public function create() {
        if ($this->input->post()) {
            $insert = [
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi'),
                'kode_akses' => substr(md5(time()), 0, 6), // kode unik otomatis
                'dibuat_oleh' => $this->session->userdata('user_id')
            ];
            $this->Quiz_model->insert($insert);
            redirect('quiz');
        }
        $this->load->view('quiz/create');
    }

    public function edit($id) {
        $data['quiz'] = $this->Quiz_model->getById($id);
        if ($this->input->post()) {
            $update = [
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi')
            ];
            $this->Quiz_model->update($id, $update);
            redirect('quiz');
        }
        $this->load->view('quiz/edit', $data);
    }

    public function delete($id) {
        $this->Quiz_model->delete($id);
        redirect('quiz');
    }
}
