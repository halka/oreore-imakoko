<?php
$con=sqlite_open("pos.db",0666,$e);
if($e) die("db error");
$sql="select * from pos";
$data=sqlite_array_query($con,$sql,SQLITE_ASSOC);
sqlite_close($con);
$json=json_encode($data);
header("Content-Type: application/json");
echo $json;
?>