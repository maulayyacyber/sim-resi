<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      SIM RESI (Pondok Kode Web Project Development)
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class log extends MX_Controller {

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
  		$this->breadcrumb->append_crumb('','master', '#');
      $this->breadcrumb->append_crumb('current','Log Session', '#');
      //class active menu
      $data['active_dashboard'] = "";
      $data['active_resi'] = "";
      $data['active_input_resi'] = "";
      $data['active_jne'] = "";
      $data['active_pos'] = "";
      $data['active_statistic'] = "";
      $data['active_master'] = "active";
      $data['active_user'] = "";
      $data['active_log'] = "active";
      $data['active_pengaturan'] = "";
      $data['active_sistem'] = "";
      //generate data sistem
      $data['log_session'] = $this->pondokkode_model_admin->generate_session();
  		// tampilkan halaman dashboard dengan data
  		$this->load->view('header',$data);
  	         $this->load->view('sidebar');
  	         $this->load->view('master/session');
  	         $this->load->view('footer');
  	}
}
