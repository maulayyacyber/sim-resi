<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
function show_401(){
    $exceptions =& load_class('Exceptions','core');
    $exceptions->show_401();
}
?>