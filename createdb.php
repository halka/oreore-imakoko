<?php
$con=sqlite_open("pos.db",0666);
$sql="create table pos(id integer primary key,date,lat,lon)";
sqlite_query($sql,$con);
sqlite_close($con);
?>
