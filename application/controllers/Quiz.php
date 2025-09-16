<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quiz extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Quiz_model');
        $this->load->helper('url');
        $this->load->library('session');
        // session login guru
        // if($this->session->userdata('role') != 'guru'){
        //     redirect('login');
        // }
    }

    // Daftar quiz guru
    public function index()
    {
                $dibuat_oleh = $this->session->userdata;
        var_dump($dibuat_oleh);
        die;
        $guru_id = $this->session->userdata('user_id');
        $data['quiz'] = $this->Quiz_model->get_all_quiz_by_guru($guru_id);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('quiz/quiz', $data);
        $this->load->view('template/footer');
    }

    // Tambah quiz
    public function add()
    {
        // $dibuat_oleh = $this->session->userdata;
        // var_dump($dibuat_oleh);
        // die;

        if ($this->input->post()) {
            $data = [
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi'),
                'kode_akses' => $this->input->post('kode_akses'),
                'dibuat_oleh' => $this->session->userdata('user_id')
                // 'dibuat_oleh' => 1
            ];
            if ($this->Quiz_model->create_quiz($data)) {
                $this->session->set_flashdata('success', 'Quiz berhasil ditambahkan!');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan quiz.');
            }
            redirect('quiz');
        }
        $this->load->view('quiz/add');
    }

    // Edit quiz
    public function edit($id)
    {
        $data['quiz'] = $this->Quiz_model->get_quiz($id);
        if ($this->input->post()) {
            $update = [
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi'),
                'kode_akses' => $this->input->post('kode_akses')
            ];
            if ($this->Quiz_model->update_quiz($id, $update)) {
                $this->session->set_flashdata('success', 'Quiz berhasil diupdate!');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengupdate quiz.');
            }
            redirect('quiz');
        }
        $this->load->view('quiz/edit', $data);
    }

    // Hapus quiz
    public function delete($id)
    {
        if ($this->Quiz_model->delete_quiz($id)) {
            $this->session->set_flashdata('success', 'Quiz berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus quiz.');
        }
        redirect('quiz');
    }

    // Daftar pertanyaan quiz
    public function questions($quiz_id)
    {
        $data['quiz'] = $this->Quiz_model->get_quiz($quiz_id);
        $data['questions'] = $this->Quiz_model->get_questions($quiz_id);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('quiz/questions', $data);
        $this->load->view('template/footer');
    }

    // Tambah pertanyaan
    public function add_question($quiz_id)
    {
        if ($this->input->post()) {
            $data = [
                'quiz_id' => $quiz_id,
                'pertanyaan' => $this->input->post('pertanyaan'),
                'pilihan_a' => $this->input->post('pilihan_a'),
                'pilihan_b' => $this->input->post('pilihan_b'),
                'pilihan_c' => $this->input->post('pilihan_c'),
                'pilihan_d' => $this->input->post('pilihan_d'),
                'jawaban_benar' => $this->input->post('jawaban_benar'),
            ];
            if ($this->Quiz_model->create_question($data)) {
                $this->session->set_flashdata('success', 'Pertanyaan berhasil ditambahkan!');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan pertanyaan.');
            }
            redirect('quiz/questions/' . $quiz_id);
        }
        $data['quiz'] = $this->Quiz_model->get_quiz($quiz_id);
        $this->load->view('quiz/add_question', $data);
    }

    // Edit pertanyaan
    public function edit_question($id)
    {
        $question = $this->Quiz_model->get_question($id);
        if ($this->input->post()) {
            $update = [
                'pertanyaan' => $this->input->post('pertanyaan'),
                'pilihan_a' => $this->input->post('pilihan_a'),
                'pilihan_b' => $this->input->post('pilihan_b'),
                'pilihan_c' => $this->input->post('pilihan_c'),
                'pilihan_d' => $this->input->post('pilihan_d'),
                'jawaban_benar' => $this->input->post('jawaban_benar'),
            ];
            if ($this->Quiz_model->update_question($id, $update)) {
                $this->session->set_flashdata('success', 'Pertanyaan berhasil diupdate!');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengupdate pertanyaan.');
            }
            redirect('quiz/questions/' . $this->input->post('quiz_id'));
        }
        $data['question'] = $question;
        $this->load->view('quiz/edit_question', $data);
    }

    // Hapus pertanyaan
    public function delete_question($id, $quiz_id)
    {
        if ($this->Quiz_model->delete_question($id)) {
            $this->session->set_flashdata('success', 'Pertanyaan berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus pertanyaan.');
        }
        redirect('quiz/questions/' . $quiz_id);
    }
}
