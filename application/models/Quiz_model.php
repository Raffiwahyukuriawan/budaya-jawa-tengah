<?php
class Quiz_model extends CI_Model {

    public function getAll() {
        return $this->db->get('quiz')->result();
    }

    public function getById($id) {
        return $this->db->get_where('quiz', ['id' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('quiz', $data);
    }

    public function update($id, $data) {
        return $this->db->where('id', $id)->update('quiz', $data);
    }

    public function delete($id) {
        return $this->db->delete('quiz', ['id' => $id]);
    }
}
