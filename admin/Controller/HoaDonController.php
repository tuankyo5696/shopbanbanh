<?php 
    include '../Model/db.php'; 
    function listHoaDon(){
       $sql = 'select * from bill';
       $connection = db_connect();
       $result = db_select($connection,$sql);
       return $result;
    }
?>