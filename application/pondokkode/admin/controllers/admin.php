<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      SIM RESI (Pondok Kode Web Project Development)
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class admin extends MX_Controller {

function _construct(){
parent::__construct();
if(!$this->session->sess_read()){
    $data['login_info'] = '';
    $this->load->view('login',$data);
}
}

	public function index()
	{

    if($this->auth->is_logged_in() == false)
		{
			$username = mysql_real_escape_string($this->input->post('user_name'));
			$password = mysql_real_escape_string($this->input->post('pass_user'));
      $aktif = 1;
			$success = $this->auth->do_login($username,$password,$aktif);
			if($success)
			{
				redirect('admin/dashboard');
			}
			else
			{
                $data['login_info'] = '';
				$this->load->view('login',$data);
			}
		}
		else
		{
				redirect('admin/dashboard');
		}
	}

    public function auth()
    {
      $username = mysql_real_escape_string($this->input->post('user_name'));
			$password = mysql_real_escape_string($this->input->post('pass_user'));
      $aktif = 1;
			$success = $this->auth->do_login($username,$password,$aktif);

			if($success)
			{
				redirect('admin/dashboard');
			}
			else
			{

            $this->session->set_flashdata('login_info', ' <div class="alert alert-block alert-danger fade in">
	                                                        <button data-dismiss="alert" class="close close-sm" type="button">
	                                                        <i class="fa fa-times"></i>
	                                                        </button>
	                                                        <i class="fa fa-exclamation-circle"></i> No match for Username or Password.
	                                                        </div>');

                 redirect(site_url('admin'));
			}
    }

  public function logout()
	{

		if($this->auth->is_logged_in() == true)
		 {
		 	// jika dia memang sudah login, destroy session
			$this->auth->do_logout();
		 }

		    // larikan ke halaman utama
            $this->session->set_flashdata('login_info', '<div class="alert alert-block alert-success fade in">
	                                                        <button data-dismiss="alert" class="close close-sm" type="button">
	                                                        <i class="fa fa-times"></i>
	                                                        </button>
	                                                        <strong>Logout Success !</strong> Anda Berhasil Keluar Sistem.
	                                                        </div>');
		 	redirect(site_url('admin'));
	}
}

/* End of file web.php */
/* Location: ./application/controllers/web.php */
