<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'core/MY_Controller.php';

class Datakiara extends MY_Controller
{
    private $fields = [
        'no_urut', 'nama', 'nip_nps', 'status_kepegawaian', 'golongan', 'jabfung',
        'status_keluarga', 'tempat_lahir', 'tanggal_lahir', 'email', 'nik',
        'pendidikan_d3_s1', 'tahun_lulus_d3_s1', 'asal_pendidikan_1',
        'pendidikan_lanjutan', 'tahun_lulus_lanjutan', 'asal_pendidikan_lanjutan',
        'tmt_bekerja', 'area_kompetensi', 'level_pk', 'masa_berlaku_str',
        'masa_berlaku_spk', 'masa_berlaku_sip', 'penempatan', 'jabatan',
        'jenis_ruangan', 'status_kesehatan',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Datakiara_model');
        $this->load->library('pagination');
    }

    public function index()
    {
        $search = trim((string) $this->input->get('q'));
        $perPage = 20;
        $page = max(1, (int) $this->input->get('page'));
        $offset = ($page - 1) * $perPage;

        $total = $this->Datakiara_model->countAll($search);
        $rows = $this->Datakiara_model->getPage($search, $perPage, $offset);

        $config = [
            'base_url' => site_url('datakiara?q=' . urlencode($search) . '&'),
            'total_rows' => $total,
            'per_page' => $perPage,
            'page_query_string' => true,
            'query_string_segment' => 'page',
            'use_page_numbers' => true,
            'full_tag_open' => '<ul class="pagination pagination-sm mb-0 justify-content-end">',
            'full_tag_close' => '</ul>',
            'first_tag_open' => '<li class="page-item">', 'first_tag_close' => '</li>',
            'last_tag_open' => '<li class="page-item">', 'last_tag_close' => '</li>',
            'next_tag_open' => '<li class="page-item">', 'next_tag_close' => '</li>',
            'prev_tag_open' => '<li class="page-item">', 'prev_tag_close' => '</li>',
            'cur_tag_open' => '<li class="page-item active"><span class="page-link">', 'cur_tag_close' => '</span></li>',
            'num_tag_open' => '<li class="page-item">', 'num_tag_close' => '</li>',
            'attributes' => ['class' => 'page-link'],
        ];
        $this->pagination->initialize($config);

        $this->load->view('datakiara/index', [
            'rows' => $rows,
            'search' => $search,
            'total' => $total,
            'pagination' => $this->pagination->create_links(),
        ]);
    }

    public function create()
    {
        $errors = [];

        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('nik', 'NIK', 'trim|max_length[20]');

            if ($this->form_validation->run()) {
                $this->Datakiara_model->insert($this->collectInput());
                $this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
                redirect('datakiara');
            }
            $errors = $this->form_validation->error_array();
        }

        $this->load->view('datakiara/form', [
            'mode' => 'create',
            'row' => $this->emptyRow(),
            'errors' => $errors,
        ]);
    }

    public function edit($id)
    {
        $row = $this->Datakiara_model->getById($id);
        if (!$row) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan.');
            redirect('datakiara');
        }

        $errors = [];

        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('nik', 'NIK', 'trim|max_length[20]');

            if ($this->form_validation->run()) {
                $this->Datakiara_model->update($id, $this->collectInput());
                $this->session->set_flashdata('success', 'Data berhasil diperbarui.');
                redirect('datakiara');
            }
            $errors = $this->form_validation->error_array();
            $row = array_merge($row, $this->collectInput());
        }

        $this->load->view('datakiara/form', [
            'mode' => 'edit',
            'row' => $row,
            'errors' => $errors,
        ]);
    }

    public function delete($id)
    {
        $row = $this->Datakiara_model->getById($id);
        if ($row) {
            $this->Datakiara_model->delete($id);
            $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Data tidak ditemukan.');
        }
        redirect('datakiara');
    }

    private function collectInput()
    {
        $data = [];
        foreach ($this->fields as $field) {
            $value = trim((string) $this->input->post($field));
            $data[$field] = $value === '' ? null : $value;
        }
        return $data;
    }

    private function emptyRow()
    {
        return array_fill_keys($this->fields, '');
    }
}
