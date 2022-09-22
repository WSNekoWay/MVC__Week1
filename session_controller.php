<?php

require("relasi_controller.php");
require("karyawan_controller.php");
require("kantor_controller.php");
session_start();

if (!isset($_SESSION['listkantor'])) {
    $_SESSION['listkantor'] = array();
}
function indexrelasi(){
    return $_SESSION['listrelasi'];
   }

if(!isset($_SESSION['listrelasi'])){
    $_SESSION['listrelasi'] = array();
}
function indexkantor()
{
    return $_SESSION['listkantor'];
}

if (!isset($_SESSION['listkaryawan'])) {
    $_SESSION['listkaryawan'] = array();
}
function indexkaryawan()
{
    return $_SESSION['listkaryawan'];
}


?>