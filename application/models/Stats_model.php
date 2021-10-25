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
        $this->db->from('p3_g3_comptes');
        $this->db->like('type', 'famille');
        $nombreFamilles = $this->db->count_all_results();
        return $nombreFamilles;
    }

    public function listefamilles()
    {
        $requete = $this->db->query("SELECT * FROM p3_g3_comptes WHERE type='famille'");
        $listeFamilles = $requete->result();
        return $listeFamilles;
    }

    public function listeprofil()
    {
        $requete = $this->db->query("SELECT p3_g3_comptes.username, p3_g3_comptes.email, p3_g3_comptes.type, p3_g3_cursus.matiere, p3_g3_cursus.annee, p3_g3_cursus.frais FROM p3_g3_comptes JOIN p3_g3_eleve ON p3_g3_comptes.eleve_id=p3_g3_eleve.idEleve JOIN p3_g3_cursus ON p3_g3_eleve.cursus_id=p3_g3_cursus.idCursus");
        $profils = $requete->result();
        return $profils;
    }

    public function listeenseignantcursus()
    {
        $requete = $this->db->query("SELECT p3_g3_comptes.username, p3_g3_comptes.email, p3_g3_comptes.type, p3_g3_cursus.matiere, p3_g3_cursus.annee FROM p3_g3_comptes JOIN p3_g3_enseignant ON p3_g3_comptes.enseignant_id=idEnseignant JOIN p3_g3_cursus ON p3_g3_enseignant.idEnseignant=p3_g3_cursus.enseignant_id ORDER BY p3_g3_cursus.idCursus ASC");
        $profs = $requete->result();
        return $profs;
    }
}
