<?php
$c=sqlite_open("pos.db",0666);
$s="select * from pos";
$d=sqlite_array_query($c,$s,SQLITE_ASSOC);
sqlite_close($c);
function write_table($d)
{
for($i=0;$i<count($d);$i++)
	{
	$date=$d[$i]["date"];
	$pos=$d[$i]["lat"]." , ".$d[$i]["lon"];
	if($i==count($d)-1)
	{
	$icon="recent.png";
	}
	else
	{
	$icon="hist.png";
	}
	echo "\t\t<tr>\n";
	echo "\t\t\t<td><img src=\"$icon\" height=\"20px\" width=\"20px\" /></td><td>$date</td><td>$pos</td>\n";
	echo "\t\t<tr>\n";
	}
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>gpsmap</title>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta name="robots" content="noindex,nofollow">
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="prototype.js"></script>
<script type="text/javascript" src="map.js"></script>
<style type="text/css">
<!--
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
}
#map_canvas{
width:809px;
height:500px;
}
th{
background-color:#666666;
}
td{
	text-align:center;
	}
body {
	background-color: #000000;
}
body,td,th {
	color: #FFFFFF;
}
-->
</style>
</head>
<body>
<div id="head">
  <h1>oreore imakoko</h1>
    <p>
    	<img src="recent.png" alt="the lastest positon" height="20" width="20" />:the lastest positon<br>
        <img src="hist.png" alt="the past position" height="20" width="20" />:
	</p>
   </div>
  <div id="map_canvas"></div>
  <div id="postable">
  <table id="pos">
  <tr>
    <th width="37">&nbsp;</th>
    <th class="head" width="380">date</th>
    <th class="head" width="380">position</th>
  </tr>
<?php write_table($d);?>
</table>
</div>
</body>
</html>
