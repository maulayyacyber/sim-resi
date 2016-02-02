<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      SIM RESI (Pondok Kode Web Project Development)
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class sistem extends MX_Controller {

function _construct(){
parent::__construct();
if(!$this->session->sess_read()){
    $data['login_info'] = '';
    $this->load->view('login',$data);
}
}
	public function index()
	{
		// mencegah user yang belum login untuk mengakses halaman ini
		$this->auth->restrict();
    //cek apakah user aktif ?
    $this->auth->status_aktif($aktif=0);
    // Import JS
    $data['data_js'] = "";
    // Import JS Readey
    $data['js_ready'] = "";
    //load model
    $this->load->model("pondokkode_model_admin");
    // load library breadcrumb
		$this->breadcrumb->append_crumb('','Dashboard', base_url().'admin/dashboard');
		$this->breadcrumb->append_crumb('','Pengaturan', '#');
    $this->breadcrumb->append_crumb('current','Sistem', '#');
    //class active menu
    $data['active_dashboard'] = "";
    $data['active_resi'] = "";
    $data['active_input_resi'] = "";
    $data['active_jne'] = "";
    $data['active_pos'] = "";
    $data['active_statistic'] = "";
    $data['active_master'] = "";
    $data['active_user'] = "";
    $data['active_log'] = "";
    $data['active_pengaturan'] = "active";
    $data['active_sistem'] = "active";
    //generate data sistem
    $data['data_sistem'] = $this->pondokkode_model_admin->generate_setting();
		// tampilkan halaman dashboard dengan data
		$this->load->view('header',$data);
	         $this->load->view('sidebar');
	         $this->load->view('pengaturan/sistem');
	         $this->load->view('footer');
	}

	public function simpan()
	{
		// mencegah user yang belum login untuk mengakses halaman ini
		$this->auth->restrict();
    // cek apakah status user aktif atau tidak, jika tidak akan ke redirect halaman login
    $this->auth->status_aktif($aktif=0);
    // Ge tpost
    $id_setting = $this->input->post("id_setting");
    $nilai = $this->input->post("nilai_setting");
    $jml = count($id_setting);
      for($i=0;$i<$jml;$i++)
      {
        $id['id_setting'] = $id_setting[$i];
        $update['content_setting'] = $nilai[$i];
        $update['id_user'] = $this->session->userdata('user_id');
        $this->db->update("tbl_setting",$update,$id);

				$this->session->set_flashdata('pesan_notif', '<div class="alert alert-block alert-success fade in">
                                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                            </button>
                                                            <i class="fa fa-check-square-o"></i> Sistem Berhasil Diupdate  !
                                                            </div>');
        }
      redirect('admin/pengaturan/sistem');
	}
}
