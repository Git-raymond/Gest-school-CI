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

    public function updatecursus($id, $data)
    {
        $this->load->database();
        $this->db->where('idCursus', $id);
        $this->db->update('cursus', $data);
    }

    public function removecursus($id)
    {
        $this->load->database();
        $this->load->helper('url');
        $this->db->where('idCursus', $id);
        $this->db->delete('cursus');
    }

    public function listeeleves()
    {
        $requete = $this->db->query("SELECT * FROM comptes WHERE type='eleve'");
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
                ->update('eleve', $data);

            echo '<h1 class="text-center text-success">Le cursus a bien été attribué</h1>';
        }
    }

    public function rechercheeleve()
    {
        if ($this->input->post('recherche')) {

            $recherche = $this->input->post('recherche');

            $requete = $this->db->query("SELECT username, email, status FROM comptes WHERE type='eleve' AND username LIKE '%$recherche%' OR type='eleve' AND email LIKE '%$recherche%' OR type='eleve' AND status LIKE '%$recherche%'");
            $rechercheeleve = $requete->result();
            return $rechercheeleve;
        }
    }

    public function listeelevecursus()
    {
        $requete = $this->db->query("SELECT comptes.id, comptes.username, comptes.email, comptes.status, cursus.matiere, cursus.annee, cursus.frais, eleve.idEleve FROM comptes JOIN eleve ON comptes.eleve_id=eleve.idEleve JOIN cursus ON eleve.cursus_id=cursus.idCursus ");
        $listeelevecursus = $requete->result();
        return $listeelevecursus;
    }

    public function listeelevesanscursus()
    {
        $requete = $this->db->query("SELECT comptes.id, comptes.username, comptes.email, comptes.status, eleve.idEleve FROM comptes INNER JOIN eleve ON comptes.eleve_id=eleve.idEleve WHERE cursus_id IS NULL");
        $listeelevesanscursus = $requete->result();
        return $listeelevesanscursus;
    }

    public function rechercheelevefamille()
    {
        $famille_id = ($this->session->userdata('famille_id'));

        if ($this->input->post('recherche')) {

            $recherche = $this->input->post('recherche');

            $requete = $this->db->query("SELECT comptes.username, comptes.email, comptes.status FROM comptes WHERE type='eleve' AND famille_id=$famille_id AND comptes.username LIKE '%$recherche%' OR type='eleve' AND famille_id=$famille_id AND comptes.email LIKE '%$recherche%' OR type='eleve' AND famille_id=$famille_id AND status LIKE '%$recherche%'");
            $rechercheelevefamille = $requete->result();
            return $rechercheelevefamille;
        }
    }

    public function listeeleveattentefamille()
    {
        $famille_id = ($this->session->userdata('famille_id'));

        $requete = $this->db->query("SELECT * FROM comptes INNER JOIN eleve ON comptes.eleve_id=eleve.idEleve WHERE cursus_id IS NULL AND eleve.famille_id=$famille_id");
        $listeeleveattentefamille = $requete->result();
        return $listeeleveattentefamille;
    }

    public function listeelevefamille()
    {

        $famille_id = ($this->session->userdata('famille_id'));

        $requete = $this->db->query("SELECT * FROM comptes JOIN eleve ON comptes.eleve_id=eleve.idEleve JOIN cursus ON eleve.cursus_id=cursus.idCursus WHERE eleve.famille_id=$famille_id");
        $listeelevefamille = $requete->result();
        return $listeelevefamille;
    }

    public function affichenotesfamille()
    {
        $eleve_id = 87;
        // $eleve_id = $_REQUEST['id']; 
        $requete = $this->db->query("SELECT controle.intitule, controle.note, controle.commentaire, controle.date FROM controle WHERE controle.eleve_id=$eleve_id");
        $affichenotesfamille = $requete->result();
        return $affichenotesfamille;
    }

    public function rechercheelevecursusprof()
    {
        $enseignant_id = ($this->session->userdata('enseignant_id'));

        if ($this->input->post('recherche')) {

            $recherche = $this->input->post('recherche');

            $requete = $this->db->query("SELECT comptes.username, comptes.email, comptes.status FROM comptes JOIN eleve ON comptes.eleve_id=eleve.idEleve JOIN cursus ON eleve.cursus_id=cursus.idCursus WHERE cursus.enseignant_id=$enseignant_id AND comptes.username LIKE '%$recherche%' OR cursus.enseignant_id=$enseignant_id AND comptes.email LIKE '%$recherche%' OR cursus.enseignant_id=$enseignant_id AND status LIKE '%$recherche%'");
            $rechercheelevecursusprof = $requete->result();
            return $rechercheelevecursusprof;
        }
    }

    public function listeelevecursusprof()
    {
        $enseignant_id = ($this->session->userdata('enseignant_id'));

        $requete = $this->db->query("SELECT comptes.username, comptes.email, comptes.status, comptes.eleve_id, cursus.matiere, cursus.annee FROM comptes JOIN eleve ON comptes.eleve_id=eleve.idEleve JOIN cursus ON eleve.cursus_id=cursus.idCursus WHERE cursus.enseignant_id=$enseignant_id");
        $listeelevecursusprof = $requete->result();
        return $listeelevecursusprof;
    }

    public function affichenotesprof()
    {
        $eleve_id = 87;
        // $eleve_id = $_REQUEST['id']; 
        $requete = $this->db->query("SELECT * FROM controle WHERE eleve_id=$eleve_id");
        $affichenotesprof = $requete->result();
        return $affichenotesprof;
    }

    public function listecursusprof()
    {
        $enseignant_id = ($this->session->userdata('enseignant_id'));

        $requete = $this->db->query("SELECT * FROM cursus WHERE cursus.enseignant_id=$enseignant_id");
        $listecursusprof = $requete->result();
        return $listecursusprof;
    }

    public function affichenotes()
    {
        $eleve_id = ($this->session->userdata('eleve_id'));

        $requete = $this->db->query("SELECT * FROM controle WHERE eleve_id=$eleve_id");
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
                ->insert('controle', $data);
            // echo '<h1 class="text-center text-success">Le contrôle a bien été attribué</h1>';
        }
    }
}
