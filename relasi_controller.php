<?php
include("relasi_model.php");



function insertrelasi(){
    $relasi = new relasi();
    $relasi->kid = $_POST['kid'];
    $relasi->kaid = $_POST['kaid'];
    array_push($_SESSION['listrelasi'],$relasi);
}



function deleterelasi($delete){
    unset($_SESSION['listrelasi'][$delete]);
}
function editrelasi($edit){
    $relasi = new relasi();
    $relasi->kid = $_POST['kid'];
    $relasi->kaid = $_POST['kaid'];
    $_SESSION['listrelasi'][$edit] = $relasi;
}




?>