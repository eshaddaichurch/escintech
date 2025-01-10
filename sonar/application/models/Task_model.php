<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Task_model extends CI_Model
{

    public $tabelview = 'v_task';
    public $tabel     = 'task';
    public $idtask    = 'idtask';

    public $column_order  = array(null, 'namatask', 'tglmulai', 'namapic', 'namaassignment', 'statustask', null);
    public $column_search = array('namaproyek', 'namapic', 'idproyeklist', 'namatask', 'idprojectmanager', 'deskripsi', 'idkategori', 'idpic', 'prioritas', 'namaassignment', 'statustask');
    public $order         = array('tglinsert' => 'desc'); // default order

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        return $this->db->get();
    }

    private function _get_datatables_query()
    {
        $where    = 'assignment is not null ';
        $idproyek = $_POST['idproyek'];
        if (!empty($idproyek)) {
            $where .= ' and idproyek="' . $idproyek . '"';
        }

        $assignment = $_POST['assignment'];
        if (!empty($assignment)) {
            $where .= ' and assignment="' . $assignment . '"';
        }

        $idpic = $_POST['idpic'];
        if (!empty($idpic)) {
            $where .= ' and (idpic="' . $idpic . '" or idpic2 ="' . $idpic . '")';
        }

        $statustask = $_POST['statustask'];
        if (!empty($statustask)) {
            if ($statustask == 'Sudah Selesai') {
                $where .= ' and statustask="Sudah Selesai"';
            } else {
                $where .= ' and statustask<>"Sudah Selesai"';
            }
        }
        $this->db->where($where);
        $this->db->from($this->tabelview);
        $i = 0;
        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) //last loop
                {
                    $this->db->group_end();
                }

            }
            $i++;
        }

        // -------------------------> Proses Order by
        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }

    }

    public function count_filtered()
    {
        $this->db->select('count(*) as jlh');
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->row()->jlh;
    }

    public function count_all()
    {
        $this->db->select('count(*) as jlh');
        return $this->db->get($this->tabelview)->row()->jlh;
    }

    public function get_all()
    {
        return $this->db->get($this->tabelview);
    }

    public function get_by_id($idtask)
    {
        $this->db->where('idtask', $idtask);
        return $this->db->get($this->tabelview);
    }

    public function hapus($idtask)
    {
        $this->db->where('idtask', $idtask);
        return $this->db->delete($this->tabel);
    }

    public function simpan($data)
    {
        return $this->db->insert($this->tabel, $data);
    }

    public function update($data, $idtask)
    {
        $this->db->where('idtask', $idtask);
        $this->db->update($this->tabel, $data);
        return true;
    }

    public function insert_komentar($dataKomentar)
    {
        $this->db->insert('taskkomentar', $dataKomentar);
        return true;
    }

}

/* End of file Task_model.php */
/* Location: ./application/models/Task_model.php */
