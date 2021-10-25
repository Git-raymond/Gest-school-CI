<?php

if (!defined('BASEPATH')) exit('No direct script access
allowed');


class User_model extends CI_Model
{

    public function liste()
    {
        $this->load->database();
        $requete = $this->db->query("SELECT * FROM p3_g3_comptes");
        $liste = $requete->result();
        return $liste;
    }

    public function select($id)
    {
        $this->load->database();
        $requete = $this->db->query("SELECT * FROM p3_g3_comptes where id=" . $id);
        $liste = $requete->result();
        return $liste;
    }

    public function addfamille($data)
    {
        $this->load->database();
        $this->db->insert('p3_g3_famille', $data);
        $last_id = $this->db->insert_id();
        $data['famille_id'] = $last_id;
        $this->db->insert('p3_g3_comptes', $data);
    }

    public function addprof($data)
    {
        $this->load->database();
        $this->db->insert('p3_g3_enseignant', $data);
        $last_id = $this->db->insert_id();
        $data['enseignant_id'] = $last_id;
        $this->db->insert('p3_g3_comptes', $data);
    }

    public function addelevefamille($data)
    {
        $this->load->database();
        $this->db->insert('p3_g3_eleve', $data);
        $last_id = $this->db->insert_id();
        $data['eleve_id'] = $last_id;
        $this->db->insert('p3_g3_comptes', $data);
    }

    public function update($id, $data)
    {
        $this->load->database();
        $this->db->where('id', $id);
        $this->db->update('p3_g3_comptes', $data);
    }

    public function remove($id)
    {
        $this->load->database();
        $this->load->helper('url');
        // $this->db->where('id', $id);
        // $this->db->delete('comptes');
        $this->db->query("DELETE p3_g3_comptes,p3_g3_eleve
        FROM p3_g3_comptes,p3_g3_eleve
        WHERE p3_g3_comptes.eleve_id=p3_g3_eleve.idEleve
        AND p3_g3_comptes.id= $id");
        $this->db->query("DELETE p3_g3_comptes,p3_g3_famille
        FROM p3_g3_comptes,p3_g3_famille
        WHERE p3_g3_comptes.famille_id=p3_g3_famille.idFamille
        AND p3_g3_comptes.id= $id");
        $this->db->query("DELETE p3_g3_comptes,p3_g3_enseignant
        FROM p3_g3_comptes,enseignant
        WHERE p3_g3_comptes.enseignant_id=p3_g3_enseignant.idEnseignant
        AND p3_g3_comptes.id= $id");
    }
}
