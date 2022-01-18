<?php 
include_once '../lib/dao.php';
$d = new dao();


$data = array('pos' =>  $_POST['pos'] );

$status = $d->update("office_address",$data,'id = '.$_POST['id']);

echo json_encode($status);

die();

?>