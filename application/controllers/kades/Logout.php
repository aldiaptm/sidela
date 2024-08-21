<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{
    public function index()
    {
        // Jika pengguna mengkonfirmasi keluar
        if ($this->input->get('confirm') === 'true') {
            // Hapus data sesi
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('role_id');

            // Set pesan pemberitahuan
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Sudah Keluar Akun</div>');

            // Redirect ke halaman login
            redirect('kades/login');
        }
        // Jika pengguna belum mengkonfirmasi keluar
        else {
            // Tampilkan konfirmasi
            echo '<script>
                    if(confirm("Apakah Anda yakin ingin keluar?")) {
                        window.location.href = "' . base_url('kades/logout') . '?confirm=true";
                    } else {
                        window.location.href = "' . base_url('kades/dashboard') . '"; // Redirect kembali ke halaman dashboard jika pengguna membatalkan
                    }
                </script>';
        }
    }
}
