<?php

if (!defined('BASEPATH')) exit('No direct script access
allowed');


class User_model extends CI_Model
{

    public function liste()
    {
        $this->load->database();
        $requete = $this->db->query("SELECT * FROM comptes");
        $liste = $requete->result();
        return $liste;
    }

    public function select($id)
    {
        $this->load->database();
        $requete = $this->db->query("SELECT * FROM comptes where id=" . $id);
        $liste = $requete->result();
        return $liste;
    }

    public function addfamille($data)
    {
        $this->load->database();
        $this->db->insert('famille', $data);
        $last_id = $this->db->insert_id();
        $data['famille_id'] = $last_id;
        $this->db->insert('comptes', $data);
    }

    public function addprof($data)
    {
        $this->load->database();
        $this->db->insert('enseignant', $data);
        $last_id = $this->db->insert_id();
        $data['enseignant_id'] = $last_id;
        $this->db->insert('comptes', $data);
    }

    public function addelevefamille($data)
    {
        $this->load->database();
        $this->db->insert('eleve', $data);
        $last_id = $this->db->insert_id();
        $data['eleve_id'] = $last_id;
        $this->db->insert('comptes', $data);
    }

    public function update($id, $data)
    {
        $this->load->database();
        $this->db->where('id', $id);
        $this->db->update('comptes', $data);
    }

    public function remove($id)
    {
        $this->load->database();
        $this->load->helper('url');
        // $this->db->where('id', $id);
        // $this->db->delete('comptes');
        $this->db->query("DELETE comptes,eleve
        FROM comptes,eleve
        WHERE comptes.eleve_id=eleve.idEleve
        AND comptes.id= $id");
        $this->db->query("DELETE comptes,famille
        FROM comptes,famille
        WHERE comptes.famille_id=famille.idFamille
        AND comptes.id= $id");
        $this->db->query("DELETE comptes,enseignant
        FROM comptes,enseignant
        WHERE comptes.enseignant_id=enseignant.idEnseignant
        AND comptes.id= $id");
    }
}
