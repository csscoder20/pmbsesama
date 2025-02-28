<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_agenda');
        // $this->load->model('M_pendaftar');
    }

    public function index()
    {
        $data['agenda'] = $this->M_agenda->get_all();
        // $data['_view'] = 'pendaftar/navbar';
        $this->load->view('agenda/index', $data);
        // $this->load->view('pendaftar/agenda');
    }

    public function detail($id)
    {
        $data['detail'] = $this->M_agenda->get_by_id($id);
        // $this->load->view('pendaftar/detailagenda', $this->data);
        // $this->data['_view'] = 'pendaftar/navbar';
        $this->load->view('agenda/detail', $data);
    }
}
