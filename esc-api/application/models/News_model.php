<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News_model extends CI_Model
{

    public function getnewsumum($setlimit = 5)
    {
        return $this->db->query("
            SELECT * FROM pages WHERE idpageskategori = 'MU001' ORDER BY tglinsert DESC limit $setlimit
        ");
    }
}
