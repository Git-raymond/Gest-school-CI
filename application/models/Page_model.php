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
        $requete = $this->db->query("SELECT * FROM p3_g3_comptes WHERE type='enseignant'");
        $listeprofs = $requete->result();
        return $listeprofs;
    }

    public function find_name($comptes)
    {
        return $this->db->get_where('p3_g3_comptes', array('id' => $comptes))->row();
    }

    public function listecursus()
    {
        $requete = $this->db->query("SELECT * FROM p3_g3_cursus");
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
                ->update('p3_g3_cursus', $data);
            echo '<h1 class="text-center text-success">Le cursus a bien été attribué</h1>';
        }
    }

    public function rechercheprofs()
    {
        if ($this->input->post('recherche')) {

            $recherche = $this->input->post('recherche');

            $requete = $this->db->query("SELECT username, email, status FROM p3_g3_comptes WHERE type='enseignant' AND username LIKE '%$recherche%' OR type='enseignant' AND email LIKE '%$recherche%' OR type='enseignant' AND status LIKE '%$recherche%'");
            $rechercheprofs = $requete->result();
            return $rechercheprofs;
        }
    }

    public function recherchecursus()
    {
        if ($this->input->post('recherche')) {

            $recherche = $this->input->post('recherche');

            $requete = $this->db->query("SELECT matiere, annee, frais FROM p3_g3_cursus WHERE matiere LIKE '%$recherche%' OR annee LIKE '%$recherche%'");
            $recherchecursus = $requete->result();
            return $recherchecursus;
        }
    }

    public function addcursus($data)
    {
        $this->load->database();
        $this->db->insert('p3_g3_cursus', $data);
    }

    public function find_cursus($cursus)
    {
        return $this->db->get_where('p3_g3_cursus', array('idCursus' => $cursus))->row();
    }

    public function updatecursus($id, $data)
    {
        $this->load->database();
        $this->db->where('idCursus', $id);
        $this->db->update('p3_g3_cursus', $data);
    }

    public function removecursus($id)
    {
        $this->load->database();
        $this->load->helper('url');
        $this->db->where('idCursus', $id);
        $this->db->delete('p3_g3_cursus');
    }

    public function listeeleves()
    {
        $requete = $this->db->query("SELECT * FROM p3_g3_comptes WHERE type='eleve'");
        $listeeleves = $requete->result();
        return $listeeleves;
    }

    public function attribuecursuseleve($ide, $cur)
    {
        if ($this->input->post('btn_update')) {

            $data = array(
                'cursus_id' => $cur
            );

            $this->db->where('idEleve', $ide)
                ->update('p3_g3_eleve', $data);

            echo '<h1 class="text-center text-success">Le cursus a bien été attribué</h1>';
        }
    }

    public function rechercheeleve()
    {
        if ($this->input->post('recherche')) {

            $recherche = $this->input->post('recherche');

            $requete = $this->db->query("SELECT username, email, status FROM p3_g3_comptes WHERE type='eleve' AND username LIKE '%$recherche%' OR type='eleve' AND email LIKE '%$recherche%' OR type='eleve' AND status LIKE '%$recherche%'");
            $rechercheeleve = $requete->result();
            return $rechercheeleve;
        }
    }

    public function listeelevecursus()
    {
        $requete = $this->db->query("SELECT p3_g3_comptes.id, p3_g3_comptes.username, p3_g3_comptes.email, p3_g3_comptes.status, p3_g3_cursus.matiere, p3_g3_cursus.annee, p3_g3_cursus.frais, p3_g3_eleve.idEleve FROM p3_g3_comptes JOIN p3_g3_eleve ON p3_g3_comptes.eleve_id=p3_g3_eleve.idEleve JOIN p3_g3_cursus ON p3_g3_eleve.cursus_id=p3_g3_cursus.idCursus ");
        $listeelevecursus = $requete->result();
        return $listeelevecursus;
    }

    public function listeelevesanscursus()
    {
        $requete = $this->db->query("SELECT p3_g3_comptes.id, p3_g3_comptes.username, p3_g3_comptes.email, p3_g3_comptes.status, p3_g3_eleve.idEleve FROM p3_g3_comptes INNER JOIN p3_g3_eleve ON p3_g3_comptes.eleve_id=p3_g3_eleve.idEleve WHERE cursus_id IS NULL");
        $listeelevesanscursus = $requete->result();
        return $listeelevesanscursus;
    }

    public function rechercheelevefamille()
    {
        $famille_id = ($this->session->userdata('famille_id'));

        if ($this->input->post('recherche')) {

            $recherche = $this->input->post('recherche');

            $requete = $this->db->query("SELECT p3_g3_comptes.username, p3_g3_comptes.email, p3_g3_comptes.status FROM p3_g3_comptes WHERE type='eleve' AND famille_id=$famille_id AND p3_g3_comptes.username LIKE '%$recherche%' OR type='eleve' AND famille_id=$famille_id AND p3_g3_comptes.email LIKE '%$recherche%' OR type='eleve' AND famille_id=$famille_id AND status LIKE '%$recherche%'");
            $rechercheelevefamille = $requete->result();
            return $rechercheelevefamille;
        }
    }

    public function listeeleveattentefamille()
    {
        $famille_id = ($this->session->userdata('famille_id'));

        $requete = $this->db->query("SELECT * FROM p3_g3_comptes INNER JOIN p3_g3_eleve ON p3_g3_comptes.eleve_id=p3_g3_eleve.idEleve WHERE cursus_id IS NULL AND p3_g3_eleve.famille_id=$famille_id");
        $listeeleveattentefamille = $requete->result();
        return $listeeleveattentefamille;
    }

    public function listeelevefamille()
    {

        $famille_id = ($this->session->userdata('famille_id'));

        $requete = $this->db->query("SELECT * FROM p3_g3_comptes JOIN p3_g3_eleve ON p3_g3_comptes.eleve_id=p3_g3_eleve.idEleve JOIN p3_g3_cursus ON p3_g3_eleve.cursus_id=p3_g3_cursus.idCursus WHERE p3_g3_eleve.famille_id=$famille_id");
        $listeelevefamille = $requete->result();
        return $listeelevefamille;
    }

    public function affichenotesfamille()
    {
        $eleve_id = $this->uri->segment(3);
        $requete = $this->db->query("SELECT p3_g3_controle.intitule, p3_g3_controle.note, p3_g3_controle.commentaire, p3_g3_controle.date FROM p3_g3_controle WHERE p3_g3_controle.eleve_id=$eleve_id");
        $affichenotesfamille = $requete->result();
        return $affichenotesfamille;
    }

    public function rechercheelevecursusprof()
    {
        $enseignant_id = ($this->session->userdata('enseignant_id'));

        if ($this->input->post('recherche')) {

            $recherche = $this->input->post('recherche');

            $requete = $this->db->query("SELECT p3_g3_comptes.username, p3_g3_comptes.email, p3_g3_comptes.status FROM p3_g3_comptes JOIN p3_g3_eleve ON p3_g3_comptes.eleve_id=p3_g3_eleve.idEleve JOIN p3_g3_cursus ON p3_g3_eleve.cursus_id=p3_g3_cursus.idCursus WHERE p3_g3_cursus.enseignant_id=$enseignant_id AND p3_g3_comptes.username LIKE '%$recherche%' OR p3_g3_cursus.enseignant_id=$enseignant_id AND p3_g3_comptes.email LIKE '%$recherche%' OR p3_g3_cursus.enseignant_id=$enseignant_id AND status LIKE '%$recherche%'");
            $rechercheelevecursusprof = $requete->result();
            return $rechercheelevecursusprof;
        }
    }

    public function listeelevecursusprof()
    {
        $enseignant_id = ($this->session->userdata('enseignant_id'));

        $requete = $this->db->query("SELECT p3_g3_comptes.username, p3_g3_comptes.email, p3_g3_comptes.status, p3_g3_comptes.eleve_id, p3_g3_cursus.matiere, p3_g3_cursus.annee FROM p3_g3_comptes JOIN p3_g3_eleve ON p3_g3_comptes.eleve_id=p3_g3_eleve.idEleve JOIN p3_g3_cursus ON p3_g3_eleve.cursus_id=p3_g3_cursus.idCursus WHERE p3_g3_cursus.enseignant_id=$enseignant_id");
        $listeelevecursusprof = $requete->result();
        return $listeelevecursusprof;
    }

    public function affichenotesprof()
    {
        $eleve_id = $this->uri->segment(3);
        $requete = $this->db->query("SELECT * FROM p3_g3_controle WHERE eleve_id=$eleve_id");
        $affichenotesprof = $requete->result();
        return $affichenotesprof;
    }

    public function listecursusprof()
    {
        $enseignant_id = ($this->session->userdata('enseignant_id'));

        $requete = $this->db->query("SELECT * FROM p3_g3_cursus WHERE p3_g3_cursus.enseignant_id=$enseignant_id");
        $listecursusprof = $requete->result();
        return $listecursusprof;
    }

    public function affichenotes()
    {
        $eleve_id = ($this->session->userdata('eleve_id'));

        $requete = $this->db->query("SELECT * FROM p3_g3_controle WHERE eleve_id=$eleve_id");
        $affichenotes = $requete->result();
        return $affichenotes;
    }

    public function ajoutcontrole($idControle, $eleve_id)
    {
        $enseignant_id = ($this->session->userdata('enseignant_id'));
        if ($this->input->post('valider')) {
            $data = array(
                'intitule' => ($this->input->post('intitule')),
                'note' => ($this->input->post('note')),
                'commentaire' => ($this->input->post('commentaire')),
                'date' => ($this->input->post('date')),
                'enseignant_id' => $enseignant_id,
                'eleve_id' => $eleve_id
            );
            $this->db->where('idControle', $idControle)
                ->insert('p3_g3_controle', $data);
            // echo '<h1 class="text-center text-success">Le contrôle a bien été attribué</h1>';
        }
    }
}
