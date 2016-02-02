<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      SIM RESI (Pondok Kode Web Project Development)
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class Pondokkode_model_web extends CI_Model {

    public function get_semua_resi($limit,$offset,$filter=array())
    {
        $hasil = "";
        $data_resi   = $filter['data_resi'];
        $query_add   = "WHERE nama like '%".$data_resi."%'";
        $tot_hal = $this->db->query("SELECT * FROM tbl_resi ".$query_add." ORDER BY id_resi DESC");
        $config['base_url']    = base_url() . 'web/page/';
        $config['total_rows']  = $tot_hal->num_rows();
        $config['per_page']    = $limit = 20;
        $config['uri_segment'] = 3;
        $config['first_link']  = 'Pertama';
        $config['last_link']   = 'Terakhir';
        $config['next_link']   = '»';
        $config['prev_link']   = '«';
        $this->pagination->initialize($config);
        $w = $this->db->query("SELECT * FROM tbl_resi ".$query_add." ORDER BY id_resi DESC LIMIT ".$offset.",".$limit."");
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
                        <th><center style='color:#20B2AA'>NO RESI</th>
                        <th><center style='color:#20B2AA'>JASA KURIR</th>
                        <th><center style='color:#20B2AA'>STATUS</th>
                        <th><center style='color:#20B2AA'>ALAMAT</th>
                        </tr>
                        </thead>";
                    $no = $offset+1;
            foreach ($w->result() as $h)
            {
                        if ($h->aktif==1){
                        $aktif_or_no = '<span class="label label-success label-mini"><i class="fa fa-check"></i> Complete</span>';
                        }else{
                        $aktif_or_no = '<span class="label label-danger label-mini"><i class="fa fa-spinner fa-spin"></i> Progress</span>';
                        }
            $hasil .= "<tr>
                          <td class='text-center'>".$no."</td>
                          <td>".$h->nama."</td>
                          <td class='text-center'>".$h->no_resi."</td>
                          <td class='text-center'>".$h->kategori."</td>
                          <td class='text-center'>".$aktif_or_no."</td>
                          <td>".$h->alamat."</td>
                      </tr>";
                        $no++;
                }
            $hasil .= '</table>';
        }
        return $hasil;
    }

    public function get_resi_jne($limit,$offset,$filter=array())
    {
        $hasil = "";
        $data_jne   = $filter['data_jne'];
        $query_add   = "WHERE nama like '%".$data_jne."%' AND kategori='JNE'";
        $tot_hal = $this->db->query("SELECT * FROM tbl_resi ".$query_add." ORDER BY id_resi DESC");
        $config['base_url']    = base_url() . 'resi-pengiriman/jne/page/';
        $config['total_rows']  = $tot_hal->num_rows();
        $config['per_page']    = $limit = 20;
        $config['uri_segment'] = 4;
        $config['first_link']  = 'Pertama';
        $config['last_link']   = 'Terakhir';
        $config['next_link']   = '»';
        $config['prev_link']   = '«';
        $this->pagination->initialize($config);
        $w = $this->db->query("SELECT * FROM tbl_resi ".$query_add." ORDER BY id_resi DESC LIMIT ".$offset.",".$limit."");
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
                        <th><center style='color:#20B2AA'>NO RESI</th>
                        <th><center style='color:#20B2AA'>JASA KURIR</th>
                        <th><center style='color:#20B2AA'>STATUS</th>
                        <th><center style='color:#20B2AA'>ALAMAT</th>
                        </tr>
                        </thead>";
                    $no = $offset+1;
            foreach ($w->result() as $h)
            {
                        if ($h->aktif==1){
                        $aktif_or_no = '<span class="label label-success label-mini"><i class="fa fa-check"></i> Complete</span>';
                        }else{
                        $aktif_or_no = '<span class="label label-danger label-mini"><i class="fa fa-spinner fa-spin"></i> Progress</span>';
                        }
            $hasil .= "<tr>
                          <td class='text-center'>".$no."</td>
                          <td>".$h->nama."</td>
                          <td class='text-center'>".$h->no_resi."</td>
                          <td class='text-center'>".$h->kategori."</td>
                          <td class='text-center'>".$aktif_or_no."</td>
                          <td>".$h->alamat."</td>
                      </tr>";
                        $no++;
                }
            $hasil .= '</table>';
        }
        return $hasil;
    }

    public function get_resi_pos($limit,$offset,$filter=array())
    {
        $hasil = "";
        $data_pos   = $filter['data_pos'];
        $query_add   = "WHERE nama like '%".$data_pos."%' AND kategori='POS'";
        $tot_hal = $this->db->query("SELECT * FROM tbl_resi ".$query_add." ORDER BY id_resi DESC");
        $config['base_url']    = base_url() . 'resi-pengiriman/pos/page/';
        $config['total_rows']  = $tot_hal->num_rows();
        $config['per_page']    = $limit = 20;
        $config['uri_segment'] = 4;
        $config['first_link']  = 'Pertama';
        $config['last_link']   = 'Terakhir';
        $config['next_link']   = '»';
        $config['prev_link']   = '«';
        $this->pagination->initialize($config);
        $w = $this->db->query("SELECT * FROM tbl_resi ".$query_add." ORDER BY id_resi DESC LIMIT ".$offset.",".$limit."");
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
                        <th><center style='color:#20B2AA'>NO RESI</th>
                        <th><center style='color:#20B2AA'>JASA KURIR</th>
                        <th><center style='color:#20B2AA'>STATUS</th>
                        <th><center style='color:#20B2AA'>ALAMAT</th>
                        </tr>
                        </thead>";
                    $no = $offset+1;
            foreach ($w->result() as $h)
            {
                        if ($h->aktif==1){
                        $aktif_or_no = '<span class="label label-success label-mini"><i class="fa fa-check"></i> Complete</span>';
                        }else{
                        $aktif_or_no = '<span class="label label-danger label-mini"><i class="fa fa-spinner fa-spin"></i> Progress</span>';
                        }
            $hasil .= "<tr>
                          <td class='text-center'>".$no."</td>
                          <td>".$h->nama."</td>
                          <td class='text-center'>".$h->no_resi."</td>
                          <td class='text-center'>".$h->kategori."</td>
                          <td class='text-center'>".$aktif_or_no."</td>
                          <td>".$h->alamat."</td>
                      </tr>";
                        $no++;
                }
            $hasil .= '</table>';
        }
        return $hasil;
    }

    public function counter_visitor()
    {
        setcookie("pengunjung", "sudah berkunjung", time()+60*60*24);
            if (!isset($_COOKIE["pengunjung"])) {
                $d_in['ip_address'] = $_SERVER['REMOTE_ADDR'];
                $d_in['date_visit'] = date("Y-m-d H:i:s");
                $this->db->insert("tbl_counter",$d_in);
            }
    }

}
