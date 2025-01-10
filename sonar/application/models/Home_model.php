<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
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
        $jenisdata = $_POST['jenisdata'];
        if ($jenisdata != 'SemuaTugas') {
            $this->db->where('idpic="' . $this->session->userdata('idpengguna') . '" or idpic2="' . $this->session->userdata('idpengguna') . '"');
        }
        $this->db->where('statustask', 'Baru');
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

}

/* End of file Home_model.php */
/* Location: ./application/models/Home_model.php */
