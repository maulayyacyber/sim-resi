<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      SIM RESI (Pondok Kode Web Project Development)
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class web extends MX_Controller {
function __construct(){
  parent::__construct();
  //load model
  $this->load->model('pondokkode_model_web');
  //set cookie visitor
  //$this->pondokkode_model_web->counter_visitor();
}

	public function index($uri=0)
	{
    //load model
    $this->load->model("Pondokkode_model_web");
    //class menu active
		$data['home'] = "active";
		$data['jne']  = "";
		$data['pos']  = "";
		$data['help'] = "";
    //filter data
		$filter['data_resi'] = $this->session->userdata('data_resi');
		//get data judul
		$data['data_resi'] = $this->Pondokkode_model_web->get_semua_resi($this->config->item("limit_10"),$uri,$filter);
		//get paging
		$data['paging'] = $this->pagination->create_links();
  	//tampilkan halaman dengan data
  	$this->load->view('header',$data);
      		$this->load->view('home');
      		$this->load->view('footer');
	}

  public function search_resi()
  {
      $sess['data_resi'] = mysql_escape_string($this->input->post("data_resi"));
      $this->session->set_userdata($sess);
      redirect(base_url());
  }

  public function jne($uri=0)
	{
    //load model
    $this->load->model("Pondokkode_model_web");
    //class menu active
		$data['home'] = "";
		$data['jne']  = "active";
		$data['pos']  = "";
		$data['help'] = "";
    //filter data
		$filter['data_jne'] = $this->session->userdata('data_jne');
		//get data judul
		$data['data_jne'] = $this->Pondokkode_model_web->get_resi_jne($this->config->item("limit_10"),$uri,$filter);
		//get paging
		$data['paging'] = $this->pagination->create_links();
  	//tampilkan halaman dengan data
  	$this->load->view('header',$data);
      		$this->load->view('jne');
      		$this->load->view('footer');
	}

  public function search_jne()
  {
      $sess['data_jne'] = mysql_escape_string($this->input->post("data_jne"));
      $this->session->set_userdata($sess);
      redirect("resi-pengiriman/jne/");
  }

  public function pos($uri=0)
	{
    //load model
    $this->load->model("Pondokkode_model_web");
    //class menu active
		$data['home'] = "";
		$data['jne']  = "";
		$data['pos']  = "active";
		$data['help'] = "";
    //filter data
		$filter['data_pos'] = $this->session->userdata('data_pos');
		//get data judul
		$data['data_pos'] = $this->Pondokkode_model_web->get_resi_pos($this->config->item("limit_10"),$uri,$filter);
		//get paging
		$data['paging'] = $this->pagination->create_links();
  	//tampilkan halaman dengan data
  	$this->load->view('header',$data);
      		$this->load->view('pos');
      		$this->load->view('footer');
	}

  public function search_pos()
  {
      $sess['data_pos'] = mysql_escape_string($this->input->post("data_pos"));
      $this->session->set_userdata($sess);
      redirect("resi-pengiriman/pos/");
  }

  public function help()
	{
    //class menu active
		$data['home'] = "";
		$data['jne']  = "";
		$data['pos']  = "";
		$data['help'] = "active";
  	//tampilkan halaman dengan data
  	$this->load->view('header',$data);
      		$this->load->view('help');
      		$this->load->view('footer');
  }

  public function error()
	{
  	$this->load->view('404');
  }

}
