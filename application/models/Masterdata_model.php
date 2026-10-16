<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterdata_model extends CI_Model
{
    private $table = 'master_data';

    private function applySearch($search)
    {
        if ($search !== '') {
            $this->db->group_start();
            $this->db->like('nama', $search);
            $this->db->or_like('nip_nps', $search);
            $this->db->or_like('nik', $search);
            $this->db->or_like('penempatan', $search);
            $this->db->or_like('jabatan', $search);
            $this->db->group_end();
        }
    }

    public function countAll($search = '')
    {
        $this->applySearch($search);
        return $this->db->count_all_results($this->table);
    }

    public function getPage($search = '', $limit = 20, $offset = 0)
    {
        $this->applySearch($search);
        $this->db->order_by('nama', 'ASC');
        $this->db->limit($limit, $offset);
        return $this->db->get($this->table)->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db->update($this->table, $data, ['id' => $id]);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }

    public function countGroupBy($column)
    {
        $allowed = ['status_kepegawaian', 'golongan', 'level_pk', 'status_kesehatan', 'penempatan', 'jabatan'];
        if (!in_array($column, $allowed, true)) {
            throw new InvalidArgumentException('Kolom tidak diizinkan untuk group by.');
        }

        $this->db->select("$column AS label, COUNT(*) AS total");
        $this->db->from($this->table);
        $this->db->where("$column IS NOT NULL AND $column != ''");
        $this->db->group_by($column);
        $this->db->order_by('total', 'DESC');

        return $this->db->get()->result_array();
    }
}
