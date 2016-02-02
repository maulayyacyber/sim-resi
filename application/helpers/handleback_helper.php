<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function backButtonHandle(){ // nama fungsinya juga bisa d ganti "suka-suka lo" XD (y)
  $CI =& get_instance();
  //$CI->load->library(array('output'));
  $CI->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
  $CI->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
  $CI->output->set_header('Pragma: no-cache');
  $CI->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
 }