<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      SIM RESI (Pondok Kode Web Project Development)
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class Pondokkode_model_admin extends CI_Model{

      public function generate_setting()
      {
      $hasil="";
      $w = $this->db->query("SELECT * FROM tbl_setting ORDER BY id_setting ASC");
      if(($w->num_rows())<=0)
      {
                      $hasil .='<div class="alert alert-block alert-danger fade in">
                                  <center><strong>Message ! </strong> : Tidak Ada Data Yang Ditemukan
                                  </center></div>';
          }else{

      $hasil .= ' <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                              <th class="text-center col-md-1">NO.</th>
                              <th class="text-center col-md-3">NAMA PENGATURAN</th>
                              <th class="text-center">NILAI PENGATURAN</th>
                              </tr>
                              </thead><tbody>';
                  $no = 0+1;
      foreach($w->result() as $h)
      {
        $hasil .= " <tr>
                              <td class='text-center'>".$no."</td>
                              <td>".$h->title."</td>
                              <td>
                                <input type='text' name='nilai_setting[]' autocomplete='off' value='$h->content_setting' class='form-control' placeholder='Nilai Variabel'>
                                <input type='hidden' name='id_setting[]' value='$h->id_setting'>
                              </td>
                          </tr>";
                          $no++;
      }
      $hasil .= '</tbody></table>';
                  }
                  return $hasil;
    }

    public function generate_user($limit,$offset,$filter=array())
  	{
          $hasil = "";
          $data_user   = $filter['data_user'];
          $query_add   = "WHERE user_name like '%".$data_user."%'";
          $tot_hal = $this->db->query("SELECT id_user, nama_user, user_name, pass_user, email_user, aktif_user, last_login, ip_address FROM tbl_user ".$query_add."");
          $config['base_url']    = base_url() . 'admin/master/user/';
          $config['total_rows']  = $tot_hal->num_rows();
          $config['per_page']    = $limit = 10;
          $config['uri_segment'] = 4;
          $config['first_link']  = 'Pertama';
          $config['last_link']   = 'Terakhir';
          $config['next_link']   = '»';
          $config['prev_link']   = '«';
          $this->pagination->initialize($config);
          $w = $this->db->query("SELECT id_user, nama_user, user_name, pass_user, email_user, aktif_user, last_login, ip_address FROM tbl_user ".$query_add." ORDER BY id_user ASC LIMIT ".$offset.",".$limit."");
          if(($w->num_rows())<=0)
          {
              $hasil .='<div class="alert alert-block alert-danger fade in">
                                  <center><strong><i class="fa fa-exclamation-circle"></i> Message ! </strong> : Tidak Ada Data Yang Ditemukan
                                  </center></div>';

          }else{
  	        $hasil .= "<table class='table table-bordered table-striped table-condensed'>
  	                    <thead>
  	                    <tr>
  	                    <th><center style='color:#20B2AA'>NO.</th>
  	                    <th><center style='color:#20B2AA'>NAMA</th>
  	                    <th><center style='color:#20B2AA'>USERNAME</th>
  	                    <th><center style='color:#20B2AA'>EMAIL</th>
  	                    <th><center style='color:#20B2AA'>STATUS</th>
  	                    <th><center style='color:#20B2AA'>LAST LOGIN</th>
  	                    <th><center style='color:#20B2AA'>OPTION</th>
  	                    </tr>
  	                    </thead>";
  	                $no = $offset+1;
  	        foreach ($w->result() as $h)
  	        {
  	        	        if ($h->aktif_user==1){
                          $btnaktif = "<a href='".base_url()."admin/master/user/activated/".$this->encryption->encode($h->id_user)."/0' onClick=\"return confirm('Jika user Anda non aktifkan maka tidak bisa login, apakah Anda yakin ?')\" class='btn btn-white btn-sm' title='Not Aktivasi' type='button'><i class='fa fa-times'></i></a>";
                          $aktif_or_no = '<span class="label label-success label-mini"><i class="fa fa-check"></i> Aktif</span>';
                          }else{
                          $btnaktif = "<a href='".base_url()."admin/master/user/activated/".$this->encryption->encode($h->id_user)."/1' onClick=\"return confirm('Apakah Anda yakin akan mengaktifkan user ?')\" class='btn btn-white btn-sm' title='Aktivasi' type='button'><i class='fa fa-check'></i></a>";
                          $aktif_or_no = '<span class="label label-danger label-mini"><i class="fa fa-times"></i> Tidak Aktif</span>';
                          }
  	        $hasil .= "<tr>
  	                    <td class='text-center'>".$no."</td>
  	                    <td>".$h->nama_user."</td>
  	                    <td class='text-center'>".$h->user_name."</td>
  	                    <td class='text-center'>".$h->email_user."</td>
  	                    <td class='text-center'>".$aktif_or_no."</td>
  	                    <td class='text-center'>".$this->pondokkode_model_admin->tgl_indo_lengkap($h->last_login)."</td>
  	                    <td class='text-center'><div class='btn-group'>
                          <a class='btn btn-white btn-sm'  title='Edit' href='".base_url()."admin/master/user/edit/".$this->encryption->encode($h->id_user)."' type='button'><i class='fa fa-pencil'></i></a>
                          $btnaktif";
                          $hasil .= "<a href='".base_url()."admin/master/user/delete/".$this->encryption->encode($h->id_user)."' onClick=\"return confirm('Apakah Anda yakin akan menghapus user ini ?')\" class='btn btn-white btn-sm' title='Hapus' type='button'><i class='fa fa-trash-o'></i></a>";
                          $hasil .= "</div>
                                     </td></tr>";
                          $no++;
  	            }
  	        $hasil .= '</table>';
          }
          return $hasil;
      }

    public function generate_session()
  	{
  		$hasil = "";
  		$this->db->from('tbl_session');
  		$query = $this->db->get();
  		if(($query->num_rows()) <=0)
  		{
  			$hasil = "";
  		}else{
  			$hasil .= "<table class='table table-bordered table-striped table-condensed'>
                              <thead>
                              <tr>
                              <th><center style='color:#20B2AA'>USER AGENT</th>
                              <th><center style='color:#20B2AA'>USER DATA</th>
                              <th><center style='color:#20B2AA'>IP ADDRESS</th>
                              </tr>
                              </thead><tbody>";
  						foreach($query->result() as $h) {
  				        $hasil .= " <tr>
                                      <td class='text-center'>".strip_tags(substr($h->user_agent,0,70))."</td>
                                      <td>".strip_tags(substr($h->user_data,0,170))."...</td>
                                      <td>".$h->ip_address."</td>";
                          $hasil .= "</td></tr>";
  		}
  		$hasil .= '</tbody></table>';
                  }
                  return $hasil;
  	}

    public function generate_resi_jne($limit,$offset,$filter=array())
    {
        $hasil = "";
        $data_jne = $filter['cari_jne'];
        $query_add   = "WHERE nama like '%".$data_jne."'";
        $tot_hal = $this->db->query("SELECT * FROM tbl_resi ".$query_add." AND kategori='JNE'");
        $config['base_url']    = base_url() . 'admin/resi-pengiriman/jne/';
        $config['total_rows']  = $tot_hal->num_rows();
        $config['per_page']    = $limit = 10;
        $config['uri_segment'] = 4;
        $config['first_link']  = 'Pertama';
        $config['last_link']   = 'Terakhir';
        $config['next_link']   = '»';
        $config['prev_link']   = '«';
        $this->pagination->initialize($config);
        $w = $this->db->query("SELECT * FROM tbl_resi ".$query_add." AND kategori='JNE' ORDER BY id_resi DESC LIMIT ".$offset.",".$limit."");
        if(($w->num_rows())<=0)
        {
            $hasil .= '<div class="alert alert-block alert-danger fade in">
                                <center><strong><i class="fa fa-exclamation-circle"></i> Message ! </strong> : Tidak Ada Data Yang Ditemukan
                                </center></div>';
        }else{
        $hasil .= "<table class='table table-bordered table-striped table-condensed'>
                    <thead>
                    <tr>
                    <th><center style='color:#20B2AA'>NO</th>
                    <th><center style='color:#20B2AA'>NAMA</th>
                    <th><center style='color:#20B2AA'>NO RESI</th>
                    <th><center style='color:#20B2AA'>JASA KURIR</th>
                    <th><center style='color:#20B2AA'>STATUS</th>
                    <th><center style='color:#20B2AA'>OPTION</th>
                    </tr>
                    </thead>";
                $no = $offset+1;
            foreach ($w->result() as $h) {
              if ($h->aktif==1){
                  $btnaktif = "<a href='".base_url()."admin/resi-pengiriman/activated/".$this->encryption->encode($h->id_resi)."/0' onClick=\"return confirm('Status Akan Dirubah Menjadi Progress, Apakah Anda Yakin ?')\" class='btn btn-white btn-sm' title='Not Aktivasi' type='button'><i class='fa fa-times'></i></a>";
                  $aktif_or_no = '<span class="label label-success label-mini"><i class="fa fa-check"></i> Complete</span>';
                  }else{
                  $btnaktif = "<a href='".base_url()."admin/resi-pengiriman/activated/".$this->encryption->encode($h->id_resi)."/1' onClick=\"return confirm('Status Akan Dirubah Menjadi Complete, Apakah Anda Yakin ?')\" class='btn btn-white btn-sm' title='Aktivasi' type='button'><i class='fa fa-check'></i></a>";
                  $aktif_or_no = '<span class="label label-danger label-mini"><i class="fa fa-spinner fa-spin"></i> Progress</span>';
                  }
        $hasil .= "<tr>
                    <td class='text-center'>".$no."</td>
                    <td>".$h->nama."</td>
                    <td class='text-center'>".$h->no_resi."</td>
                    <td class='text-center'>".$h->kategori."</td>
                    <td class='text-center'>".$aktif_or_no."</td>
                    <td class='text-center'><div class='btn-group'>
                    <a class='btn btn-white btn-sm' title='Edit' href='".base_url()."admin/resi-pengiriman/edit/".$this->encryption->encode($h->id_resi)."' type='button'><i class='fa fa-pencil'></i></a>
                    $btnaktif
                    <a class='btn btn-white btn-sm' title='Delete' href='".base_url()."admin/resi-pengiriman/delete/".$this->encryption->encode($h->id_resi)."'  type='button'><i class='fa  fa-trash-o'></i></a>";
                        $hasil .= "</div>
                                   </td></tr>";
                        $no++;
            }
        $hasil .= '</table>';
                }
        return $hasil;

    }

    public function generate_resi_pos($limit,$offset,$filter=array())
    {
        $hasil = "";
        $data_pos = $filter['cari_pos'];
        $query_add   = "WHERE nama like '%".$data_pos."'";
        $tot_hal = $this->db->query("SELECT * FROM tbl_resi ".$query_add." AND kategori='POS'");
        $config['base_url']    = base_url() . 'admin/resi-pengiriman/pos/';
        $config['total_rows']  = $tot_hal->num_rows();
        $config['per_page']    = $limit = 10;
        $config['uri_segment'] = 4;
        $config['first_link']  = 'Pertama';
        $config['last_link']   = 'Terakhir';
        $config['next_link']   = '»';
        $config['prev_link']   = '«';
        $this->pagination->initialize($config);
        $w = $this->db->query("SELECT * FROM tbl_resi ".$query_add." AND kategori='POS' ORDER BY id_resi DESC LIMIT ".$offset.",".$limit."");
        if(($w->num_rows())<=0)
        {
            $hasil .= '<div class="alert alert-block alert-danger fade in">
                                <center><strong><i class="fa fa-exclamation-circle"></i> Message ! </strong> : Tidak Ada Data Yang Ditemukan
                                </center></div>';
        }else{
        $hasil .= "<table class='table table-bordered table-striped table-condensed'>
                    <thead>
                    <tr>
                    <th><center style='color:#20B2AA'>NO</th>
                    <th><center style='color:#20B2AA'>NAMA</th>
                    <th><center style='color:#20B2AA'>NO RESI</th>
                    <th><center style='color:#20B2AA'>JASA KURIR</th>
                    <th><center style='color:#20B2AA'>STATUS</th>
                    <th><center style='color:#20B2AA'>OPTION</th>
                    </tr>
                    </thead>";
                $no = $offset+1;
            foreach ($w->result() as $h) {
              if ($h->aktif==1){
                  $btnaktif = "<a href='".base_url()."admin/resi-pengiriman/activated/".$this->encryption->encode($h->id_resi)."/0' onClick=\"return confirm('Status Akan Dirubah Menjadi Progress, Apakah Anda Yakin ?')\" class='btn btn-white btn-sm' title='Not Aktivasi' type='button'><i class='fa fa-times'></i></a>";
                  $aktif_or_no = '<span class="label label-success label-mini"><i class="fa fa-check"></i> Complete</span>';
                  }else{
                  $btnaktif = "<a href='".base_url()."admin/resi-pengiriman/activated/".$this->encryption->encode($h->id_resi)."/1' onClick=\"return confirm('Status Akan Dirubah Menjadi Complete, Apakah Anda Yakin ?')\" class='btn btn-white btn-sm' title='Aktivasi' type='button'><i class='fa fa-check'></i></a>";
                  $aktif_or_no = '<span class="label label-danger label-mini"><i class="fa fa-spinner fa-spin"></i> Progress</span>';
                  }
        $hasil .= "<tr>
                    <td class='text-center'>".$no."</td>
                    <td>".$h->nama."</td>
                    <td class='text-center'>".$h->no_resi."</td>
                    <td class='text-center'>".$h->kategori."</td>
                    <td class='text-center'>".$aktif_or_no."</td>
                    <td class='text-center'><div class='btn-group'>
                    <a class='btn btn-white btn-sm' title='Edit' href='".base_url()."admin/resi-pengiriman/edit/".$this->encryption->encode($h->id_resi)."' type='button'><i class='fa fa-pencil'></i></a>
                    $btnaktif
                    <a class='btn btn-white btn-sm' title='Delete' href='".base_url()."admin/resi-pengiriman/delete/".$this->encryption->encode($h->id_resi)."'  type='button'><i class='fa  fa-trash-o'></i></a>";
                        $hasil .= "</div>
                                   </td></tr>";
                        $no++;
            }
        $hasil .= '</table>';
                }
        return $hasil;

    }

    public function statistic_pengiriman()
    {
      $query = $this->db->query("SELECT kategori as kategori, count(kategori) as jumlah FROM tbl_resi GROUP BY kategori");
      return $query;
    }

    function tampil_detail_user($id_user)
    {
    	$query = $this->db->query("SELECT * FROM tbl_user WHERE id_user='$id_user'");
    	return $query;
    }

    function tampil_detail_resi($id_resi)
    {
    	$query = $this->db->query("SELECT * FROM tbl_resi WHERE id_resi='$id_resi'");
    	return $query;
    }

    function get_chart_data_for_visits(/*$start_date, $end_date*/) {
        $sql = 'SELECT COUNT(id_counter) as total_pengunjung, DATE(date_visit) as tgl_kunjungan FROM tbl_counter
            ORDER BY DATE(date_visit) DESC';
        $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                $data = array();
            foreach ($query->result() as $value) {
                //$data[$key]['label'] = $value['tgl_kunjungan'];
                $data['value'] = $value->total_pengunjung;
                $data['tgl'] = $value->tgl_kunjungan;
            }
            return $data;
            }
            return NULL;
    }

    function count_in_today()
    {
        $q = $this->db->query("SELECT COUNT(id_counter) as count_in_today FROM tbl_counter WHERE DATE(date_visit) = CURDATE()");
        return $q;
    }

    function count_in_week()
    {
        $q = $this->db->query("SELECT COUNT(id_counter) as count_in_week FROM tbl_counter WHERE DATE(date_visit) BETWEEN CURDATE() - INTERVAL 7 DAY AND CURDATE()");
        return $q;
    }

    function count_in_month()
    {
        $q = $this->db->query("SELECT COUNT(id_counter) as count_in_month FROM tbl_counter WHERE DATE(date_visit) BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE()");
        return $q;
    }

    function count_in_year()
    {
        $q = $this->db->query("SELECT COUNT(id_counter) as count_in_year FROM tbl_counter WHERE YEAR(date_visit) = YEAR(CURDATE())");
        return $q;
    }

    // Fungsi GLobal //
    function tgl_time_indo($date=null){
    $tglindo = date("d-m-Y H:i:s", strtotime($date));
    $formatTanggal = $tglindo;
    return $formatTanggal;
    }

    function tgl_database($date=null)
    {
        $tgldatabase = date("Y-m-d", strtotime($date));
        $formatTanggal = $tgldatabase;
        return $formatTanggal;
    }

    function tgl_indo($date=null)
    {
        $tglindo = date("d-m-Y", strtotime($date));
        $formatTanggal = $tglindo;
        return $formatTanggal;
    }

    function jam_format($time=null)
    {
        $jamformat = date("H:i", strtotime($time));
        $formatJam = $jamformat;
        return $formatJam;
    }

    function bulan_inggris($date=null){
    //buat array nama hari dalam bahasa Indonesia dengan urutan 1-7
    $array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat', 'Sabtu','Minggu');
    //buat array nama bulan dalam bahasa Indonesia dengan urutan 1-12
    $array_bulan = array(1=>'Jan','Feb','Mar', 'Apr', 'May', 'Jun','Jul','Aug',
    'Sep','Oct', 'Nov','Dec');
    if($date == null) {
    //jika $date kosong, makan tanggal yang diformat adalah tanggal hari ini
    $hari = $array_hari[date('N')];
    $tanggal = date ('j');
    $bulan = $array_bulan[date('n')];
    $tahun = date('Y');
    } else {
    //jika $date diisi, makan tanggal yang diformat adalah tanggal tersebut
    $date = strtotime($date);
    $hari = $array_hari[date('N',$date)];
    $tanggal = date ('j', $date);
    $bulan = $array_bulan[date('n',$date)];
    $tahun = date('Y',$date);
    }
    $formatTanggal = $tanggal ." ". $bulan ." ". $tahun;
    return $formatTanggal;
    }

    function tgl_indo_no_hari($date=null){
	    //buat array nama hari dalam bahasa Indonesia dengan urutan 1-7
	    $array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat', 'Sabtu','Minggu');
	    //buat array nama bulan dalam bahasa Indonesia dengan urutan 1-12
	    $array_bulan = array(1=>'Januari','Februari','Maret', 'April', 'Mei', 'Juni','Juli','Agustus',
	    'September','Oktober', 'November','Desember');
	    if($date == null) {
	    //jika $date kosong, makan tanggal yang diformat adalah tanggal hari ini
	    $hari = $array_hari[date('N')];
	    $tanggal = date ('j');
	    $bulan = $array_bulan[date('n')];
	    $tahun = date('Y');
	    } else {
	    //jika $date diisi, makan tanggal yang diformat adalah tanggal tersebut
	    $date = strtotime($date);
	    $hari = $array_hari[date('N',$date)];
	    $tanggal = date ('j', $date);
	    $bulan = $array_bulan[date('n',$date)];
	    $tahun = date('Y',$date);
	    }
	    $formatTanggal = $tanggal ." ". $bulan ." ". $tahun;
	    return $formatTanggal;
    }

    function tgl_indo_lengkap($date=null){
	    //buat array nama hari dalam bahasa Indonesia dengan urutan 1-7
	    $array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat', 'Sabtu','Minggu');
	    //buat array nama bulan dalam bahasa Indonesia dengan urutan 1-12
	    $array_bulan = array(1=>'Januari','Februari','Maret', 'April', 'Mei', 'Juni','Juli','Agustus',
	    'September','Oktober', 'November','Desember');
	    if($date == null) {
	    //jika $date kosong, makan tanggal yang diformat adalah tanggal hari ini
	    $hari = $array_hari[date('N')];
	    $tanggal = date ('d');
	    $bulan = $array_bulan[date('n')];
	    $tahun = date('Y');
	    $jam = date('H:i:s');
	    } else {
	    //jika $date diisi, makan tanggal yang diformat adalah tanggal tersebut
	    $date = strtotime($date);
	    $hari = $array_hari[date('N',$date)];
	    $tanggal = date ('d', $date);
	    $bulan = $array_bulan[date('n',$date)];
	    $tahun = date('Y',$date);
	    $jam = date('H:i:s',$date);
	    }
	    $formatTanggal = $hari . ", " . $tanggal ." ". $bulan ." ". $tahun ." Jam ". $jam;
	    return $formatTanggal;
    }

    function tgl_jam_indo_no_hari($date=null){
	    //buat array nama hari dalam bahasa Indonesia dengan urutan 1-7
	    $array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat', 'Sabtu','Minggu');
	    //buat array nama bulan dalam bahasa Indonesia dengan urutan 1-12
	    $array_bulan = array(1=>'Januari','Februari','Maret', 'April', 'Mei', 'Juni','Juli','Agustus',
	    'September','Oktober', 'November','Desember');
	    if($date == null) {
	    //jika $date kosong, makan tanggal yang diformat adalah tanggal hari ini
	    $hari = $array_hari[date('N')];
	    $tanggal = date ('d');
	    $bulan = $array_bulan[date('n')];
	    $tahun = date('Y');
	    $jam = date('H:i:s');
	    } else {
	    //jika $date diisi, makan tanggal yang diformat adalah tanggal tersebut
	    $date = strtotime($date);
	    $hari = $array_hari[date('N',$date)];
	    $tanggal = date ('d', $date);
	    $bulan = $array_bulan[date('n',$date)];
	    $tahun = date('Y',$date);
	    $jam = date('H:i:s',$date);
	    }
	    $formatTanggal = $tanggal ." ". $bulan ." ". $tahun ." Jam ". $jam;
	    return $formatTanggal;
	    }

	    function rupiah($angka) {
	      $rupiah = number_format($angka ,0, '' , '.' );
	      return $rupiah;
   }

   function fstrip_html_tags( $text ) //Fungsi Untuk  mengatasi teks berformat
   {
		$search = array ("'<script[^>]*?>.*?</script>'si",
		                 "'<[/!]*?[^<>]*?>'si",
		                 "'&(quot|#34);'i",
		                 "'&(amp|#38);'i",
		                 "'&(lt|#60);'i",
		                 "'&(gt|#62);'i",
		                 "'&(nbsp|#160);'i",
		                 "'&(iexcl|#161);'i",
		                 "'&(cent|#162);'i",
		                 "'&(pound|#163);'i",
		                 "'&(copy|#169);'i",
		                 "'&#(d+);'e");

		$replace = array ("",
		                 "",
		                 "\"",
		                 "&",
		                 "<",
		                 ">",
		                 " ",
		                 chr(161),
		                 chr(162),
		                 chr(163),
		                 chr(169),
		                 "chr(\1)");

		$text = str_replace($search, $replace, $text);

		    return ($text);
    }

    function fpotongteks( $text, $limit ) //Fungsi Untuk Memotong Panjang
    {

		$text = $this->fstrip_html_tags($text);
		if( strlen($text)>$limit )
		  {
		    $text = substr( $text,0,$limit );
		    $text = substr( $text,0,-(strlen(strrchr($text,' '))) ); $text="$text";
		  }

		return $text;
    }


}
