<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      Judul Skripsi - (Universitas KH. A. Wahab Hasbullah)
* @version      0.1
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class user extends MX_Controller {

function _construct(){
parent::__construct();
if(!$this->session->sess_read()){
    $data['login_info'] = '';
    $this->load->view('login',$data);
}
}

	public function index($uri=0)
	{
    //mencegah user yang belum login mengakses halaman ini
    $this->auth->restrict();
    //load model
    $this->load->model('pondokkode_model_admin');
    //cek apakah user aktif ?
    $this->auth->status_aktif($aktif=0);
    // Import JS
    $data['data_js'] = "";
    // Import JS Readey
    $data['js_ready'] = "";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('','Dashboard', base_url().'admin/dashboard');
    $this->breadcrumb->append_crumb('','Master', '#');
    $this->breadcrumb->append_crumb('current','User', '#');
    //class active menu
    $data['active_dashboard'] = "";
    $data['active_resi'] = "";
    $data['active_input_resi'] = "";
    $data['active_jne'] = "";
    $data['active_pos'] = "";
    $data['active_statistic'] = "";
    $data['active_master'] = "active";
    $data['active_user'] = "active";
    $data['active_log'] = "";
    $data['active_pengaturan'] = "";
    $data['active_sistem'] = "";
    // filter record user
    $filter['data_user'] = $this->session->userdata("data_user");
    // generate user
    $data['data_user'] = $this->pondokkode_model_admin->generate_user($this->config->item("limit_10"),$uri,$filter);
    //loadpagination
    $data['paging'] = $this->pagination->create_links();
    // Set search by nama / username/ id user
    $sess['data_user'] = $this->input->post("data_user");
    $this->session->set_userdata($sess);
    //tampilkan halaman view dengan data
    $this->load->view('header',$data);
    		   $this->load->view('sidebar');
    		   $this->load->view('master/data_user');
    		   $this->load->view('footer');
	}

	public function search()
	{
		//mencegah user yang belum login mengakses halaman ini
		$this->auth->restrict();
		//cek apakah user aktif ?
		$this->auth->status_aktif($aktif=0);
        //Set search by name / username /id user
        $sess['data_user'] = mysql_escape_string($this->input->post("data_user"));
        $this->session->set_userdata($sess);
        redirect("admin/master/user");
	}

	public function activated($id_user,$value)
	{
		//mencegah user yang belum login mengakses halaman ini
		$this->auth->restrict();
		//cek apakah user aktif ?
		$this->auth->status_aktif($aktif=0);
		$user_id = $this->encryption->decode($user_id);
		$id['id_user'] = $this->encryption->decode($id_user);
		$update['aktif_user'] = $value;
		$this->db->update("tbl_user",$update,$id);
		$query = $this->db->query("SELECT nama_user FROM tbl_user WHERE id_user='$id_user'")->row();
		if($value==0)
		{
			$this->session->set_flashdata('pesan_notif', '<div class="alert alert-block alert-success fade in">
                                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                            </button>
                                                            <i class="fa fa-check-square-o"></i> User Berhasil Dinonaktifkan !
                                                            </div>');
		}else{
			$this->session->set_flashdata('pesan_notif', '<div class="alert alert-block alert-success fade in">
                                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                            </button>
                                                            <i class="fa fa-check-square-o"></i> User Berhasil Diaktifkan !
                                                            </div>');
		}
		redirect('admin/master/user');
	}

  public function tambah()
  {
    // mencegah user yang belum login untuk mengakses halaman ini
    $this->auth->restrict();
    //cek apakah user aktif ?
    $this->auth->status_aktif($aktif=0);
    // Import JS
    $data['data_js'] = "";
    // Import JS Readey
    $data['js_ready'] = "";
    // load library breadcrumb
    $this->breadcrumb->append_crumb('','Dashboard', base_url().'admin/dashboard');
    $this->breadcrumb->append_crumb('','Master', '#');
    $this->breadcrumb->append_crumb('','User', base_url().'admin/master/user');
    $this->breadcrumb->append_crumb('current','Tambah User', '#');
    //class active menu
    $data['active_dashboard'] = "";
    $data['active_resi'] = "";
    $data['active_input_resi'] = "";
    $data['active_jne'] = "";
    $data['active_pos'] = "";
    $data['active_statistic'] = "";
    $data['active_master'] = "active";
    $data['active_user'] = "active";
    $data['active_log'] = "";
    $data['active_pengaturan'] = "";
    $data['active_sistem'] = "";
    // value kosong pada semua form
    $data['penting'] = "required";
    $data['place_pass'] = 'Password User';
    $data['place_kon_pass'] = 'Konfirmasi Password User';
    $data['required'] = '<span class="required">*</span>';
    $data['tipe'] = "tambah";
    $data['validasi'] = "required";
    $data['id_user'] ="";
    $data['nama_user'] = "";
    $data['email_user'] = "";
    $data['user_name'] = "";
    $data['foto_user'] = "foto_user";
    $data['frame_foto'] = "".base_url()."statics/images/user/no_image_guru.png";
    $data['foto_user_value'] = "foto_user";
    $data['title'] = 'tambah user';
    // tampilkan halaman dashboard dengan data
    $this->load->view('header',$data);
      	   $this->load->view('sidebar');
      	   $this->load->view('master/form_user');
      	   $this->load->view('footer');
	  }

    public function edit($id_user)
  	{
    // mencegah user yang belum login untuk mengakses halaman ini
    $this->auth->restrict();
    //cek apakah user aktif ?
    $this->auth->status_aktif($aktif=0);
    // Import JS
    $data['data_js'] = "";
    // Import JS Readey
    $data['js_ready'] = "";
    // load model 'unwaha_model_admin'
    $this->load->model('pondokkode_model_admin');
    // load library breadcrumb
    $this->breadcrumb->append_crumb('','Dashboard', base_url().'admin/dashboard');
    $this->breadcrumb->append_crumb('','Master', '#');
    $this->breadcrumb->append_crumb('','User', base_url().'admin/master/user');
    $this->breadcrumb->append_crumb('current','Edit User', '#');
    //class active menu
    $data['active_dashboard'] = "";
    $data['active_resi'] = "";
    $data['active_input_resi'] = "";
    $data['active_jne'] = "";
    $data['active_pos'] = "";
    $data['active_statistic'] = "";
    $data['active_master'] = "active";
    $data['active_user'] = "active";
    $data['active_log'] = "";
    $data['active_pengaturan'] = "";
    $data['active_sistem'] = "";
    // Get tabel user
    $detail_user = $this->pondokkode_model_admin->tampil_detail_user($this->encryption->decode($id_user));
    $get = $detail_user->row();
    // value isi pada semua form
    $data['penting'] = "";
    $data['place_pass'] = 'Kosongkan, Jika Password User Tidak di Rubah';
    $data['place_kon_pass'] = 'Kosongkan, Jika Password User Tidak di Rubah';
    $data['required'] = '';
    $data['tipe'] = "edit";
    $data['validasi'] = "";
    $data['id_user'] = $this->encryption->decode($id_user);
    $data['nama_user'] = $get->nama_user;
    $data['email_user'] = $get->email_user;
    $data['user_name'] = $get->user_name;
    $data['foto_user'] = "foto_user_edit";
    $data['frame_foto'] = "".base_url()."statics/images/user/thumb/".$get->foto_user."";
    $data['foto_user_value'] = $get->foto_user;
    $data['title'] = "edit user";
   // tampilkan halaman dashboard dengan data
    $this->load->view('header',$data);
    	     $this->load->view('sidebar');
    	     $this->load->view('master/form_user');
    	     $this->load->view('footer');
	}

    public function simpan()
    {
		  // mencegah user yang belum login untuk mengakses halaman ini
		  $this->auth->restrict();
      //cek apakah user aktif ?
      $this->auth->status_aktif($aktif=0);
      $tipe = $this->input->post("tipe");
      $id['id_user'] = $this->input->post("id_user");
  		if($tipe=="tambah")
  		{
  	    $config['upload_path'] = './statics/images/user/';
  			$config['allowed_types']= 'gif|jpg|png|jpeg';
  			$config['encrypt_name']	= TRUE;
  			$config['remove_spaces']	= TRUE;
  	    $config['overwrite'] = TRUE;
  			$config['max_size']     = '5000';
  			$config['max_width']  	= '5000';
  			$config['max_height']  	= '5000';
		$this->load->library('upload', $config);
    $this->load->library('image_lib');
		if ($this->upload->do_upload("foto_user")) {
                    $data	 	= $this->upload->data();
                    /* PATH */
                    $source             = "./statics/images/user/".$data['file_name'] ;
                    $destination_thumb	= "./statics/images/user/thumb/" ;
                    // Permission Configuration
                    chmod($source, 0777) ;
                    /* Resizing Processing */
                    // Configuration Of Image Manipulation :: Static
                    $img['image_library'] = 'GD2';
                    $img['create_thumb']  = TRUE;
                    $img['maintain_ratio']= TRUE;

                    /// Limit Width Resize
                    $limit_thumb    = 640 ;

                    // Size Image Limit was using (LIMIT TOP)
                    $limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;

                    // Percentase Resize
                    if ($limit_use > $limit_thumb) {
                        $percent_thumb  = $limit_thumb/$limit_use ;
                    }

                    //// Making THUMBNAIL ///////
                    $img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
                    $img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;

                    // Configuration Of Image Manipulation :: Dynamic
                    $img['thumb_marker'] = '';
                    $img['quality']      = '100%' ;
                    $img['source_image'] = $source ;
                    $img['new_image']    = $destination_thumb ;

                    // Do Resizing
                    $this->image_lib->initialize($img);
                    $this->image_lib->resize();
                    $this->image_lib->clear() ;

                // SImpan ke tabel user
		            $insert['nama_user'] = $this->input->post("nama_user");
                $insert['email_user'] = $this->input->post("email_user");
                $insert['user_name'] = $this->input->post("user_name");
                $insert['pass_user'] = md5($this->input->post("konfrim_pass_user"));
                $insert['foto_user'] = $data['file_name'];
                $insert['aktif_user'] = 1;
                $this->db->insert("tbl_user",$insert);
                unlink($source);
                redirect('admin/master/user');
		}else{
		echo $this->upload->display_errors('<p>','</p>');
		}
                }
                else if($tipe=="edit")
                {
                // SImpan ke tabel user
                if(empty($_FILES['foto_user_edit']['name']))
                {
                    if ($this->input->post("konfrim_pass_user") !==''){
                    $update['nama_user'] = $this->input->post("nama_user");
                    $update['email_user'] = $this->input->post("email_user");
                    $update['user_name'] = $this->input->post("user_name");
                    $update['pass_user'] = md5($this->input->post("konfrim_pass_user"));
                    $this->db->update("tbl_user",$update,$id);
                    } else {
                    $update['nama_user'] = $this->input->post("nama_user");
                    $update['email_user'] = $this->input->post("email_user");
                    $update['user_name'] = $this->input->post("user_name");
                    $this->db->update("tbl_user",$update,$id);
                    }
                    redirect('admin/master/user');
                }else{
                    $config['upload_path'] = './statics/images/user/';
                    $config['allowed_types']= 'gif|jpg|png|jpeg';
                    $config['encrypt_name']	= TRUE;
                    $config['remove_spaces']	= TRUE;
                    $config['overwrite'] = TRUE;
                    $config['max_size']     = '5000';
                    $config['max_width']  	= '5000';
                    $config['max_height']  	= '5000';

                    $this->load->library('upload', $config);
                    $this->load->library('image_lib');

                    if ($this->upload->do_upload("foto_user_edit")) {
                            $data	 	= $this->upload->data();

                            /* PATH */
                            $source             = "./statics/images/user/".$data['file_name'] ;
                            $destination_thumb	= "./statics/images/user/thumb/" ;

                            // Permission Configuration
                            chmod($source, 0777) ;

                            /* Resizing Processing */
                            // Configuration Of Image Manipulation :: Static
                            $this->load->library('image_lib') ;
                            $img['image_library'] = 'GD2';
                            $img['create_thumb']  = TRUE;
                            $img['maintain_ratio']= TRUE;

                            /// Limit Width Resize
                            $limit_thumb    = 640 ;

                            // Size Image Limit was using (LIMIT TOP)
                            $limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;

                            // Percentase Resize
                            if ($limit_use > $limit_thumb) {
                                    $percent_thumb  = $limit_thumb/$limit_use ;
                            }

                            //// Making THUMBNAIL ///////
                            $img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
                            $img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;

                            // Configuration Of Image Manipulation :: Dynamic
                            $img['thumb_marker'] = '';
                            $img['quality']      = '100%' ;
                            $img['source_image'] = $source ;
                            $img['new_image']    = $destination_thumb ;

                            // Do Resizing
                            $this->image_lib->initialize($img);
                            $this->image_lib->resize();
                            $this->image_lib->clear() ;

                            // Insert DB tbl_user
                            if ($this->input->post("konfrim_pass_user") !==''){
                            $update['nama_user'] = $this->input->post("nama_user");
                            $update['email_user'] = $this->input->post("email_user");
                            $update['user_name'] = $this->input->post("user_name");
                            $update['foto_user'] = $data['file_name'];
                            $update['pass_user'] = md5($this->input->post("konfrim_pass_user"));
                            $this->db->update("tbl_user",$update,$id);
                            $old_thumb	= "./statics/images/user/thumb/".$this->input->post("foto_user_value")."" ;
                            unlink($source);
                            unlink($old_thumb);
                            redirect('admin/master/user');
                            }else{
                            $update['nama_user'] = $this->input->post("nama_user");
                            $update['email_user'] = $this->input->post("email_user");
                            $update['user_name'] = $this->input->post("user_name");
                            $update['foto_user'] = $data['file_name'];
                            $this->db->update("tbl_user",$update,$id);
                            $old_thumb	= "./statics/images/user/thumb/".$this->input->post("foto_user_value")."" ;
                            unlink($source);
                            unlink($old_thumb);
                            redirect('admin/master/user');
                    }
                    }else{
                            echo $this->upload->display_errors('<p>','</p>');
                    }
                }
		}
    }

    public function delete($id_user)
    {
            // mencegah user yang belum login untuk mengakses halaman ini
            $this->auth->restrict();
            //cek apakah user aktif ?
            $this->auth->status_aktif($aktif=0);
            $id['id_user'] = $this->encryption->decode($id_user);
            $this->db->delete("tbl_user",$id);
            $this->session->set_flashdata('pesan_notif', '<div class="alert alert-block alert-success fade in">
                                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                            </button>
                                                            <i class="fa fa-check-square-o"></i> User Berhasil Dihapus !
                                                            </div>');
            redirect("admin/master/user");

    }

}
