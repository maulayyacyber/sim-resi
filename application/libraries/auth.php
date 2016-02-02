<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      Judul Skripsi - (Universitas KH. A. Wahab Hasbullah)
* @version      0.1
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class Auth{
    var $CI = NULL;
    function __construct()
    {
        // get CI's object
        $this->CI =& get_instance();
    }
    // untuk validasi login
    function do_login($username,$password,$aktif)
    {
        // cek di database, ada ga?
        $this->CI->db->from('tbl_user');
        $this->CI->db->where('user_name',$username);
        $this->CI->db->where('pass_user=MD5("'.$password.'")','',false);
        $this->CI->db->where('aktif_user',$aktif);
        $result = $this->CI->db->get();
        if($result->num_rows() == 0)
        {
            // username dan password tsb tidak ada
            return false;
        }
        else
        {
            // ada, maka ambil informasi dari database
            $userdata = $result->row();
            $session_data = array(
                'user_id'   => $userdata->id_user,
                                'nama_user'      =>$userdata->nama_user,
                                'user_name'      =>$userdata->user_name,
                                'pass_user'      =>$userdata->pass_user,
                                'email_user'     =>$userdata->email_user,
                                'foto_user'      =>$userdata->foto_user
            );
            // buat session
                        session_start();
                        $_SESSION['ses_kcfinder']=array();
                        $_SESSION['ses_kcfinder']['disabled'] = false;
                        $_SESSION['ses_kcfinder']['uploadURL'] = "../content_upload";
            $this->CI->session->set_userdata($session_data);
                        $id['id_user'] = $this->CI->session->userdata('user_id');
                        $insert['last_login'] = date("Y-m-d H:i:s");
                        $insert['ip_address'] = $_SERVER['REMOTE_ADDR'];
                        $this->CI->db->update("tbl_user",$insert,$id);
            return true;
        }
    }
    // untuk mengecek apakah user sudah login/belum
    function is_logged_in()
    {
      //exit();
        if($this->CI->session->userdata('user_id') == "" &&
           $this->CI->session->userdata('user_name') == "" &&
           $this->CI->session->userdata('pass_user') == "")
        {
            return false;
        }
        return true;
    }

    function is_logoff_in()
    {
        if($this->CI->session->userdata('pass_user') == '')
        {
            return false;
        }
        return true;
    }
    // untuk validasi di setiap halaman yang mengharuskan authentikasi
    function restrict()
    {
        if($this->is_logged_in() == false)
        {
            $this->CI->session->sess_destroy();
            redirect('admin');
        }
    }

    function status_aktif($aktif=0)
    {
        $user_id = $this->CI->session->userdata("user_id");
        $this->CI->db->from('tbl_user');
        $this->CI->db->where('aktif_user',$aktif);
        $this->CI->db->where('id_user',$user_id);
        $result = $this->CI->db->get();

        if($result->num_rows() !== 0)
        {
            //username dan password tidak ada
            $this->CI->session->sess_destroy();
            redirect('admin');
        }
    }

    // untuk logout
    function do_logout()
    {
        $this->CI->session->sess_destroy();
                session_start();
                session_unset('kcfinder');
    }

    function do_logoff()
    {
        if($this->is_logged_in() == true){
                $this->CI->session->unset_userdata('pass_user');
                session_start();
                session_unset('kcfinder');
                redirect("admin/logoff");
        }else{
            $this->CI->session->session_destroy();
            redirect('admin');
        }
    }
}
