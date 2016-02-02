<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      SIM RESI (Pondok Kode Web Project Development)
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class Pondokkode_model_system extends CI_Model {

	public function __construct()
	{
		$dt = $this->db->get("tbl_setting");
		$i = 1;
		foreach($dt->result() as $d)
		{
			$_SESSION['konfig_app_'.$i] = $d->content_setting;
			$i++;
		}
		$_SESSION['admin_title']     = $_SESSION['konfig_app_1'];
		$_SESSION['admin_footer']    = $_SESSION['konfig_app_2'];
		$_SESSION['web_title']       = $_SESSION['konfig_app_3'];
    $_SESSION['web_footer']      = $_SESSION['konfig_app_4'];
		$_SESSION['facebook']        = $_SESSION['konfig_app_5'];
		$_SESSION['twitter']	 	     = $_SESSION['konfig_app_6'];
		$_SESSION['github']			     = $_SESSION['konfig_app_7'];
		$_SESSION['keywords']			   = $_SESSION['konfig_app_8'];
		$_SESSION['description']		 = $_SESSION['konfig_app_9'];
		$_SESSION['text_sistem']		 = $_SESSION['konfig_app_10'];

	}
}

/* End of file config_model.php */
/* Location: ./application/models/config_model.php */
