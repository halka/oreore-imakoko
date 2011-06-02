new Ajax.Request("genjson.php",{method:'get',onComplete:setjson});
function setjson(req)
{
	var pos=req.responseText.evalJSON();
	main(pos);
}

function main(ll)
{
	var isempty=false;
	var recent_icon="recent.png";
	var hist_icon="hist.png";
	if(ll.length==0)
	{
		var center_ll=new google.maps.LatLng(35,140);
		isempty=true;
	}
	else
	{
	var center_ll=new google.maps.LatLng(ll[ll.length-1]['lat'],ll[ll.length-1]['lon']);
	}
	var option={
		zoom:8,
		center:center_ll,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	var map=new google.maps.Map(document.getElementById("map_canvas"),option);
	if(!isempty)
	{
		var recent_pin=new google.maps.Marker({position:center_ll,map:map,icon:recent_icon});
	}
	for(i=0;i<ll.length-1;i++)
	{
		hist_prot(ll[i]['lat'],ll[i]['lon'],map,hist_icon);
	}
}

function hist_prot(lat,lon,map,icon)
{
	var hist_ll=new google.maps.LatLng(lat,lon);
	var hist_pin=new google.maps.Marker({position:hist_ll,map:map,icon:icon});
}