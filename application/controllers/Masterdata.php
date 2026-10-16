<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'core/MY_Controller.php';

class Masterdata extends MY_Controller
{
    private $fields = [
        'no_urut', 'nama', 'nip_nps', 'status_kepegawaian', 'golongan', 'jabatan_fungsional',
        'status_keluarga', 'tempat_lahir', 'tanggal_lahir', 'email', 'nik',
        'pendidikan', 'tahun_lulus', 'asal_pendidikan', 'tmt_bekerja', 'level_pk',
        'masa_berlaku_str', 'masa_berlaku_spk', 'masa_berlaku_sip', 'penempatan',
        'jabatan', 'keterangan', 'status_kesehatan', 'diagnosa_utama', 'komorbid',
        'ip_asn', 'pelatihan', 'bb', 'tb', 'bmi',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Masterdata_model');
        $this->load->library('pagination');
    }

    public function index()
    {
        $search = trim((string) $this->input->get('q'));
        $perPage = 20;
        $page = max(1, (int) $this->input->get('page'));
        $offset = ($page - 1) * $perPage;

        $total = $this->Masterdata_model->countAll($search);
        $rows = $this->Masterdata_model->getPage($search, $perPage, $offset);

        $config = [
            'base_url' => site_url('masterdata?q=' . urlencode($search) . '&'),
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

        $this->load->view('masterdata/index', [
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
                $this->Masterdata_model->insert($this->collectInput());
                $this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
                redirect('masterdata');
            }
            $errors = $this->form_validation->error_array();
        }

        $this->load->view('masterdata/form', [
            'mode' => 'create',
            'row' => $this->emptyRow(),
            'errors' => $errors,
        ]);
    }

    public function edit($id)
    {
        $row = $this->Masterdata_model->getById($id);
        if (!$row) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan.');
            redirect('masterdata');
        }

        $errors = [];

        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('nik', 'NIK', 'trim|max_length[20]');

            if ($this->form_validation->run()) {
                $this->Masterdata_model->update($id, $this->collectInput());
                $this->session->set_flashdata('success', 'Data berhasil diperbarui.');
                redirect('masterdata');
            }
            $errors = $this->form_validation->error_array();
            $row = array_merge($row, $this->collectInput());
        }

        $this->load->view('masterdata/form', [
            'mode' => 'edit',
            'row' => $row,
            'errors' => $errors,
        ]);
    }

    public function delete($id)
    {
        $row = $this->Masterdata_model->getById($id);
        if ($row) {
            $this->Masterdata_model->delete($id);
            $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Data tidak ditemukan.');
        }
        redirect('masterdata');
    }

    private function collectInput()
    {
        $data = [];
        foreach ($this->fields as $field) {
            $value = trim((string) $this->input->post($field));
            if (in_array($field, ['bb', 'tb', 'bmi'], true)) {
                $value = str_replace(',', '.', $value);
            }
            $data[$field] = $value === '' ? null : $value;
        }
        return $data;
    }

    private function emptyRow()
    {
        return array_fill_keys($this->fields, '');
    }
}
