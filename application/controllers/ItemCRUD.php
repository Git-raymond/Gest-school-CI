<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ItemCRUD extends CI_Controller
{
    public $itemCRUD;

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('ItemCRUDModel');

        $this->itemCRUD = new ItemCRUDModel;
    }


    /**
     * Display Data this method.
     *
     * @return Response
     */
    public function index()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Navigation/connection'));
        }

        $data['data'] = $this->itemCRUD->get_itemCRUD();

        $this->load->view('header');
        $this->load->view('ItemCRUD/list', $data);
        $this->load->view('footer');
    }


    /**
     * Show Details this method.
     *
     * @return Response
     */
    // public function show($id)
    // {
    //     $item = $this->itemCRUD->find_item($id);


    //     $this->load->view('header');
    //     $this->load->view('itemCRUD/show', array('item' => $item));
    //     $this->load->view('footer');
    // }


    /**
     * Create from display on this method.
     *
     * @return Response
     */
    public function create()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Navigation/connection'));
        }

        $this->load->view('header');
        $this->load->view('ItemCRUD/create');
        $this->load->view('footer');
    }

    /**
     * Store Data from this method.
     *
     * @return Response
     */
    public function store()
    {
        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('couleur', 'Couleur', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect(site_url('ItemCRUD/create'));
        } else {
            $this->itemCRUD->insert_item();
            redirect(site_url('ItemCRUD'));
        }
    }


    /**
     * Edit Data from this method.
     *
     * @return Response
     */
    public function edit($id)
    {
        if ($this->session->connected == false) {
            redirect(site_url('Navigation/connection'));
        }

        $item = $this->itemCRUD->find_item($id);

        $this->load->view('header');
        $this->load->view('ItemCRUD/edit', array('item' => $item));
        $this->load->view('footer');
    }


    /**
     * Update Data from this method.
     *
     * @return Response
     */
    public function update($id)
    {
        // if ($this->session->connected == false) {
        //     redirect(site_url('Navigation/connection'));
        // }

        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('couleur', 'Couleur', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect(site_url('ItemCRUD/edit/' . $id));
        } else {
            $this->itemCRUD->update_item($id);
            redirect(site_url('ItemCRUD'));
        }
    }


    /**
     * Delete Data from this method.
     *
     * @return Response
     */
    public function delete($id)
    {
        $item = $this->itemCRUD->delete_item($id);
        redirect(site_url('ItemCRUD'));
    }
}
