<?php
class User_model extends CI_Model {

    public function get_all() {
        return $this->db->get('users')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('users', ['id' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('users', $data);
    }

    public function update($id, $data) {
        return $this->db->where('id', $id)->update('users', $data);
    }

    public function delete($id) {
        return $this->db->delete('users', ['id' => $id]);
    }

    public function check_login($username, $password) {
        $user = $this->db->get_where('users', ['username' => $username])->row();
        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return false;
    }
}
