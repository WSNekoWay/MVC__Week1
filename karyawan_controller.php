<?php

include("karyawan_model.php");



function insertkaryawan(){
    $karyawan = new karyawan();
    $karyawan->nama = $_POST['nama'];
    $karyawan->jabatan = $_POST['jabatan'];
    $karyawan->usia = $_POST['usia'];
    $karyawan->kid = $_POST['kid'];
    array_push( $_SESSION['listkaryawan'],$karyawan);
}

function editkaryawan($edit){
    $karyawan = new karyawan();
    $karyawan->nama = $_POST['nama'];
    $karyawan->usia = $_POST['usia'];
    $karyawan->jabatan = $_POST['jabatan'];
    $karyawan->kid = $_POST['kid'];
    $_SESSION['listkaryawan'][$edit] = $karyawan;
}

function deletekaryawan($id){
    unset($_SESSION['listkaryawan'][$id]);
}

?>