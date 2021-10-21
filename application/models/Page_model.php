<?php

if (!defined('BASEPATH')) exit('No direct script access
allowed');


class Page_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('url');
    }

    public function listeprofs()
    {
        $requete = $this->db->query("SELECT * FROM comptes WHERE type='enseignant'");
        $listeprofs = $requete->result();
        return $listeprofs;
    }

    public function find_name($comptes)
    {
        return $this->db->get_where('comptes', array('id' => $comptes))->row();
    }

    public function listecursus()
    {
        $requete = $this->db->query("SELECT * FROM cursus");
        $listecursus = $requete->result();
        return $listecursus;
    }

    public function attribuecursus($idc, $ens)
    {
        if ($this->input->post('btn_update')) {

            $data = array(
                'enseignant_id' => $ens
            );

            $this->db->where('idCursus', $idc)
                ->update('cursus', $data);
            echo '<h1 class="text-center text-success">Le cursus a bien été attribué</h1>';
        }
    }

    public function rechercheprofs()
    {
        if ($this->input->post('recherche')) {

            $recherche = $this->input->post('recherche');

            $requete = $this->db->query("SELECT username, email, status FROM comptes WHERE type='enseignant' AND username LIKE '%$recherche%' OR type='enseignant' AND email LIKE '%$recherche%' OR type='enseignant' AND status LIKE '%$recherche%'");
            $rechercheprofs = $requete->result();
            return $rechercheprofs;
        }
    }

    public function recherchecursus()
    {
        if ($this->input->post('recherche')) {

            $recherche = $this->input->post('recherche');

            $requete = $this->db->query("SELECT matiere, annee, frais FROM cursus WHERE matiere LIKE '%$recherche%' OR annee LIKE '%$recherche%'");
            $recherchecursus = $requete->result();
            return $recherchecursus;
        }
    }

    public function addcursus($data)
    {
        $this->load->database();
        $this->db->insert('cursus', $data);
    }

    public function find_cursus($cursus)
    {
        return $this->db->get_where('cursus', array('idCursus' => $cursus))->row();
    }

    public function updatecursus($id, $data) {
        $this->load->database();
        $this->db->where('idCursus', $id);
        $this->db->update('cursus', $data);
    }

    public function removecursus($id) {
        $this->load->database();
        $this->load->helper('url');
        $this->db->where('idCursus', $id);
        $this->db->delete('cursus');
    }
}
