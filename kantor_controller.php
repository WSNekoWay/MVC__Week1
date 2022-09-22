<?php
include("kantor_model.php");



function insertkantor(){
    $kantor = new kantor();
    $kantor->store = $_POST['store'];
    $kantor->address = $_POST['address'];
    $kantor->city = $_POST['city'];
    $kantor->phone = $_POST['phone'];
    $kantor->kaid = $_POST['kaid'];
    array_push( $_SESSION['listkantor'],$kantor);
}

function editkantor($edit){
    $kantor = new kantor();
    $kantor->store = $_POST['store'];
    $kantor->address = $_POST['address'];
    $kantor->city = $_POST['city'];
    $kantor->phone = $_POST['phone'];
    $kantor->kaid = $_POST['kaid'];
    $_SESSION['listkantor'][$edit] = $kantor;
}

function deletekantor($id){
    unset($_SESSION['listkantor'][$id]);
}

?>