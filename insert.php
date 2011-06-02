<?php
if(isset($_GET['lat']&&isset&_GET['lon'])
{
$con=sqlite_open("pos.db",0666);
$date=date("Y-m-d H:i:s");
$lat=$_GET['lat'];
$lon=$_GET['lon'];
$sql="insert into pos(date,lat,lon) values('$date','$lat','$lon')";
$r=sqlite_query($sql,$con);
sqlite_close($con);
}
if($r) echo "OK";
?>
