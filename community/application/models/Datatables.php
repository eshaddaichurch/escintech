<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datatables extends CI_Model
{
    var $tabelview;
    var $column_order;
    var $column_search;
    var $order_array;
    var $where_condition;

    var $search_value;
    var $length_row;
    var $start_row;
    var $num_order_colomn;
    var $num_order_dir;

    function get_datatables()
    {
        $this->_get_datatables_query();
        $this->order_by();
        if ($this->length_row != -1)
            $this->db->limit($this->length_row, $this->start_row);
        return $this->db->get();
    }

    private function _get_datatables_query()
    {
        if (!empty($this->where_condition)) {
            $this->db->where($this->where_condition);
        }
        $this->db->from($this->tabelview);
        $i = 0;

        foreach ($this->column_search as $item) {
            if ($this->search_value) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $this->search_value);
                } else {
                    $this->db->or_like($item, $this->search_value);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
    }

    private function order_by()
    {
        if (isset($this->num_order_colomn)) {
            $this->db->order_by($this->column_order[$this->num_order_colomn], $this->num_order_dir);
        } else if (isset($this->order_array)) {
            $order = $this->order_array;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function count_filtered()
    {
        $this->db->select('count(*) as jlh');
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->row()->jlh;
    }

    public function count_all()
    {
        if (!empty($this->where_condition)) {
            $this->db->where($this->where_condition);
        }
        $this->db->select('count(*) as jlh');
        return $this->db->get($this->tabelview)->row()->jlh;
    }
}

/* End of file Datatables.php */
/* Location: ./application/models/Datatables.php */