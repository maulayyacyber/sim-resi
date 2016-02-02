<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      SIM RESI (Pondok Kode Web Project Development)
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class resi_pengiriman extends MX_Controller {

function _construct(){
parent::__construct();
if(!$this->session->sess_read()){
    $data['login_info'] = '';
    $this->load->view('login',$data);
}
}

  public function activated($id_resi,$value)
  {
    //mencegah user yang belum login mengakses halaman ini
    $this->auth->restrict();
    //cek apakah user aktif ?
    $this->auth->status_aktif($aktif=0);
    $id['id_resi'] = $this->encryption->decode($id_resi);
    $update['aktif'] = $value;
    $this->db->update("tbl_resi",$update,$id);
    if($value==0)
    {
      $this->session->set_flashdata('pesan_notif', '<div class="alert alert-block alert-success fade in">
                                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                            </button>
                                                            <i class="fa fa-check-square-o"></i> Status Resi Dalam Progress !
                                                            </div>');
    }else{
      $this->session->set_flashdata('pesan_notif', '<div class="alert alert-block alert-success fade in">
                                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                            </button>
                                                            <i class="fa fa-check-square-o"></i> Status Resi Sudah Complete !
                                                            </div>');
    }
    redirect('admin/resi-pengiriman/tambah');
  }

  public function jne($uri=0)
  {
    //cegah user yang belum login
    $this->auth->restrict();
    //cek apakah user aktif ?
		$this->auth->status_aktif($aktif=0);
    //load model
    $this->load->model("pondokkode_model_admin");
    // Import JS
    $data['data_js'] = "";
    // Import JS Readey
    $data['js_ready'] = "";
    //load library breadcrumb
    $this->breadcrumb->append_crumb('','Dashboard', base_url().'admin/dashboard');
    $this->breadcrumb->append_crumb('','Resi Pengiriman', '#');
    $this->breadcrumb->append_crumb('','JNE', '#');
    //class active menu
    $data['active_dashboard'] = "";
    $data['active_resi'] = "active";
    $data['active_input_resi'] = "";
    $data['active_jne'] = "active";
    $data['active_pos'] = "";
    $data['active_statistic'] = "";
    $data['active_master'] = "";
    $data['active_user'] = "";
    $data['active_log'] = "";
    $data['active_pengaturan'] = "";
    $data['active_sistem'] = "";
    // filter record
    $filter['cari_jne'] = $this->session->userdata("cari_data_jne");
    // generate konten
    $data['data_jne'] = $this->pondokkode_model_admin->generate_resi_jne($this->config->item("limit_item_big"),$uri,$filter);
    //load pagination
    $data['paging'] = $this->pagination->create_links();
    // Set search
    $sess['cari_data_jne'] = $this->input->post("cari_jne");
    $this->session->set_userdata($sess);
    //tampilkan halaman dengan data
    $this->load->view('header',$data);
        $this->load->view('sidebar');
        $this->load->view('resi_pengiriman/data_jne');
        $this->load->view('footer');
  }

  public function search_jne()
     {
           $sess['cari_data_jne'] = mysql_escape_string($this->input->post("cari_jne"));
           $this->session->set_userdata($sess);
           redirect("admin/resi-pengiriman/jne");
     }

  public function pos($uri=0)
  {
    //cegah user yang belum login
    $this->auth->restrict();
    //cek apakah user aktif ?
		$this->auth->status_aktif($aktif=0);
    //load model
    $this->load->model("pondokkode_model_admin");
    // Import JS
    $data['data_js'] = "";
    // Import JS Readey
    $data['js_ready'] = "";
    //load library breadcrumb
    $this->breadcrumb->append_crumb('','Dashboard', base_url().'admin/dashboard');
    $this->breadcrumb->append_crumb('','Resi Pengiriman', '#');
    $this->breadcrumb->append_crumb('','POS', '#');
    //class active menu
    $data['active_dashboard'] = "";
    $data['active_resi'] = "active";
    $data['active_input_resi'] = "";
    $data['active_jne'] = "";
    $data['active_pos'] = "active";
    $data['active_statistic'] = "";
    $data['active_master'] = "";
    $data['active_user'] = "";
    $data['active_log'] = "";
    $data['active_pengaturan'] = "";
    $data['active_sistem'] = "";
    // filter record
    $filter['cari_pos'] = $this->session->userdata("cari_data_pos");
    // generate konten
    $data['data_pos'] = $this->pondokkode_model_admin->generate_resi_pos($this->config->item("limit_item_big"),$uri,$filter);
    //load pagination
    $data['paging'] = $this->pagination->create_links();
    // Set search
    $sess['cari_data_pos'] = $this->input->post("cari_pos");
    $this->session->set_userdata($sess);
    //tampilkan halaman dengan data
    $this->load->view('header',$data);
        $this->load->view('sidebar');
        $this->load->view('resi_pengiriman/data_pos');
        $this->load->view('footer');
  }

  public function search_pos()
     {
           $sess['cari_data_pos'] = mysql_escape_string($this->input->post("cari_pos"));
           $this->session->set_userdata($sess);
           redirect("admin/resi-pengiriman/pos");
     }

	public function tambah()
	{
    //cegah user yang belum login
    $this->auth->restrict();
    //cek apakah user aktif ?
		$this->auth->status_aktif($aktif=0);
    // Import JS
    $data['data_js'] = "";
    // Import JS Readey
    $data['js_ready'] = "";
    //load library breadcrumb
    $this->breadcrumb->append_crumb('','Dashboard', base_url().'admin/dashboard');
    $this->breadcrumb->append_crumb('','Resi Pengiriman', '#');
    $this->breadcrumb->append_crumb('','Tambah', '#');
    //class active menu
    $data['active_dashboard'] = "";
    $data['active_resi'] = "active";
    $data['active_input_resi'] = "active";
    $data['active_jne'] = "";
    $data['active_pos'] = "";
    $data['active_statistic'] = "";
    $data['active_master'] = "";
    $data['active_user'] = "";
    $data['active_log'] = "";
    $data['active_pengaturan'] = "";
    $data['active_sistem'] = "";
    //deklarasi variable form
    $data['id_resi'] = "";
    $data['tipe'] = "tambah";
    $data['nama'] = "";
    $data['kategori'] = "";
    $data['no_resi'] = "";
    $data['alamat']  = "";
    $data['id_user'] = "";
    //tampilkan halaman dengan data
    $this->load->view('header',$data);
        $this->load->view('sidebar');
        $this->load->view('resi_pengiriman/form_resi');
        $this->load->view('footer');
  }

  public function edit($id_resi)
	{
    //cegah user yang belum login
    $this->auth->restrict();
    //cek apakah user aktif ?
	$this->auth->status_aktif($aktif=0);
    //load model
    $this->load->model("pondokkode_model_admin");
    // Import JS
    $data['data_js'] = "";
    // Import JS Readey
    $data['js_ready'] = "";
    //load library breadcrumb
    $this->breadcrumb->append_crumb('','Dashboard', base_url().'admin/dashboard');
    $this->breadcrumb->append_crumb('','Resi Pengiriman', '#');
    $this->breadcrumb->append_crumb('','Tambah', '#');
    //class active menu
    $data['active_dashboard'] = "";
    $data['active_resi'] = "active";
    $data['active_input_resi'] = "active";
    $data['active_jne'] = "";
    $data['active_pos'] = "";
    $data['active_statistic'] = "";
    $data['active_master'] = "";
    $data['active_user'] = "";
    $data['active_log'] = "";
    $data['active_pengaturan'] = "";
    $data['active_sistem'] = ""; 
    //get data Resi
    $data_resi = $this->pondokkode_model_admin->tampil_detail_resi($this->encryption->decode($id_resi));
    $detail = $data_resi->row();
    //deklarasi variable form
    $data['id_resi'] = $detail->id_resi;
    $data['tipe'] = "edit";
    $data['nama'] = $detail->nama;
    $data['kategori'] = $detail->kategori;
    $data['no_resi'] = $detail->no_resi;
    $data['alamat']  = $detail->alamat;
    $data['id_user'] = $detail->id_user;
    //tampilkan halaman dengan data
    $this->load->view('header',$data);
        $this->load->view('sidebar');
        $this->load->view('resi_pengiriman/form_resi');
        $this->load->view('footer');
  }

    public function simpan()
    {
      $id['id_resi'] = $this->input->post("id_resi");
      $tipe = $this->input->post('tipe');
      if($tipe=="tambah"){
        $insert['nama']     = $this->input->post("nama");
        $insert['kategori'] = $this->input->post("kategori");
        $insert['no_resi']  = $this->input->post("no_resi");
        $insert['alamat']   = $this->input->post("alamat");
        $insert['id_user']  = $this->session->userdata("user_id");
        $this->db->insert("tbl_resi",$insert);
        $this->session->set_flashdata('pesan_notif', '<div class="alert alert-block alert-success fade in">
                                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                            </button>
                                                            <i class="fa fa-check-square-o"></i> Data Berhasil Disimpan  !
                                                            </div>');
        redirect("admin/resi-pengiriman/tambah");
      }else{
        $update['nama']     = $this->input->post("nama");
        $update['kategori'] = $this->input->post("kategori");
        $update['no_resi']  = $this->input->post("no_resi");
        $update['alamat']   = $this->input->post("alamat");
        $update['id_user']  = $this->session->userdata("user_id");
        $this->db->update("tbl_resi",$update,$id);
        $this->session->set_flashdata('pesan_notif', '<div class="alert alert-block alert-success fade in">
                                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                            </button>
                                                            <i class="fa fa-check-square-o"></i> Data Berhasil Diupdate  !
                                                            </div>');
      }
      redirect("admin/resi-pengiriman/tambah");
    }

    public function delete($id_resi)
    {
    // mencegah user yang belum login untuk mengakses halaman ini
		$this->auth->restrict();
		//cek apakah user aktif ?
		$this->auth->status_aktif($aktif=0);
	  $id['id_resi'] = $this->encryption->decode($id_resi);
	  $this->db->delete("tbl_resi",$id);
    //deklarasi session flashdata
		$this->session->set_flashdata('pesan_notif', '<div class="alert alert-block alert-success fade in">
                                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                            </button>
                                                            <i class="fa fa-check-square-o"></i> Data Berhasil Dihapus  !
                                                            </div>');
	  redirect('admin/resi-pengiriman/tambah');
    }

    public function statistic_pengiriman()
    {
        //cegah user yang belum login
        $this->auth->restrict();
        //cek apakah user aktif ?
        $this->auth->status_aktif($aktif=0);
        //load model
        $this->load->model("pondokkode_model_admin");
        // Import JS
        $data['data_js'] = "";
        // Import JS Readey
        $data['js_ready'] = "";
        //load library breadcrumb
        $this->breadcrumb->append_crumb('','Dashboard', base_url().'admin/dashboard');
        $this->breadcrumb->append_crumb('','Statistic Pengiriman', '#');
        //get chart pengiriman
       $data['statistic'] = $this->pondokkode_model_admin->statistic_pengiriman()->result_array();        
        /*
        $new = array();
        foreach($this->pondokkode_model_admin->statistic_pengiriman()->result_array() as $row)
        $new[] = (int) $row['id_resi'];
        */

        /*
        if($data['statistic']>0)
        {
            foreach($data['statistic'] as $hasil)
            json_encode($tampil[] = (int) $hasil['jumlah']);
            //$tampil[] = (float) $hasil['kategori'];
        } */   
        //class active menu
        $data['active_dashboard'] = "";
        $data['active_resi'] = "";
        $data['active_input_resi'] = "";
        $data['active_jne'] = "";
        $data['active_pos'] = "";
        $data['active_statistic'] = "active";
        $data['active_master'] = "";
        $data['active_user'] = "";
        $data['active_log'] = "";
        $data['active_pengaturan'] = "";
        $data['active_sistem'] = "";
        //tampilkan halaman dengan data
        $this->load->view('header',$data);
            $this->load->view('sidebar');
            $this->load->view('resi_pengiriman/statistic');
            $this->load->view('footer');        
    }

}
