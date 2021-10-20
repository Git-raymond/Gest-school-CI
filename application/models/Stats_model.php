<?php

if (!defined('BASEPATH')) exit('No direct script access
allowed');


class Stats_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }

    public function nombrefamilles()
    {
        $this->db->select('*');
        $this->db->from('comptes');
        $this->db->like('type', 'famille');
        $nombreFamilles = $this->db->count_all_results();
        return $nombreFamilles;
    }

    public function listefamilles()
    {
        $requete = $this->db->query("SELECT * FROM comptes WHERE type='famille'");
        $listeFamilles = $requete->result();
        return $listeFamilles;
    }

    public function listeprofil()
    {
        $requete = $this->db->query("SELECT username, email, type,  matiere, annee, frais FROM comptes JOIN eleve ON comptes.eleve_id=eleve.idEleve JOIN cursus ON eleve.cursus_id=cursus.idCursus");
        $profils = $requete->result();
        return $profils;
    }

    public function listeenseignantcursus()
    {
        $requete = $this->db->query("SELECT * FROM comptes JOIN enseignant ON comptes.enseignant_id=idEnseignant JOIN cursus ON enseignant.idEnseignant=cursus.enseignant_id ORDER BY cursus.idCursus ASC");
        $profs = $requete->result();
        return $profs;
    }
}
