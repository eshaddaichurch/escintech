<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    public function isLogin()
    {
        if (empty($this->session->userdata('idjemaat'))) {
            redirect(site_url());
        }
    }

    public function wajibLogin()
    {
        if (empty($this->session->userdata('idjemaat'))) {
            $pesan = "<script>
                            swal('Belum Login', 'Silahkan login terlebih dahulu untuk melanjutkan!', 'warning')
                            .then(function(){
                                $('#loginModal').modal('show');
                            });
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('home');
        }
        return true;
    }
}

/* End of file MY_controller.php */
/* Location: ./application/core/MY_controller.php */