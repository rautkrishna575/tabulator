<?php
require_once('../../db.php');
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); 
header("Access-Control-Allow-Headers: Content-Type, Authorization"); 
$db = new DB;

if (isset($_POST['method']) && $_POST['method'] == 'fetch'):
    $student = $db->getRows('tbl_student', array('where' => array('is_active' => 'Y')))['data'];
    echo json_encode($student);
endif;
if (isset($_POST['method']) && $_POST['method'] == 'delete'):
    $db->update('tbl_student',  array('is_active' => 'N'), array('id' => $_POST['stdid']));
endif;
