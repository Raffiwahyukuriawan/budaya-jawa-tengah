<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz_model extends CI_Model {

    // Quiz
    public function get_all_quiz_by_guru($guru_id) {
        $this->db->where('dibuat_oleh', $guru_id);
        return $this->db->get('quiz')->result();
    }

    public function get_quiz($id) {
        return $this->db->get_where('quiz', ['id' => $id])->row();
    }

    public function create_quiz($data) {
        $this->db->insert('quiz', $data);
        return $this->db->insert_id();
    }

    public function update_quiz($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('quiz', $data);
    }

    public function delete_quiz($id) {
        $this->db->where('id', $id);
        return $this->db->delete('quiz');
    }

    // Pertanyaan
    public function get_questions($quiz_id) {
        $this->db->where('quiz_id', $quiz_id);
        return $this->db->get('quiz_questions')->result();
    }

    public function get_question($id) {
        return $this->db->get_where('quiz_questions', ['id' => $id])->row();
    }

    public function create_question($data) {
        return $this->db->insert('quiz_questions', $data);
    }

    public function update_question($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('quiz_questions', $data);
    }

    public function delete_question($id) {
        $this->db->where('id', $id);
        return $this->db->delete('quiz_questions');
    }
}
