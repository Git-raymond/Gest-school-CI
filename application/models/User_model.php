<?php

if (!defined('BASEPATH')) exit('No direct script access
allowed');


class User_model extends CI_Model {
    
    public function liste()
    {
        $this->load->database();
        $requete = $this->db->query("SELECT * FROM comptes");
        $liste = $requete->result();
        return $liste;
    }

    public function select($id) {
        $this->load->database();
        $requete = $this->db->query("SELECT * FROM comptes where id=" . $id);
        $liste = $requete->result();
        return $liste;
    }

    public function add($data) {
        $this->load->database();
        $this->db->insert('comptes', $data);
    }

    public function update($id, $data) {
        $this->load->database();
        $this->db->where('id', $id);
        $this->db->update('comptes', $data);
    }

    public function remove($id) {
        $this->load->database();
        $this->load->helper('url');

        $this->db->where('id', $id);
        $this->db->delete('comptes');
    }
}