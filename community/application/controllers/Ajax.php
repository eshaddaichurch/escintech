<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends CI_Controller
{

    public function getInfoJemaat()
    {
        $idjemaat = $this->input->get('idjemaat');
        $rsJemaat = $this->db->query("select * from v_jemaat where idjemaat = '$idjemaat'");

        $rsNextStep = $this->App->getKelasJemaat($idjemaat);
        $arrNextStep = array();
        if ($rsNextStep->num_rows() > 0) {
            foreach ($rsNextStep->result() as $row) {
                array_push($arrNextStep, array(
                    'namakelas' => $row->namakelas
                ));
            }
        }

        $arrJemaatFamily = $this->App->getJemaatFamily($idjemaat);


        echo json_encode(array('rowJemaat' => $rsJemaat->row(), 'arrNextStep' => $arrNextStep, 'arrJemaatFamily' => $arrJemaatFamily));
    }
}
