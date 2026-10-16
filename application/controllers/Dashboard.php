<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'core/MY_Controller.php';

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Datakiara_model');
        $this->load->model('Masterdata_model');
    }

    public function index()
    {
        $this->load->view('dashboard/index', [
            'total' => $this->Datakiara_model->countAll(),
            'statusKepegawaian' => $this->Datakiara_model->countGroupBy('status_kepegawaian'),
            'golongan' => $this->Datakiara_model->countGroupBy('golongan'),
            'levelPk' => $this->Datakiara_model->countGroupBy('level_pk'),

            'totalMaster' => $this->Masterdata_model->countAll(),
            'statusKepegawaianMaster' => $this->Masterdata_model->countGroupBy('status_kepegawaian'),
            'penempatanMaster' => $this->Masterdata_model->countGroupBy('penempatan'),
            'jabatanMaster' => $this->Masterdata_model->countGroupBy('jabatan'),
        ]);
    }
}
